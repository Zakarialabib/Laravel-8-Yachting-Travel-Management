<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Offer extends Model  implements TranslatableContract
{
    use Translatable, HasJsonRelationships {
        Translatable::getAttribute insteadof HasJsonRelationships;
    }

    public $translatedAttributes = ['name', 'description', 'short_desc'];

    protected $table = 'offers';

    protected $casts = [
        'itinerary' => 'json',
        'user_id' => 'integer',
        'price' => 'double',
        'status' => 'integer',
        'thumb' => 'array',
        'is_featured' => 'integer',
    ];

    protected $fillable = [
        'user_id', 'category_id', 'city_id', 'slug',  'price', 'reference',
        'thumb', 'status','is_featured', 'seo_title', 'seo_description', 'itinerary'
    ];

    protected $hidden = [];

    const STATUS_DEACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_PENDING = 2;
    const STATUS_DELETE = 4;

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'offer_id', 'id');
    }

    public function avgReview()
    {
        return $this->reviews()
            ->selectRaw('avg(score) as aggregate, offer_id')
            ->groupBy('offer_id');
    }

    public function getAvgReviewAttribute()
    {
        if (!array_key_exists('avgReview', $this->relations)) {
            $this->load('avgReview');
        }
        $relation = $this->getRelation('avgReview')->first();
        return ($relation) ? $relation->aggregate : null;
    }

    public function wishList()
    {
        return $this->hasMany(Wishlist::class, 'offer_id', 'id')->where('user_id', Auth::id());
    }

    public function getBySlug($slug)
    {
        $place = self::query()
            ->withCount('wishList')
            ->where('slug', $slug)
            ->first();
        return $place;
    }

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }

    public function packages()
    {
        return $this->hasMany(Package::class, 'offer_id', 'id');
    }
}