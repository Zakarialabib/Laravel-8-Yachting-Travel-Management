<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    const STATUS_PENDING = 0;
    const STATUS_COMPLETE = 1;

    protected $table = 'purchases';

    protected $fillable = [
        'user_id', 'reference_no', "supplier_id", 
        "total_qty","tax", "total_tax", "total_cost", "grand_total",
        "status", "payment_status", "paid_amount", "paid_by",
         "document", "note", "staff_note", "payment_note", "is_locked"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function supplier()
    {
    	return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function details()
    {
        return $this->hasMany(PurchaseDetails::class, 'purchase_id', 'id');
    }

}
