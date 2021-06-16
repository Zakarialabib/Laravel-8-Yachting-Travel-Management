<section>
    <footer id="footer" class="footer">
            <div class="container-fluid">
                <div class="footer__top row">
                        <div class="col-lg-4 col-sm-4">
                            <div class="footer__top__info">
                                <a title="Logo" href="#" class="footer__top__info__logo"><img src="{{asset('backend/app-assets/images/logo/logo.png')}}" alt="logo"></a>
                                <p class="footer__top__info__desc">{{setting('footer_description')}}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <aside class="footer__top__nav">
                             <h3>{{__('Quick Links')}}</h3>
                               {!! $footer_menu !!}
                            </aside>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <aside class="footer__top__nav footer__top__nav--contact">
                                <h3>{{__('Contact Us')}}</h3>
                                <p><i class="la la-map-marker la-24" style="color: #ee5000;"></i><a target="_blank" rel="noopener noreferrer" href="https://goo.gl/maps/JmDVU6ChhN8TWtj28" style="color: #fff;" title="{{__('Get Direction')}}">  {{setting('home_adresse')}}</a> </p>
                                <p><i class="la la-envelope la-24" style="color: #ee5000;"></i><a title="email" target="_blank" rel="noopener noreferrer" href="mailto:{{setting('home_email')}}" style="color: #fff;">  {{setting('home_email')}}</a> </p>
                                <p><i class="la la-phone la-24" style="color: #ee5000;"></i> <a title="phone" target="_blank" rel="noopener noreferrer"  href="tel:{{setting('home_phone')}}" style="color: #fff;"> {{setting('home_phone')}}</a></p>
                            </aside>
                                <form action="#" class="footer-subscribe">
                                    <div class="footer_subscribe">
                                        <input type="email" name="email" placeholder="{{__('Enter your email')}}" value="">
                                    </div>
                                    <button><i class="las la-arrow-right"></i></button>
                                </form>
                                <p class="footer_subscribe_desc">{{__('Sign up to receive our best offers.')}}</p>
                        </div>
                </div><!-- .top-footer -->
                <div class="footer__bottom">
            <p class="footer__bottom__copyright">
               <a class="social-media" title="Facebook" target="_blank" rel="noopener noreferrer" href="{{setting('social_facebook')}}">
                  <i class="la la-facebook la-24"></i>
                </a>
               <a class="social-media" title="Instagram" target="_blank" rel="noopener noreferrer" href="{{setting('social_instagram')}}">
                        <i class="la la-instagram la-24"></i>
                    </a>
                           <a class="social-media" title="Linkedin" target="_blank" rel="noopener noreferrer" href="{{setting('social_linkedin')}}">
                        <i class="la la-linkedin la-24"></i>
                    </a>
                <a class="social-media" title="Youtube" target="_blank" rel="noopener noreferrer" href="{{setting('social_youtube')}}">
                        <i class="la la-youtube la-24"></i>
               </a>
             
             </p>
              <p class="footer__bottom__copyright">
                    <a title="CMI">
                    <img class="footer_icns" src="{{asset('images/cmi/cmi_logo_1.png')}}" alt="CMI">
                    <img class="footer_icns" src="{{asset('images/cmi/cmi_logo_2.png')}}" alt="CMI">
                    <img class="footer_icns" src="{{asset('images/cmi/cmi_logo_3.png')}}" alt="CMI">
                    </a>
                </p>
                <p class="footer__bottom__copyright">{{now()->year}} &copy; {{setting('app_name')}}. {{__('All rights reserved.')}}</p>
                </div><!-- .top-footer -->
            </div><!-- .container -->
        </footer><!-- site-footer -->
</section>