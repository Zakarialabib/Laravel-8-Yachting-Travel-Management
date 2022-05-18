@extends('layouts.app')
@section('content')
  
<div class="section-title-page area-bg area-bg_dark area-bg_op_60">
  <div class="area-bg__inner">
    <div class="container text-center">
      <h1 class="b-title-page">{{ $offer->name }}</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home')}}">{{__('Home')}}</a></li>
          <li class="breadcrumb-item"><a href="">{{__('Offers')}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $offer->name }}</li>
        </ol>
      </nav>
      <!-- end .breadcrumb-->
    </div>
  </div>
</div>
<!-- end .b-title-page-->


<div class="l-main-content">
  <div class="ui-decor ui-decor_sm-h ui-decor_mirror bg-primary"></div>
  <div class="container">
    <section class="b-goods-f">
      <div class="row">
        <div class="col-lg-8">
          @php
          $photos=explode(',',$offer->thumb);
          // dd($photo);
          @endphp
          <div class="b-goods-f__slider">
              <div class="ui-slider-main js-slider-for">
                @foreach ($photos as $photo)
                <img class="img-scale" src="{{$photo}}" alt="{{$photo}}"/>
                @endforeach

              </div>
             
              <div class="ui-slider-nav js-slider-nav">
                @foreach ($photos as $photo)
                <img class="img-scale" src="{{$photo}}" alt="{{$photo}}"/>
                @endforeach
                </div>
          </div>


          <h2 class="b-goods-f__title">Boat Specifications</h2>
          <ul class="nav nav-tabs">
            @foreach ($offer->packages as $key => $package)
            <li class="{{$loop->first ? 'active' : ''}} nav-item">
                <a class="nav-link" data-toggle="tab" data-period="{{$package->period}}" data-title="{{$package->title}}" data-id="{{$package->id}}" data-target=".pack-{{$key + 1}}"><i class="fa fa-suitcase"></i> <span>{{__('Package')}} {{$key + 1}}</span></a>
            </li>    
            @endforeach
          </ul>
          <div class="tab-content">
            @foreach ($offer->packages as $key => $package)
            <div class="pack-{{$key + 1}} {{($loop->first ? 'active in' : '')}} tab-pane w-100" >
                  <div class="col-md-12">
                        <dl class="data-list-descriptions">
                            <!-- Make -->
                            <div class="dd-item">                    
                                  @foreach ($package->features as $feature)    
                                  <dt class="left">  <i class="fa fa-check-circle"></i> </dt>
                                  <dd class="right">   {{$feature->title}} </dd>
                                  @endforeach
                            </div>
                        </dl>
                  </div>
                  <div class="col-md-12">
                      <dl class="data-list-descriptions">
                          <!-- Make -->                   
                          <div class="dd-item">
                              @foreach ($package->conditions as $condition)    
                                <dt class="left">  <i class="fa fa-check-circle"></i> </dt>
                                <dd class="right"> {{$condition->title}}<br></dd>
                              @endforeach
                          </div>
                      </dl>
                  </div>
              </div>   
              @endforeach
          </div>

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a></li>
            <li class="nav-item"><a class="nav-link" id="features-tab" data-toggle="tab" href="#features" role="tab" aria-controls="features" aria-selected="false">Features & Services</a></li>
            <li class="nav-item"><a class="nav-link" id="location-tab" data-toggle="tab" href="#location" role="tab" aria-controls="location" aria-selected="false">Boats Location</a></li>
            <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
             
              {!! $offer->description !!}
            </div>

            <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
                @if(isset($offer['itinerary']))
                  @foreach($offer['itinerary'] as $itinerary)
                      <div>
                          <h3> {{$itinerary['title']}}</h3>
                          <p>{!! $itinerary['description'] !!}<p>
                        </div>                                         
                    @endforeach
                  @endif
              </div>
                
                <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cons equat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    
                        <div class="map" id="map"></div>
                    
                    
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                  
                    <ul class="comments-list list-unstyled">
                      @foreach($reviews as $review)
                      <li>
                        <article class="comment b-goods-reviews__comment clearfix">
                          <header class="comment-header clearfix">
                            <div class="pull-left">
                              <cite class="comment-author">{{$review['user']['name']}}</cite>
                              <time datetime="20219-10-27" class="comment-datetime">{{formatDate($review->created_at, 'd/m/Y')}}</time>
                            </div>
                            <ul class="rating-list list-inline pull-right">
                               <li class="fa fa-star color-star"></li>
                              <li class="fa fa-star color-star"></li>
                              <li class="fa fa-star color-star"></li>
                              <li class="fa fa-star color-star"></li>
                              <li class="fa fa-star "></li>
                            </ul>
                          </header>
                          <div class="comment-body">
                            <p>{{$review->comment}}</p>
                          </div>
                        </article>
                      </li>
                      @endforeach
                    </ul>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <aside class="l-sidebar">
                <div class="b-goods-f-price">
                  <div class="b-goods-f-price__header bg-secondary">                  <h5>{{$offer->name}}</h5>Starting from<span class="b-goods-f-price__main">$ {{$offer->price}}</span></div>
                </div>


                 

                  <div class="widget-2 section-sidebar bg-gray">
                    <h3 class="widget-title-2"><span class="widget-title__inner">Book Now</span></h3>
                    <div class="widget-content">
                      <div class="widget-inner">
                        <form action="{{route('booking_submit')}}" method="POST">
                          @csrf
                          <input type="hidden" id="package_id" name="package_id" value="{{$offer->packages ?? $offer->packages->first()->id}}">
                          <input type="hidden" name="type" value="{{\App\Models\Booking::TYPE_BOOKING_FORM}}">
                          <input id="persons" name="numbber_of_adult" type="hidden">
                          <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                  <label>{{__('Start')  }}</label>
                                  <input 
                                  type="date" 
                                  id="check_in" 
                                  name="date" 
                                  class="form-control" 
                                  value="{{\Carbon\Carbon::today()->format('Y-m-d')}}">
                              </div>
                              <div class="tab-content w-100">
                                  @foreach ($offer->packages as $key => $package)
                                  <div class="pack-{{$key + 1}} {{($loop->first ? 'active in' : '')}} tab-pane fade show">
                                      @foreach ($package->rates as $rate)
                                      @if($rate->capacity !== 0)
                                      <div class="room-price row" data-start-date="{{$rate->start_date}}" data-end-date="{{$rate->end_date}}">
                                          <div class="col-md-8 col-sm-8 col-xs-8">
                                              <label style="margin-top: 30px;">
                                                  <input type="checkbox" class="rate" name="rate[]" value="{{$rate->id}}:1" data-id="{{$rate->id}}"data-price="{{$rate->price}}" data-total="{{$rate->price}}" data-capacity="{{$rate->capacity}}">
                                                  <span>{{$rate->title}}</span>
                                                  <span>x {{$rate->capacity}}</span>
                                              </label>
                                          </div>
                                          <div class="col-md-4 col-sm-4 col-xs-4">
                                              <h5 class="rate-total">{{$rate->price}}</h5>
                                          </div>
                                      </div>
                                      @else
                                      <div class="room-price row" data-start-date="{{$rate->start_date}}" data-end-date="{{$rate->end_date}}">
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <label style="margin-top: 30px;">
                                                <input type="checkbox" class="rate" name="rate[]" value="{{$rate->id}}:1" data-id="{{$rate->id}}" data-price="{{$rate->price}}" data-total="{{$rate->price}}" data-capacity="1">
                                                <span>{{$rate->title}}</span>
                                                <input type="number" class="rate-counter" min="1" value="1">
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <h5 class="rate-total">{{$rate->price}}</h5>
                                        </div>
                                      </div>
                                      @endif
                                      <div class="clearfix"></div>
                                      @endforeach
                                  </div>
                                  @endforeach
                              </div>
                              <div class="col-md-12 col-sm-12 col-xs-12 py-3">
                                  <label>{{__('Name')}}</label>
                                  <input class="form-control" type="text" id="name" name="name" placeholder="{{__('Enter your name')}} *" required>
                              </div>
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                  <label>{{__('Email')}}</label>
                                  <input class="form-control" type="text" id="email" name="email" placeholder="{{__('Enter your email')}} *" required>
                              </div>
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                  <label>{{__('Phone')}}</label>
                                  <input class="form-control" type="text" id="phone_number" name="phone_number" placeholder="{{__('Enter your phone')}}" required>
                              </div>
                          </div>
                          <div class="row">
                              <div class="grand-total text-center">
                                  <div class="col-sm-6 col-md-6 col-lg-6">
                                      <h4>{{__('Total')}} <span id="total">0</span> DH</h4>
                                  </div>
                                  <div class="col-sm-6 col-md-6 col-lg-6">
                                      <button class="btn btn-secondary w-100" type="submit">{{__('BOOK')}}</button>
                                  </div>
                              </div>
                          </div>
                      </form>

                      </div>
                    </div>
                  </div>
                   <div class="b-seller">
                    <div class="b-seller__header bg-primary">
                      <div class="b-seller__title">
                        <div class="b-seller__name">{{__('Need Assistance')}}</div>
                      </div>
                    </div>
                    <div class="b-seller__main"><i class="b-seller__ic flaticon-phone-call text-primary"></i>
                      <div class="b-seller__contact"><span class="d-block">Contact Us</span><a class="b-seller__phone" href="tel:{{setting('home_phone')}}">{{setting('home_phone')}}</a></div>
                    </div>
                  </div>
                  <!-- end .b-seller-->
                </aside>
              </div>
            </div>
          </section>
          <!-- end .b-goods-f-->
          
        </div>
      </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {

    handleRoomPrices(new Date($('#check_in').val()));

    $('#check_in').on('change', function() {
        handleRoomPrices(new Date($(this).val()));
    });

    $('.rate').on('change', function() {
        calculateTotal();
        calculatePersons();
    });

    $('.package-tab').on('click', function() {
        $('#package_id').val($(this).data('id'))
        $('#package-title').text($(this).data('title'));
        $('#min-stay').text($(this).data('period'));
        $('#total').text(0);

        $('.rate').each(function(index) {
            $(this).prop( "checked", false );
        });
    });

    $('.rate-counter').on('change', function() {
      let rateCounter = parseFloat($(this).val());
      let ratePrice = parseFloat($(this).siblings('.rate').data('price'));
      let rate = $(this).siblings('.rate');
      rate.val(`${rate.data('id')}:${rateCounter}`);
      rate.data('total', rateCounter * ratePrice);
      rate.data('capacity', rateCounter);
      $(this).closest('.rate-total').text(rateCounter * ratePrice);
      calculateTotal();
      calculatePersons();
    })
});

function calculateTotal() {
    let total = 0;
    $('.rate').each(function(index) {
        if($(this).is(':checked')) {
            total += parseFloat($(this).data('total'));
        }
    });
    $('#total').text(total);
}

function calculatePersons() {
  let total = 0;
  $('.rate').each(function(index) {
      if($(this).is(':checked')) {
          total += parseFloat($(this).data('capacity'));
      }
  });
  $('#persons').val(total);
  console.log(total);
}

function handleRoomPrices(checkInDate) {
    $('.room-price').each(function(index) {
        let roomStartDate = new Date($(this).data('start-date'));
        let roomEndDate = new Date($(this).data('end-date'));

        if(isDateValid(checkInDate, roomStartDate, roomEndDate))
            $(this).show();
        else
            $(this).hide();
    });
}

function isDateValid(checkIn, start, end) {
    let isValid = false;

    if(checkIn >= start && checkIn <= end)
        isValid = true;

    return isValid;
}
</script>
@endpush
