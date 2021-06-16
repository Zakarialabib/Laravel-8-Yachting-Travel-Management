@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('frontend/assets/css/intlTelInput.min.css')}}">
@endsection

@section('content')
<main id="main" class="site-main">
  <div class="page-title page-title--small page-title--blog align-left">
    <div class="container">
        <div class="page-title__content">
            <h1 class="page-title__name">
              {{__('Complete Purchase')}}
            </h1>
        </div>
    </div>
  </div><!-- .page-title -->
  <div class="mw-box my-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="row">
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
                  <td>{{ $rate->price }}</td>
                  <td>x {{$rate->pivot->quantity }}</td>
                  <td>{{ $rate->price * $rate->pivot->quantity }}</td>
                  @php $total += $rate->price * $rate->pivot->quantity; @endphp
              </tr>
            @endforeach
              <tr>
                <td><strong>TOTAL</strong></td>
                <td></td>
                <td></td>
                <td><strong>{{ number_format($total, 2, '.', '') }}</strong></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row">
          <a href="{{route('home')}}" class="btn btn-primary">{{__('Back')}} <i class="fa fa-angle-right"></i></a>
        </div>
      </div>
      <div class="col-md-6">
        Complete Payment Successfull
      </div>
    </div>
  </div>
</main>
@endsection
