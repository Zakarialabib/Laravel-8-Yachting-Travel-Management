@extends('layouts.app')

@section('page-title')  {{__('Santorini Yachting')}}  @endsection

@section('content')


<div class="b-main-slider slider-pro" id="main-slider" data-slider-width="100%" data-slider-height="920px" data-slider-arrows="false" data-slider-buttons="false">
    <div class="sp-slides">
        <!-- Slide 1-->
        @foreach ($sliders as $slider)
        <div class="b-main-slider__slide b-main-slider__slide-1 sp-slide"><img class="sp-image" src="{{ asset('images/' . $slider->photo) }}" alt="slider" />
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="sp-layer" data-width="100%" data-show-transition="left" data-hide-transition="left" data-show-duration="800" data-show-delay="400" data-hide-delay="400">
                            <div class="b-main-slider__title-wrap">
                                <div class="b-main-slider__slogan">{{$slider->slogan}}</div>
                                <div class="b-main-slider__title">{{$slider->title}}</div>
                                <div class="b-main-slider__label text-secondary">{{$slider->label}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        @endforeach
    </div>
</div>

<div class="b-about">
    <div class="ui-decor ui-decor_down"></div>
    <div class="container">
        {{-- <div class="b-main-filter-content tab-content" id="findTabContent">
            <div class="tab-pane fade show active" id="content-allCar">
                <div class="row align-items-end no-gutters">
                    <div class="b-main-filter__main col-lg">
                          <div class="b-main-filter__inner row no-gutters">
                            <div class="b-main-filter__item col-md-4">
                                <div class="b-main-filter__label">Select Boat Type</div>
                                <div class="b-main-filter__selector">
                                    <select class="selectpicker" data-width="100%" data-style="ui-select">
                                        <option>Celebrations</option>
                                        <option>Fishing</option>
                                        <option>Journey</option>
                                    </select>
                                </div>
                            </div>
                            <div class="b-main-filter__item col-md-4">
                                <div class="b-main-filter__label">Select a Model</div>
                                <div class="b-main-filter__selector">
                                    <select class="selectpicker" data-width="100%" data-style="ui-select">
                                        <option>Model 1</option>
                                        <option>Model 2</option>
                                        <option>Model 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="b-main-filter__item col-md-4">
                                <div class="b-main-filter__label">Price Range</div>
                                <div class="b-main-filter__selector">
                                    <select class="selectpicker" data-width="100%" data-style="ui-select">
                                        <option>Max $50 per day</option>
                                        <option>Max $100 per day</option>
                                        <option>Max $150 per day</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <button class="b-main-filter__btn btn btn-secondary">Search</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="content-newCars">
                <div class="row align-items-end no-gutters">
                    <div class="b-main-filter__main col-lg">
                        <div class="b-main-filter__inner row no-gutters">
                            <div class="b-main-filter__item col-md-4">
                                <div class="b-main-filter__label">Select Make</div>
                                <div class="b-main-filter__selector">
                                    <select class="selectpicker" data-width="100%" data-style="ui-select">
                                        <option>Audi</option>
                                        <option>BMV</option>
                                        <option>Opel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="b-main-filter__item col-md-4">
                                <div class="b-main-filter__label">Select a Model</div>
                                <div class="b-main-filter__selector">
                                    <select class="selectpicker" data-width="100%" data-style="ui-select">
                                        <option>Model 1</option>
                                        <option>Model 2</option>
                                        <option>Model 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="b-main-filter__item col-md-4">
                                <div class="b-main-filter__label">Price Range</div>
                                <div class="b-main-filter__selector">
                                    <select class="selectpicker" data-width="100%" data-style="ui-select">
                                        <option>Max $5000</option>
                                        <option>Max $15000</option>
                                        <option>Max $25000</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <button class="b-main-filter__btn btn btn-secondary">Search</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="content-usedCars">
                <div class="row align-items-end no-gutters">
                    <div class="b-main-filter__main col-lg">
                        <div class="b-main-filter__inner row no-gutters">
                            <div class="b-main-filter__item col-md-4">
                                <div class="b-main-filter__label">Select Make</div>
                                <div class="b-main-filter__selector">
                                    <select class="selectpicker" data-width="100%" data-style="ui-select">
                                        <option>Audi</option>
                                        <option>BMV</option>
                                        <option>Opel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="b-main-filter__item col-md-4">
                                <div class="b-main-filter__label">Select a Model</div>
                                <div class="b-main-filter__selector">
                                    <select class="selectpicker" data-width="100%" data-style="ui-select">
                                        <option>Model 1</option>
                                        <option>Model 2</option>
                                        <option>Model 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="b-main-filter__item col-md-4">
                                <div class="b-main-filter__label">Price Range</div>
                                <div class="b-main-filter__selector">
                                    <select class="selectpicker" data-width="100%" data-style="ui-select">
                                        <option>Max $5000</option>
                                        <option>Max $15000</option>
                                        <option>Max $25000</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <button class="b-main-filter__btn btn btn-secondary">Search</button>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-lg-6 ">
                <div class="text-left">
                    <div class="ui-content">
                        @foreach ($home_settings as $home)
                        {!!$home->short_des!!}
                        @endforeach
                        <div class="gap25"></div> <img src="assets/img/sign.jpg" alt="sign" class="sign"> <span class="sign">CEO, Autlines Boat Rentals</span> </div>
                </div>
            </div>
            <div class="col-lg-6"> <img src="@foreach($home_settings as $home){{$home->section_photo_1}}@endforeach" alt="photo" class="about-image"> </div>
        </div>
    </div>
</div>

<div class="section-advantages">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="b-advantages">
                    <div class="ic flaticon-rudder-1 text-secondary"></div>
                    <div class="b-advantages__main">
                        <div class="b-advantages__title">SEMI-PRIVATE CRUISES</div>
                        <div class="decore01"></div>
                        <div class="b-advantages__info">Explore the mesmerizing Santorinian seas, sail towards the volcano and float on the blue seas of the island. Book now your semi private cruise and enjoy the ride with one of our fleet’s vessels.</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="b-advantages">
                    <div class="ic flaticon-snorkel text-secondary"></div>
                    <div class="b-advantages__main">
                        <div class="b-advantages__title">PRIVATE CRUISES</div>
                        <div class="decore01"></div>
                        <div class="b-advantages__info">Indulge yourself with the absolute sailing experience. Book one of our vessels and sail into the absolute bliss surrounded by the beauties of the island and your beloved ones.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="b-advantages">
                    <div class="ic flaticon-sailor text-secondary"></div>
                    <div class="b-advantages__main">
                        <div class="b-advantages__title">SPECIAL OCCASIONS</div>
                        <div class="decore01"></div>
                        <div class="b-advantages__info">Our team’s knowledge and dedication will attend your special moments. Spend your unique day on board, surrounded by the sea and the energy of Santorini.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section-goods">
    <div class="section-default section-goods__inner bg-dark">
        <div class="ui-decor ui-decor_mirror ui-decor_center"></div>
        <div class="container">
            <div class="text-center">
                <h2 class="ui-title ui-title_light">Fleet of Luxury Boats</h2>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <p>Dolore magna aliqua enim ad minim veniam, quis nostrud exercitation aliquip duis aute irure dolorin  <br>  reprehenderits vol dolore fugiat nulla pariatur excepteur sint occaecat cupidatat.</p> <img src="assets/img/decore03.png" alt="photo"> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="section-goods__list">
            <div class="row">
                @foreach ($offers as $offer)
                <div class="col-xl-3 col-md-6">
                    <div class="b-goods">
                        <a class="b-goods__img" href="{{route('offer.show', $offer->slug)}}">
                            @php
                            $photos=explode(',',$offer->thumb);
                            // dd($photo);
                            @endphp
                            <img class="img-scale" src="{{$photos[0]}}" alt="{{$offer->name}}" />
                        </a>
                        <div class="b-goods__main">
                            <div class="row no-gutters">
                                <div class="col"><a class="b-goods__title" href="{{route('offer.show', $offer->slug)}}">{{$offer->name}}</a>
                                    <div class="b-goods__info">{!! Str::limit($offer->description, 100) !!}</div>
                                </div>
                                <div class="col-auto">
                                    <div class="b-goods__price text-primary">
                                        <span class="b-goods__price-title">PRICE</span>
                                        <span class="b-goods__price-number">{{$offer->price}}</span>
                                        <span class="b-goods__price-after-price">Starting from</span>
                                    </div>
                                </div>
                            </div>
                            <div class="b-goods-descrip_nev_wrap">
                                @foreach ($offer->packages as $key => $package)
                        
                                    @foreach ($package->features->take(2) as $feature)    
                                    <div class="b-goods-descrip__nev"><span class="b-goods-descrip__info">{{$feature->title}}</span> </div>
                                  @endforeach

                                    @foreach ($package->conditions->take(2) as $condition)    
                                    <div class="b-goods-descrip__nev"> <span class="b-goods-descrip__info"> {{$condition->title}}</span> </div>
                                    @endforeach
                              
                                @endforeach
                            </div>
                            
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="text-center mt-3"><a class="btn btn-border view-all-boats" href="{{route('offer.index')}}">view all boats</a></div>
        </div>
    </div>
</section>

<section class="section-progress">
    <div class="container">
        <div class="dw-wrap">
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <div class="dw-img"><img src="assets/img/deal-weak.jpg" alt="photo"></div>
                </div>
                <div class="col-xs-12 col-md-8">
                    <div class="dw-info">
                        <h5 class="decore-title">Deal Of The Week

                        </h5>
                        <h3>DayDream Boat <span>Rent For $800 / HRS</span></h3>
                        <div class="dw-text">Builder /Model: French Waves | Type/Year: House Boat 2019 | Length: 105 FT 32 M Charter Guests: 200 | Crew Members: 6</div>
                        <div class="dw-footer"><i class="fas fa-phone-square"></i> Booking a Charter Boat <strong>+1 755 302 8549</strong></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counters -->
        <div class="row bg-counters py-5">
            <!-- Counter -->
            @foreach ($categories as $category)
            <div class="col-12 col-md-6 col-lg-4">                   
                 <a href="{{route('category_detail', $category->slug)}}">
                <div class="b-progress-list cr-counters bg-accent-1 " style="background:url({{getImageUrl($category->image)}}) {{$category->color_code}};  background-blend-mode: luminosity;  background-size:cover;height:38vh" >
                    <div class="cr-counters__description">{{$category->name}}</div>
                </div>
            </a>
            </div>
            @endforeach
        <!-- End of Counters -->
      </div>
</section>


<section class="section-video section-default section-goods__inner bg-dark ">
    <div class="ui-decor ui-decor_mirror ui-decor_center"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-10">
                <div class="video-info">
                    <p><img src="assets/img/decore02.png" alt="decore">Give us a call or drop an email, We endeavor to answer within 24 hours</p>
                    <h4>We’ve Exclusive Boats With Charter Offers</h4>
                    <h5>LET’S PLAN YOUR NEXT TOUR!</h5>
                    <ul>
                        <li><i class="fas fa-phone-square"></i> Call Us Today: {{setting('home_phone')}}</li>
                        <li><i class="fas fa-envelope-square"></i> Email: <a href="mailto:{{setting('home_email')}}">{{setting('home_email  ')}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-2 col-lg-2"> 
                <a class="video-btn venobox ternary-video-btn-style vbox-item popup-youtube" data-vbtype="video" data-autoplay="true" href="https://youtu.be/ZHsROGnEmb8?list=TLGGjh4C7bM5_w0xODA2MjAyMQ"><i class="fa fa-play"></i>
                    <div class="pulsing-bg"></div>
                       <span>Watch A Tour</span> 
                </a> 
            </div>
        </div>
    </div>
</section>
<section class="section-gallery">
    <div class="container">
        <div class="text-center">
            <h2 class="ui-title">Picture Gallery</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <p>Dolore magna aliqua enim ad minim veniam, quis nostrud exercitation aliquip duis aute irure dolorin <br> reprehenderits vol dolore fugiat nulla pariatur excepteur sint occaecat cupidatat.</p> <img src="assets/img/decore03.png" alt="photo"> </div>
            </div>
        </div>
    </div>
    <div class="ui-gallery js-zoom-gallery">
        <div class="row no-gutters">
           
            @foreach ($home_settings as $home)
            @php
            $photos=explode(',',$home->section_photo_2);
            // dd($photo);
            @endphp
            @foreach ($photos as $photo)         
            <div class="col-lg-3 col-sm-6">
                <a class="ui-gallery__img js-zoom-gallery__item" href="{{$photo}}"><img class="img-scale" src="{{$photo}}" alt="photo"></a>
            </div>
            @endforeach
            @endforeach
        </div>
    </div>
</section>
<section class="section-form">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="text-left">
                    <h2 class="ui-title">Booking Form</h2>
                    <p>Dolore magna aliqua enim ad minim veniam, quis nostrudreprehenderits
                        <br> dolore fugiat nulla pariatur lorem ipsum dolor sit amet. </p> <img src="assets/img/decore03.png" alt="photo">
                    <form action="{{route('home_booking')}}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="{{\App\Models\Booking::TYPE_BOOKING_FORM}}">
                        <input type="hidden" name="date" value="">
                        <div class="row row-form-b">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="name" name="name"  placeholder="Name"> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="date" id="date" name="name"  value="{{\Carbon\Carbon::today()->format('Y-m-d')}}"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="email" name="email"  placeholder="Email"> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="phone_number" name="phone_number" placeholder="Phone"> </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" id="message" name="message" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="b-main-filter__btn btn btn-secondary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="text-left title-padding-m-top">
                    <h2 class="ui-title">Boat Rental FAQ’s</h2>
                    <p>Dolore magna aliqua enim ad minim veniam, quis nostrudreprehenderits
                        <br> dolore fugiat nulla pariatur lorem ipsum dolor sit amet. </p> <img src="assets/img/decore03.png" alt="photo"> </div>
        
        @foreach ($faqs as $faq)
            
        <div class="ui-accordion accordion" id="accordion-{{$faq->id}}">
          <div class="card">
            <div class="card-header" id="heading1">
              <h3 class="mb-0">
                <button class="ui-accordion__link collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1"><span class="ui-accordion__number">{{$faq->id}}</span>{{$faq->title}}<i class="ic fas fa-chevron-down"></i></button>
              </h3>
            </div>
            <div class="collapse show" id="collapse1" data-aria-labelledby="heading1" data-parent="#accordion-{{$faq->id}}">
              <div class="card-body">{!! $faq->content !!}</div>
            </div>
          </div>
          @endforeach

                       
        </div>
        <!-- end .accordion-->
                
            </div>
        </div>
    </div>
</section>
<section class="section-reviews area-bg area-bg_dark area-bg_op_90">
    <div class="area-bg__inner section-default">
        <div class="container text-center">
            <div class="text-center">
                <h2 class="ui-title ui-title_light">What People Says...</h2>
                <div class="row">
                    <div class="col-md-8 offset-md-2"> <img src="assets/img/decore03.png" alt="photo"> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="b-reviews-slider js-slider" data-slick="{&quot;slidesToShow&quot;: 1, &quot;slidesToScroll&quot;: 1, &quot;autoplay&quot;: true, &quot;dots&quot;: false, &quot;arrows&quot;: false}">
                        <blockquote class="b-reviews">
                            <div class="b-seller__img"><img class="img-scale" src="assets/img/avatar.jpg" alt="foto"></div>
                            <div class="b-reviews__text">Exercit ullamco laboris nisiut aliquip ex ea com irure dolor reprehs tempor incididunt ut labore dolore magna aliqua quis nostrud sed exercitation ullamco laboris nisiut duis aute irure sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
                            <div class="b-reviews__footer">
                                <div class="b-reviews__name">Donald James</div>
                                <div class="b-reviews__category">Customer</div>
                            </div>
                        </blockquote>
                        <!-- end .b-reviews-->
                        <blockquote class="b-reviews">
                            <div class="b-seller__img"><img class="img-scale" src="assets/img/avatar.jpg" alt="foto"></div>
                            <div class="b-reviews__text">Exercit ullamco laboris nisiut aliquip ex ea com irure dolor reprehs tempor incididunt ut labore dolore magna aliqua quis nostrud sed exercitation ullamco laboris nisiut duis aute irure sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
                            <div class="b-reviews__footer">
                                <div class="b-reviews__name">Donald James</div>
                                <div class="b-reviews__category">Customer</div>
                            </div>
                        </blockquote>
                        <!-- end .b-reviews-->
                        <blockquote class="b-reviews">
                            <div class="b-seller__img"><img class="img-scale" src="assets/img/avatar.jpg" alt="foto"></div>
                            <div class="b-reviews__text">Exercit ullamco laboris nisiut aliquip ex ea com irure dolor reprehs tempor incididunt ut labore dolore magna aliqua quis nostrud sed exercitation ullamco laboris nisiut duis aute irure sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
                            <div class="b-reviews__footer">
                                <div class="b-reviews__name">Donald James</div>
                                <div class="b-reviews__category">Customer</div>
                            </div>
                        </blockquote>
                        <!-- end .b-reviews-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-article section-default">
    <div class="container">
        <div class="text-center">
            <h2 class="ui-title">Industry News</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <p>Dolore magna aliqua enim ad minim veniam, quis nostrud exercitation aliquip duis aute irure dolorin <br> reprehenderits vol dolore fugiat nulla pariatur excepteur sint occaecat cupidatat.</p> <img src="assets/img/decore04.png" alt="photo"> </div>
            </div>
        </div>
        <div class="pt-2 row">
            @foreach($blog_posts as $post)
            <div class="col-xl-4 col-md-4">
                <section class="b-post b-post-3">
                    <div class="entry-media">
                        <a href="{{route('post_detail', [$post->slug, $post->id])}}"><img class="img-scale" src="{{getImageUrl($post->thumb)}}" alt="{{$post->title}}" /></a>
                    </div>
                    <div class="entry-meta">
                        <span class="entry-meta__item">
                            @foreach($post['categories'] as $cat)
                                <a class="entry-meta__link text-primary" title="{{$cat->name}}" href="{{route('post_list', $cat->slug)}}">{{$cat->name}}</a>
                            @endforeach
                         </span> 
                    </div>
                    <div class="entry-main">
                        <div class="entry-header">
                            <h2 class="entry-title"><a href="{{route('post_detail', [$post->slug, $post->id])}}">{{$post->title}}</a></h2> </div>
                        <div class="entry-content"> {!! Str::limit($post->content, 150) !!} </div>
                    </div> <a class="btn-post" href="{{route('post_detail', [$post->slug, $post->id])}}">Read More</a> </section>
                <!-- end .b-post-->
            </div>
            @endforeach

        </div>
    </div>
</section>
<section class="section-default section-banners">
    <div class="container">
        <div class="text-center"> <img src="assets/img/banners.jpg" alt="photo"> </div>
    </div>
</section>



@endsection

