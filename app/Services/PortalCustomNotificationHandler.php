<?php

namespace App\Services;

use App\Http\Controllers\NotificationController;
use App\Mail\HotelReservationComplete;
use App\Mail\PasswordReset;
use App\Mail\PaymentFailed;
use App\Mail\TicketVoid;
use Exception;
use App\Notifications\BookingCreated;
use App\Notifications\UserCreated;
use Illuminate\Support\Facades\Mail;
use nilsenj\Toastr\Facades\Toastr;

class PortalCustomNotificationHandler
{
     public static function bookingCreated($booking){
   
        try{
            NotificationController::add_booking_notif($booking->id);
            if($booking->user)
                $booking->user->notify(new BookingCreated($booking));
        }catch(Exception $e){
           Toastr::info("Nous n'avons pas pu envoyer un email d'inscription.");
        }
        return 0;
    }

    public static function bookingAttachedToUser($booking){
        try {
            $booking->user->notify(new BookingCreated($booking));
        } catch (Exception $e) {
            Toastr::info("Nous n'avons pas pu envoyer un email d'inscription.");
        }
    }

    public static function registrationSuccessful($user){
        try{
            NotificationController::add_user_notif($user->id);
           $user->notify(new UserCreated());
        
        }catch(Exception $e){
           Toastr::info("Nous n'avons pas pu vous envoyer d'email de bienvenue.");
        }
        return 0;
    }

    public static function paymentFailed($response){
        try{
            Mail::to(auth()->user())->send(new PaymentFailed($response));
        }catch(Exception $e){
            Toastr::info("Sorry, unable to send you a payment failed notification.");
        }

       return 0;
    }

    public static function voidTicket($user,$ticketNumber){

        try{
            Mail::to($user)->send(new TicketVoid($user,$ticketNumber));
        }catch(Exception $e){
            Toastr::error('Unable to send void ticket email');
        }

    }

    public static function bookHotelRoom($user,$hotelInfo,$roomInfo,$bookingInfo){

        try{
            Mail::to($user)->send(new HotelReservationComplete($user,$hotelInfo,$roomInfo,$bookingInfo));
        }catch(Exception $e){
            Toastr::error('Unable to send hotel reservation email');
        }

    }

    public static function passwordReset(){
        try{
            Mail::to(auth()->user())->send(new PasswordReset());
        }catch(Exception $e){
            Toastr::error('Unable to send password reset email.');
        }
    }


}