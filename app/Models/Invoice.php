<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    const SALE_TYPE = 1;
    const PURCHASE_TYPE = 2;
    const RETURN_TYPE = 3;

    const PREVIEW_ACTION = 1;
    const DOWNLOAD_ACTION = 2;
    const EMAIL_ACTION = 3;
}
