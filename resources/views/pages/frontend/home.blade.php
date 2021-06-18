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
        <div class="b-main-filter-content tab-content" id="findTabContent">
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
        </div>
        <div class="row">
            <div class="col-lg-6 ">
                <div class="text-left">
                    <h2 class="ui-title">Providing a large fleet
                        of Boats for a perfect
                        and dreamy experience</h2>
                    <div class="ui-content">
                        <p>{{setting('home_description')}}</p>
                        <ul class="arrow-list">
                            <li><i class="fas fa-long-arrow-alt-right"></i>Stunning Cruise Paths You Follow</li>
                            <li><i class="fas fa-long-arrow-alt-right"></i>Premium Boats & Yachts</li>
                            <li><i class="fas fa-long-arrow-alt-right"></i>Our Professional Approach</li>
                            <li><i class="fas fa-long-arrow-alt-right"></i>Quality Service Guaranteed</li>
                        </ul>
                        <div class="gap25"></div> <img src="assets/img/sign.jpg" alt="sign" class="sign"> <span class="sign">CEO, Autlines Boat Rentals</span> </div>
                </div>
            </div>
            <div class="col-lg-6"> <img src="assets/img/2356456.png" alt="photo" class="about-image"> </div>
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
                        <div class="b-advantages__title">Priceless Experience</div>
                        <div class="decore01"></div>
                        <div class="b-advantages__info">Asmod tempor incididunt labore magna ust enim sed veniams quis nostrud sed commodo ipsum duals.</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="b-advantages">
                    <div class="ic flaticon-snorkel text-secondary"></div>
                    <div class="b-advantages__main">
                        <div class="b-advantages__title">Custom Packages</div>
                        <div class="decore01"></div>
                        <div class="b-advantages__info">Asmod tempor incididunt labore magna ust enim sed veniams quis nostrud sed commodo ipsum duals.</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="b-advantages">
                    <div class="ic flaticon-sailor text-secondary"></div>
                    <div class="b-advantages__main">
                        <div class="b-advantages__title">Peoples Oriented </div>
                        <div class="decore01"></div>
                        <div class="b-advantages__info">Asmod tempor incididunt labore magna ust enim sed veniams quis nostrud sed commodo ipsum duals.</div>
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
                        <a class="b-goods__img" href="{{route('offer.show', $offer->slug)}}"><img class="img-scale" src="{{getImageUrl($offer->thumb)}}" alt="{{$offer->name}}" /></a>
                        <div class="b-goods__main">
                            <div class="row no-gutters">
                                <div class="col"><a class="b-goods__title" href="#">{{$offer->name}}</a>
                                    <div class="b-goods__info">{{Str::limit('$offer->description',50)}}</div>
                                </div>
                                <div class="col-auto">
                                    <div class="b-goods__price text-primary"><span class="b-goods__price-title">PRICE</span><span class="b-goods__price-number">{{$offer->price}}
                                            <span class="b-goods__price-after-price">Per Day</span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="b-goods-descrip_nev_wrap">
                                <div class="b-goods-descrip_nev">
                                    <div class="b-goods-descrip__nev"> <i class="fas fa-user"></i> <span class="b-goods-descrip__info">12 Guests</span> </div>
                                    <div class="b-goods-descrip__nev"> <i class="fas fa-bed"></i> <span class="b-goods-descrip__info">2 Master Bedroom</span> </div>
                                </div>
                                <div class="b-goods-descrip_nev">
                                    <div class="b-goods-descrip__nev"> <i class="fas fa-arrows-alt-h"></i> <span class="b-goods-descrip__info"> 44 Feet</span> </div>
                                    <div class="b-goods-descrip__nev"> <i class="fas fa-columns"></i> <span class="b-goods-descrip__info"> Sun Deck, Kitchen ...</span> </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="text-center mt-3"><a class="btn btn-border view-all-boats" href="listing.html">view all boats</a></div>
        </div>
    </div>
</section>
<section class="section-progress  ">
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
        <div class="row bg-counters">
            <!-- Counter #1 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="b-progress-list cr-counters bg-accent-1 bg-accent-color1">
                    <div class="cr-counters__icon"> <i class="flaticon-sailor"></i> </div>
                    <div class="cr-counters__numbers js-chart" data-percent="240"> <span class="js-percent"></span> <span>+</span> </div>
                    <div class="cr-counters__description">Travel Destinations Offered</div>
                </div>
            </div>
            <!-- Counter #2 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="cr-counters bg-accent-2 bg-accent-color2 ">
                    <div class="cr-counters__icon"> <i class="flaticon-snorkel"></i> </div>
                    <div class="cr-counters__numbers js-chart" data-percent="980"> <span class="js-percent"></span> <span>+</span></div>
                    <div class="cr-counters__description">Travel Destinations Offered</div>
                </div>
            </div>
            <!-- Counter #3 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="cr-counters bg-accent-1 bg-accent-color3">
                    <div class="cr-counters__icon"> <i class="flaticon-island-1"></i> </div>
                    <div class="cr-counters__numbers js-chart" data-percent="175"> <span class="js-percent"></span> <span>+</span></div>
                    <div class="cr-counters__description">Travel Destinations Offered</div>
                </div>
            </div>
            <!-- Counter #4 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="cr-counters  bg-accent-color4">
                    <div class="cr-counters__icon"> <i class="flaticon-chef-hat"></i> </div>
                    <div class="cr-counters__numbers js-chart" data-percent="630"> <span class="js-percent"></span> <span>+</span></div>
                    <div class="cr-counters__description">Travel Destinations Offered</div>
                </div>
            </div>
        </div>
        <!-- End of Counters -->
    </div>
