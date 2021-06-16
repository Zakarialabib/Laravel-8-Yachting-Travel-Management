<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $guarded = [];

    protected $hidden = [];

    protected $casts = [
        'user_id' => 'integer',
        'place_id' => 'integer',
        'numbber_of_adult' => 'integer',
        'numbber_of_children' => 'integer',
        'type' => 'integer',
        'status' => 'integer',
        'payment_status' => 'integer',
    ];

    const TYPE_BOOKING_FORM = 1;
    const TYPE_CONTACT_FORM = 2;
    const TYPE_BOOKING_NOW = 3;
    const TYPE_BANNER = 4;
    const TYPE_MAP = 5;

    const STATUS_DEACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_PENDING = 2;
    
    const STATUS_PAID = 1;
    const STATUS_UNPAID = 0;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function bookable()
    {
        return $this->morphTo();
    }

    public function rates()
    {
        return $this->belongsToMany(PackageRate::class, 'rate_booking', 'booking_id', 'rate_id')->withPivot('quantity');
    }

    public function scopePaid($query)
    {
        return $query->where('payment_status', '=', 1);
    }

    public function scopeUnpaid($query)
    {
        return $query->where('payment_status', '=', 0);
    }

}