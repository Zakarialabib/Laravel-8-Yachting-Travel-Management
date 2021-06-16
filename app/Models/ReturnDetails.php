<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnDetails extends Model
{
    protected $guarded = [];

    public function return()
    {
        return $this->belongsTo(Returns::class, 'return_id', 'id');
    }
}