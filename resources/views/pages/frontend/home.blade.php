@extends('layouts.app')

@section('page-title')  {{__('Rentacs Tours - Travel Agency')}}  @endsection

@section('content')
<section class="">
 <div class="vertical-search" >
    <div class="container clear-padding">
        <div class="search-section">
            <div role="tabpanel">
                <div class="col-md-7 col-sm-7 ">
                    <!-- BEGIN: CATEGORY TAB -->
                    <ul class="nav nav-tabs search-top" role="tablist" id="searchTab">
                        <li role="presentation" class="active">
                            <a href="#places" aria-controls="places" role="tab" data-toggle="tab">
                                <i class="fa fa-suitcase"></i>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#flight" aria-controls="flight" role="tab" data-toggle="tab">
                                <i class="fa fa-plane"></i>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#hotel" aria-controls="hotel" role="tab" data-toggle="tab">
                                <i class="fa fa-bed"></i>
                            </a>
                        </li>
                             <li role="presentation">
                            <a href="{{route('best_offers')}}">
                                <i class="fa fa-star"></i>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#EagleRider" style="text-transform: uppercase;" aria-controls="EagleRider"
                                role="tab" data-toggle="tab">
                                <img class="" style="text-transform: uppercase;width:30px;height:15px;"
                                    src="https://freight.cargo.site/w/150/i/acf0e5bb4fbee1b4a03bae7ef586740f085dd4e67abb3a7bb1992a9f9c057e65/Logo-Mini.png">EagleRider
                            </a>
                        </li>
                    </ul>
                    <!-- END: CATEGORY TAB -->
                </div>
                <div class="col-md-12 col-sm-12 vertical-tab-pannel">
                    <!-- BEGIN: TAB PANELS -->
                    <div class="tab-content">
                        <!-- BEGIN: Place SEARCH -->
                        <div role="tabpanel" class="tab-pane active" id="places">
                            <div class="site__search layout-02">
                                <a title="Close" href="#" class="search__close">
                                    <i class="la la-times"></i>
                                </a><!-- .search__close -->
                                <form action="{{route('page_search_listing')}}" class="site-banner__search layout-02">
                                        <input class="form-control open-suggestion"
                                            style="background-color: #00000036;text-align:center" id="input_search"
                                            type="text" name="keyword" placeholder="{{__('Where are you going?')}}"
                                            autocomplete="on">
                                        <input type="hidden" name="category[]" id="category_id">
                                        <input type="hidden" name="cities[]" id="city_id">
                                        <div class="search-suggestions category-suggestion">
                                            <ul>
                                                <li><a href="#"><span>{{__('Loading...')}}</span></a></li>
                                            </ul>
                                        </div>
                                    <div class="field-submit">
                                        <button><i class="las la-search la-24-black"></i></button>
                                    </div>
                                </form><!-- .site-banner__search -->
                                   <p class="site-banner__meta">
                        <span>{{__('Popular:')}}</span>
                        @foreach($popular_search_cities as $city)
                            <a href="{{route('city_detail', $city->slug)}}" title="{{$city->name}}">{{$city->name}}</a>
                        @endforeach

                    </p><!-- .site-banner__meta -->
                            </div>
                        </div>
                        <!-- BEGIN: FLIGHT SEARCH -->
                        <div role="tabpanel" class="tab-pane" id="flight">
                            <div class="col-md-12 clear-padding">
                                <div class="col-md-12 product-search-title">{{__('Book Flight Tickets')}}</div>
                                <div class="col-md-12 search-col-padding">
                                    <label class="radio-inline">
                                        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="One Way">
                                        {{__('One Way')}}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" checked
                                            value="Round Trip"> {{__('Round Trip')}}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="inlineRadioOptions" id="inlineRadio3"
                                            value="Multi Destination"> {{__('Multi Destination')}}
                                    </label>
                                </div>
                                <div class="hidden" id="one_way_flight_search_holder">
                                    <div class="clearfix"></div>
                                    <div class="col-md-4 col-sm-4 search-col-padding">
                                        <label>{{__('Departure City')}}</label>
                                        <div class="input-group">
                                            <input type="text" name="departure_city"
                                                class="form-control type-ahead one_way_departure_city" required
                                                placeholder="E.g. London">
                                            <span class="input-group-addon"><i
                                                    class="fa fa-map-marker fa-fw"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 search-col-padding">
                                        <label>{{__('Destination City')}}</label>
                                        <div class="input-group">
                                            <input type="text" name="destination_city"
                                                class="form-control type-ahead one_way_destination_city" required
                                                placeholder="E.g. New York">
                                            <span class="input-group-addon"><i
                                                    class="fa fa-map-marker fa-fw"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 search-col-padding">
                                        <label>{{__('Departure Date')}}</label>
                                        <div class="input-group">
                                            <input type="text" name="departure_date"
                                                class="form-control one_way_departure_date date-picker"
                                                placeholder="JJ/MM/AAAA">
                                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-4 col-sm-4 search-col-padding">
                                        <label>{{__('Adult')}}</label><br>
                                        <input id="adult_count" name="adult_count" value="1"
                                            class="form-control quantity-padding one_way_adult_count">
                                    </div>
                                    <div class="col-md-4 col-sm-4 search-col-padding">
                                        <label>{{__('Child')}}</label><br>
                                        <input type="text" id="child_count" name="child_count" value="1"
                                            class="form-control quantity-padding one_way_child_count">
                                    </div>
                                    <div class="col-md-4 col-sm-4 search-col-padding">
                                        <label>{{__('Child')}} <small>{{__('below 2yrs')}}</small></label>
                                        <input type="text" id="infant_count" name="infant_count" value="1"
                                            class="form-control quantity-padding one_way_infant_count">
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="col-md-12 search-col-padding">
                                        <button type="button"
                                            class="search-button btn transition-effect one_way_search_flight">{{__('Search')}}</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div id="round_trip_flight_search_holder">
                                    <div class="clearfix"></div>
                                    <div class="col-md-4 col-sm-4 search-col-padding">
                                        <label>{{__('Departure City')}}</label>
                                        <div class="input-group">
                                            <input type="text" name="departure_city"
                                                class="form-control type-ahead round_trip_departure_city" required
                                                placeholder="E.g. London">
                                            <span class="input-group-addon"><i
                                                    class="fa fa-map-marker fa-fw"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 search-col-padding">
                                        <label>{{__('Destination City')}}</label>
                                        <div class="input-group">
                                            <input type="text" name="destination_city"
                                                class="form-control type-ahead round_trip_destination_city" required
                                                placeholder="E.g. New York">
                                            <span class="input-group-addon"><i
                                                    class="fa fa-map-marker fa-fw"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 search-col-padding">
                                        <label>{{__('Departure Date')}}</label>
                                        <div class="input-group">
                                            <input type="text" name="departure_date"
                                                class="form-control round_trip_departure_date date-picker"
                                                placeholder="JJ/MM/AAAA">
                                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 search-col-padding">
                                        <label>{{__('Return Date')}}</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control round_trip_return_date date-picker"
                                                name="return_date" placeholder="JJ/MM/AAAA">
                                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-4 col-sm-4 search-col-padding">
                                        <label>{{__('Adult')}}</label><br>
                                        <input id="adult_count" name="adult_count" value="1"
                                            class="form-control quantity-padding round_trip_adult_count">
                                    </div>
                                    <div class="col-md-4 col-sm-4 search-col-padding">
                                        <label>{{__('Child')}}</label><br>
                                        <input type="text" id="child_count" name="child_count" value="1"
                                            class="form-control quantity-padding round_trip_child_count">
                                    </div>
                                    <div class="col-md-4 col-sm-4 search-col-padding">
                                        <label>{{__('Child')}} <small>{{__('below 2yrs')}}</small></label>
                                        <input type="text" id="infant_count" name="infant_count" value="1"
                                            class="form-control quantity-padding round_trip_infant_count">
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="col-md-12 search-col-padding">
                                        <button type="button"
                                            class="search-button btn transition-effect round_trip_search_flight">{{__('Search')}}</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="hidden" id="multi_destination_flight_search_holder">
                                    <div class="clearfix"></div>
                                    <div class="multi_destination_origin_destinations">
                                        <div class="col-md-4 col-sm-4 search-col-padding">
                                            <div class="form-group">
                                                <label>{{__('Departure City')}}</label>
                                                <input type="text" name="departure_city"
                                                    class="form-control multi_destination_departure_city type-ahead"
                                                    placeholder="{{__('Airport or City Name')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 search-col-padding">
                                            <div class="form-group">
                                                <label>{{__('Destination City')}}</label>
                                                <input type="text" name="destination_city"
                                                    class="form-control multi_destination_destination_city type-ahead"
                                                    placeholder="{{__('Airport or City Name')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 search-col-padding">
                                            <div class="form-group">
                                                <label>{{__('Departure Date')}}</label>
                                                <input type="text"
                                                    class="form-control multi_destination_departure_date date-picker"
                                                    name="departure_date" placeholder="JJ/MM/AAAA">
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-1 search-col-padding">

                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <button class="btn btn-outline-primary btn-group" id="add_new_trip"
                                                    type="button"><i class="fa fa-plus"></i> {{__('Add')}} </button>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 search-col-padding">
                                        <label>{{__('Adult')}}</label><br>
                                        <input id="adult_count" name="adult_count" value="1"
                                            class="form-control quantity-padding multi_destination_adult_count">
                                    </div>
                                    <div class="col-md-4 col-sm-4 search-col-padding">
                                        <label>{{__('Child')}}</label><br>
                                        <input type="text" id="child_count" name="child_count" value="1"
                                            class="form-control quantity-padding multi_destination_child_count">
                                    </div>
                                    <div class="col-md-4 col-sm-4 search-col-padding">
                                        <label>{{__('Child')}} <small>{{__('below 2yrs')}}</small></label>
                                        <input type="text" id="infant_count" name="infant_count" value="1"
                                            class="form-control quantity-padding multi_destination_infant_count">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12 search-col-padding">
                                        <button type="button" id="search_multi_flight"
                                            class="search-button btn transition-effect multi_destination_search_flight">{{__('Search')}}</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- END: FLIGHT SEARCH -->

                        <!-- START: HOTEL SEARCH -->
                        <div role="tabpanel" class="tab-pane" id="hotel">
                            <div class="col-md-12">
                                <form>
                                    <div class="col-md-12 product-search-title">{{__('Book Hotel Rooms')}}</div>
                                    <div class="col-md-12 col-sm-12 search-col-padding">
                                        <label>{{__('I Want To Go')}}</label>
                                        <div class="input-group">
                                            <input type="text" name="destination-city"
                                                class="form-control type-ahead hotel_city" required
                                                placeholder="{{__('E.g. City, Airport')}} ...">
                                            <span class="input-group-addon"><i
                                                    class="fa fa-map-marker fa-fw"></i></span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-3 col-sm-3 search-col-padding">
                                        <label>{{__('CheckIn')}}</label>
                                        <div class="input-group">
                                            <input type="text" name="check-in" id="check_in"
                                                class="form-control date-picker check_in_date" placeholder="JJ/MM/AAAA">
                                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 search-col-padding">
                                        <label>{{__('CheckOut')}}</label>
                                        <div class="input-group">
                                            <input type="text" name="check-out" id="check_out"
                                                class="form-control date-picker check_out_date"
                                                placeholder="JJ/MM/AAAA">
                                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 search-col-padding">
                                        <label>{{__('Adult')}}</label><br>
                                        <input id="hotel_adult_count" name="adult_count" value="1"
                                            class="form-control quantity-padding adult_count">
                                    </div>
                                    <div class="col-md-3 col-sm-3 search-col-padding">
                                        <label>{{__('Child')}}</label><br>
                                        <input type="text" id="hotel_child_count" name="child_count" value="1"
                                            class="form-control quantity-padding child_count">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12 search-col-padding">
                                        <button type="button"
                                            class="search-button btn transition-effect hotel_search">{{__('Search')}}</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                        <!-- END: HOTEL SEARCH -->
                    </div>
                    <!-- END: TAB PANE -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
     </div>
   </div>
