<header id="header" class="site-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xs-6 col-sm-6 clear-padding">
                <div class="site">
                    <div class="site__menu">
                        <a title="Menu Icon" href="#" class="site__menu__icon">
                            <i class="la la-bars la-20"></i>
                        </a>
                        <div class="popup-background"></div>
                        <div class="popup popup--left">
                            <a title="Close" href="#" class="popup__close">
                                <i class="la la-times la-20"></i>
                            </a><!-- .popup__close -->
                            <div class="popup__content">
                                @guest
                                <div class="popup__user popup__box open-form">
                                    <a title="Login" href="{{url('/login')}}" class="">{{__('Login')}}</a>
                                    <a title="Sign Up" href="{{url('/register')}}" class="">{{__('Sign Up')}}</a>
                                </div>
                                @else
                                <div class="account js-user-auth">
                                    <a href="#" title="{{Auth::user()->name}}">
                                        <span class="account-side">
                                            {{Auth::user()->name}}
                                            <i class="la la-angle-down la-12"></i>
                                        </span>
                                    </a>
                                    <div class="account-sub">
                                        <ul>
                                            <li class=""><a href="{{route('user_wishlist')}}">{{__('Wishlist')}}</a>
                                            </li>
                                            <li>
                                                <a href=""
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Logout')}}</a>
                                                <form class="d-none" id="logout-form" action="" method="POST">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- .account -->
                                @endguest

                                <div class="popup__menu popup__box">
                                    
                                        {!! $sidebar !!}

                                </div><!-- .popup__menu -->
                            </div><!-- .popup__content -->
                            <div class="menu-border">
                                <a title="Facebook" target="_blank" rel="noopener noreferrer" href="{{setting('social_facebook')}}">
                                    <i class="la la-facebook la-24"></i>
                                </a>
                                 <a title="Instagram" target="_blank" rel="noopener noreferrer" href="{{setting('social_instagram')}}">
                                    <i class="la la-instagram la-24"></i>
                                </a>
                             <a title="Linkedin" target="_blank" rel="noopener noreferrer" href="{{setting('social_linkedin')}}">
                                <i class="la la-linkedin la-24"></i>
                                </a>
                               <a title="Youtube" target="_blank" rel="noopener noreferrer" href="{{setting('social_youtube')}}">
                                    <i class="la la-youtube la-24"></i>
                                </a>
                            </div><!-- .popup__button -->
                        </div><!-- .popup -->
                    </div><!-- .site__menu -->
                    <div class="site__brand">
                        <a title="Logo" href="{{url('/')}}" class="site__brand__logo"><img
                                src="{{asset('backend/app-assets/images/logo/logo.png')}}" alt="logo"></a>
                    </div><!-- .site__brand -->
                </div><!-- .site -->
            </div><!-- .col-md-6 -->


            <div class="col-md-9 col-xs-6 col-sm-6 clear-padding user-logged">
                <div class="right-header text-right">
                   <div class="right-header social_md" style="line-height: 1;">
                        <a title="Facebook" target="_blank" rel="noopener noreferrer" href="{{setting('social_facebook')}}">
                            <i class="la la-facebook la-20"></i>
                        </a>
                        <a title="Instagram" target="_blank" rel="noopener noreferrer" href="{{setting('social_instagram')}}">
                            <i class="la la-instagram la-20"></i>
                        </a>
                        <a title="linkedin" target="_blank" rel="noopener noreferrer" href="{{setting('social_linkedin')}}">
                            <i class="la la-linkedin la-20"></i>
                        </a>
                        <a title="Youtube" target="_blank" rel="noopener noreferrer" href="{{setting('social_youtube')}}">
                            <i class="la la-youtube la-20"></i>
                        </a>
                    </div>
                    <!--.right-header__destinations -->
                    <div class="right-header__languages">
                        <a href="#" style="color: white;font-size: 17px;text-transform: capitalize;">
                          {{ (app()->getLocale()) }}
                             @if(count($languages) > 1)
                            <i class="las la-angle-down la-12"></i>
                            @endif
                        </a>
                        @if(count($languages) > 1)
                        <ul>
                            @foreach($languages as $language)
                            @if(\Illuminate\Support\Facades\App::getLocale() !== $language->code)
                            <li><a href="{{route('change_language', $language->code)}}" title="{{$language->name}}"><img
                                        src="{{flagImageUrl($language->code)}}"></a></li>
                            @endif
                            @endforeach
                        </ul>
                        @endif
                    </div>
                        
                    @if(auth()->guest())
                     <div class="account">
                       <a style="color: white;font-size: 17px;cursor: pointer;">
                          {{__('account')}}
                             <i class="la la-angle-down la-12"></i>
                         </a>
                      <div class="account-sub">
                       <ul>
                            <li>
                                <a href="{{url('/login')}}" >{{__('Sign in')}} </a>
                            </li>
                            <li>
                                <a title="Sign Up"  href="{{url('/register')}}">{{__('Sign Up')}}</a>
                            </li>
                        </ul>
                       </div> 
                    </div><!-- .account -->
                    @elseif(auth()->user())
                    <div class="account js-user-auth">
                        <a href="#" style="color: white;" title="{{Auth::user()->name}}">
                            @if(!empty(\App\Models\Profile::getUserInfo(auth()->user()->id)->photo))
                            <img src="{{asset(\App\Models\Profile::getUserInfo(auth()->user()->id)->photo)}}"
                                alt="{{\App\Models\Profile::getUserInfo(auth()->user()->id)->first_name}}">
                            @else
                            <img src="{{asset('frontend/assets/images/portal_images/user.png')}}" alt="user">
                            @endif
                            Hi, {{\App\Models\Profile::getUserInfo(auth()->user()->id)->first_name}}
                            <span>
                                {{Auth::user()->name}}
                                <i class="la la-angle-down la-12"></i>
                            </span>
                        </a>
                        <div class="account-sub">
                            <ul>
                                <li class=""><a href="{{route('dashboard')}}" target="_blank"
                                        rel="nofollow">{{__('Dashboard')}}</a></li>
                                <li class=""><a href="{{route('user_wishlist')}}"
                                        rel="nofollow">{{__('Wishlist')}}</a></li>
                                <li><a href="{{url('/logout')}}" target="_blank"
                                        rel="nofollow">{{__('Log out')}}</a></li>
                            </ul>
                        </div>
                    </div><!-- .account -->
                    @endif
                </div><!-- .right-header -->
            </div><!-- .col-md-6 -->
        </div><!-- .row -->
    </div><!-- .container-fluid -->
</header><!-- .site-header -->