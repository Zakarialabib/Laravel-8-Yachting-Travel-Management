<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Models\Returns;
use App\Models\ReturnDetails;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use nilsenj\Toastr\Facades\Toastr;


class ReturnController extends Controller
{
    public function list()
    {
        $user = User::where('is_admin','=',1)->first();

        $returns = Returns::query()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.backend.return.return_list', compact('returns','user') );

    }

    public function updateStatus(Request $request)
    {
        $return = Returns::find($request->return_id);
        $return->is_locked = $request->is_locked;
        $return->save();
        
        return response()->json(['succes'=>'status changed succesfully']);
    }

    public function createView(Request $request)
    {
        $returns = Returns::all();
        $users = User::all();
          
        return view('pages.backend.return.return_create', [
            'returns' => $returns,
            'users' => $users,
        ]);
    }

    public function create(Request $request)
    {
        try {

            $data = $this->validate($request, [
                "sale_id" => "",
            ]);

            $sale = Sale::find($data['sale_id']);
            
            if($sale)
            {

                if($sale->document)
                {
                    Storage::disk('public_upload')->move('sales/documents/' . $sale->document, 'returns/documents/' . $sale->document);
                }

                $return = Returns::create([
                    'user_id' => $sale->user_id,
                    'reference_no' => $sale->reference_no,
                    'booking_reference' => $sale->booking_reference,
                    'user_id' => $sale->user_id,
                    'customer_id' => $sale->customer_id,
                    'total_qty' => $sale->details()->count(),
                    'tax' => $sale->tax,
                    'total_tax' => $sale->total_tax,
                    'total_cost' => $sale->total_price,
                    'grand_total' => $sale->grand_total,
                    'status' => $sale->status,
                    'payment_status' => $sale->payment_status,
                    'document' => $sale->document,
                    'paid_amount' => $sale->paid_amount,
                    'paid_by' => $sale->paid_by,
                    'payment_note' => $sale->payment_note,
                    'note' => $sale->note,
                    'staff_note' => $sale->staff_note,
                    'is_locked' => $sale->is_locked,
                ]);
                
                if($return) {

                    foreach ($sale->details as $detail) {
                        $returnDetail = ReturnDetails::create([
                            'return_id' => $return->id,
                            'name' => $detail->name,
                            'qty' => $detail->qty,
                            'price' => $detail->price,
                            'total' => $detail->total,
                        ]);
                    }
                    
                    $return->customer->wallet->update([
                        'balance' => $return->customer->wallet->balance + $sale->paid_amount,
                    ]);

                    $sale->delete();

    
                    Toastr::success("Return created successfully");
    
                } else {
                    Toastr::error("Unable to create new Return");
                }
        
                return redirect(route('return_list'))->with('success', 'Return created successfully');
            }

        } catch (QueryException $e) {
            Toastr::error("Unable to update new Return");
            return back()->with('error', 'Unable to create new Return');
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
        $return = Returns::find($id);
        $users = User::all();


        return view('pages.backend.return.return_edit',compact('return', 'users'));
    }


    public function update(Request $request, $id)
    {
        try {

            $data = $request->validate([
                "reference_no" => "",
                "user_id" => "",
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
                "note" => "",
                "payment_note" => "",
                "staff_note" => ""
            ]);

            $return = Returns::find($id);

            if($return) {

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
                    //$document->move('', $documentName);
                    $documentPath = $document->storeAs('returns/documents', $data['reference_no'] . '-' . $documentName, 'public_upload');
                    $data['document'] = $data['reference_no'] . '-' . $documentName;
                } else {
                    // if we dont get document with the request
                    $data['document'] = $return->document;
                }

                // build details array from input
                $returnDetails = [];
                foreach ($data['name'] as $key => $name) {
                    if($name) {
                        array_push($returnDetails, new ReturnDetails([
                            'name' => $data['name'][$key],
                            'qty' => $data['qty'][$key], 
                            'price' => $data['price'][$key],
                            'total' => $data['total'][$key],
                        ]));
                    }
                }

                //delete old return details
                $return->details()->delete();
                // insert new return details
                $return->details()->saveMany($returnDetails);

                $return->update([
                    'reference_no' => $data['reference_no'],
                    'user_id' => $data['user_id'],
                    'total_qty' => $return->details()->count(),
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
                Toastr::success("Return updated successfully");
            } else {
                Toastr::error("Unable to update new Return");
            }

            return redirect(route('return_list'))->with('success', 'Update Return success!');

        } catch (QueryException $e) {
            Toastr::error("Unable to update new Return");
            return back()->with('error', 'Unable to update new Return');;
        }
        
    }

    public function deletePurchaseFile(Request $request)
    {
        $return_id = $request->return;
        
        $return = Returns::find($return_id);

        $status =  Storage::disk('public_upload')->delete('returns/documents/'.$return->document);

        if($status)
            $return->update(['document' => null]);

        return ['status' => $status];
    }

    public function destroy($id)
    {
        Returns::destroy($id);
        return back()->with('success', 'Return Deleted with success!');
    }

    public function genInvoice($id)
    {
        $returns = Returns::find($id);
        $returnDetails = ReturnDetails::where('return_id', $id)->get();
        $users = User::all();

        return view('pages.backend.return.invoice', compact('returns', 'users','returnDetails'));
    }


    public function genQuotation($id)
    {
        $returns = Returns::find($id);
        $returnDetails = ReturnDetails::where('return_id', $id)->get();
        $users = User::all();

        return view('pages.backend.return.quotation', compact('returns', 'users','returnDetails'));
    }


}