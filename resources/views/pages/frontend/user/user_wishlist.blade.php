    @extends('layouts.app')
    @section('content')
    <div class="section-title-page area-bg area-bg_dark area-bg_op_60">
        <div class="area-bg__inner">
        <div class="container text-center">
            <h1 class="b-title-page">Wishlist</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{__('Home')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
            </ol>
            </nav>
            <!-- end .breadcrumb-->
        </div>
        </div>
    </div>
    <!-- end .b-title-page-->
        
                <div class="container" style="position: relative;padding-bottom: 40px;">
                    <div style="margin: 20px 0;">
                        <h2 style="text-align: center;font-size: 30px;">{{__('Save here and book later')}}</h2>
                    </div> 
                    <div class="member-wishlist-wrap">
                        <div class="mw-box">
                            <div class="mw-grid golo-grid grid-4 ">
                                @foreach($offers as $offer)
                                    <div class="grid-item">
                                        @include('frontend.common.place_item')
                                    </div>
                                @endforeach
                            </div>
                        </div><!-- .mw-box -->
                    </div><!-- .member-wrap -->
                </div>
            </div><!-- .site-content -->
        </div><!-- .site-main -->
    @stop