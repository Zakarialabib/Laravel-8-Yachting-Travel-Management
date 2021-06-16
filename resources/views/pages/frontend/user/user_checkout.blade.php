@extends('layouts.app')

@section('page-title') Welcome @endsection

@section('css')
<link rel="stylesheet" href="{{asset('frontend/assets/css/intlTelInput.min.css')}}">
@endsection

@php
		$orgClientId  = '600002306';
    $orgOkUrl =  route('cmi_ok');
    $orgFailUrl = route('cmi_fail');
    $shopurl = route('home');
    $orgTransactionType = "PreAuth";
    $orgRnd =  microtime();
    $orgCallbackUrl = route('cmi_callback');
    $orgCurrency = "504";
@endphp
@section('content')
<main id="main" class="site-main">
  <div class="page-title page-title--small page-title--blog align-left">
    <div class="container">
        <div class="page-title__content">
            <h1 class="page-title__name">
                    {{__('Checkout')}}
            </h1>
        </div>
    </div>
  </div><!-- .page-title -->
  <div class="mw-box">
    <form action="{{route('checkout_store')}}" method="POST" style="margin: 3rem 2rem;">
      @csrf
      <input type="hidden" name="booking_id" value="{{$booking->id}}">
      <input type="hidden" name="BillToCountry" value="504">
      <input type="hidden" name="clientid" value="<?php echo $orgClientId ?>"> 
      <input type="hidden" name="okUrl" value="<?php echo $orgOkUrl ?>">
      <input type="hidden" name="failUrl" value="<?php echo $orgFailUrl ?>">
      <input type="hidden" name="TranType" value="<?php echo $orgTransactionType ?>">
      <input type="hidden" name="callbackUrl" value="<?php echo $orgCallbackUrl ?>">
      <input type="hidden" name="shopurl" value="<?php echo $shopurl ?>">
      <input type="hidden" name="currency" value="<?php echo $orgCurrency ?>">
      <input type="hidden" name="rnd" value="<?php echo $orgRnd ?>">
      <input type="hidden" name="storetype" value="3D_PAY_HOSTING">
      <input type="hidden" name="hashAlgorithm" value="ver3">
      <input type="hidden" name="lang" value="fr">
      <input type="hidden" name="refreshtime" value="5">
      <input type="hidden" name="encoding" value="UTF-8">
			<input type="hidden" name="oid" value="{{$booking->reference}}"> <!-- La valeur du paramètre oid doit être unique par transaction -->
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
        <h3>{{__('Your Order Summary')}}</h3>
          <table class="table">
            <thead>
              <th>{{ __('Name') }}</th>
              <th>{{ __('Price') }}</th>
              <th>{{ __('Quantity') }}</th>
              <th>{{ __('Total') }}</th>
            </thead>
            <tbody>
            @php $total = 0; @endphp
            @foreach($booking->rates as $key => $rate)
              <tr>
                  <td>{{ $rate->title }}</td>
                  <td>{{ number_format($rate->price, 2, '.', '') }}</td>
                  <td>x {{$rate->pivot->quantity }}</td>
                  <td>{{ number_format($rate->price * $rate->pivot->quantity, 2, '.', '') }}</td>
                  @php $total += $rate->price * $rate->pivot->quantity; @endphp
              </tr>
            @endforeach
              <tr>
                <td><strong>{{ __('TOTAL') }}</strong></td>
                <td></td>
                <td></td>
                <td><strong>{{ number_format($total, 2, '.', '') }}</strong></td>
                <input type="hidden" name="amount" value="{{ number_format($total, 2, '.', '') }}">
              </tr>
            </tbody>
          </table>
          <div class="row">     
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Payment') }} <i class="fa fa-angle-right"></i></button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
        <h3>{{__('Billing Details')}}</h3>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="BillToName">{{ __('Full Name') }}</label>
              <input type="text" class="form-control" name="BillToName" placeholder="{{ __('Full Name') }}" value="{{$booking->name}}">
            </div>
            <div class="form-group col-md-6">
              <label for="BillToCompany">{{ __('Company') }}</label>
              <input type="text" class="form-control" name="BillToCompany" placeholder="{{ __('Company') }}">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="BillToStreet1">{{ __('Address') }}</label>
              <input type="text" class="form-control" name="BillToStreet1" placeholder="{{ __('Address') }}">
            </div>
            <div class="form-group col-md-6">
              <label for="BillToCountry">{{ __('Country') }}</label>
              <input type="text" class="form-control" name="BillToCountry" placeholder="{{ __('Country') }}">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="BillToCity">{{ __('City') }}</label>
              <input type="text" class="form-control" name="BillToCity" placeholder="{{ __('City') }}">
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="BillToStateProv">{{ __('State') }}</label>
              <input type="text" class="form-control" name="BillToStateProv" placeholder="{{ __('State') }}">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="tel">{{ __('Phone') }}</label>
              <input type="tel" name="tel" id="phone" class="form-control" autocomplete="off" data-intl-tel-input-id="0" value="{{$booking->phone_number}}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="BillToPostalCode">{{ __('Zip') }}</label>
              <input type="text" class="form-control" name="BillToPostalCode" placeholder="{{ __('Zip') }}">
            </div>
          </div>
        </div>
      </div>
     
    </form>
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