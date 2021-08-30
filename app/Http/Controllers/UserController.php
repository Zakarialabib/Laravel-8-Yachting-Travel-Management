<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\Profile;
use App\Models\Place;
use App\Models\Wishlist;
use App\Services\PortalCustomNotificationHandler;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use nilsenj\Toastr\Facades\Toastr;
use App\Commons\Response;
use Illuminate\Support\Arr;

class UserController extends Controller
{

    private $wishlist;
    private $response;

    public function __construct(Wishlist $wishlist, Response $response)
    {
        $this->wishlist = $wishlist;
        $this->response = $response;
    }

    
    public function guard()
    {
        return Auth::guard();
    }


    public function addWishlist(Request $request)
    {
        $request['user_id'] = Auth::id();
        $data = $this->validate($request, [
            'user_id' => 'required',
            'place_id' => 'required',
        ]);

        $have_wishlist = Wishlist::query()
            ->where('user_id', Auth::id())
            ->where('place_id', $request->place_id)
            ->exists();

        if (!$have_wishlist) {
            $wislist = new Wishlist();
            $wislist->fill($data)->save();
            return $this->response->formatResponse(200, [], "success");
        } else {
            return $this->response->formatResponse(208, [], "La destination est déja dans la liste des souhaits!");
        }

        if($wislist AND $have_wishlist){
            Toastr::success('Nouvelle destination ajoutée dans la liste des souhaits');
        }
        else{
            Toastr::error('La destination est déja dans la liste des souhaits!');
        }

    }

    public function removeWishlist(Request $request)
    {
        $request['user_id'] = Auth::id();
        $data = $this->validate($request, [
            'user_id' => 'required',
            'place_id' => 'required',
        ]);

        Wishlist::query()
            ->where('user_id', Auth::id())
            ->where('place_id', $request->place_id)
            ->delete();

        return $this->response->formatResponse(200, [], "success");
    }


    public function index()
    {
        $users = User::join('profiles','profiles.user_id','=','users.id')
                      
                      ->get();
         return view('pages.backend.settings.user-management',compact('users'));
    }

    public function createUser(Request $request){

        $this->validate($request, [
            'sur_name'   => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'phone'      => 'required',
            'password'   => 'required|string|min:6|confirmed',
        ]);

        $user = User::store($request);

        $user->assignRole('customer');

        $request['user'] = $user;

        Profile::store($request);

    }

    public function addNew(Request $data){

        $this->validate($data,[
            'sur_name'   => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'phone'      => 'required',
            'address'    => 'required',
        ]);

        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->attachRole($data['user_type']);

        $profile = Profile::create([
            'user_id'       => $user->id,
            'sur_name'      => $data['sur_name'],
            'first_name'    => $data['first_name'],
            'phone_number'  => $data['phone'],
            'address'       => $data['address'],
            'photo'         => Arr::get($data,'photo',''),
        ]);

    

        if($user && $profile){
            Toastr::success('Nouvelle inscription');
        }
        else{
            Toastr::error('Erreur lors de la nouvelle inscription');
        }

              return back();

    }

    public function signIn(Request $request){
        $data = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);

        dd($data);

        if(Auth::attempt([
            'email' => $request->get ( 'email' ),
            'password' => $request->get ( 'password' )
            ])){

            session ([
                'email' => $request->get ( 'email' )
            ]);

            return response()->json($this->guard()->user(), 200);
        }
        else{
            return response()->json(false);
        }
    }

    public function signUp(Request $request){

        $this->validate($request, [
            'sur_name'   => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'phone'      => 'required',
            'password'   => 'required|string|min:6|confirmed',
        ]);


        $user = User::store($request);

        $user->assignRole('customer');

        $request['user'] = $user;

        Profile::store($request);

        PortalCustomNotificationHandler::registrationSuccessful($user);

        if(Auth::attempt([
            'email' => $request->get ( 'email' ),
            'password' => $request->get ( 'password' )
        ])){

            session ([
                'email' => $request->get ( 'email' )
            ]);

            return response()->json($this->guard()->user(), 200);
        }
        else{
            return response()->json(false);
        }

    }

    public function changePassword(array $r){
        $user = new User();
        return $user->changePassword($r);
    }


 

    public function pageProfile(Request $r)
    {

        $this->validate($r,[
            'customer_sur_name'    => 'required|string|max:255',
            'customer_first_name'   => 'required|string|max:255',
            'customer_phone_number'  => 'required|digits:11',
            'customer_address'       => 'required',
        ]);

        $profile = Profile::where('user_id',auth()->user()->id)->first();
        $profile->sur_name = $r->customer_sur_name;
        $profile->first_name = $r->customer_first_name;
        $profile->phone_number = $r->customer_phone_number;
        $profile->address = $r->customer_address;
        $update = $profile->update();

        return view('pages.backend.user.user_profile');
    }


    public function pageWishList()
    {
        $wishlists = Wishlist::query()
            ->where('user_id', Auth::id())
            ->get('place_id')->toArray();

        $wishlists = array_column($wishlists, 'place_id');

        $places = Place::query()
            ->withCount('reviews')
            ->with('avgReview')
            ->withCount('wishList')
            ->whereIn('id', $wishlists)
            ->paginate();

        return view('pages.backend.user.user_wishlist', [
            'places' => $places
        ]);
    }



}
