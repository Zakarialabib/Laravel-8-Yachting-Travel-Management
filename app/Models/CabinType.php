<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CabinType extends Model
{
    public static function getCabinByCode($code){
        return static::where('cabin_code',$code)->first();
    }
}
