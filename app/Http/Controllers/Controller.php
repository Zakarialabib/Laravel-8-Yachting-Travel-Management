<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImage($file, $dir)
    {
        //$file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $filename = uniqid() . '_' . time() . '.' . $extension;

        $file->move("uploads/{$dir}", $filename);

        return $filename;
    }

    public function uploadImages(Request $request)
    {
        if($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filenametostore = $filename.'_image_'.time().'.'.$extension;
            
            //Upload the file
            $request->file('upload')->storeAs('public/images', $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/images/'.$memberNameFolder.'/images/'.$filenametostore);
            
            $msg = 'Image added successfully';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function deleteImage($path)
    {
        return File::delete($path);
    }

    public function getUserByApiToken($request)
    {
        $api_token = $request->bearerToken();
        $user = User::where('api_token', $api_token)->first();

        return $user;
    }
}
