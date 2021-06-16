@extends('layouts.app')
@section('content')
    <main id="main" class="site-main">
        <div class="site-content">
                <div class="page-title page-title--small page-title--blog align-left">
                    <div class="container">
                        <div class="page-title__content">
                            <h1 class="page-title__name">
                                    {{__('Wishlist')}}
                            </h1>
                        </div>
                    </div>
                </div><!-- .page-title -->
            <div class="container" style="position: relative;padding-bottom: 40px;">
                <div style="margin: 20px 0;">
                    <h2 style="text-align: center;font-size: 30px;">{{__('Save here and book later')}}</h2>
                </div> 
                <div class="member-wishlist-wrap">
                    <div class="mw-box">
                        <div class="mw-grid golo-grid grid-4 ">
                            @foreach($places as $place)
                                <div class="grid-item">
                                    @include('frontend.common.place_item')
                                </div>
                            @endforeach
                        </div>
                    </div><!-- .mw-box -->
                </div><!-- .member-wrap -->
            </div>
        </div><!-- .site-content -->
    </main><!-- .site-main -->
@endsection