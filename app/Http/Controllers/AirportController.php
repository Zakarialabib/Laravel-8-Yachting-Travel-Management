<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function typeAhead(Request $request){

        $data = Airport::typeAhead($request);
        return response()->json($data);

    }
}
