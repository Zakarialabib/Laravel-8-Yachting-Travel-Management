<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function store(Request $request) {

        $data = $this->validate($request, [
            'booking_id' => '',
            'email' => 'sometimes',
            'password' => 'sometimes',
            'okUrl' => '',
            'amount' => '',
            'failUrl' => '',
            'TranType' => '',
            'callbackUrl' => '', 
            'shopurl' => '',
            'currency' => '',
            'rnd' => '',
            'storetype' => '',
            'hashAlgorithm' => '',
            'lang' => '',
            'refreshtime' => '', 
            'clientid' => '',
            'BillToName' => '',
            'BillToCompany' => '',
            'BillToStreet1' => '',
            'tel' => '',
            'BillToPostalCode' => '',
            'BillToCity' => '',
            'BillToCountry' => '',
            'BillToStateProv' => '',
            'encoding' => '',
            'oid' => '',
        ]);        

        $cmi = [
            'clientid' => $data['clientid'],
            'email' => Auth::user()->email,
            'okUrl' => $data['okUrl'],
            'amount' => $data['amount'],
            'failUrl' => $data['failUrl'],
            'TranType' => $data['TranType'],
            'callbackUrl' => $data['callbackUrl'], 
            'shopurl' => $data['shopurl'],
            'currency' => $data['currency'],
            'rnd' => $data['rnd'],
            'storetype' => $data['storetype'],
            'hashAlgorithm' => $data['hashAlgorithm'],
            'lang' => $data['lang'],
            'refreshtime' => $data['refreshtime'], 
            'BillToName' => $data['BillToName'],
            'BillToCompany' => $data['BillToCompany'],
            'BillToStreet1' => $data['BillToStreet1'],
            'tel' => $data['tel'],
            'BillToPostalCode' => $data['BillToPostalCode'],
            'BillToCity' => $data['BillToCity'],
            'BillToCountry' => $data['BillToCountry'],
            'BillToStateProv' => $data['BillToStateProv'],
            'encoding' => $data['encoding'],
            'oid' => $data['oid'],
        ];

        /*
        $booking = Booking::find($data['booking_id']);
        foreach ($booking->rates as $key => $rate) {
            $count = $key + 1;
            $cmi["ProductCode{$count}"] = $rate->title;
            $cmi["Qty{$count}"] = $rate->pivot->quantity;
        }
        */ 
        
        return view('pages.frontend.cmi.payment', compact('cmi'));
    }
}
