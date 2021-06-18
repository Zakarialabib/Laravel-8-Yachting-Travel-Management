<!-- ==========================-->
<!-- SEARCH MODAL-->
<!-- ==========================-->
<div class="header-search open-search">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 col-10 offset-1">
                <div class="navbar-search">
                    <form class="search-global" action="{{route('page_search_listing')}}" >
                        <input class="search-global__input" name="keyword"  type="text" placeholder="Type to search" autocomplete="off" value="" />
                        <input type="hidden" name="category[]" id="category_id">
                        <input type="hidden" name="cities[]" id="city_id">
                        <button class="search-global__btn"><i class="icon stroke icon-Search"></i></button>
                        <div class="search-global__note">Begin typing your search above and press return to search.</div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <button class="search-close close" type="button"><i class="fa fa-times"></i></button>
</div>
<!-- ==========================-->
<!-- MOBILE MENU-->
<!-- ==========================-->
<div data-off-canvas="mobile-slidebar left overlay">
    <ul class="navbar-nav">
        <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">{{__('Home')}}</a></li>
        <li class="nav-item "><a class="nav-link" href="about.html">About</a></li>
        <li class="nav-item "><a class="nav-link" href="listing.html">Boats Listing</a></li>
        <li class="nav-item "><a class="nav-link" href="tours.html">Tours</a></li>
        <li class="nav-item "><a class="nav-link" href="blog.html">News</a></li>
        <li class="nav-item"><a class="nav-link" href="contacts.html">Contact</a></li>
    </ul>
</div>
<header class="header header-slider">
    <div class="top-bar">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <div class="top-bar__item"><i class="fas fa-phone-square"></i> <a href="tel:{{setting('home_phone')}}">{{setting('home_phone')}}</a> </div>
                    <div class="top-bar__item"><i class="fas fa-envelope-square"></i> <a href="tel:{{setting('home_email')}}">{{setting('home_email')}}</a> </div>
                </div>
                <div class="col-auto">
                    <ul class="header-soc list-unstyled">
                        <li class="header-soc__item"><a class="header-soc__link" href="{{setting('social_linkedin')}}" target="_blank"><i class="ic fab fa-linkedin"></i></a></li>
                        <li class="header-soc__item"><a class="header-soc__link" href="{{setting('social_facebook')}}" target="_blank"><i class="ic fab fa-facebook-f"></i></a></li>
                        <li class="header-soc__item"><a class="header-soc__link" href="{{setting('social_instagram')}}" target="_blank"><i class="ic fab fa-instagram"></i></a></li>
                        <li class="header-soc__item"><a class="header-soc__link" href="{{setting('social_youtube')}}" target="_blank"><i class="ic fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <a class="navbar-brand navbar-brand_light scroll" href="{{url('/')}}"> <img class="normal-logo img-fluid" src="{{asset('backend/app-assets/images/logo/logo.png')}}" alt="logo" /> </a>
                    <a class="navbar-brand navbar-brand_dark scroll" href="{{url('/')}}"><img class="normal-logo img-fluid" src="{{asset('backend/app-assets/images/logo/logo.png')}}" alt="logo" /></a>
                </div>
                <div class="col-auto d-xl-none">
                    <!-- Mobile Trigger Start-->
                    <button class="menu-mobile-button js-toggle-mobile-slidebar toggle-menu-button"><i class="toggle-menu-button-icon"><span></span><span></span><span></span><span></span><span></span><span></span></i></button>
                    <!-- Mobile Trigger End-->
                </div>
                <div class="col-xl d-none d-xl-block">
                    <nav class="navbar navbar-expand-lg justify-content-end" id="nav">
                        <ul class="yamm main-menu navbar-nav">
                            <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">{{__('Home')}}</a> </li>
                            <li class="nav-item "><a class="nav-link" href="about.html">About Us</a> </li>
                            {{-- {!! $sidebar !!} --}}
                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#">Our Fleet</a>
                                <div class="dropdown-menu"> 
                                    <a class="dropdown-item" href="listing.html">Boats Listing 1</a> 
                                    <a class="dropdown-item" href="listing-sidebar.html">Boats Listing 2</a> 
                                    <a class="dropdown-item" href="details.html">Boats Details</a> 
                                </div>
                            </li>
                            
                            <li class="nav-item"><a class="nav-link" href="contacts.html">Contact</a></li>
                          
                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#">{{ (app()->getLocale()) }}</a>
                                @if(count($languages) > 1)
                                <div class="dropdown-menu"> 
                                    @foreach($languages as $language)
                                        @if(\Illuminate\Support\Facades\App::getLocale() !== $language->code)
                                        <a class="dropdown-item" href="{{route('change_language', $language->code)}}" title="{{$language->name}}"><img
                                                    src="{{flagImageUrl($language->code)}}"></a>
                                        @endif
                                    @endforeach
                                </div>
                                @endif
                            </li>

                            @guest
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"> Account</a>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('/login')}}">{{__('Login')}}</a>
                                <a class="dropdown-item" href="{{url('/register')}}">{{__('Sign Up')}}</a>
                                </div>
                            </li>
                            @else
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"><i class="fa fa-user"></i>{{Auth::user()->name}}</a>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('dashboard')}}">{{__('Dashboard')}}</a>
                                <a class="dropdown-item" href="{{route('user_wishlist')}}">{{__('Wishlist')}}</a>
                                <a class="dropdown-item" href=""
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Logout')}}</a>
                                <form class="d-none" id="logout-form" action="" method="POST">
                                    @csrf
                                </form>
                                </div>
                            </li>
                            @endguest

                        </ul> <span class="header-main__link btn_header_search"><i class="ic icon-magnifier"></i></span>
                        <button class="header-main__btn btn btn-secondary">Book Now</button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end .header-->


                                   

                           
                