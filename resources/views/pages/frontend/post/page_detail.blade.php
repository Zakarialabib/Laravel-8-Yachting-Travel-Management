@extends('layouts.app')

@section('content')
    <main id="main" class="site-main">
    <section class="breadcrumbs-custom bg-image context-dark">
            <div class="breadcrumbs-custom-inner">
                <div class="container breadcrumbs-custom-container">
                    <div class="breadcrumbs-custom-main" >
                        <h1 class="breadcrumbs-custom-title">{{$post->title}}</h1>
                    </div>
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="{{ route('home')}}">{{__('Home')}}</a></li>
                        <li><a href="{{ route('post_list_all')}}">{{__('Blog')}}</a></li>
                        <li class="active"><a href=""></a>{{$post->title}}</li>
                    </ul>
                </div>
             </div>
        </section>
        <div class="site-content">
            <div class="page-content container">

                {!! $post->content !!}

            </div>
      
            <div class="container page-container">
             <div class="row" style="border: solid 1px #0000000a;background-color: whitesmoke;margin-bottom: 50px;">
                    <div class="col-md-5 col-sm-5 ">
                        <div class="contact-text">
                            <h2>{{__('Open hours')}}</h2>
                            <p>{{__('Lundi - Vendredi')}} | 09h (am) - 18h (pm) </p>
                            <div class="contact-box">
                                <p{{__('Contact information')}}</p>
                                <p><i class="la la-map-marker la-24" style="color: #ee5000;"></i><a href="https://goo.gl/maps/JmDVU6ChhN8TWtj28" style="color: #000;" title="{{__('Get Direction')}}"> {{setting('home_adresse')}}</a></p>
                                <p><i class="la la-envelope la-24" style="color: #ee5000;"></i><a title="email" target="_blank" rel="nofollow" style="color: #000;" href="mailto:{{setting('home_email')}}"> {{setting('home_email')}}</a></p>
                                <p><i class="la la-phone la-24" style="color: #ee5000;"></i><a title="phone" target="_blank" rel="nofollow" style="color: #000;" href="tel:{{setting('home_phone')}}"> {{setting('home_phone')}}</a></p>
                            </div>
                            <div class="contact-social">
                            <a title="Facebook" style="color: #ee5000;" href="{{setting('social_facebook')}}">
                                        <i class="la la-facebook la-24"></i>
                                    </a>
                          <a title="Instagram" style="color: #ee5000;" href="{{setting('social_instagram')}}">
                                        <i class="la la-instagram la-24"></i>
                                    </a>
                                    <a title="Youtube" style="color: #ee5000;" href="{{setting('social_youtube')}}">
                                        <i class="la la-youtube la-24"></i>
                                    </a>
                                    </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <div class="contact-form">
                            @include('frontend.common.box-alert')
                            <h2>{{__('Get in touch with us')}}</h2>
                            <form action="{{route('send')}}" method="POST" class="form-underline">
                                @csrf
                                <div class="field-inline">
                                    <div class="field-input col-lg-12">
                                        <input type="text" name="first_name" placeholder="{{__('First name')}} *" required>
                                    </div>
                                    <div class="field-input col-lg-12">
                                        <input type="text" name="last_name" placeholder="{{__('Last name')}} *" required>
                                    </div>
                                </div>
                                <div class="field-inline">
                                <div class="field-input col-lg-12">
                                    <input type="email" name="email" placeholder="{{__('Email')}} *" required>
                                </div>
                                <div class="field-input col-lg-12">
                                    <input type="tel" name="phone_number" placeholder="{{__('Phone number')}} *" required>
                                </div>
                                </div>
                                <div class="field-textarea">
                                    <textarea name="note" placeholder="{{__('Message')}}"></textarea>
                                </div>
                                <div class="field-submit">
                                    <input type="submit" value="{{__('Send Message')}}" class="btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                            </div>
        </div><!-- .site-content -->
    </main><!-- .site-main -->
@endsection