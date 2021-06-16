<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarkupValueType extends Model
{
    public function fetchTypes()
    {
        return static::pluck('type', 'id')->all();
    }
}
