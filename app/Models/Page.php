<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
use Illuminate\Database\Eloquent\Model;

class Page extends Model implements TranslatableContract
{
    use Translatable, HasJsonRelationships {
        Translatable::getAttribute insteadof HasJsonRelationships;
    }

    protected $casts = [
        'status' => 'integer',
    ];

    public $translatedAttributes = ['title', 'content'];

    protected $table = 'pages';

    protected $fillable = ['content', 'slug', 'thumb', 'type', 'status', 'seo_title', 'seo_description'];

    protected $hidden = [];

    const STATUS_ACTIVE = 1;
    const STATUS_DEACTIVE = 0;

}