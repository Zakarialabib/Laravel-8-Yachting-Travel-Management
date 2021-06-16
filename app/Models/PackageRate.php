<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageRate extends Model
{
    protected $guarded = [];
    
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'rate_booking', 'rate_id', 'booking_id')->withPivot('quantity');
    }
}
