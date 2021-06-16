@extends('layouts.app')

@section('page-title')  {{__('Cities to visit')}}  @endsection

@section('content')
    <main class="site-main normal_view">
        <section class="breadcrumbs-custom bg-image context-dark">
                <div class="breadcrumbs-custom-inner">
                    <div class="container breadcrumbs-custom-container">
                        <div class="breadcrumbs-custom-main" >
                            <h1 class="breadcrumbs-custom-title"> {{__('Cities to visit')}}</h1>
                        </div>
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="{{ route('home')}}">{{__('Home')}}</a></li>
                            <li><a href="{{ route('cities_list')}}">{{__('Cities to visit')}}</a></li>
                        </ul>
                    </div>
                </div>
            </section> 
        <div class="city__container">
            @foreach ($cities as $city)
                <div class="city">
                    <div class="city__image">
                        <div class="wrapper">
                            <a href="{{ route('city_detail', ['slug' => $city->slug]) }}">
                                <img src="{{ asset('uploads/' . $city->thumb) }}" alt="{{ $city->slug }}">
                            </a>
                        </div>
                    </div>
                    <div class="city__body">
                        <div class="head">
                            <a href="{{ route('city_detail', ['slug' => $city->slug]) }}">
                                <h5 class="city__title">{{ $city->name }}</h5>
                            </a>
                            <p class="city__description"> {{ str_limit($city->seo_description, 100) }} </p>
                        </div>
                        <div class="foot">
                            <p class="card-text"><small class="text-muted">{{ $city->places->count() }} -
                                    {{ __('Place') }}</small></p>
                            <a href="{{ route('city_detail', ['slug' => $city->slug]) }}"
                                class="btn mybtn1">{{ __('More') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main><!-- .site-main -->
@endsection
