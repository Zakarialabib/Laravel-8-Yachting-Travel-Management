@extends('layouts.app')
@section('content')
    <main id="main" class="site-main">
        <div class="archive-city">
            <div class="col-left">
                <div class="archive-filter">
                    <form action="#" class="filterForm" id="filterForm">
                        <div class="filter-head">
                            <h2>{{__('Filter')}}</h2>
{{--                            <a href="#" class="clear-filter"><i class="fal fa-sync"></i>Clear all</a>--}}
                            <a href="#" class="close-filter"><i class="las la-times"></i></a>
                        </div>
                        <div class="filter-box">
                            <h3>{{__('cities')}}</h3>
                            <div class="filter-list">
                                <div class="filter-group">
                                    @foreach($cities as $city)
                                        <div class="field-check">
                                            <label class="bc_filter" for="city_{{$city->id}}">
                                                <input type="checkbox" id="city_{{$city->id}}" name="city[]" value="{{$city->id}}" {{isChecked($city->id, $filter_city)}}>
                                                {{$city->name}}
                                                <span class="checkmark"><i class="la la-check"></i></span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <a href="#" class="more open-more" data-close="{{__('Close')}}" data-more="{{__('More')}}">{{__('More')}}</a>
                            </div>
                        </div>
                        <div class="filter-box">
                            <h3>{{__('Activity')}}</h3>
                            <div class="filter-list">
                                <div class="filter-group">
                                    @foreach($categories as $cat)
                                        <div class="field-check">
                                            <label class="bc_filter" for="cat_{{$cat->id}}">
                                                <input type="checkbox" id="cat_{{$cat->id}}" name="category[]" value="{{$cat->id}}" {{isChecked($cat->id, $filter_category)}}>
                                                {{$cat->name}}
                                                <span class="checkmark"><i class="la la-check"></i></span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <a href="#" class="more open-more" data-close="{{__('Close')}}" data-more="{{__('More')}}">{{__('More')}}</a>
                            </div>
                        </div>
                        <div class="form-button align-center">
                            <input type="hidden" name="keyword" value="{{$keyword}}">
                            <a href="#" class="btn">{{__('Apply')}}</a>
                        </div>
                    </form>
                </div><!-- .archive-fillter -->

                <div class="main-primary">
                    <div class="filter-mobile">
                        <ul>
                            <li><a class="mb-filter mb-open" href="#filterForm">{{__('Filter')}}</a></li>
                        </ul>
                    </div>
                    <div class="top-area top-area-filter">
                        <span class="result-count"><span class="count">{{$offers->total()}}</span> {{__('results')}}</span>
{{--                        <a href="#" class="clear">Clear filter</a>--}}
                        <div class="select-box">
                        </div><!-- .select-box -->
                    </div>

                    <div class="area-places">
                        @if($offers->total())
                            @foreach($offers as $offer)
                                <div class="place-item place-hover layout-02" data-maps="">
                                    <div class="place-inner">
                                        <div class="place-thumb">
                                            <a class="entry-thumb" href="{{route('offer.show', $offer->slug)}}"><img src="{{getImageUrl($offer->thumb)}}" alt=""></a>
                                            <a href="#" class="golo-add-to-wishlist btn-add-to-wishlist @if($offer->wish_list_count) remove_wishlist active @else @guest open-login @else add_wishlist @endguest @endif" data-id="{{$offer->id}}">
											<span class="icon-heart">
												<i class="la la-bookmark large"></i>
											</span>
                                            </a>
                                        </div>
                                        <div class="entry-detail">
                                            <div class="entry-head">
                                                <div class="place-city">
                                                    <a href="{{route('page_search_listing', ['city[]' => $offer['city']['id']])}}">{{$offer['city']['name']}}</a>
                                                </div>
                                            </div>
                                            <h3 class="place-title"><a href="{{route('offer.show', $offer->slug)}}">{{$offer->name}}</a></h3>
                                            <div class="entry-bottom">
                                                <div class="place-price">
                                                    <span>{{$offer->price}} DH</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="p-3">
                                <p>{{__('Nothing found!')}}</p>
                                <p>{{__("We're sorry but we do not have any listings matching your search, try to change you search settings")}}</p>
                            </div>
                        @endif
                    </div>
                    <div class="pagination">
                        {{$offers->render('frontend.common.pagination')}}
                    </div>
                </div><!-- .main-primary -->
            </div><!-- .col-left -->
        </div><!-- .archive-city -->
    </main><!-- .site-main -->
@endsection

@push('scripts')
    <script src="{{asset('frontend/assets/js/page_business_category.js')}}"></script>
    <script>
    $( '.close-filter' ).on( 'click', function() {
            $( this ).parents( 'form' ).fadeOut();
            $( this ).parents( '.archive-filter' ).fadeOut();
        });
        </script>
@endpush