<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    const STATUS_PENDING = 0;
    const STATUS_COMPLETE = 1;

    protected $table = 'sales';

    protected $fillable = [
        'user_id', 'customer_id', 'reference_no', 'booking_reference',
        "total_qty", "tax", "total_tax", "total_price", "grand_total",
        "status", "payment_status","paid_amount", "paid_by",
        "document", "note", "staff_note", "payment_note","is_locked"
    ];

    protected $casts = [
        'user_id' => 'integer',
        'customer_id' => 'integer',
        'sale_status' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function profile(){
        return static::hasOne(Profile::class,'user_id','id');
    }

    public function details()
    {
        return $this->hasMany(SaleDetails::class, 'sale_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    /*
    public function booking()
    {
        return $this->hasOne(Booking::class, 'id', 'booking_id');
    }
    */


}