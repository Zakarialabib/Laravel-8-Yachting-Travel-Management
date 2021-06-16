<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\Profile;
use App\Models\Wallet;
use App\Models\Place;
use App\Models\RoleUser;
use App\Models\Wishlist;
use App\Services\PortalCustomNotificationHandler;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use nilsenj\Toastr\Facades\Toastr;
use App\Commons\Response;

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
                      ->join('role_user','role_user.user_id','=','users.id')
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

        $user->attachRole(3);

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
            'title_id'      => $data['title_id'],
            'gender_id'     => $data['gender_id'],
            'sur_name'      => $data['sur_name'],
            'first_name'    => $data['first_name'],
            'other_name'    => array_get($data,'first_name',''),
            'phone_number'  => $data['phone'],
            'address'       => $data['address'],
            'photo'         => array_get($data,'photo',''),
        ]);

        $wallet = Wallet::create([
            'user_id' => $user->id,
            'balance' => 0
        ]);


        if($user && $profile && $wallet){
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

        $user->attachRole(3);

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

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete_status = 1;
        $user->update();
        return $user;
    }

    public function updateUser(Request $request){


        $this->validate($request, [
            'sur_name'   => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'phone'      => 'required',
            'address'    => 'required'
        ]);



        $user = User::find($request->user_id);

        if($request->email != $user->email){
            $this->validate($request, [
                'email'      => 'required|string|email|max:255|unique:users',
            ]);
        }

        $user->email = $request->email;
        $updateUser = $user->update();

        $profile = Profile::where('user_id',$request->user_id)->first();
        $profile->title_id     = $request->title_id;
        $profile->gender_id    = $request->gender_id;
        $profile->sur_name     = $request->sur_name;
        $profile->first_name   = $request->first_name;
        $profile->other_name   = $request->other_name;
        $profile->phone_number = $request->phone;
        $profile->address      = $request->address;
        $updateProfile = $profile->update();
        $userRole = RoleUser::where('user_id',$request->user_id)->first()->role_id;

        if($userRole != $request->user_type){
            $user->detachRole($userRole);
           $user->attachRole($request->user_type);
        }

        if($updateUser AND $updateProfile){
            Toastr::success('Les informations sont à jour');
        }
        else{
            Toastr::error('Erreur lors de la mise à jour des nouvelles informations');
        }

        if($request->user_type != 3){
            Wallet::updateOrCreate(
                [
                    'user_id' => $user->id,
                ],
                [
                    'balance' => 0
                ]);
        }
        return back();
    }


    public function pageProfile(Request $r)
    {

        $this->validate($r,[
            'customer_sur_name'    => 'required|string|max:255',
            'customer_first_name'   => 'required|string|max:255',
            'customer_other_name'     => 'required|string|max:255',
            'customer_phone_number'  => 'required|digits:11',
            'customer_address'       => 'required',
        ]);

        $profile = Profile::where('user_id',auth()->user()->id)->first();
        $profile->sur_name = $r->customer_sur_name;
        $profile->first_name = $r->customer_first_name;
        $profile->other_name = $r->customer_other_name;
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
