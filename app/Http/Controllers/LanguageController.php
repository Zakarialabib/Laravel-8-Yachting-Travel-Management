<?php

namespace App\Http\Controllers;


use App\Commons\Response;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function pageLanguage()
    {
        $language_active = Language::query()
            ->where('is_active', Language::STATUS_ACTIVE)
            ->get();

        $language_deactive = Language::query()
            ->where('is_active', Language::STATUS_DEACTIVE)
            ->get();

        return view('pages.backend.settings.language',compact('language_active','language_deactive'));
    }

    
    public function updateStatus(Request $request, $code)
    {
        $language_id = $request->language_id;
        $language = Language::find($language_id);

        if ($language->is_default) {
            return back()->with('error', "Can't deactive language default!");
        }

        $language->is_active = $code;
        $language->save();

        return redirect()->back();
    }

    public function setDefault(Request $request)
    {
        Language::query()
            ->where('is_default', Language::IS_DEFAULT)
            ->update(['is_default' => 0]);

        $language_id = $request->language_id;
        $language = Language::find($language_id);
        $language->is_default = Language::IS_DEFAULT;
        $language->save();

        return $this->response->formatResponse(200, $language, 'Update language default success!');
    }


    public function importData()
    {
        $data_languages = [
            
            ["code" => "ar", "name" => "Arabic", "nativeName" => "العربية"],
            ["code" => "ny", "name" => "Chichewa; Chewa; Nyanja", "nativeName" => "chiCheŵa, chinyanja"],
            ["code" => "zh", "name" => "Chinese", "nativeName" => "中文 (Zhōngwén), 汉语, 漢語"],
            ["code" => "nl", "name" => "Dutch", "nativeName" => "Nederlands, Vlaams"],
            ["code" => "en", "name" => "English", "nativeName" => "English"],
            ["code" => "fr", "name" => "French", "nativeName" => "français, langue française"],
            ["code" => "ja", "name" => "Japanese", "nativeName" => "日本語 (にほんご／にっぽんご)"],
            ["code" => "pt", "name" => "Portuguese", "nativeName" => "Português"],
            ["code" => "es", "name" => "Spanish; Castilian", "nativeName" => "español, castellano"],
        ];

        foreach ($data_languages as $lang) {
            $language = new Language();

            $language->name = $lang['name'];
            $language->native_name = $lang['nativeName'];
            $language->code = $lang['code'];
            $language->is_active = 0;
            $language->is_default = 0;

            $language->save();

            echo $lang['name'] . "<br>";
        }

    }
}