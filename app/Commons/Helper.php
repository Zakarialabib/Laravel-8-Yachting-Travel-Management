<?php

namespace App\Commons;


use App\Models\Currency;
use Illuminate\Support\Facades\Session;

class Helper
{

public static function showCurrencyPrice($price) {
    $curr = Currency::where('is_default','=',1)->first();
    $price = round($price * $curr->value,2);
    if (Session::has('currency')){
        $curr = Currency::find(Session::get('currency'));
    }
    else
    {
        $curr = Currency::where('is_default','=',1)->first();
    }


        return $curr->sign.$price;


}


public static function showAdminCurrencyPrice($price) {
    $curr = Currency::where('is_default','=',1)->first();
    $price = round($price * $curr->value,2);
    return $curr->sign.$price;
}


  public static function storePrice($price) {
    $curr = Currency::where('is_default','=',1)->first();
    $price = ($price / $curr->value);
    return $price;
}


public static function showCurrency()
{
    $curr = Currency::where('is_default','=',1)->first();
    return $curr->sign;
}

public static function showCurrencyCode()
{
    $curr = Currency::where('is_default','=',1)->first();
    return $curr->name;
}

public static function showCurrencyValue()
{
    $curr = Currency::where('is_default','=',1)->first();
    return $curr->value;
}

}