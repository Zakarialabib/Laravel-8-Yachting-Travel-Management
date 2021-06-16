<?php

namespace App\Http\Controllers\Backend;


use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PlaceType;
use App\Models\User;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Http\Request;

class PlaceTypeController extends Controller
{
    private $category;
    private $place_type;
    private $response;

    public function __construct(Category $category, PlaceType $place_type, Response $response)
    {
        $this->category = $category;
        $this->place_type = $place_type;
        $this->response = $response;
    }

    public function list(Request $request)
    {
        $user = User::where('is_admin','=',1)->first();

        $param_category_id = $request->category_id;
        $categories = $this->category->getListAll(Category::TYPE_PLACE);
        $place_types = $this->place_type->getListByCat($param_category_id);

//        return $place_types;

        return view('pages.backend.place_type.place_type_list', [
            'categories' => $categories,
            'place_types' => $place_types,
            'category_id' => (int)$param_category_id,
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $categories = Category::query()
        ->where('type', Category::TYPE_PLACE)
        ->where('status', Category::STATUS_ACTIVE)
        ->get();

        $type = Category::all();

        return view('pages.backend.place_type.place_type_create', [
            'categories' => $categories,
            'type' => $type
        ]);

    }
    public function create(Request $request)
    {
        $rule_factory = RuleFactory::make([
            'category_id' => 'required',
            '%name%' => ''
            ]);
        $data = $this->validate($request, $rule_factory);

        $model = new PlaceType();
        $model->fill($data)->save();
        
        return back()->with('success', "Type d'activité ajoutée avec succes!");
    }

    public function update(Request $request)
    {
        $rule_factory = RuleFactory::make([
            'category_id' => 'required',
            '%name%' => ''
            ]);
        $data = $this->validate($request, $rule_factory);

        $model = PlaceType::find($request->place_type_id);
        $model->fill($data);

        if ($model->save()) {
            return back()->with('success', "Type d'activité à jour");
        }
    }

    public function destroy($id)
    {
        PlaceType::destroy($id);
        return back()->with('success', "Type d'activtié suprimée avec succes");
    }
}