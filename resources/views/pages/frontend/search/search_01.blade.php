@extends('layouts.app')
@section('content')
<div class="section-title-page area-bg area-bg_dark area-bg_op_60">
    <div class="area-bg__inner">
        <div class="container text-center">
            <h1 class="b-title-page">Search Results</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Search Results</li>
                </ol>
            </nav>
            <!-- end .breadcrumb-->

        </div>
    </div>
</div>
<!-- end .b-title-page-->
<div class="l-main-content">
    <div class="ui-decor ui-decor_mirror ui-decor_sm-h bg-primary"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <aside class="l-sidebar l-sidebar_top_minus">
                    <div class="widget section-sidebar bg-gray">
                        <h3 class="widget-title row justify-content-between align-items-center no-gutters"><span
                                class="widget-title__inner col">Search Options</span><i
                                class="ic flaticon-car-repair col-auto"></i></h3>
                        <div class="widget-content">
                            <div class="widget-inner">
                                <form action="#" class="b-filter" id="filterForm">
                                    <div class="b-filter__main row">
                                    <div class="b-filter__row col-xl-12 col-md-6">
                                        @foreach($categories as $cat)
                                            <div class="field-check">
                                                <label class="bc_filter" for="cat_{{ $cat->id }}">
                                                    <input type="checkbox" id="cat_{{ $cat->id }}" name="category[]"
                                                        value="{{ $cat->id }}"
                                                        {{ isChecked($cat->id, $filter_category) }}>
                                                    {{ $cat->name }}
                                                    <span class="checkmark"><i class="la la-check"></i></span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="form-button align-center">
                                        <input type="hidden" name="keyword" value="{{ $keyword }}">
                                        <a href="#" class="b-filter__reset btn btn-secondary w-100">{{ __('Apply') }}</a>
                                    </div>
                               </div>
                            </form>
                        <div>
                      <div>
                   <div>
                </aside>
            </div>

            <div class="col-xl-9">
                <div class="top-area top-area-filter">
                    <span class="result-count"><span class="count">{{ $offers->total() }}</span>
                        {{ __('results') }}</span>
                    {{-- <a href="#" class="clear">Clear filter</a> --}}
                    <div class="select-box">
                    </div><!-- .select-box -->
                </div>

                <div class="b-goods-group-2 row">
                    @if($offers->total())
                        @foreach($offers as $offer)
                            <div class="col-xl-4 col-md-6">
                                <div class="b-goods-flip">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="flip__front">
                                                <a href="{{ route('offer.show', $offer->slug) }}">
                                                <div class="b-goods-flip__img">
                                                    @php
                                                    $photos=explode(',',$offer->thumb);
                                                    // dd($photo);
                                                    @endphp
                                                    <img class="img-scale" src="{{$photos[0]}}" alt="photo"/>
                                                </div>
                                                <div class="b-goods-flip__main">
                                                    <div class="b-goods-flip__header row no-gutters align-items-center">
                                                       <div class="col">{{ $offer->name }}</div>
                                                        <div class="col-auto">{{ $offer->price }} </div>
                                                    </div>
                                                    <div class="b-goods-descrip_nev_wrap">
                                                        <div class="b-ex-info">{!! Str::limit($offer->description, 200) !!}</div>
                                                        <a href="{{ route('offer.show', $offer->slug) }}" class="btn btn-default w-100">{{__('Read More')}}</a>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="p-3">
                            <p>{{ __('Nothing found!') }}</p>
                            <p>{{ __("We're sorry but we do not have any listings matching your search, try to change you search settings") }}
                            </p>
                        </div>
                    @endif
                </div>
                <div class="pagination">
                    {{ $offers->render('frontend.common.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('frontend/assets/js/page_business_category.js') }}"></script>
@endpush
