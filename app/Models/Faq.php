<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
   protected $fillable = ['title', 'content', 'type', 'status'];

   const TYPE_SALE = "sale";
   const TYPE_FAQ = "faq";
   const TYPE_PRIVACY = "privacy";


}