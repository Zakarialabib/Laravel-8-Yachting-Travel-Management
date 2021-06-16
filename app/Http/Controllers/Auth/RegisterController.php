<?php

namespace App\Http\Controllers\Auth;

use App\Models\Profile;
use App\Services\PortalCustomNotificationHandler;
use App\Models\User;
use App\Models\Booking;
use App\Models\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use nilsenj\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'sur_name'   => 'required|string|max:255',
            'first_name' => 'string|max:255',
            'other_name' => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'phone'      => 'required',
            'password'   => 'required|string|min:6|confirmed',
            'booking_id' => '',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            foreach($errors as $serial => $error){
                Toastr::error($error);
            }
        }

        return $validator;
    }



    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {
        return view('auth.register', ['booking' => $request->booking]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->attachRole(3);

        $data['user'] = $user;

        Profile::store($data);

        if($data['booking_id'])
        {
            $booking = Booking::find($data['booking_id']);
            $booking->update(['user_id' => $user->id]);
            PortalCustomNotificationHandler::bookingAttachedToUser($booking);
        }

        $userWallet = $user->wallet()->create([
            'balance' => 0,
        ]);

        PortalCustomNotificationHandler::registrationSuccessful($user);

        Toastr::success('Merci pour votre inscription');

        return $user;
    }
}

