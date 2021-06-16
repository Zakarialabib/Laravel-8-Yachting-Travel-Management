@extends('layouts.app')

@section('page-title')  {{__('City detail')}}  @endsection

@php
$banner_img = getImageUrl($city->banner);
$page_title_bg = "style=background-image:url({$banner_img});";
@endphp

@section('content')
    <main class="site-main normal_view">
    <section class="breadcrumbs-custom bg-image context-dark" {!! $page_title_bg !!}>
                <div class="breadcrumbs-custom-inner">
                    <div class="container breadcrumbs-custom-container">
                        <div class="breadcrumbs-custom-main" >
                            <h1 class="breadcrumbs-custom-title"> {{ $city->name }}</h1>
                        </div>
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="{{ route('home')}}">{{__('Home')}}</a></li>
                            <li><a href="{{ route('cities_list')}}">{{__('City')}}</a></li>
                            <li><a href="">{{ $city->name }}</a></li>
                        </ul>
                    </div>
                </div>
            </section> 
        <div class="city-content">
            <div class="city-content__panels">
                <div class="container">
                        <div class="city-content__panel" id="inspire">
                            @foreach ($city->places as $place)
                                <div class="city-content__item">
                                    @if (count($city->places))
                                        <div class="city-slider">
                                            <div class="city-slider__grid">
                                                    @include('frontend.common.place_item')
                                            </div><!-- .city-slider__grid -->
                                            <div class="city-slider__nav slick-nav">
                                                <div class="city-slider__prev slick-nav__prev">
                                                    <i class="la la-arrow-left la-24"></i>
                                                </div><!-- .city-slider__prev -->
                                                <div class="city-slider__next slick-nav__next">
                                                    <i class="la la-arrow-right la-24"></i>
                                                </div><!-- .city-slider__next -->
                                            </div><!-- .city-slider__nav -->
                                        </div><!-- .city-slider -->
                                    @else
                                        {{ __('No places') }}
                                    @endif
                                </div><!-- .city-content__item -->
                            @endforeach
                        </div><!-- .city-content__panel -->

                </div>
            </div><!-- .city-content__panel -->
        </div><!-- .city-content -->

        <div class="other-city banner-dark">
            <div class="container">
                <h2 class="title title--while">{{ __('Explorer Other Cities') }}</h2>
                <div class="other-city__content">
                    <div class="row">
                        @if (count($other_cities))
                            @foreach ($other_cities as $city)
                                <div class="col-lg-3 col-md-6 col-xs-6">
                                    <div class="cities__item hover__box">
                                        <div class="cities__thumb hover__box__thumb">
                                            <a href="{{ route('city_detail', $city->slug) }}" title="{{ $city->name }}">
                                                <img src="{{ getImageUrl($city->thumb) }}" alt="{{ $city->name }}">
                                            </a>
                                        </div>
                                        <h4 class="cities__name">{{ $city['country']['name'] }}</h4>
                                        <div class="cities__info">
                                            <h3 class="cities__capital">{{ $city->name }}</h3>
                                            <p class="cities__number">{{ $city->places_count }} {{ __('places') }}</p>
                                        </div>
                                    </div><!-- .cities__item -->
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12">
                                {{ __('No cities') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- .other-city -->
    </main><!-- .site-main -->
@stop

@push('scripts')
    <script type="text/javascript" src="{{ asset('frontend/assets/js/page_city_detail.js') }}"></script>
@endpush
