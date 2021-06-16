<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const STATUS_DUE = 1;
    const STATUS_PAID = 2;
    const STATUS_PENDING = 3;
    const STATUS_PARTIAL = 4;

    const MEDIUM_CASH = 1;
    const MEDIUM_CHECK = 2;
    const MEDIUM_WIRE = 3;
    const MEDIUM_TRAIT = 4;
}