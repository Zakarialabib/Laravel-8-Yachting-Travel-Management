<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <a class="footer__logo" href="{{__('Home')}}"><img class="img-fluid" src="{{getImageUrl(setting('logo'))}}" alt="Logo"></a>
                    <div class="footer-info">{!! setting('footer_description') !!}</div>
                </div>
                <section class="footer-section">
                    <h3 class="footer-section__title footer-section__title_sm">{{__('Subscribe Newsletter')}}</h3>
                    <form action="#" class="footer-form">
                        <div class="form-group">
                            <input class="footer-form__input form-control" type="email" placeholder="{{__('Enter your email')}}"><i class="ic far fa-envelope-open"></i> </div>
                    </form>
                </section>
            </div>
            <div class="col-lg-3 col-md-6">
                <section class="footer-section footer-section_link pl-5">
                    <h3 class="footer-section__title">{{__('Boat Services')}}</h3>
                    <ul class="footer-list list-unstyled">
                        @foreach ($cat_menu as $cat)
                        <li><a href="{{route('category_detail', $cat->slug)}}">{{$cat->name}}</a></li>
                        @endforeach
                    </ul>
                </section>
            </div>
            <div class="col-lg-3 col-md-6">
                <section class="footer-section footer-section_link footer-section_link_about">
                    <h3 class="footer-section__title">About Saint Yachting</h3>
                    <ul class="footer-list list-unstyled">
                        <li><a href="{{url('/')}}"> {{__('Home')}}</a></li>
                        <li><a href="{{route('about_page')}}">About us</a></li>
                        <li><a href="{{route('offer.index')}}">{{__('Our Fleet')}}</a></li>
                        <li><a href="{{route('contact_page')}}">{{__('Contact us')}}</a></li>
                        <li><a href="{{url('/termes-et-conditions')}}">{{__('Terms and conditions')}}</a></li>
                        <li><a href="{{route('page_sale_conditions')}}">{{__('Sales conditions')}}</a></li>

                    </ul>
                </section>
            </div>
            <div class="col-lg-3 col-md-6">
                <section class="footer-section">
                    <h3 class="footer-section__title">{{__('Get In Touch')}}</h3>
                    <div class="footer-contacts">
                        <div class="footer-contacts__item"><i class="ic icon-location-pin"></i>{{setting('home_adresse')}}</div>
                        <div class="footer-contacts__item"><i class="ic icon-envelope"></i><a href="mailto:support@domain.com">{{setting('home_email')}}</a></div>
                        <div class="footer-contacts__item"><i class="ic icon-earphones-alt"></i> {{__('Phone')}}: <a class="footer-contacts__phone" href="tel:{{setting('home_phone')}}">{{setting('home_phone')}}</a> </div>
                    </div>
                    <ul class="footer-soc list-unstyled">
                        <li class="footer-soc__item"><a class="footer-soc__link"  href="{{setting('social_linkedin')}}"  target="_blank"><i class="ic fab fa-linkedin"></i></a></li>
                        <li class="footer-soc__item"><a class="footer-soc__link"  href="{{setting('social_facebook')}}"  target="_blank"><i class="ic fab fa-facebook-f"></i></a></li>
                        <li class="footer-soc__item"><a class="footer-soc__link"  href="{{setting('social_instagram')}}" target="_blank"><i class="ic fab fa-instagram"></i></a></li>
                        <li class="footer-soc__item"><a class="footer-soc__link"  href="{{setting('social_youtube')}}"   target="_blank"><i class="ic fab fa-youtube"></i></a></li>
                    </ul> </section>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">{{now()->year}} &copy; {{setting('app_name')}}. {{__('All rights reserved.')}}</div>
    </div>
</footer>
<!-- .footer-->