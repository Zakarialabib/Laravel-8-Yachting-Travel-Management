@extends('layouts.app')

@section('page-title')  {{__('Category detail')}}  @endsection

@section('content')
 
<div class="section-title-page area-bg area-bg_dark area-bg_op_60">
    <div class="area-bg__inner">
        <div class="container text-center">
            <h1 class="b-title-page">{{ $category->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
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
        @foreach ($category->offers as $offer)
        <div class="fl--events-wrap">
            <div class="fl--events-featured-content-vc">
                <div class="fl-events--featured-post post-209 events type-events status-publish has-post-thumbnail hentry">
                    <div class="fl-events-left-content col-md-6"> 
                        @php
                        $photos=explode(',',$offer->thumb);
                        // dd($photo);
                        @endphp
                        <img src="{{$photos[0]}}" alt="{{$offer->name}}" />

                    </div>
                    <div class="fl-events-right-content col-md-6">

                        <h3 class="fl-entry-title"><a href="{{ route('offer.show', $offer->slug) }}">{{ $offer->name }}</a></h3>

                        <div class="fl-events-excerpt">
                            <p> {!!Str::limit($offer->description) !!}</p>
                        </div>
                        <a class="btn btn-primary" href="{{ route('offer.show', $offer->slug) }}">{{__('Read More')}}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach



    </div>
</div>
@endsection
