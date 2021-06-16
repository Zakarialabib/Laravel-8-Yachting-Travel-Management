<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function user_notf_count()
    {
        $data = Notification::where('user_id','!=',null)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    }

    public static function add_user_notif($id)
    {
      try {
        //code...
        $notification = Notification::create([
          'user_id' => $id,
        ]);
        return $notification;
      } catch (\Throwable $th) {
        return null;
      }
    }

    public function user_notf_clear()
    {
        $data = Notification::where('user_id','!=',null);
        $data->delete();        
    } 

    public function user_notf_show()
    {
        $datas = Notification::where('user_id','!=',null)->latest('id')->get();
        if($datas->count() > 0){
          foreach($datas as $data){
            $data->is_read = 1;
            $data->update();
          }
        }
        
        return view('partials.backend.notification.register',compact('datas'));           
    } 


    public function booking_notf_count()
    {
        $data = Notification::where('booking_id','!=',null)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    }

    public static function add_booking_notif($id)
    {
      try {
        //code...
        $notification = Notification::create([
          'booking_id' => $id,
        ]);
        return $notification;
      } catch (\Throwable $th) {
        return null;
      }
    }

    public function booking_notf_clear()
    {
        $data = Notification::where('booking_id','!=',null);
        $data->delete();        
    } 

    public function booking_notf_show()
    {
        $datas = Notification::where('booking_id','!=',null)->latest('id')->get();
        if($datas->count() > 0){
          foreach($datas as $data){
            $data->is_read = 1;
            $data->update();
          }
        }       
        return view('partials.backend.notification.booking',compact('datas'));           
    }
   
  }
