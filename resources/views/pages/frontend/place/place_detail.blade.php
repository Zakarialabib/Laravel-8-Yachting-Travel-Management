@extends('layouts.app')
@section('content')
<section class="breadcrumbs-custom bg-image context-dark">
    <div class="breadcrumbs-custom-inner">
        <div class="container breadcrumbs-custom-container">
            <div class="breadcrumbs-custom-main" >
                <h1 class="breadcrumbs-custom-title"> {{ $place->name }}</h1>
            </div>
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{ route('home')}}">{{__('Home')}}</a></li>
                <li><a href="">{{__('Offers')}}</a></li>
                <li><a href="">{{ $place->name }}</a></li>
            </ul>
        </div>
    </div>
</section> 
   <main id="main" class="place-04">
    <div class="place">
    <div class="row package-detail">
        <div class="container-fluid clear-padding">
        <div class="main-content col-md-8">
          <div class="slick-sliders">
            <div class="slick-slider photoswipe" data-item="1" data-arrows="true" data-itemscroll="1" data-dots="true" data-infinite="true" data-centermode="true" data-centerPadding="0">
              @if(isset($place->gallery))
              @foreach($place->gallery as $gallery)
              <div class="place-slider__item photoswipe-item">
                <a href="{{getImageUrl($gallery)}}" data-height="900" data-width="1200" data-caption="{{$gallery}}">
                  <img src="{{getImageUrl($gallery)}}" alt="{{$gallery}}">
                </a>
              </div>
              @endforeach
              @else
              <div class="place-slider__item">
                <a href="#">
                  <img src="https://via.placeholder.com/1280x500?text=Rentacstours" alt="slider no image">
                </a>
              </div>
              @endif
            </div>
            <div class="place-share">
              <a title="Save" href="#" class="add-wishlist @if($place->wish_list_count) remove_wishlist active @else @guest open-login @else add_wishlist @endguest @endif" data-id="{{$place->id}}">
                <i class="la la-bookmark la-24">
                </i>
              </a>
              <a title="Share" href="#" class="share">
                <i class="la la-share-square la-24">
                </i>
              </a>
              <div class="social-share">
                <div class="list-social-icon">
                  <a class="facebook" href="#" onclick="window.open('https://www.facebook.com/sharer.php?u=' + window.location.href,'popUpWindow','height=550,width=600,left=200,top=100,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes');">
                    <i class="la la-facebook">
                    </i>
                  </a>
                  <a class="twitter" href="#" onclick="window.open('https://twitter.com/share?url=' + window.location.href,'popUpWindow','height=500,width=550,left=200,top=100,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes');">
                    <i class="la la-twitter">
                    </i>
                  </a>
                  <a class="linkedin" href="#" onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url=' + window.location.href,'popUpWindow','height=550,width=600,left=200,top=100,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes');">
                    <i class="la la-linkedin">
                    </i>
                  </a>
                  <a class="pinterest" href="#" onclick="window.open('https://pinterest.com/pin/create/button/?url=' + window.location.href,'popUpWindow','height=500,width=550,left=200,top=100,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes');">
                    <i class="la la-pinterest">
                    </i>
                  </a>
                </div>
              </div>
            </div>
            <!-- .place-share -->
            <div class="place-gallery">
              <a class="show-gallery" title="Gallery" href="#">
                <i class="la la-images la-24">
                </i>
                {{__('Gallery')}}
              </a>
            </div>
            <!-- .place-item__photo -->
            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
              <!-- Background of PhotoSwipe.It's a separate element as animating opacity is faster than rgba(). -->
              <div class="pswp__bg">
              </div>
              <!-- Slides wrapper with overflow:hidden. -->
              <div class="pswp__scroll-wrap">
                <!-- Container that holds slides.PhotoSwipe keeps only 3 of them in the DOM to save memory.Don't modify these 3 pswp__item elements, data is added later on. -->
                <div class="pswp__container">
                  <div class="pswp__item">
                  </div>
                  <div class="pswp__item">
                  </div>
                  <div class="pswp__item">
                  </div>
                </div>
                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                <div class="pswp__ui pswp__ui--hidden">
                  <div class="pswp__top-bar">
                    <!--  Controls are self-explanatory. Order can be changed. -->
                    <div class="pswp__counter">
                    </div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)">
                    </button>
                    <button class="pswp__button pswp__button--share" title="Share">
                    </button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen">
                    </button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out">
                    </button>
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                      <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                          <div class="pswp__preloader__donut">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip">
                    </div>
                  </div>
                  <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                  </button>
                  <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                  </button>
                  <div class="pswp__caption">
                    <div class="pswp__caption__center">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- .pswp -->
          </div>
          <!-- .place-slider -->
        </div>
        <div class="col-md-4 package-detail-sidebar sidebar-wrapper clear-padding">
        <div class="package-summary sidebar-item">
            <h4><i class="fa fa-bookmark"></i>{{__('Package Summary')}}</h4>
            <div class="package-summary-body">
                <h5><i class="fa fa-heart"></i>{{__('Special Offer')}}</h5>
                <p>{{$place->name}}</p>
                <h5><i class="fa fa-map-marker"></i>{{__('Price')}}</h5>
                <p><span id="package-title">{{$place->price}} DH</span></p>
                <h5><i class="fa fa-globe"></i>{{__('Description')}}</h5>
                <p>
                  {!! Illuminate\Support\Str::limit($place->description, 100) !!}
                </p>
                <h5><i class="fa fa-globe"></i>{{__('Services')}}</h5>
                <p>  
                  <div class="hightlight-grid">
                    @foreach($amenities as $key => $item)
                    <div class="place__amenities">
                        <img src="{{getImageUrl($item->icon)}}" alt="{{$item->name}}"> {{$item->name}}
                    </div>
                    @endforeach
                  </div>
                </p>
            </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <div class="package-complete-detail">
              <ul class="nav nav-tabs">
              <li class="nav-item">
                  <a data-toggle="tab" class="nav-link active" href="#overview">
                    <i class="fa fa-suitcase">
                    </i> 
                    <span>{{__('Detail')}}
                    </span>
                  </a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="overview" >
                  <div class="daily-schedule-body">
                    <p>
                      {!! $place->description !!}
                    </p>
                    </div>
                    @if(isset($place['itinerary']))
                  <div class="daily-schedule">
                    @foreach($place['itinerary'] as $itinerary)
                    <div class="title">
                      <p>
                        <span>{{$itinerary['question']}}
                        </span>
                      </p>
                    </div>
                    <div class="daily-schedule-body">
                      <p>{!! $itinerary['answer'] !!}
                      </p>                                               
                    </div>
                    @endforeach
                  </div>
                  @endif
              <div class="place__box place__box-map">
                <h3 class="place__title--additional tab-heading">
                  {{__('Location & Maps')}}
                </h3>
                <div class="maps">
                  <div id="golo-place-map">
                  </div>
                  <input type="hidden" id="place_lat" value="{{$place->lat}}">
                  <input type="hidden" id="place_lng" value="{{$place->lng}}">
                </div>
                <div class="address">
                  <i class="la la-map-marker">
                  </i>
                  {{$place->address}}
                  <a href="https://maps.google.com/?q={{$place->address}}" title="Direction" target="_blank" rel="nofollow">({{__('Direction')}})
                  </a>
                </div>
              </div>               
                <div class="place__box place__box--reviews">
                  <h3 class="place__title--reviews">
                    {{__('Review')}} ({{count($reviews)}})
                    @if(isset($reviews))
                    <span class="place__reviews__number"> {{$review_score_avg}}
                      <i class="fa fa-star">
                      </i>
                    </span>
                    @endif
                  </h3>
                  <ul class="place__comments">
                    @foreach($reviews as $review)
                    <li>
                      <div class="place__author">
                        <div class="place__author__avatar">
                          <a title="" href="#">
                            <img src="{{asset('frontend/assets/images/portal_images/user.png')}}" alt="user">
                          </a>
                        </div>
                        <div class="place__author__info">
                          <h4>
                            <a title="Nitithorn" href="#">{{$review['user']['name']}}
                            </a>
                            <div class="place__author__star">
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                              </svg>
                              @php
                              $width = $review->score * 20;
                              $review_width = "style='width:{$width}%'";
                              @endphp
                              <span {!! $review_width !!}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                  <path fill="#23D3D3" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                  <path fill="#23D3D3" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                  <path fill="#23D3D3" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                  <path fill="#23D3D3" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                  <path fill="#23D3D3" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                                </svg>
                              </span>
                            </div>
                          </h4>
                          <time>{{formatDate($review->created_at, 'd/m/Y')}}
                          </time>
                        </div>
                      </div>
                      <div class="place__comments__content">
                        <p>{{$review->comment}}
                        </p>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                  @guest
                  <div class="login-for-review account logged-out">
                    <a href="#" class="btn-login open-login">{{__('Login')}}
                    </a>
                    <span>{{__('to review')}}
                    </span>
                  </div>
                  @else
                  <div class="review-form">
                    <h3>{{__('Write a review')}}
                    </h3>
                    <form id="submit_review">
                      @csrf
                      <div class="rate">
                        <span>{{__('Rate This Place')}}
                        </span>
                        <div class="stars">
                          <a href="#" class="star-item" data-value="1" title="star-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                              <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                            </svg>
                          </a>
                          <a href="#" class="star-item" data-value="2" title="star-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                              <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                            </svg>
                          </a>
                          <a href="#" class="star-item" data-value="3" title="star-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                              <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                            </svg>
                          </a>
                          <a href="#" class="star-item" data-value="4" title="star-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                              <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                            </svg>
                          </a>
                          <a href="#" class="star-item" data-value="5" title="star-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                              <path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/>
                            </svg>
                          </a>
                        </div>
                      </div>
                      <div class="field-textarea">
                        @if(!empty(\App\Models\Profile::getUserInfo(auth()->user()->id)->photo))
                        <img src="{{asset(\App\Models\Profile::getUserInfo(auth()->user()->id)->photo)}}"
                             alt="{{\App\Models\Profile::getUserInfo(auth()->user()->id)->first_name}}">
                        @else
                        <img class="author-avatar"  src="{{asset('frontend/assets/images/portal_images/user.png')}}" alt="user">
                        @endif                                               
                        <textarea name="comment" placeholder="{{__('Write a review')}}">
                        </textarea>
                      </div>
                      <div class="field-submit">
                        <small class="form-text text-danger" id="review_error">{{__('error!')}}
                        </small>
                        <input type="hidden" name="score" value="">
                        <input type="hidden" name="place_id" value="{{$place->id}}">
                        <button type="submit" class="btn" id="btn_submit_review">{{__('Save')}}
                        </button>
                      </div>
                    </form>
                  </div>
                  @endguest
                </div>
                <!-- .place__box -->
              </div>
              <!-- .place__left -->
            </div>
          </div>
       </div>
       <div class="col-lg-4 col-md-4">
       <div class="sidebar-booking-box">
                @if($place->booking_type === \App\Models\Booking::TYPE_BOOKING_FORM)
              <aside  id="booking"  class="booking-box-body">
                <h3 class="text-center">{{__('Make a reservation')}}
                </h3>
                <form action="#" method="POST" id="booking_form">
                  @csrf
                  <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                      <input type="text" id="name" name="name" class="form-control" placeholder="{{__('Enter your name')}} *" required>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <input type="text" id="email" name="email" class="form-control" placeholder="{{__('Enter your email')}} *" required>
                  </div>
                  </div>
                  <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="{{__('Enter your phone')}}">
                  </div>
                  </div>
                  <div class="col-lg-12 col-md-12">
                  <div class="field-select has-sub field-guest">
                    <input type="text" class="form-control" placeholder="{{__('Guest')}} *" readonly>
                    <i class="la la-angle-down">
                    </i>
                    <div class="field-sub">
                      <ul>
                        <li>
                          <span>{{__('Adults')}}
                          </span>
                          <div class="shop-details__quantity">
                            <span class="minus">
                              <i class="la la-minus">
                              </i>
                            </span>
                            <input type="number" name="numbber_of_adult" value="0" class="qty number_adults">
                            <span class="plus">
                              <i class="la la-plus">
                              </i>
                            </span>
                          </div>
                        </li>
                        <li>
                          <span>{{__('Childrens')}}
                          </span>
                          <div class="shop-details__quantity">
                            <span class="minus">
                              <i class="la la-minus">
                              </i>
                            </span>
                            <input type="number" name="numbber_of_children" value="0" class="qty number_childrens">
                            <span class="plus">
                              <i class="la la-plus">
                              </i>
                            </span>
                          </div>
                        </li>
                      </ul>
                    </div>
                    </div>
                  </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group field-date">
                              <input type="text" name="date" placeholder="{{__('Start Date')}}*" id="pickdate" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group field-date">
                                <input type="text" name="end_date" placeholder="{{__('End Date')}}*"   id="pickdate" autocomplete="off">
                            </div>
                        </div>
                    </div>
                  <input type="hidden" name="type" value="{{\App\Models\Booking::TYPE_BOOKING_FORM}}">
                  <input type="hidden" name="place_id" value="{{$place->id}}">
                 
                  <button class="btn btn-block booking_submit_btn">{{__('Send')}}
                  </button>
               
                  <div class="alert alert-success alert_booking booking_success">
                    <p>
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <path fill="#20D706" fill-rule="nonzero" d="M9.967 0C4.462 0 0 4.463 0 9.967c0 5.505 4.462 9.967 9.967 9.967 5.505 0 9.967-4.462 9.967-9.967C19.934 4.463 15.472 0 9.967 0zm0 18.065a8.098 8.098 0 1 1 0-16.196 8.098 8.098 0 0 1 8.098 8.098 8.098 8.098 0 0 1-8.098 8.098zm3.917-12.338a.868.868 0 0 0-1.208.337l-3.342 6.003-1.862-2.266c-.337-.388-.784-.589-1.207-.336-.424.253-.6.863-.325 1.255l2.59 3.152c.194.252.415.403.646.446l.002.003.024.002c.052.008.835.152 1.172-.45l3.836-6.891a.939.939 0 0 0-.326-1.255z">
                        </path>
                      </svg>
                      {{__('You successfully created your booking.')}}
                    </p>
                  </div>
                  <div class="alert alert-error alert_booking booking_error">
                    <p>
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <path fill="#FF2D55" fill-rule="nonzero"
                              d="M11.732 9.96l1.762-1.762a.622.622 0 0 0 0-.88l-.881-.882a.623.623 0 0 0-.881 0L9.97 8.198l-1.761-1.76a.624.624 0 0 0-.883-.002l-.88.881a.622.622 0 0 0 0 .882l1.762 1.76-1.758 1.759a.622.622 0 0 0 0 .88l.88.882a.623.623 0 0 0 .882 0l1.757-1.758 1.77 1.771a.623.623 0 0 0 .883 0l.88-.88a.624.624 0 0 0 0-.882l-1.77-1.771zM9.967 0C4.462 0 0 4.462 0 9.967c0 5.505 4.462 9.967 9.967 9.967 5.505 0 9.967-4.462 9.967-9.967C19.934 4.463 15.472 0 9.967 0zm0 18.065a8.098 8.098 0 1 1 8.098-8.098 8.098 8.098 0 0 1-8.098 8.098z">
                        </path>
                      </svg>
                      {{__('Your Booking is Pending, We Will Contact You as Soon as Possible.')}}
                    </p>
                  </div>
                </form>
              </aside>
              <!-- .widget-reservation -->
              @elseif($place->booking_type === \App\Models\Booking::TYPE_CONTACT_FORM)
              <aside  id="booking"  class="widget widget-shadow widget-booking-form">
                <h3 class="text-center">{{__('Send me a message')}}
                </h3>
                <form id="booking_submit_form" action="" method="post">
                  @csrf
                 <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <input type="text" id="name" name="name" placeholder="{{__('Enter your name')}} *" class="form-control" required>
                  </div>
                  </div>
                 <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <input type="text" id="email" name="email" placeholder="{{__('Enter your email')}} *" class="form-control" required>
                  </div>
                  </div>
                 <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="{{__('Enter your phone')}}">
                  </div>
                  </div>
                 <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <textarea type="text" id="message" name="message" class="form-control" placeholder="{{__('Enter your message')}}">
                    </textarea>
                  </div>
                  </div>
                  <input type="hidden" name="type" value="{{\App\Models\Booking::TYPE_CONTACT_FORM}}">
                  <input type="hidden" name="place_id" value="{{$place->id}}">
                  <button class="btn btn-block booking_submit_btn">{{__('Send')}}
                  </button>
                  <div class="alert alert-success alert_booking booking_success">
                    <p>
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <path fill="#20D706" fill-rule="nonzero" d="M9.967 0C4.462 0 0 4.463 0 9.967c0 5.505 4.462 9.967 9.967 9.967 5.505 0 9.967-4.462 9.967-9.967C19.934 4.463 15.472 0 9.967 0zm0 18.065a8.098 8.098 0 1 1 0-16.196 8.098 8.098 0 0 1 8.098 8.098 8.098 8.098 0 0 1-8.098 8.098zm3.917-12.338a.868.868 0 0 0-1.208.337l-3.342 6.003-1.862-2.266c-.337-.388-.784-.589-1.207-.336-.424.253-.6.863-.325 1.255l2.59 3.152c.194.252.415.403.646.446l.002.003.024.002c.052.008.835.152 1.172-.45l3.836-6.891a.939.939 0 0 0-.326-1.255z">
                        </path>
                      </svg>
                      {{__('You successfully created your booking.')}}
                    </p>
                  </div>
                  <div class="alert alert-error alert_booking booking_error">
                    <p>
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <path fill="#FF2D55" fill-rule="nonzero"
                              d="M11.732 9.96l1.762-1.762a.622.622 0 0 0 0-.88l-.881-.882a.623.623 0 0 0-.881 0L9.97 8.198l-1.761-1.76a.624.624 0 0 0-.883-.002l-.88.881a.622.622 0 0 0 0 .882l1.762 1.76-1.758 1.759a.622.622 0 0 0 0 .88l.88.882a.623.623 0 0 0 .882 0l1.757-1.758 1.77 1.771a.623.623 0 0 0 .883 0l.88-.88a.624.624 0 0 0 0-.882l-1.77-1.771zM9.967 0C4.462 0 0 4.462 0 9.967c0 5.505 4.462 9.967 9.967 9.967 5.505 0 9.967-4.462 9.967-9.967C19.934 4.463 15.472 0 9.967 0zm0 18.065a8.098 8.098 0 1 1 8.098-8.098 8.098 8.098 0 0 1-8.098 8.098z">
                        </path>
                      </svg>
                      {{__('An error occurred. Please try again.')}}
                    </p>
                  </div>
                </form>
              </aside>
              <!-- .widget-reservation -->
              @else
              <aside class="sidebar--shop__item widget widget--ads">
                @if(setting('ads_sidebar_banner_image'))
                <a title="Ads" href="{{setting('ads_sidebar_banner_link')}}" target="_blank" rel="nofollow">
                  <img src="{{asset('uploads/' . setting('ads_sidebar_banner_image'))}}" alt="banner ads golo">
                </a>
                @endif
              </aside>
              @endif      
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- .place -->
    {{--    
    <div class="similar-places">
      <div class="container">
        <h2 class="similar-places__title title">{{__('Similar places')}}
        </h2>
        <div class="similar-places__content">
          <div class="row">
            @foreach($similar_places as $place)
            <div class="col-lg-3 col-md-6">
              @include('frontend.common.place_item')
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <!-- .similar-places --> --}}
    </main>
  <!-- .site-main -->
@endsection

@push('scripts')
<script src="{{asset('frontend/assets/js/page_place_detail.js')}}"></script>
@endpush