</section>

<!-- END: SEARCH SECTION -->

<!-- BEGIN: WHO WE ARE -->
<section class="" style="padding:20px 0;background-color:#f8f8f8;">
    <div class="business-about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-lg-6">
                    <div class="business-about-info">
                        <h2>{{__('Who we are')}} ?</h2>
                        <p>{{__('Rentacstours about info')}}</p>
                        <a href="{{url('/a-propos-21')}}" class="btn">{{__('Read more')}}</a>
                    </div>
                </div>
                 <div class="col-sm-6 col-lg-6">
                     <img src="{{asset('images/img_about_1.jpg')}}" style="width: 100%;padding: 50px 0;">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END: WHO WE ARE -->

<!-- BEGIN: BEST OFFERS -->
<div class="best_offers" style="background-image: url({{asset('images/home-path.svg')}});">
    <div class="container">
        <div class="section-title text-center">
            <h2>{{__('BEST OFFERS')}}</h2>
        </div>
        <div class="content">
            <div class="row">
                @foreach($categories as $category)
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="offer_item">
                        <div class="hover_box">
                            <a title="" href="{{route('category_detail', $category->slug)}}">
                                <img src="{{getImageUrl($category->image)}}" alt="{{$category->name}}" class="offer-img">
                                <h4 class="offer_name">{{__('Offer')}} {{$category->name}}</h4>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="cities cities-img">
    <div class="" style="position: absolute;width:100%">
        <!-- <svg style="height: 700px;width:100%" x="0px" y="0px" viewBox="0 0 100 101.64249999999998"
            enable-background="new 0 0 100 81.314" xml:space="preserve" id="svg2" inkscape:version="0.91 r13725">
            <g display="none" id="g4">
                <path display="inline" fill="#010101"
                    d="M50.022,15.392c-19.651,0-35.585,15.927-35.585,35.583   c0,19.656,15.933,35.59,35.585,35.59c19.66,0,35.588-15.934,35.588-35.59C85.61,31.318,69.682,15.392,50.022,15.392z    M69.054,55.473l4.653-4.648h2.354c0.979,0,1.77,0.787,1.77,1.768l-0.024-0.074c0,0.979,0.796,1.77,1.775,1.77v4.299l0.923,0.581   C76.899,72.629,64.622,82.54,50.021,82.54c-17.43,0-31.562-14.13-31.562-31.562c0-1.421,0.102-2.816,0.283-4.179l4.495,6.712h3.218   v-4.039h3.838c1.579,0,2.857-1.281,2.857-2.855h3.272l3.421-3.421v-3.174l-3.387-3.388h-3.442v2.816h-3.339   c-1.778,0-3.218-1.443-3.218-3.223c0-1.773,1.44-3.218,3.218-3.218v-3.297h-2.975c5.772-6.331,14.083-10.305,23.323-10.305   c9.1,0,17.293,3.86,23.05,10.014"
                    id="path6" />
                <path display="inline" fill="#010101"
                    d="M29.931,59.769c0,2.088,1.691,3.78,3.781,3.78v12.476l3.205,1.571v-2.373l5.755-5.757   v-2.774c2.092,0,3.779-1.695,3.779-3.783l0.018-2.693h-3.356l-6.559-6.68l-10.099-0.024l3.461,3.564L29.931,59.769z"
                    id="path8" />
                <path display="inline" fill="#010101"
                    d="M50.022,42.178c1.408,0,7.076,9.345,7.076-0.12l-2.42-1.55L50.022,42.178z" id="path10" />
                <path display="inline" fill="#010101"
                    d="M62.339,49.25h-11.8c-1.246,0-2.251,1.005-2.251,2.254v2.163   c0,3.748,3.038,6.791,6.785,6.791h3.458v8.025l3.183,3.179h3.178v-3.501l3.219-3.214v-5.783c1.175,0,2.134-0.953,2.134-2.132   h-2.056L62.339,49.25z"
                    id="path12" />
                <path display="inline" fill="#010101"
                    d="M38.037,25.858l-2.469,3.758l1.402,2.144l0.029,3.369l3.387,3.391l2.026-4.658   c3.299,0,5.965-2.671,5.965-5.965L38.037,25.858z"
                    id="path14" />
                <path display="inline" fill="#010101"
                    d="M66.176,69.729v1.934c1.067,0,1.934-0.864,1.934-1.934v-1.93   C67.042,67.799,66.176,68.665,66.176,69.729z"
                    id="path16" />
                <path display="inline" fill="#010101"
                    d="M53.232,39.107h2.42v-2.41C54.318,36.697,53.232,37.779,53.232,39.107z" id="path18" />
            </g>
            <path
                d="m 39.74,12.399 -0.255,-1.1 c 1.479,-0.344 2.989,-0.619 4.49,-0.83 l 0.158,1.121 c -1.469,0.203 -2.948,0.478 -4.393,0.809 z"
                id="path20" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 61.917,12.333 c -1.442,-0.328 -2.919,-0.587 -4.403,-0.777 l 0.15,-1.122 c 1.515,0.195 3.027,0.464 4.497,0.795 l -0.244,1.104 z"
                id="path22" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 48.589,11.184 -0.053,-1.129 c 1.524,-0.071 3.071,-0.071 4.572,-0.011 l -0.042,1.132 c -1.492,-0.062 -2.991,-0.062 -4.477,0.008 z"
                id="path24" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 7.252,87.205 c 0.784,1.306 1.633,2.586 2.525,3.809 l 0.914,-0.669 C 9.819,89.153 8.987,87.904 8.218,86.623 l -0.966,0.582 z"
                id="path26" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 3.267,78.983 c 0.54,1.431 1.146,2.845 1.806,4.199 L 6.088,82.689 C 5.446,81.365 4.852,79.982 4.322,78.587 l -1.055,0.396 z"
                id="path28" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 0.826,70.179 c 0.275,1.498 0.617,2.999 1.022,4.455 l 1.09,-0.301 c -0.396,-1.427 -0.731,-2.893 -1,-4.358 l -1.112,0.204 z"
                id="path30" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 1.13,61.082 -1.13,0 c 0.002,1.518 0.073,3.054 0.21,4.569 L 1.335,65.549 C 1.2,64.065 1.131,62.564 1.13,61.082 Z"
                id="path32" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 1.906,52.183 -1.113,-0.2 c -0.264,1.493 -0.467,3.015 -0.6,4.535 l 1.125,0.096 c 0.131,-1.485 0.327,-2.977 0.588,-4.431 z"
                id="path34" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="M 4.255,43.562 3.196,43.169 c -0.533,1.435 -1.005,2.896 -1.402,4.349 l 1.091,0.299 c 0.389,-1.419 0.851,-2.85 1.37,-4.255 z"
                id="path36" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="M 8.117,35.509 7.145,34.932 c -0.776,1.302 -1.502,2.658 -2.16,4.031 l 1.019,0.485 c 0.643,-1.337 1.354,-2.667 2.113,-3.939 z"
                id="path38" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 9.661,31.114 0.915,0.662 c 0.871,-1.202 1.807,-2.379 2.782,-3.5 l -0.853,-0.743 c -0.999,1.144 -1.955,2.352 -2.844,3.581 z"
                id="path40" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 19.088,21.207 c -1.179,0.943 -2.336,1.959 -3.433,3.01 l 0.782,0.821 c 1.075,-1.034 2.207,-2.031 3.357,-2.949 l -0.706,-0.882 z"
                id="path42" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 86.074,24.006 c -1.095,-1.042 -2.256,-2.048 -3.447,-2.998 l -0.707,0.888 c 1.172,0.926 2.305,1.911 3.379,2.93 l 0.775,-0.82 z"
                id="path44" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 27.234,17.137 -0.54,-0.989 c -1.324,0.715 -2.641,1.509 -3.916,2.357 l 0.628,0.936 c 1.245,-0.827 2.533,-1.599 3.828,-2.304 z"
                id="path46" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 78.917,18.329 c -1.266,-0.831 -2.585,-1.616 -3.935,-2.336 l -0.528,0.997 c 1.31,0.7 2.605,1.47 3.846,2.282 l 0.617,-0.943 z"
                id="path48" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="M 35.434,13.599 35.08,12.527 c -1.455,0.477 -2.894,1.024 -4.272,1.621 l 0.446,1.038 c 1.35,-0.585 2.759,-1.115 4.18,-1.587 z"
                id="path50" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="M 70.862,14.023 C 69.47,13.437 68.028,12.898 66.574,12.43 l -0.345,1.077 c 1.423,0.455 2.831,0.981 4.191,1.559 l 0.442,-1.043 z"
                id="path52" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 99.129,36.774 -2.716,-2.711 1.117,-9.237 -1.241,-1.23 -3.197,7.139 -1.85,-1.846 c -0.161,-0.163 -0.379,-0.287 -0.609,-0.361 l 0.624,-3.083 -0.992,-0.993 -1.476,3.457 -3.455,1.474 0.989,0.994 3.087,-0.624 c 0.075,0.229 0.199,0.446 0.362,0.61 l 1.85,1.85 -7.144,3.201 1.227,1.236 9.245,-1.112 2.707,2.711 c 0.5,0.507 1.162,0.816 1.873,0.867 0.124,0 0.247,-0.036 0.339,-0.124 0.084,-0.089 0.138,-0.211 0.129,-0.335 -0.052,-0.717 -0.362,-1.379 -0.869,-1.883 z"
                id="path54" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 51.09,25.112 c -18.253,0 -33.101,14.848 -33.101,33.101 0,18.251 14.848,33.101 33.101,33.101 18.251,0 33.101,-14.85 33.101,-33.101 0,-18.253 -14.85,-33.101 -33.101,-33.101 z m 26.983,38.497 c 0.601,0.607 0.87,1.167 0.991,1.774 -3.197,12.465 -14.527,21.706 -27.974,21.706 -4.979,0 -9.666,-1.267 -13.759,-3.494 0.041,-0.179 0.081,-0.361 0.121,-0.555 0.244,-1.177 2.063,-1.742 2.844,-2.521 0.761,-0.762 2.275,-1.223 2.745,-2.219 0.308,-0.653 -0.128,-1.49 0.134,-2.099 0.199,-0.458 0.958,-0.957 1.314,-1.314 0.894,-0.894 1.564,-3.22 1.564,-4.442 -1.338,0 -2.675,0 -4.012,0 -1.267,0 -1.021,-1.498 -1.026,-2.429 -10e-4,-0.5 0.031,-1.111 -0.212,-1.568 -0.277,-0.52 -1.174,-0.368 -1.655,-0.612 -0.837,-0.425 -1.531,-1.257 -1.695,-2.192 -0.108,-0.613 -0.086,-1.062 -0.857,-1.032 -0.758,0.032 -1.462,0.639 -2.167,0.639 -0.885,0 -1.77,0 -2.655,0 -1.957,0 -3.914,0 -5.869,0 0,0.317 -0.18,1.349 0.109,1.494 0.723,0.36 1.445,0.722 2.167,1.083 1.078,0.54 1.394,1.889 1.921,2.941 0.518,1.036 1.105,2.054 1.559,3.116 0.562,1.314 0.97,2.777 1.993,3.833 0.431,0.445 1.267,0.354 1.45,0.967 0.232,0.77 -0.007,1.71 -0.184,2.468 -0.196,0.839 -0.442,1.668 -0.659,2.502 C 28.295,77.359 24.032,70.848 22.68,63.336 c 0.402,-0.031 0.805,-0.085 1.039,-0.085 0.78,0 0.804,-0.058 1.369,-0.621 0.495,-0.495 0.817,-0.642 0.817,-1.324 0,-0.79 0,-1.583 0,-2.372 0.96,0.479 1.918,0.96 2.878,1.438 0.042,-1.163 0.873,-1.312 1.831,-1.473 1.138,-0.188 1.887,-1.405 2.941,-1.405 0.869,0 1.23,0.166 2.046,0.43 0.428,0.141 0.965,0.304 1.412,0.165 0.601,-0.188 0.459,-1.261 0.667,-1.743 0.299,-0.697 0.754,-1.683 1.56,-1.75 0.876,-0.07 2.012,-0.465 1.056,-1.419 -1.049,-1.049 -1.833,-2.387 -2.542,-3.68 -0.303,-0.555 -0.379,-1.43 -0.89,-1.813 -1.116,-0.838 -2.792,0.298 -3.63,1.05 -0.471,0.425 0.268,1.402 -0.379,1.675 -1.052,0.446 -2.425,0.804 -3.511,0.285 -0.592,-0.283 -0.958,-0.977 -1.63,-1.101 -0.464,-0.084 -0.37,-0.214 -0.37,-0.734 0,-0.876 0,-1.754 0,-2.631 0,-0.364 0.101,-0.221 0.432,-0.316 1.303,-0.374 0.534,-2.07 1.825,-2.091 1.497,-0.025 0.019,-2.576 -0.386,-3.096 -0.227,-0.292 -0.453,-0.423 -0.7,-0.482 5.295,-6.638 13.444,-10.903 22.576,-10.903 8.311,0 15.809,3.534 21.082,9.173 -1.552,1.686 -3.22,3.605 -4.354,4.456 -0.778,0.583 -1.786,0.937 -2.655,1.371 -0.867,0.435 -2.043,0.202 -2.993,0.202 -0.247,0 -3.165,-0.04 -3.165,0.036 0,0.865 0.433,2.625 -0.402,3.044 -0.997,0.498 -2.116,0.878 -2.909,1.669 -0.225,0.225 -1.146,0.867 -0.881,1.133 10e-4,10e-4 0.002,0.002 0.004,0.003 -0.145,-0.078 -0.294,-0.128 -0.449,-0.123 -1.129,0.038 -2.53,0.086 -3.514,0.708 -0.624,0.394 -0.455,0.99 -0.538,1.645 -0.094,0.736 -0.325,1.515 -0.854,2.06 -0.632,0.652 -0.531,0.759 -0.531,1.817 1.119,-0.124 2.24,-0.249 3.362,-0.372 0.132,-0.018 0.955,-0.022 0.955,-0.169 0,-0.278 -0.157,-1.22 0.034,-1.411 0.424,-0.424 0.853,-0.853 1.28,-1.28 0.259,-0.259 0.73,0.48 0.942,0.693 0.39,0.389 0.771,0.472 0.357,0.882 -0.391,0.394 -0.784,0.787 -1.175,1.178 0.174,0 1.437,0.047 1.44,-0.033 0.051,-1.074 0.701,-2.108 1.438,-2.845 0.796,-0.796 1.887,-0.805 2.745,-0.117 0.347,0.28 0.134,1.179 0.134,1.556 0,0.253 -0.07,2.878 0.062,2.878 0.633,0 1.185,0.146 1.67,-0.265 1.667,-1.403 3.848,-1.067 5.464,-2.613 0.479,0.959 0.96,1.918 1.439,2.878 -1.143,0.382 -2.287,0.762 -3.43,1.143 -0.09,0.029 -0.862,0.346 -0.902,0.269 -0.261,-0.513 -0.539,-1.039 -0.894,-1.495 -0.472,-0.607 -0.59,-0.08 -0.497,0.478 0.151,0.922 0.736,1.785 1.371,2.451 0.666,0.698 1.039,2.043 1.473,2.912 -0.09,-1.769 2.485,1.045 2.879,1.438 0.608,-0.608 1.22,-1.22 1.827,-1.826 0.304,-0.304 0.604,-0.604 0.905,-0.905 0.244,-0.245 -0.028,-0.315 -0.216,-0.579 -1.016,-1.42 1.593,-1.007 2.386,-1.007 1.498,0 2.637,0.391 3.732,1.439 -1.391,-0.072 0.04,1.475 0.36,1.797 z"
                id="path56" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 52.289,47.419 c -0.318,0.32 -0.64,0.639 -0.958,0.96 -0.328,0.12 -0.87,0.143 -0.89,0.521 -0.024,0.467 -0.045,0.931 -0.07,1.398 0.627,-0.313 1.254,-0.627 1.88,-0.939 0.2,-0.101 0.038,-1.662 0.038,-1.94 z"
                id="path58" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 55.143,45.98 c 0.357,0 0.984,0.2 0.984,-0.225 0,-0.009 0,-0.019 0,-0.027 0.069,0.137 0.193,0.223 0.386,0.241 -0.115,0.484 -0.241,0.968 -0.386,1.451 0.438,-0.438 0.874,-0.875 1.313,-1.314 0.294,-0.294 0.125,-1.03 0.125,-1.42 0,-0.068 0,-0.137 0,-0.206 0,-0.938 0,-1.878 0,-2.817 -0.027,0.055 -0.075,0.144 -0.132,0.248 -0.018,-0.203 -0.027,-0.402 -0.048,-0.607 -0.056,0.337 -0.111,0.671 -0.167,1.006 -0.368,0.688 -0.897,1.733 -1.092,2.534 0,-0.121 0,-0.242 0,-0.363 0,-0.938 0,-1.878 0,-2.817 -0.29,0.58 -2.514,4.316 -0.983,4.316 z"
                id="path60" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 68.034,68.973 c 0.94,-0.157 1.805,-0.756 2.485,-1.405 -1.067,-0.355 -2.131,-0.711 -3.199,-1.066 -1.194,-0.398 -1.197,-0.527 -1.775,-1.686 -0.453,-0.909 -0.766,-1.549 -1.471,-2.254 -0.515,-0.515 -2.19,-1.66 -2.19,-2.415 0,-1.149 0.223,-1.214 -0.853,-1.214 -1.348,0 -2.695,0 -4.044,0 -2.206,0 -4.411,0 -6.616,0 -0.87,0.882 -1.714,1.841 -2.353,2.906 -1.137,1.895 0.285,2.842 1.53,4.205 1.332,1.457 0.816,3.931 3.308,4.368 0.889,0.154 1.894,0.033 2.794,0.033 0.107,0 2.08,-0.278 1.89,-0.624 0.209,0.375 0.094,1.417 0.168,1.872 0.169,1.021 0.39,2.035 0.616,3.044 0.267,1.203 0.683,2.39 0.683,3.624 0,1.269 1.321,2.04 2.189,2.909 0.33,0.33 0.519,0.688 0.988,0.688 0.811,0 1.626,0 2.438,0 0.404,0 -0.35,-4.992 0.929,-5.623 0.365,-0.18 1.087,0.021 1.303,-0.396 0.149,-0.283 -0.014,-0.631 0.135,-0.913 0.358,-0.69 1.203,-0.016 1.285,-1.152 0.064,-0.922 -0.099,-2.825 -0.749,-3.555 -0.791,-0.888 -0.545,-1.169 0.509,-1.346 z"
                id="path62" inkscape:connector-curvature="0" style="fill:#ee5000" />
            <path
                d="m 46.035,38.767 c -0.732,-0.723 -1.521,-1.408 -2.367,-1.996 -1.143,-0.794 -2.004,-0.865 -3.372,-0.865 -0.654,0 -1.321,-0.045 -1.973,0.008 -0.281,0.023 -0.172,0.337 -0.253,0.545 -0.491,1.256 -2.532,2.765 -3.531,3.764 1.382,0 2.153,2.867 2.677,3.915 0.315,0.629 0.202,1.283 0.202,1.986 0,1.029 -0.089,1.207 0.622,1.918 0.706,0.706 0.646,0.989 1.343,0.292 0.701,-0.701 1.401,-1.401 2.101,-2.101 0.46,-0.462 0.251,-1.21 0.251,-1.836 0,-0.924 -0.328,-1.295 0.607,-1.295 0.718,0 1.392,0.064 1.97,-0.432 0.438,-0.378 0.779,-0.854 1.381,-0.973 0.668,-0.132 2.08,-0.371 1.798,-1.474 -0.114,-0.447 -1.114,-1.118 -1.456,-1.456 z"
                id="path64" inkscape:connector-curvature="0" style="fill:#ee5000" />
        </svg> -->
    </div>
    <div id="discover-cities" class="container">
        <h2 class="cities__title title">{{__('Special Offers')}}</h2>
        <div class="cities__content">
            <div class="row">
                @foreach($places as $place)
                <div class="col-lg-3 col-xs-6">
                    <div class="cities__item hover__box">
                        <div class="cities__thumb hover__box__thumb">
                            <a title="{{$place->name}}" href="{{route('place_detail', $place->slug)}}">
                                <img src="{{getImageUrl($place->thumb)}}" alt="{{$place->name}}">
                            </a>
                        </div>
                        <h4 class="cities__name">{{$place->name}}</h4>
                        <div class="entry-category ">
                            <a class="" href="{{route('place_detail', $place->slug)}}">{{__('Read More')}}</a>
                        </div>
                    </div><!-- .cities__item -->
                </div>
                @endforeach
            </div>
        </div><!-- .cities__content -->
    </div>
