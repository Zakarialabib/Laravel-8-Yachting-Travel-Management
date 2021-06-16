<?php

namespace App\Http\Controllers\Backend;


use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use App\Models\User;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
    private $response;

    public function __construct(Category $category, Response $response)
    {
        $this->category = $category;
        $this->response = $response;
    }

    public function list($type)
    {
        $user = User::where('is_admin','=',1)->first();

        $categories = $this->category->getListAll($type);

//        return $categories;

        return view('pages.backend.category.category_list', [
            'categories' => $categories,
            'user' => $user,
            'type' => $type
        ]);
    }

    public function store(Request $request)
    {
        $categories = Category::query()
        ->where('type', Category::TYPE_POST)
        ->where('status', Category::STATUS_ACTIVE)
        ->get();

        $type = Category::all();

        return view('pages.backend.category.category_create', [
            'categories' => $categories,
            'type' => $type
        ]);
}
    public function create(Request $request)
    {
        $request['slug'] = getSlug($request, 'name');

        $rule_factory = RuleFactory::make([
            '%name%' => '',
            'slug' => '',
            'priority' => '',
            'is_feature' => '',
            '%feature_title%' => '',
            'type' => '',
            'color_code' => '',
            'seo_title' => '',
            'seo_description' => '',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'icon_map_marker' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $data = $this->validate($request, $rule_factory);

        if ($request->hasFile('icon_map_marker')) {
            $icon = $request->file('icon_map_marker');
            $file_name = $this->uploadImage($icon, '');
            $data['icon_map_marker'] = $file_name;
        }

        if ($request->hasFile('image')) {
            $icon = $request->file('image');
            $file_name = $this->uploadImage($icon, '');
            $data['image'] = $file_name;
        }

        $model = new Category();
        $model->fill($data)->save();

        return back()->with('success', 'Activitée Ajouter avec succès!');
    }

    public function update(Request $request)
    {
        $request['slug'] = getSlug($request, 'name');

        $rule_factory = RuleFactory::make([
            'category_id' => 'required',
            '%name%' => '',
            'slug' => '',
            'priority' => '',
            'is_feature' => '',
            '%feature_title%' => '',
            'type' => '',
            'color_code' => '',
            'seo_title' => '',
            'seo_description' => '',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'icon_map_marker' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $data = $this->validate($request, $rule_factory);

        if ($request->hasFile('icon_map_marker')) {
            $icon = $request->file('icon_map_marker');
            $file_name = $this->uploadImage($icon, '');
            $data['icon_map_marker'] = $file_name;
        }

        if ($request->hasFile('image')) {
            $icon = $request->file('image');
            $file_name = $this->uploadImage($icon, '');
            $data['image'] = $file_name;
        }
        
//        return $data;

        $model = Category::find($request->category_id);
        $model->fill($data);

        if ($model->save())
            return back()->with('success', 'Activité à jour avec succès!');
        else
            return back()->with('error', 'Impossible de faire la mise à jour!');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return back()->with('success', 'Activité à jour avec succès!');
    }

    /**
     * API update status
     */
    public function updateStatus(Request $request)
    {
        $data = $this->validate($request, [
            'status' => 'required',
        ]);

        $model = Category::find($request->category_id);
        $model->fill($data);

        if ($model->save()) {
            return $this->response->formatResponse(200, $model, 'Status à jour avec succes!');
        }
    }

    /**
     * API update is_feature
     */
    public function updateIsFeature(Request $request)
    {
        $data = $this->validate($request, [
            'is_feature' => 'required',
        ]);

        $model = Category::find($request->category_id);
        $model->fill($data);

        if ($model->save()) {
            return $this->response->formatResponse(200, $model, 'Update category is feature success!');
        }
    }


}