</section>
<section class="section-goods-offers">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="text-left offers-left">
                <h2 class="ui-title">Premium Boat<br>
                    Rental Services</h2> <img src="assets/img/decore02.png" alt="photo">
                <div class="offers-left-text">
                    <p>Eorem ipsum dolor amet consectetur sed adipisicing elit sed eiusmod tempor et dolore magna aliqua minim veniam, quis nostrud exercitation aliquip ex ea consequat duis aute irure dolorin.</p>  </div>
                
                <a class="btn btn-primary" href="#">view more</a>
                
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-8">
            <div class="b-offers-slider ui-slider_arr-prim js-slider" data-slick="{&quot;slidesToShow&quot;: 3, &quot;slidesToScroll&quot;: 1, &quot;dots&quot;: false, &quot;arrows&quot;: true, &quot;autoplay&quot;: true,   &quot;responsive&quot;: [{&quot;breakpoint&quot;: 992, &quot;settings&quot;: {&quot;slidesToShow&quot;: 1, &quot;slidesToScroll&quot;: 1}}]}">
                <div class="b-offers-nevica">
                    <div class="b-offers-nevica-photo"> <img src="assets/img/offers001.jpg" alt="photo"> </div>
                    <h6>Water Sports Boat</h6>
                    <div class="decore01"></div>
                    <p>Adipisicing eiusmod tempor incidids labore dolore magna aliqa ust enim ad minim veniams quis nostrs sed citation ullam coy laboris nisit.</p>
                </div>
                <!-- end .b-offers-->
                <div class="b-offers-nevica">
                    <div class="b-offers-nevica-photo"> <img src="assets/img/offers002.jpg" alt="photo"> </div>
                    <h6>Family Gathering</h6>
                    <div class="decore01"></div>
                    <p>Adipisicing eiusmod tempor incidids labore dolore magna aliqa ust enim ad minim veniams quis nostrs sed citation ullam coy laboris nisit.</p>
                </div>
                <!-- end .b-offers-->
                <div class="b-offers-nevica">
                    <div class="b-offers-nevica-photo"> <img src="assets/img/offers003.jpg" alt="photo"> </div>
                    <h6>Corporate Events</h6>
                    <div class="decore01"></div>
                    <p>Adipisicing eiusmod tempor incidids labore dolore magna aliqa ust enim ad minim veniams quis nostrs sed citation ullam coy laboris nisit.</p>
                </div>
                <!-- end .b-offers-->
                <div class="b-offers-nevica">
                    <div class="b-offers-nevica-photo"> <img src="assets/img/offers004.jpg" alt="photo"> </div>
                    <h6>Celebrations events</h6>
                    <div class="decore01"></div>
                    <p>Adipisicing eiusmod tempor incidids labore dolore magna aliqa ust enim ad minim veniams quis nostrs sed citation ullam coy laboris nisit.</p>
                </div>
                <!-- end .b-offers-->
            </div>
        </div>
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
                        <li><i class="fas fa-phone-square"></i> Call Us Today: +1 755 302 8549</li>
                        <li><i class="fas fa-envelope-square"></i> Email: <a href="mailto:name@rmy-domain.com">support@my-domain.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-2 col-lg-2"> 
                <a class="video-btn venobox ternary-video-btn-style vbox-item popup-youtube" data-vbtype="video" data-autoplay="true" href="https://www.youtube.com/watch?v=JAIvWg4iQHo"><i class="fa fa-play"></i>
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
            <div class="col-lg-3 col-sm-6">
                <a class="ui-gallery__img js-zoom-gallery__item" href="assets/img/_gal001.jpg"><img class="img-scale" src="assets/img/gal001.jpg" alt="photo"></a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a class="ui-gallery__img js-zoom-gallery__item" href="assets/img/_gal003.jpg"><img class="img-scale" src="assets/img/gal003.jpg" alt="photo"></a>
            </div>
            <div class="col-lg-2 col-sm-6">
                <a class="ui-gallery__img js-zoom-gallery__item" href="assets/img/_gal009.jpg"><img class="img-scale" src="assets/img/gal009.jpg" alt="photo"></a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="ui-gallery__img js-zoom-gallery__item" href="assets/img/_gal005.jpg"><img class="img-scale" src="assets/img/gal005.jpg" alt="photo"></a>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-5 col-sm-6">
                <a class="ui-gallery__img js-zoom-gallery__item" href="assets/img/_gal006.jpg"><img class="img-scale" src="assets/img/gal006.jpg" alt="photo"></a>
            </div>
            <div class="col-lg-2 col-sm-6">
                <a class="ui-gallery__img js-zoom-gallery__item" href="assets/img/_gal008.jpg"><img class="img-scale" src="assets/img/gal008.jpg" alt="photo"></a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a class="ui-gallery__img js-zoom-gallery__item" href="assets/img/_gal007.jpg"><img class="img-scale" src="assets/img/gal007.jpg" alt="photo"></a>
            </div>
            <div class="col-lg-2 col-sm-6">
                <a class="ui-gallery__img js-zoom-gallery__item" href="assets/img/_gal004.jpg"><img class="img-scale" src="assets/img/gal004.jpg" alt="photo"></a>
            </div>
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
                    <form action="#">
                        
                        <div class="row row-form-b">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="First Name"> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Last Name"> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Email"> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Phone"> </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Subject"> </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control" rows="6" placeholder="Message"></textarea>
                            </div>
                        </div>
                    <div class="col-md-12">
                        <button class="b-main-filter__btn btn btn-secondary">Submit</button>
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
                
                   <div class="ui-accordion accordion" id="accordion-1">
          <div class="card">
            <div class="card-header" id="heading1">
              <h3 class="mb-0">
                <button class="ui-accordion__link collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1"><span class="ui-accordion__number">01</span>How to book a yacht/boat from Nevica?<i class="ic fas fa-chevron-down"></i></button>
              </h3>
            </div>
            <div class="collapse show" id="collapse1" data-aria-labelledby="heading1" data-parent="#accordion-1">
              <div class="card-body">Quis nostrud exercitate laboridy aliquip duis irure sed dolor ipsum excpture fugiat estan veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex velit esse cillum dolore eu fugiat nulla pariatur.</div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading2">
              <h3 class="mb-0">
                <button class="ui-accordion__link collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2"><span class="ui-accordion__number">02</span>What are the safety precautions maintained by you?<i class="ic fas fa-chevron-down"></i></button>
              </h3>
            </div>
            <div class="collapse" id="collapse2" data-aria-labelledby="heading2" data-parent="#accordion-1">
              <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson</div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading3">
              <h3 class="mb-0">
                <button class="ui-accordion__link collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3"><span class="ui-accordion__number">03</span>What if the weather gets unfavourable for boating?<i class="ic fas fa-chevron-down"></i></button>
              </h3>
            </div>
            <div class="collapse" id="collapse3" data-aria-labelledby="heading3" data-parent="#accordion-1">
              <div class="card-bodyFood">truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.</div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading4">
              <h3 class="mb-0">
                <button class="ui-accordion__link collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4"><span class="ui-accordion__number">04</span>Can I bring my own food or drinking water?<i class="ic fas fa-chevron-down"></i></button>
              </h3>
            </div>
            <div class="collapse" id="collapse4" data-aria-labelledby="heading4" data-parent="#accordion-1">
              <div class="card-body">Nliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson</div>
            </div>
          </div>
                       
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
                        <div class="entry-content">{{Str::limit('$post->content',50)}}</div>
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

