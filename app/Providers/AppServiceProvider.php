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

        $footer_menu = Menu::new()
        ->addClass('footer-nav')
        ->add(Link::to('/', __('Home')))
        ->add(Link::to('/meilleures-offres', __('BEST OFFERS')))
        ->add(Link::to('/ville-a-visiter', __('Cities to visit')))
        ->add(Link::to('/blog/tout', __('Blog')))
        ->add(Link::to('/a-propos-21', __('About Us')))
        ->add(Link::to('/termes-et-conditions', __('Termes et Conditions')))
        ->add(Link::to('/cgv', __('Terms and Conditions')));


        $sidebar = Menu::new()
        ->addClass('menu-arrow')
        ->add(Link::to('/', __('Home')))
        ->add(Link::to('/categorie/golf-tours', __('Golf Tours')))
        ->add(Link::to('/categorie/trekking', __('Trekking')))
        ->add(Link::to('/categorie/motorcycle', __('Motorcycle')))
        ->add(Link::to('/categorie/surf', __('Surf')))
        ->add(Link::to('/categorie/bivouacs', __('Bivouacs')))
        ->add(Link::to('/meilleures-offres', __('BEST OFFERS')))
        ->add(Link::to('/ville-a-visiter', __('Cities to visit')))
        ->add(Link::to('/a-propos-21', __('About Us')))
        ->add(Link::to('/termes-et-conditions', __('Termes et Conditions')))
        ->add(Link::to('/cgv', __('Terms and Conditions')));

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
            'footer_menu' => $footer_menu,
            'sidebar' => $sidebar,
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
