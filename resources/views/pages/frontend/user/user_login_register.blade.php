@extends('layouts.app')

@section('page-title') Welcome @endsection

@section('css')
<link rel="stylesheet" href="{{asset('frontend/assets/css/intlTelInput.min.css')}}">
@endsection

@section('content')
<main id="main" class="site-main">
  <div class="page-title page-title--small page-title--blog align-left">
    <div class="container">
        <div class="page-title__content">
            <h1 class="page-title__name">
              {{__('Register')}}
            </h1>
        </div>
    </div>
  </div><!-- .page-title -->
  <div class="mw-box">
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
      <h3 class="text-center">{{__('Login with email')}}</h3>
        <form action="{{route('booking_user_signin')}}" method="POST" >
          @csrf
          <input type="hidden" name="booking_id" value="{{$booking->id}}">
          <div class="row">
            <div class="form-group col-md-12">
              <label for="email">{{ __('Email') }}</label>
              <input type="text" class="form-control" name="email" placeholder="{{__('Email')}}">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              <label for="password">{{ __('Password') }}</label>
              <input type="password" class="form-control" name="password" placeholder="{{__('Password')}}">
            </div>
          </div>
          <div class="row">
          <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary">{{__('Sign in')}} <i class="fa fa-angle-right"></i></button>
          </div>
          </div>

        </form>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
        
        <h3 class="text-center">{{__('Sign up Using Email')}}</h3>
        <form action="{{route('booking_user_register')}}" method="POST" >
          @csrf
          <input type="hidden" name="booking_id" value="{{$booking->id}}">
          <div class="row">
            <div class="form-group col-md-6">
              <label for="first_name">{{ __('First name') }}</label>
              <input type="text" class="form-control" name="first_name" placeholder="{{ __('First name') }}">
            </div>
            <div class="form-group col-md-6">
              <label for="last_name">{{ __('Last name') }}</label>
              <input type="text" class="form-control" name="last_name" placeholder="{{ __('Last name') }}">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="tel">{{__('Phone')}}</label>
              <input type="tel" name="tel" id="phone" class="form-control" autocomplete="off" style="width:100%" data-intl-tel-input-id="0" required>
            </div>
            <div class="form-group col-md-6">
              <label for="address">{{__('Address')}}</label>
              <input type="text" name="address" id="address" class="form-control" required>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="email">{{__('Email')}}</label>
              <input type="email" class="form-control" name="email" placeholder="{{__('Email')}}">
            </div>
            <div class="form-group col-md-6">
              <label for="password">{{__('Password')}}</label>
              <input type="password" class="form-control" name="password" placeholder="{{__('Password')}}">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="condition_check" required>
                <label class="form-check-label" for="condition_check">
                {{__('I Agree')}}
                </label>
                <p class="font-small-3">{{__('By clicking Register, you agree to the')}} <a href="{{route('page_sale_conditions')}}" >{{__('Terms and Conditions')}}</a></p>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="form-group col-md-6">
            <button type="submit" class="btn btn-primary">{{__('Create Account')}} <i class="fa fa-angle-right"></i></button>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
@endsection

@section('javascript')
<script src="{{asset('frontend/assets/js/intlTelInput.min.js')}}"></script>
<script>
  var input = document.querySelector("#phone");
  window.intlTelInput(input, {
    initialCountry: "MA",
    autoHideDialCode: true,
    autoPlaceholder: true,
    nationalMode: false,
  });
</script>
@endsection