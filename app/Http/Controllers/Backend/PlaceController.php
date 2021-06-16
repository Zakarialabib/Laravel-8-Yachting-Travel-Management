<?php

namespace App\Http\Controllers\Backend;

use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Amenities;
use App\Models\Place;
use App\Models\User;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use nilsenj\Toastr\Facades\Toastr;


class PlaceController extends Controller
{
    private $place;
    private $country;
    private $city;
    private $category;
    private $amenities;
    private $response;

    public function __construct(
        Place $place,
        Country $country,
        City $city,
        Category $category,
        Amenities $amenities,
        Response $response
    )
    {
        $this->place = $place;
        $this->country = $country;
        $this->city = $city;
        $this->category = $category;
        $this->amenities = $amenities;
        $this->response = $response;
    }

    public function list(Request $request)
    {
        $user = User::where('is_admin','=',1)->first();

        $param_country_id = $request->country_id;
        $param_city_id = $request->city_id;
        $param_cat_id = $request->category_id;

        $places = $this->place->listByFilter($param_country_id, $param_city_id, $param_cat_id);
        $countries = $this->country->getFullList();
        $cities = $this->city->getListByCountry($param_country_id);
        $categories = $this->category->getListAll(Category::TYPE_PLACE);

        return view('pages.backend.place.place_list', [
            'places' => $places,
            'countries' => $countries,
            'country_id' => (int)$param_country_id,
            'cities' => $cities,
            'city_id' => (int)$param_city_id,
            'categories' => $categories,
            'cat_id' => (int)$param_cat_id,
            'user' => $user

        ]);
    }

    public function create(Request $request)
    {
        $place = Place::find($request->id);
      
        $country_id = $place ? $place->country_id : false;

        $countries = $this->country->getFullList();
        $categories = $this->category->getListAll(Category::TYPE_PLACE);
        $cities = $this->city->getListByCountry($country_id);
        $amenities = $this->amenities->getListAll();


        return view('pages.backend.place.place_create', compact('countries', 'cities', 'categories', 'amenities', 'place'));
    }

    public function store(Request $request)
    {
        $request['slug'] = getSlug($request, 'name');

        $rule_factory = RuleFactory::make([
            'user_id' => '',
            'country_id' => '',
            'city_id' => '',
            'category' => '',
            '%name%' => '',
            'slug' => '',
            '%description%' => '',
            'price' => '',
            'amenities' => '',
            'gallery' => '',
            'video' => '',
            'booking_type' => '',
            'link_bookingcom' => '',
            'thumb' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'seo_title' => '',
            'seo_description' => '',
            'itinerary' => '',
            ]);

        $data = $this->validate($request, $rule_factory);

        if (!isset($data['itinerary'])) {
            $data['itinerary'] = null;
        }
        
        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $thumb_file = $this->uploadImage($thumb, '');
            $data['thumb'] = $thumb_file;
        }

        // generate place reference
        $latest = Place::latest()->first();
        if(!$latest) {
            $data['reference'] = '0000000001';
        }else{
            $latest->reference++;
            $data['reference'] = $latest->reference;
        }

        $place = new Place();
        $place->fill($data);
        $place->save();

        if($place){
            Toastr::success('Destination ajoutée avec succès');
        }
        else{
            Toastr::error("Impossible d'ajouter la destination");
        }

        return redirect()->route('place_list');

    }

    public function edit($id)
    {
        $place = Place::find($id);

        $country_id = $place ? $place->country_id : false;

        $countries = $this->country->getFullList();
        $categories = $this->category->getListAll(Category::TYPE_PLACE);
        $cities = $this->city->getListByCountry($country_id);
        $amenities = $this->amenities->getListAll();


        return view('pages.backend.place.place_edit',compact('countries', 'cities', 'categories', 'amenities', 'place'));
    }


    public function update($id, Request $request)
    {
        
        $place = Place::find($id);

        $request['slug'] = getSlug($request, 'name');
        
        $rule_factory = RuleFactory::make([

            'country_id' => '',
            'city_id' => '',
            'category' => '',
            '%name%' => '',
            '%description%' => '',
            'slug' => '',
            'price' => '',
            'amenities' => '',
            'gallery' => '',
            'video' => '',
            'booking_type' => '',
            'link_bookingcom' => '',
            'thumb' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'seo_title' => '',
            'seo_description' => '',
            'itinerary' => '',
            ]);


        $data = $this->validate($request, $rule_factory);


        if (!isset($data['itinerary'])) {
            $data['itinerary'] = null;
        }

        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $thumb_file = $this->uploadImage($thumb, '');
            $data['thumb'] = $thumb_file;
        }

        $place = Place::find($request->id);

        $place->fill($data)->save();

    
            return redirect(route('place_list'))->with('success', 'Destination à jour!');
    
    }

    public function updateStatus(Request $request)
    {
        $data = $this->validate($request, [
            'status' => 'required',
        ]);

        $model = Place::find($request->place_id);
        $model->fill($data)->save();

        return $this->response->formatResponse(200, $model, 'Status à jour!');
    }

    public function destroy($id)
    {
        Place::destroy($id);
        return back()->with('success', 'Destination supprimée avec succes!');
    }
}