<?php

namespace App\Http\Controllers;

use App\Models\HotelBooking;
use App\Models\OnlinePayment;
use App\Models\PackageBooking;
use App\Models\Profile;
use App\Models\User;
use App\Models\VisaApplication;
use App\Models\Newsletter;
use App\Models\MarkupType;
use App\Models\MarkupValueType;
use App\Models\Vat;
use App\Models\Role;
use App\Models\Offer;
use App\Models\Markdown;
use App\Models\Booking;
use App\Models\City;
use App\Models\Category;
use App\Models\Place;
use App\Models\Review;
use App\Models\HomeSettings;
use App\Models\Post;
use App\Models\Sale;
use App\Models\Purchase;
use App\Models\Returns;
use Illuminate\Http\Request;
use nilsenj\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Services\InterswitchConfig;
use Carbon\Carbon;

class BackEndViewController extends Controller
{

    public function dashboard(){

        $count_categories = Category::query()
        ->where('type', Category::TYPE_OFFER)
        ->count();
        
        $count_offers = Offer::query()
        ->count();

        $count_bookings = Booking::query()
        ->count();

        $count_suscribers = Newsletter::query()
        ->count();

        $count_users = User::query()
        ->count();

        $count_posts = Post::query()
        ->where('type', Post::TYPE_BLOG)
        ->where('status', Post::STATUS_ACTIVE)
        ->count();

        $bookings = Auth::user()->bookings()->with(['place'])->get();


        $data = array(
            'today' => array(
                'package_bookings' => Booking::whereDate('created_at', '>=' , Carbon::now())->count(),
                'users' => User::whereDate('created_at', '>=' , Carbon::now())->count(),
            ),
            'month' => array(
                'package_bookings' => Booking::whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'users' => User::whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
            ),
            'semi' => array(
                'package_bookings' => Booking::whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'users' => User::whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
            ),
            'year' => array(
                'package_bookings' => Booking::whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'users' => User::whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
            ),
        );
        //dd($data);
        return view('pages.backend.dashboard',compact('data', 'count_categories', 'bookings', 'count_posts' ,'count_offers', 'count_bookings','count_suscribers','count_users'));

    }
    
    public function searchPlaces(Request $request)
    {
    $keyword = $request->keyword;

    $places = $places = Place::query()
        ->whereTranslationLike('name', "%{$keyword}%")
        ->where('status', Place::STATUS_ACTIVE)
        ->get(['id', 'name', 'price']);

    $html = '<ul class="listing_items list-group">';
    foreach ($places as $key => $place) {
        $html .= '<li class="list-group-item" data-id="'.$place->id.'" data-name="'.$place->name.'" data-price="'.$place->price.'">'.$place->name.'</li>';
    }
    $html .= '</ul>';

    $html_notfound = "<ul><li>No listing found!</li></ul>";

    $response = count($places) ? $html : $html_notfound;

    return response($response, 200);
}


    public function profile(){
        $user = auth()->user();
        $profile = Profile::getUserInfo($user->id);
        return view('pages.backend.settings.profile',compact('user','profile'));
    }


    public function settings(){

        $data = HomeSettings::first();
        return view('pages.backend.settings.home_settings')->with('data',$data);
  
    }

    public function settingsUpdate(Request $request){

        $this->validate($request,[
            'short_des'=>'',
            'description'=>'',
            'section_photo_1'=>'',
            'section_photo_2'=>'',
            'headscript'=>'',
            'bodyscript'=>'',
        ]);
        $data=$request->all();

        if($request->hasfile('section_photo_1')){
            foreach($request->file('section_photo_1') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/photos/', $name);  
                $dataImg[] = $name;  
            }
        }

        $data['section_photo_1'] = json_encode($dataImg);

        if($request->hasfile('section_photo_2')){
            foreach($request->file('section_photo_2') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/photos/', $name);  
                $dataImg[] = $name;  
            }
        }
        $data['section_photo_2'] = json_encode($dataImg);

        // return $data;
        $settings=HomeSettings::first();
        // return $settings;
        $status=$settings->fill($data)->save();
        if($status){
            request()->session()->flash('success','Setting successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again');
        }
        return back();
    }

}
