<?php

namespace App\Http\Controllers\Frontend;

use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\PlaceType;
use App\Models\Offer;
use App\Models\CategoryType;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function list(Request $request)
    {
        $categories = Category::query();

        return view('pages.frontend.category.category_detail', [
            'categories' => $categories, 
        ]);

    }

    public function detail(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)
        ->where('type', Category::TYPE_OFFER)
        ->first();
        
        if (!$category) abort(404);

        $categorytype = CategoryType::query()
        ->where('category_id', $category->id)
        ->get();


        $offers = Offer::query()
        ->where('category_id', $category->id)
        ->get();

       
        return view('pages.frontend.category.category_detail', [
            'category' => $category,
            'offers' => $offers,
            'categorytype' => $categorytype
        ]);

    }

    public function typeDetail(Request $request, $slug)
    {
       
        $categorytype = CategoryType::where('slug', $slug)
        ->first();
        
        $category = Category::query();

        return view('pages.frontend.category.cat_type_detail', [
            'categorytype' => $categorytype,   
        ]);

    }

    

    public function listPlace(Request $request)
    {
   
        $categories = Category::query()
            ->where('type', Category::TYPE_OFFER)
            ->get();

        $cities = City::query()
            ->get();

        return view('pages.frontend.category.category_list', [
            'cities' => $cities,
            'categories' => $categories,
        ]);
    }


    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $categories = Category::query()
            ->whereTranslationLike('name', "%{$keyword}%")
            ->where('type', Category::TYPE_PLACE)
            ->limit(20)
            ->get();

        return $categories;
    }
}
