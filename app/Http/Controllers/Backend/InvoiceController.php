<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Purchase;
use App\Models\Returns;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function create($type, $id)
    {
        $templates = [
            new InvoiceTemplate(1, 'avec en tete', 'images/invoice/template1.png', 'invoice-1'),
            new InvoiceTemplate(2, 'avec en tete', 'images/invoice/template2.png', 'invoice-2'),
            new InvoiceTemplate(3, 'sans en tete', 'images/invoice/template1.png', 'invoice-3'),
            new InvoiceTemplate(4, 'sans en tete', 'images/invoice/template2.png', 'invoice-4'),
        ];
        return view('pages.backend.invoice.models', compact('type', 'id', 'templates'));
    }

    public function sendEmail(Request $request, $id)
    {
        $data = $request->validate([
            'recepient' => 'required',
            'subject' =>'required',
            'msg' => 'required',
            'template_id' => '',
            'type' => '',
        ]);

        switch ($data['type']) {
            case Invoice::SALE_TYPE :
                $entity = Sale::find($id);
                $beneficiary = $entity->customer;
                break;
            case Invoice::PURCHASE_TYPE:
                $entity = Purchase::find($id);
                $beneficiary = $entity->supplier;
                break;

            case Invoice::RETURN_TYPE:
                $entity = Returns::find($id);
                $beneficiary = $entity->customer;
                break;
            
            default:
                $entity = Sale::find($id);
                $beneficiary = $entity->customer;
                break;
        }

        $pdf = PDF::loadView('pages.backend.invoice.invoice-' . $data['template_id'], [
            'entity' => $entity,
            'beneficiary' => $beneficiary,
            'type' => $data['type'],
        ]);

        Mail::send('pages.backend.invoice.invoice-' . $data['template_id'], [
            'entity' => $entity,
            'beneficiary' => $beneficiary,
            'type' => $data['type'],
        ] , function($message) use($data, $pdf) {
            $message->to($data['recepient'], 'rentacs Tours')
                    ->subject($data["subject"])
                    ->attachData($pdf->output(), "rapport.pdf");
        });

        return back();
    }

    public function action($action, $type, $id, $template) {
        switch ($type) {
            case Invoice::SALE_TYPE :
                $entity = Sale::find($id);
                $beneficiary = $entity->customer;
                break;

            case Invoice::PURCHASE_TYPE:
                $entity = Purchase::find($id);
                $beneficiary = $entity->supplier;
                break;

            case Invoice::RETURN_TYPE:
                $entity = Returns::find($id);
                $beneficiary = $entity->customer;
                break;
            
            default:
                $entity = Sale::find($id);
                $beneficiary = $entity->customer;
                break;
        }

        switch ($action) {
            case Invoice::PREVIEW_ACTION:
                return view('pages.backend.invoice.invoice-' . $template, compact('entity', 'beneficiary', 'type'));
            
            case Invoice::DOWNLOAD_ACTION:
                $pdf = PDF::loadView('pages.backend.invoice.invoice-' . $template, [
                    'entity' => $entity,
                    'beneficiary' => $beneficiary,
                    'type' => $type,
                ]);
                return $pdf->download('facture.pdf');
            
            default:
                return view('pages.backend.invoice.invoice-' . $template, compact('entity', 'beneficiary', 'type'));
                break;
        }

    }
}

class InvoiceTemplate {

    public $id;
    public $name;
    public $image;
    public $file;

    function __construct($id, $name, $image, $file)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->file = $file;
    }
}