</div><!-- .cities -->

<!--END: Business Category -->  

 <div class="news">
            <div class="container">
                <h2 class="news__title title title--more">
                    {{__('Latest Stories')}}
                    <a href="{{route('post_list_all')}}" title="{{__('View more')}}">
                        {{__('View more')}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10">
                            <path fill="#23D3D3" fill-rule="nonzero" d="M5.356 4.64L.862.148A.503.503 0 1 0 .148.86l4.137 4.135L.148 9.132a.504.504 0 1 0 .715.713l4.493-4.492a.509.509 0 0 0 0-.713z"/>
                        </svg>
                    </a>
                </h2>
                <div class="news__content">
                    <div class="row">
                        @foreach($blog_posts as $post)
                            <div class="col-md-4">
                                <article class="post hover__box">
                                    <div class="post__thumb hover__box__thumb">
                                        <a title="{{$post->title}}" href="{{route('post_detail', [$post->slug, $post->id])}}"><img src="{{getImageUrl($post->thumb)}}" alt="{{$post->title}}"></a>
                                    </div>
                                    <div class="post__info">
                                        <ul class="post__category">
                                            @foreach($post['categories'] as $cat)
                                                <li><a title="{{$cat->name}}" href="{{route('post_list', $cat->slug)}}">{{$cat->name}}</a></li>
                                            @endforeach
                                        </ul>
                                        <h3 class="post__title"><a title="{{$post->title}}" href="{{route('post_detail', [$post->slug, $post->id])}}">{{$post->title}}</a></h3>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!-- .news -->

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