<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Sale;
use App\Models\SaleDetails;
use App\Models\User;
use App\Models\Supplier;
use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use nilsenj\Toastr\Facades\Toastr;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class SaleController extends Controller
{
    public function list()
    {

        $customer = User::customers()->get();
        $user = User::where('is_admin','=',1)->first();


        $sales = Sale::query()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.backend.sale.sale_list', compact('customer', 'sales','user') );
    }

    public function createView(Request $request)
    {
        $booking = null;
        $booking_items = [];
        if ($request->has('id')) {
            $booking = Booking::where('id', $request->input('id'))->with(['user', 'place'])->first();

            // check if a sale is already created for this booking
            if(Sale::where('booking_reference', $booking->reference)->count() > 0)
                return $this->edit(Sale::where('booking_reference', $booking->reference)->first()->id);

            if(get_class($booking->bookable) === 'App\Models\Place'){
                array_push($booking_items, new BookingItem(
                    $booking->bookable->id,
                    $booking->bookable->name,
                    $booking->numbber_of_adult,
                    $booking->bookable->price
                ));
            } else if(get_class($booking->bookable) === 'App\Models\Package') {
                foreach ($booking->rates as $key => $rate) {
                    array_push($booking_items, new BookingItem(
                        $rate->id,
                        $rate->title,
                        $rate->pivot->quantity,
                        $rate->price
                    ));
                }
            } else if(get_class($booking->bookable) === 'App\Models\Offer') {
                array_push($booking_items, new BookingItem(
                    $booking->bookable->id,
                    $booking->bookable->name,
                    1,
                    $booking->bookable->price
                ));
            }
        }


        $reference = Carbon::now()->format('ymd') . mt_rand(1000000, 9999999);

        $users = User::all();
        $customers = User::customers()->get();
        
        //dd(['users' => $users, 'customers' => $customers]);
          
        return view('pages.backend.sale.sale_create', [
            'reference_no' => $reference,
            'users' => $users,
            'customers' => $customers,
            'booking' => $booking,
            'booking_items' => $booking_items,
        ]);
    }

    public function updateStatus(Request $request)
    {
        $sale = Sale::find($request->sale_id);
        $sale->is_locked = $request->is_locked;
        $sale->save();
        return response()->json(['succes'=>'status changed succesfully']);
    }

    public function create(Request $request)
    {
        try {
            $data = $this->validate($request, [
                "reference_no" => "",
                "booking_reference" => "",
                "user_id" => "",
                "customer_id" => "",
                "name" => "",
                "qty" => "",
                "price" => "",
                "total" => "",
                "tax" => "",
                "tax_amount" => "",
                "sub_total" => "", 
                "status" => "", 
                "total_amount" => "",
                "payment_status" => "",
                "paid_by" => "",
                "paid_amount" => "",
                "payment_note" => "",
                "note" => "",
                "staff_note" => "",
                "is_locked" => ""
            ]);

            $document = $request->document;
            if ($document) {
                $v = Validator::make(
                    [
                        'extension' => strtolower($request->document->getClientOriginalExtension()),
                    ],
                    [
                        'extension' => 'in:jpg,jpeg,png,gif,pdf,csv,docx,xlsx,txt',
                    ]
                );
                if ($v->fails())
                    return redirect()->back()->withErrors($v->errors());

                $documentName = $document->getClientOriginalName();
                $documentPath = $document->storeAs('sales/documents', $data['reference_no'] . '-' . $documentName, 'public_upload');
                $data['document'] = $data['reference_no'] . '-' . $documentName;
            }
    
            $saleDetails = [];
            foreach ($data['name'] as $key => $name) {
                if($name) {
                    array_push($saleDetails, new SaleDetails([
                        'name' => $data['name'][$key],
                        'qty' => $data['qty'][$key], 
                        'price' => $data['price'][$key],
                        'total' => $data['total'][$key],
                    ]));
                }
            }
    
            $sale = Sale::create([
                'reference_no' => $data['reference_no'],
                'booking_reference' => $data['booking_reference'] ?? null,
                'user_id' => $data['user_id'],
                'customer_id' => $data['customer_id'],
                'total_qty' => count($saleDetails),
                'tax' => $data['tax'],
                'total_tax' => $data['tax_amount'],
                'total_price' => $data['sub_total'],
                'grand_total' => $data['total_amount'],
                'status' => $data['status'],
                'payment_status' => $data['payment_status'],  // need to define payment status
                'document' => $data['document'] ?? null,
                'paid_amount' => $data['paid_amount'],
                'paid_by' => $data['paid_by'],
                'payment_note' => $data['payment_note'],
                'note' => $data['note'],
                'staff_note' => $data['staff_note'],
                'is_locked' => $data['is_locked'],
            ]);

            if($sale) {

                $sale->details()->saveMany($saleDetails);


                Toastr::success("Sale created successfully");

                 // send notice email to customer
                SaleController::sendEmailNotice($sale);

            } else {
                Toastr::error("Unable to create new Sale");
            }

            return redirect()->route('sale_list');
    
        } catch (QueryException $e) {
            Log::info($e);
            Toastr::error("Unable to create new Sale");
            return back()->with('error', 'Unable to create new Sale');;
        }
    }

    public static function sendEmailNotice($sale)
    {
        $customer = $sale->customer;

        $emailData = new SaleEmailData(
            $sale->reference_no,
            $sale->sale_status,
            $sale->payment_status,
            $sale->details,
            $sale->total_qty,
            $sale->total_tax,
            $sale->total_price,
            $sale->grand_total,
            $sale->paid_amount,
            $sale->paid_by
        );

        try {
            Mail::send('emails.SaleDetails', ['data' => $emailData], function ($message) use ($customer) {
                //$message->to('4795e93229-fb5ac0@inbox.mailtrap.io')->subject(__('Sale Status'));
                $message->to($customer->email)->subject(__('Sale Status'));
            });
        } catch (\Exception $e) {
            //throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::where('id', $id)->with(['details', 'user', 'customer'])->first();
        $users = User::all();
        $suppliers = Supplier::all();
        $customers = User::customers()->get();

        return view('pages.backend.sale.sale_edit',compact('sale','suppliers','users','customers'));
    }

    public function update(Request $request, $id)
    {
        try {

            $data = $request->validate([
                "reference_no" => "",
                "booking_reference" => "",
                "user_id" => "",
                "customer_id" => "",
                "detail_id" => "",
                "name" => "",
                "qty" => "",
                "price" => "",
                "total" => "",
                "tax" => "",
                "tax_amount" => "",
                "sub_total" => "", 
                "status" => "", 
                "total_amount" => "",
                "payment_status" => "",
                "paid_by" => "",
                "paid_amount" => "",
                "payment_note" => "",
                "note" => "",
                "staff_note" => "",
                "is_locked" => ""

            ]);

            $sale = Sale::find($id);

            if($sale) {

                // handle document if exists
                $document = $request->document;
                if ($document) {
                    $v = Validator::make(
                        [
                            'extension' => strtolower($document->getClientOriginalExtension()),
                        ],
                        [
                            'extension' => 'in:jpg,jpeg,png,gif,pdf,csv,docx,xlsx,txt',
                        ]
                    );
                    if ($v->fails())
                        return redirect()->back()->withErrors($v->errors());

                    $documentName = $document->getClientOriginalName();
                    $documentPath = $document->storeAs('sales/documents', $data['reference_no'] . '-' . $documentName, 'public_upload');
                    $data['document'] = $data['reference_no'] . '-' . $documentName;
                } else {
                    // if we dont get document with the request
                    $data['document'] = $sale->document;
                }

                // build details array from input
                $saleDetails = [];
                foreach ($data['name'] as $key => $name) {
                    if($name) {
                        array_push($saleDetails, new SaleDetails([
                            'name' => $data['name'][$key],
                            'qty' => $data['qty'][$key], 
                            'price' => $data['price'][$key],
                            'total' => $data['total'][$key],
                        ]));
                    }
                }

                //delete old sale details
                $sale->details()->delete();
                // insert new sale details
                $sale->details()->saveMany($saleDetails);

                $sale->update([
                    'reference_no' => $data['reference_no'],
                    'user_id' => $data['user_id'],
                    'customer_id' => $data['customer_id'],
                    'total_qty' => $sale->details()->count(),
                    'tax' => $data['tax'],
                    'total_tax' => $data['tax_amount'],
                    'total_price' => $data['sub_total'],
                    'grand_total' => $data['total_amount'],
                    'status' => $data['status'],
                    'payment_status' => $data['payment_status'],
                    'document' => $data['document'] ?? null,
                    'paid_amount' => $data['paid_amount'],
                    'paid_by' => $data['paid_by'],
                    'payment_note' => $data['payment_note'],
                    'note' => $data['note'],
                    'staff_note' => $data['staff_note'],
                ]);

                Toastr::success("Sale updated successfully");
            } else {
                Toastr::error("Unable to update Sale");
            }
        
            return redirect()->route('sale_list');
        
        } catch (QueryException $e) {
            Toastr::error("Unable to update Purchase");
            return back();
        }
    }

    public function deleteSaleFile(Request $request)
    {

        
        $sale_id = $request->sale;
        
        $sale = Sale::find($sale_id);

        $status =  Storage::disk('public_upload')->delete('sales/documents/'.$sale->document);



        if($status)
            $sale->update(['document' => null]);

        return ['status' => $status];
        
    }

    public function destroy($id)
    {
        Sale::destroy($id);
        return back()->with('success', 'Sale Deleted with success!');
    }

    public function genQuotation($id)
    {
        $sales = Sale::find($id);
        $saledetails = SaleDetails::where('sale_id', $id)->get();
        $users = User::all();
        $customers = User::find($sales->customer_id);

        return view('pages.backend.sale.quotation', compact('sales', 'users', 'customers','saledetails'));
    }

}

class BookingItem {
    var $id;
    var $name;
    var $qty;
    var $price;

    public function __construct($id, $name, $qty, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->qty = $qty;
        $this->price = $price;
    }

}

class SaleEmailData {
    var $reference_no;
    var $sale_status;
    var $payment_status;
    var $details;
    var $total_qty;
    var $total_tax;
    var $total_price;
    var $grand_total;
    var $paid_amount;
    var $paid_by;

    public function __construct(
        $reference_no,
        $sale_status,
        $payment_status,
        $details,
        $total_qty,
        $total_tax,
        $total_price,
        $grand_total,
        $paid_amount,
        $paid_by
    ) { 
        $this->reference_no = $reference_no;
        $this->sale_status = $sale_status;
        $this->payment_status = $payment_status;
        $this->details = $details;
        $this->total_qty = $total_qty;
        $this->total_tax = $total_tax;
        $this->total_price = $total_price;
        $this->grand_total = $grand_total;
        $this->paid_amount = $paid_amount;
        $this->paid_by = $paid_by;
    } 
}
