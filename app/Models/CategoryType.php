<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['name','description'];

    protected $table = 'category_types';

    protected $fillable = [
        'category_id', 'status', 'image','slug','icon','color'
    ];

    protected $hidden = [];

    protected $casts = [
        'category_id' => 'integer'
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_DEACTIVE = 0;

    public function categories(){
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

 
}