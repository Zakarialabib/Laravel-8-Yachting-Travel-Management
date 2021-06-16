@extends('layouts.app')

@section('page-title') Hotel Payment Option  @endsection

@section('activeDeals') active @endsection

@section('content')

    @php
        $AmadeusConfig = new \App\Services\AmadeusConfig();
        $AmadeusHelper = new \App\Services\AmadeusHelper();
    @endphp


    <div class="inner-banner style-6">
        <img class="center-image" src="{{asset('frontend/img/hotel_booking.jpg')}}" style="height: 40px;" alt="">
        <div class="vertical-align">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <ul class="banner-breadcrumb color-white clearfix">
                            <li><a class="link-blue-2" href="{{url('/')}}">home</a> /</li>
                            <li><span>deal booking</span></li>
                        </ul>
                        <h2 class="color-white">{{$deal->name}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-wrapper" >

        <div class="container">
            <div class="row padd-90">
                <div class="col-xs-12 col-md-8">
                    @if($errors->any())
                        @if(is_array($errors->first()))
                            @foreach($errors->first() as $serial => $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        @else
                            <div class="alert alert-danger">{{$errors->first()}}</div>
                        @endif
                    @endif

                    <div class="buttons-wrap">
                        @if(!is_null($banks))
                            <div class="row">
                                <div class="col-md-12">
                                    <blockquote class="blockquote style-2">
                                        <img src="{{asset('frontend/assets/images/portal_images/bank.png')}}" style="height:85px;" class="img-responsive"/>
                                        <form method="post" action="{{url('/deals/bank-payment')}}">
                                            @csrf
                                            <div class="row">
                                                <input type="hidden" name="booking_reference" value="{{$booking->reference}}"/>
                                                @foreach($banks as $serial => $bank)
                                                    <div class="col-md-12">
                                                        <div class="input-entry color-3">
                                                            <input class="checkbox-form" id="text-{{$serial}}" type="radio" name="bank_details_id" value="{{$bank->id}}" required>
                                                            <label class="clearfix" for="text-{{$serial}}">
                                                                <span class="sp-check"><i class="fa fa-check"></i></span>
                                                                <p> {{\App\Bank::find($bank->bank_id)->name}} , {{$bank->account_name}}, {{$bank->account_number}}</p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn_travel_portal">CONFIRM BOOKING <i class="fa fa-chevron-right"></i></button>
                                            </div>
                                        </form><br/>
                                        <footer><cite title="Source Title"> Bank Payment Option </cite></footer>
                                    </blockquote>
                                </div>
                            </div>
                        @endif
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <blockquote class="blockquote style-2">
                                    <img src="" class="img-responsive"/>
                                    <p>Pay directly with your credit/debit card through our online payment gateway
                                        <input  type="hidden"  class="booking_reference" value="{{$booking->reference}}"/>
                                  
                                    </p>
                                    <footer><cite title="Source Title"> Payment Gateway </cite></footer>
                                </blockquote>
                            </div>
                        </div>
                        @role('agent')
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <blockquote class="blockquote style-2">
                                    @php
                                        $walletBalance = \App\Wallet::where('user_id',auth()->id())->first()->balance;
                                    @endphp
                                    <img src="{{asset('frontend/assets/images/portal_images/wallet.png')}}" style="height:85px;" class="img-responsive"/>
                                    @if($walletBalance > $deal->total_amount)
                                        <form method="post" action="{{url('deals/wallet-payment')}}">
                                            @csrf
                                            <p>
                                                You have enough credit in your wallet, you can now make payment for this booking with your wallet credit.
                                                <input type="hidden" class="booking_reference" name="booking_reference" value="{{$booking->reference}}"/>
                                                <input type="hidden" class="amount" name="amount" value="{{$booking->total_amount}}"/>
                                                <button type="submit" class="btn btn_travel_portal wallet_pay_now">CONFIRM BOOKING
                                                </button>
                                            </p>
                                        </form>
                                    @else
                                        <p>You do not have enough money in your wallet to make payment for this booking. Please top up your wallet and try again later.</p>
                                    @endif

                                    <footer><cite title="Source Title"> Wallet Balance = DH {{number_format(($walletBalance/100),2)}} </cite></footer>
                                </blockquote>
                            </div>
                        </div>
                        @endrole

                        @role('admin')
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <blockquote class="blockquote style-2">
                                    @php
                                        $walletBalance = \App\Wallet::where('user_id',auth()->id())->first()->balance;
                                    @endphp
                                    <img src="{{asset('frontend/assets/images/portal_images/wallet.png')}}" style="height:85px;" class="img-responsive"/>
                                    @if($walletBalance > $deal->total_amount)
                                        <form method="post" action="{{url('deals/wallet-payment')}}">
                                            @csrf
                                            <p>
                                                You have enough credit in your wallet, you can now make payment for this booking with your wallet credit.
                                                <input type="hidden" class="booking_reference" name="booking_reference" value="{{$booking->reference}}"/>
                                                <input type="hidden" class="amount" name="amount" value="{{$booking->total_amount}}"/>
                                                <button type="submit" class="btn btn_travel_portal wallet_pay_now">CONFIRM BOOKING
                                                </button>
                                            </p>
                                        </form>
                                    @else
                                        <p>You do not have enough money in your wallet to make payment for this booking. Please top up your wallet and try again later.</p>
                                    @endif

                                    <footer><cite title="Source Title"> Wallet Balance = DH {{number_format(($walletBalance/100),2)}} </cite></footer>
                                </blockquote>
                            </div>
                        </div>
                        @endrole

                    </div>


                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="right-sidebar" >
                        <div class="simple-group passenger-info bg-grey-2 detail-block" align="center">
                            <h5 class="color-dark-2">Total Amount</h5>
                            <h4 class="color-dark-2">&#x20a6; {{number_format(($booking->total_amount/100),2)}}</h4>
                        </div>
                        <div class="detail-block bg-red-3">
                            <h4 class="color-white">details</h4>
                            <div class="details-desc">
                                <p class="color-pink">DEAL NAME:  <span class="color-white">{{$deal->name}}</span></p>
                                <p class="color-pink">FLIGHT: <span class="color-white"> @if($deal->flight == 1) <i class=" fa fa-check"></i>Available @else <i class=" fa fa-times"></i>Not Available @endif </span></p>
                                <p class="color-pink">HOTEL: <span class="color-white"> @if($deal->hotel == 1) <i class=" fa fa-check"></i>Available @else <i class=" fa fa-times"></i>Not Available @endif </span></p>
                                <p class="color-pink">ATTRACTION: <span class="color-white"> @if($deal->attraction == 1) <i class=" fa fa-check"></i>Available @else <i class=" fa fa-times"></i>Not Available @endif </span></p>
                                <p class="color-pink">ADULT ({{$booking->adults}}): <span class="color-white"> DH{{number_format(($booking->adults * $deal->adult_price),2)}} </span></p>
                                <p class="color-pink">CHILD ({{$booking->children}}): <span class="color-white"> DH{{number_format(($booking->children * $deal->child_price),2)}} </span></p>
                                <p class="color-pink">INFANT ({{$booking->infants}}): <span class="color-white"> DH{{number_format(($booking->infants * $deal->infant_price),2)}}  </span></p>
                                <p class="color-pink">TOTAL AMOUNT : <span class="color-white"> DH{{number_format(($booking->total_amount/100),2)}}  </span></p>
                                <p class="color-pink">CONTACT NUMBER: <span class="color-white"> {{$deal->phone_number}} </span></p>
                            </div>
                        </div>
                        <div class="help-contact bg-grey-2">
                            <h4 class="color-dark-2">Need Help?</h4>
                            <p class="color-grey">Contact us for assistance :</p>
                            <a class="help-phone color-dark-2 link-blue" ><img src="{{asset('frontend/img/detail/phone24.png')}}" alt="phone">{{\App\Services\PortalConfig::$adminCustomerCareNumber}}</a>
                            <a class="help-mail color-dark-2 link-blue" href="mailto:{{\App\Services\PortalConfig::$adminCustomerCareEmail}}"><img src="{{asset('frontend/img/detail/letter.png')}}" alt="email">{{\App\Services\PortalConfig::$adminCustomerCareEmail}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('frontend/assets/js/pages/hotel/payment_option.js')}}"></script>
@endsection

@section('css')

@endsection