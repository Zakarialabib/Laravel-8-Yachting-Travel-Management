<?php
namespace App\Http\Controllers;

class ClearCacheController extends Controller
{
    public function clear_translations()
    {
        \Artisan::call('translations:clean');
       return redirect()->back()->with('status','translations Cleared!');
    }

    public function clear_cache()
    {
        \Artisan::call('cache:clear');
        \Artisan::call('config:clear');
        \Artisan::call('view:clear');
        \Artisan::call('config:cache');
        return redirect()->back()->with('status','Tous les fichiers en cache ont été effacés !');
       

    }
    
    // you can also add methods for queue:start, queue:restart etc.
}