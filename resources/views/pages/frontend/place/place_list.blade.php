@extends('layouts.app')

@section('content')
    <main id="main" class="site-main">
        <section class="breadcrumbs-custom bg-image context-dark">
                <div class="breadcrumbs-custom-inner">
                    <div class="container breadcrumbs-custom-container">
                        <div class="breadcrumbs-custom-main" >
                            <h1 class="breadcrumbs-custom-title">  {{ __('Places') }}</h1>
                        </div>
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="{{ route('home')}}">{{__('Home')}}</a></li>
                            <li><a href="">{{ __('Places') }}</a></li>
                        </ul>
                    </div>
                </div>
            </section> 
        <div class="container ">
            <div class="">
                <form class="row">
                    <div class="col-md-4 col-sm-4 form-group">
                        <label>{{ __('Select country') }}:</label>
                        <select class="form-control" id="select_category_id" name="country_id"
                            onchange="this.form.submit()">
                            <option value="">{{ __('All Country') }}</option>
                            @foreach ($countries as $country)
                                @if ($country_id)
                                    <option value="{{ $country->id }}" {{ isSelected($country->id, $country_id) }}>
                                        {{ $country->name }}</option>
                                @else
                                    <option value="{{ $country->id }}" {{ isSelected($country->default, 1) }}>
                                        {{ $country->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4 form-group">
                        <label>{{ __('Select city') }}:</label>
                        <select class="form-control" id="select_city_id" name="city_id" onchange="this.form.submit()">
                            <option value="">{{ __('All City') }}</option>
                            @foreach ($cities as $city)
                                @if ($city_id)
                                    <option value="{{ $city->id }}" {{ isSelected($city->id, $city_id) }}>
                                        {{ $city->name }}</option>
                                @else
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4 form-group">
                        <label>{{ __('Select Categories') }}:</label>
                        <select class="form-control" id="select_category_id" name="category_id"
                            onchange="this.form.submit()">
                            <option value="">{{ __('All categories') }}</option>
                            @foreach ($categories as $cat)
                                @if ($cat_id)
                                    <option value="{{ $cat->id }}" {{ isSelected($cat->id, $cat_id) }}>
                                        {{ $cat->name }}</option>
                                @else
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="mw-box">
                <div class="mw-grid golo-grid grid-4 ">
                    @foreach ($places as $place)
                        <div class="grid-item">
                            <div>
                                <div class="places-item hover__box">
                                    <div class="places-item__thumb hover__box__thumb">
                                        <a title="{{ $place->name }}"
                                            href="{{ route('place_detail', $place->slug) }}"><img
                                                src="{{ getImageUrl($place->thumb) }}" alt="{{ $place->name }}"></a>
                                    </div>
                                    <a href="#" class="place-item__addwishlist @if ($place->wish_list_count) remove_wishlist active @else @guest
                                        open-login @else add_wishlist @endguest @endif"
                                        data-id="{{ $place->id }}" title="Add Wishlist">
                                        <i class="la la-bookmark la-24"></i>
                                    </a>
                                    <div class="places-item__info">
                                        <div class="places-item__category">
                                            @foreach ($place['place_types'] as $type)
                                                <a href="#" title="{{ $type->name }}">{{ $type->name }}</a>
                                            @endforeach
                                        </div>
                                        <h3><a href="{{ route('place_detail', $place->slug) }}"
                                                title="{{ $place->name }}">{{ $place->name }}</a></h3>
                                        <div class="place-list__currency">
                                            {{ $place->price }}DH
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div><!-- .mw-box -->
        </div>
    </main><!-- .site-main -->
@endsection
