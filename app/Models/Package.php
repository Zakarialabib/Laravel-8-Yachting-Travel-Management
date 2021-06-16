<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }

    public function rates()
    {
        return $this->hasMany(PackageRate::class, 'package_id', 'id');
    }

    public function conditions()
    {
        return $this->hasMany(PackageCondition::class, 'package_id', 'id');
    }

    public function features()
    {
        return $this->hasMany(PackageFeature::class, 'package_id', 'id');
    }

    public function bookings()
    {
        return $this->morphMany(Booking::class, ' bookable');
    }
}
