<?php

namespace App\Http\Controllers\Backend;

use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryType;
use App\Models\User;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Http\Request;

class CategoryTypeController extends Controller
{
    private $category;
    private $category_type;
    private $response;

    public function __construct(Category $category, CategoryType $category_type, Response $response)
    {
        $this->category = $category;
        $this->category_type = $category_type;
        $this->response = $response;
    }

    public function list(Request $request)
    {
        $user = User::where('is_admin','=',1)->first();


        $categories = Category::query()
        ->where('type', Category::TYPE_OFFER)
        ->where('status', Category::STATUS_ACTIVE)
        ->get();

        $category_types = CategoryType::query()
        ->get();

        return view('pages.backend.category_type.category_type_list', [
            'category_types' => $category_types,
            'categories' => $categories,
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $categories = Category::query()
        ->where('type', Category::TYPE_OFFER)
        ->where('status', Category::STATUS_ACTIVE)
        ->get();

        $type = Category::all();

        return view('pages.backend.category_type.category_type_create', [
            'categories' => $categories,
            'type' => $type
        ]);

    }
    public function create(Request $request)
    {
        $request['slug'] = getSlug($request, 'name');

        $rule_factory = RuleFactory::make([
            'category_id' => 'required',
            '%name%' => '',
            'color' => '',
        ]);
        $data = $this->validate($request, $rule_factory);
    

        $model = new CategoryType();
        $model->fill($data)->save();

        return back()->with('success', "Type d'activité ajoutée avec succes!");
    }

    public function update(Request $request)
    {
        $request['slug'] = getSlug($request, 'name');

        $rule_factory = RuleFactory::make([
            'category_id' => 'required',
            '%name%' => '',
/*             'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'icon' => 'mimes:jpeg,jpg,png,gif,svg|max:10000', */
            'color' => '',

        ]);
        $data = $this->validate($request, $rule_factory);
    

/*         if ($request->hasFile('image')) {
            $icon = $request->file('image');
            $file_name = $this->uploadImage($icon, '');
            $data['image'] = $file_name;
        } */

        $model = CategoryType::find($request->category_type_id);
        $model->fill($data);

        if ($model->save()) {
            return back()->with('success', "Type d'activité à jour");
        }
    }

    public function destroy($id)
    {
        CategoryType::destroy($id);
        return back()->with('success', "Type d'activtié suprimée avec succes");
    }
}