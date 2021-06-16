<section id="how-it-work">
    <div class="row work-row">
        <div class="container">
            <div class="section-title text-center">
                <h2>{{__('LAST MINUTE DEALS')}}</h2>
                <h4>{{__('SAVE MORE')}}</h4>
            </div>
            <div class="owl-carousel" id="lastminute">
                @foreach($deals as $serial => $deal)
                    <div class="col-grid  bg-white">
                        <div class="wrapper">
                            @if($deal->flight == 1 && $deal->hotel == 0 && $deal->attraction == 0)
                                <img src="{{\App\Services\AmadeusConfig::cityImage(\App\Services\AmadeusConfig::iataCode($deal->flightDeal->destination))}}" alt="">
                            @else
                                @if(isset($deal->images[0]['image_path']))
                                    <img src="{{asset($deal->images[0]->image_path)}}" alt="{{$deal->name}}">
                                @else
                                    @if(isset($deal->hotelDeal['city']))
                                        <img src="{{ \App\Services\AmadeusConfig::cityImage(\App\Services\AmadeusConfig::iataCode($deal->hotelDeal->city)) }}" alt="">
                                    @elseif(isset($deal->attractionDeal['city']))
                                        <img src="{{ \App\Services\AmadeusConfig::cityImage(\App\Services\AmadeusConfig::iataCode($deal->attractionDeal->city)) }}">
                                    @elseif(isset($deal->flightDeal['destination']))
                                        <img src="{{ \App\Services\AmadeusConfig::cityImage(\App\Services\AmadeusConfig::iataCode($deal->flightDeal->destination)) }}">
                                    @endif
                                @endif
                            @endif
                            <h6 class="location">{{$deal->name}}</h6>
                        </div>
                        <div class="body text-center">
                            <h5>{{$deal->name}}</h5>
                            @if($deal->flight == 1) <i class="fa fa-plane"></i> @endif
                            @if($deal->hotel == 1) <i class="fa fa-home"></i> @endif
                            @if($deal->attraction == 1) <i class="fa fa-map-marker"></i> @endif
                            <p class="back-line">{{__('Starting From')}}</p>
                            <h3>{{number_format($deal->adult_price)}}DH</h3>
                            <p class="text-sm">{{substr($deal->information,0,150)}}</p>
                        </div>
                        <div class="bottom">
                            <a href="{{url('deals/details/'.$deal->id)}}">{{__('VIEW DETAIL')}}</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

@push('javascript')
    <script type="text/javascript">
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
                    {image : 'frontend/assets/images/1.jpg', title : 'Slide 1'},
                    {image : 'frontend/assets/images/2.jpg', title : 'Slide 2'},
                    {image : 'frontend/assets/images/3.jpg', title : 'Slide 3'},
                ]

            });
        });

    </script>
    <script src="{{asset('frontend/assets/js/pages/flight/flight_search_management.js')}}"></script>
    <script src="{{asset('frontend/assets/js/pages/hotel/hotel_search_management.js')}}"></script>

@endpush