@section('javascript')
    <script type="text/javascript" async>
        /* SLIDER SETTINGS */
        jQuery(function($){
            "use strict";
            $.supersized({
                //Functionality
                slideshow               :   1,		//Slideshow on/off
                autoplay				:	1,		//Slideshow starts playing automatically
                start_slide             :   1,		//Start slide (0 is random)
                random					: 	0,		//Randomize slide order (Ignores start slide)
                slide_interval          :   10000,	//Length between transitions
                transition              :   1, 		//0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                transition_speed		:	500,	//Speed of transition
                new_window				:	1,		//Image links open in new window/tab
                pause_hover             :   0,		//Pause slideshow on hover
                keyboard_nav            :   0,		//Keyboard navigation on/off
                performance				:	1,		//0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
                image_protect			:	1,		//Disables image dragging and right click with Javascript
                //Size & Position
                min_width		        :   0,		//Min width allowed (in pixels)
                min_height		        :   0,		//Min height allowed (in pixels)
                vertical_center         :   1,		//Vertically center background
                horizontal_center       :   1,		//Horizontally center background
                fit_portrait         	:   1,		//Portrait images will not exceed browser height
                fit_landscape			:   0,		//Landscape images will not exceed browser width
                //Components
                navigation              :   1,		//Slideshow controls on/off
                thumbnail_navigation    :   1,		//Thumbnail navigation
                slide_counter           :   1,		//Display slide numbers
                slide_captions          :   1,		//Slide caption (Pull from "title" in slides array)
                slides 					:  	[		//Slideshow Images
                @foreach ($sliders as $slider)
                        {image : '{{ asset('images/' . $slider->photo) }}', title : '{{ $slider->title }}' },
                @endforeach
                ]
            });
        });
    
    </script>
    <script src="{{asset('frontend/assets/js/pages/flight/flight_search_management.js')}}" defer></script>
    <script src="{{asset('frontend/assets/js/pages/hotel/hotel_search_management.js')}}" defer></script>

@endsection

@section('css')

@endsection