<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSettings extends Model

{
    protected $table = 'home_settings';

    protected $fillable=['short_des','description','section_photo_1','bodyscript','headscript','section_photo_2'];
}
