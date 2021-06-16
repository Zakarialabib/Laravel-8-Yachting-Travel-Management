<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingPlace extends Model
{
    protected $table = 'booking_place';

    protected $fillable = ['price','place_id','booking_id'];


}