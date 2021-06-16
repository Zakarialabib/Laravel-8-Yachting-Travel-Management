<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $fillable = [
        "name", "company_name", "tax_number", "email",
        "phone_number", "address", "city", "postal_code", "country",
    ];

    public function purchases()
    {
        $this->hasMany(Purchase::class, 'supplier_id', 'id');
    }

}
