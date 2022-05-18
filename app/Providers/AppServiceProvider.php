<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\City;
use App\Models\Language;
use Spatie\Menu\Laravel\Link;
use Spatie\Menu\Laravel\Menu;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         \URL::forceRootUrl(\Config::get('app.url'));    
        if (str_contains(\Config::get('app.url'), 'https://')) {
            \URL::forceScheme('https');
        }
        
        Schema::defaultStringLength(191);

        $destinations = Cache::remember('destinations', 60 * 60, function () {
            return City::query()
                ->limit(10)
                ->get();
        });

        $popular_search_cities = Cache::remember('popular_search_cities', 60 * 60, function () {
            return City::query()
                ->inRandomOrder()
                ->limit(3)
                ->get();
        });

        $cat_menu = Category::query()
        ->where('categories.type', Category::TYPE_OFFER)
        ->get();

        if (Schema::hasTable('languages')) {
            $languages = Language::query()
                ->where('is_active', Language::STATUS_ACTIVE)
                ->orderBy('is_default', 'desc')
                ->get();

            $language_default = Language::query()
                ->where('is_default', Language::IS_DEFAULT)
                ->first();
        } else {
            $languages = [];
        }
        View::share([
            'cat_menu' => $cat_menu,
            'languages' => $languages,
            'language_default' => $language_default,
            'destinations' => $destinations,
            'popular_search_cities' => $popular_search_cities,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
