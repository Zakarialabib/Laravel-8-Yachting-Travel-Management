<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'description','short_desc'];

}