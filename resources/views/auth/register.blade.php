@extends('layouts.auth')

@section('page-title')  {{__('Register')}} @endsection

@section('css')
<link rel="stylesheet" href="{{asset('frontend/assets/css/intlTelInput.min.css')}}">
@endsection

@section('content')

    <section class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-5 col-10 box-shadow-2 p-0">
                @if($errors->any())
                    @foreach($errors->all() as $serial => $error)
                        <div class="alert round bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                            <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{__('Oops!')}}</strong> {{$error}}
                        </div>
                    @endforeach
                @endif
                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                    <div class="card-header border-0 pb-0">
                        <div class="card-title text-center">
                            <img style="width: 120px;" src="{{getImageUrl(setting('logo'))}}" style="-webkit-filter: invert(1);filter: invert(1);width:100px" alt="{{config('app.name')}}">
                        </div>
                    </div>
                    <div class="card-content">
                        <p class="card-subtitle text-muted text-center font-small-3 mx-2 my-3 ">{{__('Sign up Using Email')}}</p>
                        <div class="card-body pt-0">
                            <form class="form-horizontal" method="post" action="{{ route('register') }}">
                                @csrf
                                <input type="hidden" name="booking_id" value="{{$booking}}">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6">
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" name="sur_name" id="sur_name" class="form-control" required placeholder="{{__('Last Name')}}" tabindex="1">
                                            <div class="form-control-position">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6">
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" name="first_name" id="first_name" class="form-control" required placeholder="{{__('First Name')}}" tabindex="1">
                                            <div class="form-control-position">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6">
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="email" name="email" id="email" class="form-control" required placeholder="{{__('Valid Email')}}" tabindex="1">
                                            <div class="form-control-position">
                                                <i class="la la-envelope"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6">
                                        <fieldset class="form-group position-relative iti iti--allow-dropdown">
                                            <input type="tel" name="phone" id="phone" class="form-control" autocomplete="off" data-intl-tel-input-id="0" required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6">
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="{{__('Password')}}" tabindex="5" required>
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                            <div class="help-block font-small-3"></div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6">
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{__('Confirm Password')}}" tabindex="6" data-validation-matches-match="password" data-validation-matches-message="Password & Confirm Password must be the same.">
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                            <div class="help-block font-small-3"></div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-4 col-sm-3 col-md-3">
                                        <fieldset>
                                            <input type="checkbox" required id="remember-me" class="chk-remember">
                                            <label for="remember-me"> {{__('I Agree')}}</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-8 col-sm-9 col-md-9">
                                        <p class="font-small-3">{{__('By clicking Register, you agree to the')}} <a href="{{route('page_terms_conditions')}}" >{{__('Terms and Conditions')}}</a> {{__('set out by this site, including our Cookie Use.')}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6">
                                        <button type="submit" class="btn btn-info btn-lg btn-block">{{__('Register')}}</button>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6">
                                        <a  href="{{url('/login')}}" class="btn btn-danger btn-lg btn-block">{{__('Login')}}</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

