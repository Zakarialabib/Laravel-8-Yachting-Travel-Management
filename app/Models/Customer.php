<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable =[
        "user_id", "name", "company_name",
        "email", "phone_number", "tax_no", "address", "city",
        "postal_code", "country", "is_active"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
