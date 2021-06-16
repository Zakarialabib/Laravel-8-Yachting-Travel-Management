<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Place;
use App\Models\User;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use nilsenj\Toastr\Facades\Toastr;

class BookingController extends Controller
{
    public function list()
    {

        $user = User::where('is_admin','=',1)->first();

        $bookings = Booking::query()
      //      ->where('id', Auth::user()->id)
            ->with('user')
            ->with('place')
            ->with('offer')
            ->orderBy('created_at', 'desc')
            ->get();

//        return $bookings;

        return view('pages.backend.bookings.booking_list', [
            'bookings' => $bookings,
            'user' => $user
        ]);
    }

    public function create(Request $request)
    {
        $places = Place::all();
        $users = User::all();
          
        return view('pages.backend.bookings.booking_create', [
            'places' => $places,
            'users' => $users,
        ]);
    }



    public function store(Request $request)
    {
        $places = Place::all();
        $users = User::all();

        $request['user_id'] = Auth::id();

        if ($request->date) {
            $request['date'] = Carbon::parse($request->date);
        }

        $data = $this->validate($request, [
            'user_id' => '',
            'place_id' => '',
            'numbber_of_adult' => '',
            'numbber_of_children' => '',
            'date' => '',
            'name' => '',
            'email' => '',
            'phone_number' => '',
            'price' => '',
            'message' => '',
            'type' => '',
            'status' => '',
        ]);

        $booking = new Booking();
        $booking->fill($data);
        $booking->save();
           
        return view('pages.backend.bookings.booking_create', [
            'booking' => $booking,
            'places' => $places,
            'users' => $users,
        ]);
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        $places = Place::all();
        $users = User::all();

        return view('pages.backend.bookings.booking_edit',compact('booking','users','places'));
    }


    public function update(Request $request)
    {

        $user = auth()->user();
    $userProfile = Profile::getUserInfo($user->id);
    $user['profile'] =  $userProfile;

    $data = $this->validate($request, [
        'user_id' => '',
        'place_id' => '',
        'numbber_of_adult' => '',
        'numbber_of_children' => '',
        'date' => '',
        'name' => '',
        'email' => '',
        'phone_number' => '',
        'price' => '',
        'message' => '',
        'type' => '',
        'status' => '',
    ]);

    $booking = Booking::find($request->booking_id);
    $data = $request->all();
    $booking->update($data);

    if($booking){
        Toastr::success('Reservation à jour avec succès!');
    }
    else{
        Toastr::error('Impossible de faire la mise à jour');
    }

   return redirect()->route('booking_list');    
    
}

    public function updateStatus(Request $request)
    {
        $data = $this->validate($request, [
            'status' => 'required',
        ]);

        $model = Booking::find($request->booking_id);
        $model->fill($data)->save();

      if($model){
        Toastr::success('Status à jour avec Succès!');
    }
    else{
        Toastr::error('Impossible de faire la mise à jour');
    }


        return back()->with('success', 'Status à jour avec Succès!');
    }
    
    public function destroy($id)
    {
        Booking::destroy($id);
        return back()->with('success', 'Reservation supprimé avec succès!');
    }




}