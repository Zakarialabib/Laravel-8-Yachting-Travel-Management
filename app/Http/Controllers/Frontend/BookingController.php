<?php

namespace App\Http\Controllers\Frontend;

use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Place;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;
use nilsenj\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Services\PortalCustomNotificationHandler;

class BookingController extends Controller
{
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function booking(Request $request)
    {
        
        $data = $this->validate($request, [
            'numbber_of_adult' => '',
            'numbber_of_children' => 'sometimes',
            'date' => '',
            'end_date' => 'sometimes',
            'rate' => 'sometimes',
            'name' => '',
            'email' => '',
            'phone_number' => '',
            'message' => '',
            'type' => ''
        ]);

        if($request->has('place_id')) {
            $place = Place::find($request->place_id);
            $endDate = Carbon::parse($data['end_date']);
        }
        else if($request->has('package_id')) {
            $place = Package::find($request->package_id);
            $endDate = Carbon::parse($data['date'])->addDays($place->period);
        }

        if($place) {

            // generate refenrce number
            $reference = Carbon::now()->format('ymd') . mt_rand(1000000, 9999999);

            $booking = new Booking();
            $booking->fill([
                'user_id' => Auth::id() ?? NULL,
                'reference' => $reference,
                'numbber_of_adult' => $data['numbber_of_adult'],
                'numbber_of_children' => $data['numbber_of_children'] ?? 0,
                'date' => Carbon::parse($data['date']),
                'end_date' => $endDate,
                'name' => $data['name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'type' => $data['type'],
            ]);

            $booking->bookable()->associate($place);
            $booking->save();

            if ($booking) {
                
        
                PortalCustomNotificationHandler::bookingCreated($booking);

                if($request->has('package_id')) {
                    
                    foreach ($request->rate as $key => $rate) {
                        $split = explode(':', $rate);
                        $booking->rates()->attach($split[0], ['quantity' => $split[1]]);
                    }
                }
            
                Toastr::success('Vous avez créé votre réservation avec succès','Success');

                if(Auth::user())
                    return view('pages.frontend.user.user_checkout', compact('booking'));
                else
                    return view('pages.frontend.user.user_login_register', compact('booking'));
            }
        }

    }

    public function signInUser(Request $request) {

        $data = $this->validate($request, [
            'booking_id' => '',
            'email'      => '',
            'password'   => '',
        ]);

        $booking = Booking::find($data['booking_id']);

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) 
        { 
            session (['email' => $data['email']]);
            $booking->update(['user_id' => Auth::id()]);
            return view('pages.frontend.user.user_checkout', compact('booking'));
        } 
        return view('pages.frontend.user.user_login_register', compact('booking'));

    }

    public function createUser(Request $request) {

        $data = $this->validate($request, [
            'booking_id' => '',
            'last_name'   => '',
            'first_name' => '',
            'email'      => '',
            'tel'      => '',
            'address' => '',
            'password'   => '',
        ]);

        $booking = Booking::find($data['booking_id']);

        
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if($user)
        {
            $user->attachRole(3);
    
            $user->profile()->create([
                'sur_name' => $data['last_name'],
                'first_name' => $data['first_name'],
                'phone_number' => $data['tel'],
                'address' => $data['address'],
            ]);


            if(Auth::attempt(['email' => $user->email, 'password' => $data['password']])) 
            {
                session (['email' => $user->email]);
                $booking->update(['user_id' => Auth::id()]);
                return view('pages.frontend.user.user_checkout', compact('booking'));
            }
        }

        return view('pages.frontend.user.user_login_register', compact('booking'));
    }

    public function cart()
    {
        return view('pages.frontend.user.user_cart');
    }

    public function addToCart($booking)
    {
        $cart = session()->get('cart');

        $cart[$booking->id] = [
            "name" => $booking->bookable->name,
            "quantity" => $booking->numbber_of_adult,
            "days" => Carbon::parse($booking->date)->diffInDays(Carbon::parse($booking->end_date)) + 1,
            "price" => $booking->bookable->price,
            'adults' => $booking->numbber_of_adult,
            'children' => $booking->numbber_of_children,                        
        ];

        // add element to cart 
        session()->put('cart', $cart);      
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            $cart[$request->id]["person"] = $request->person;
            
            session()->put('cart', $cart);
            $subTotal = $cart[$request->id]['quantity'] * $cart[$request->id]['person'] * $cart[$request->id]['price'];
            $total = $this->getCartTotal();
            
            return back()->with('success', 'Offer added to cart successfully!');      

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            $total = $this->getCartTotal();
            
            return back()->with('success', 'Offer added to cart successfully!');      

            session()->flash('success', 'Offer removed successfully');
        }
    }

    /**
     * getCartTotal
     *
     *
     * @return float|int
     */
    private function getCartTotal()
    {
        $total = 0;
        $cart = session()->get('cart');

        foreach($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'] * $details['person'];
        }

        return number_format($total, 2);
    }

}