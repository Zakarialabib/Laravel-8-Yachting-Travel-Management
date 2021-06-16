<div class="row transparent-menu-top">
    <div class="container clear-padding">
        <div class="navbar-contact">
            <div class="col-md-5 col-sm-6 clear-padding">
                <a href="#" class="transition-effect"><i class="fa fa-phone"></i> {{\App\Services\PortalConfig::$adminBookingsNumber}}</a>
                <a href="#" class="transition-effect"><i class="fa fa-envelope-o"></i> {{\App\Services\PortalConfig::$adminBookingsEmail}}</a>
                <a href="#" class="transition-effect languages">
                    <img src="{{flagImageUrl(\Illuminate\Support\Facades\App::getLocale())}}">
                    @if(count($languages) > 1)
                        <i class="fa fa-angle-down fa-12-black"></i>
                    @endif
                </a>
                @if(count($languages) > 1)
                    <ul>
                        @foreach($languages as $language)
                            @if(\Illuminate\Support\Facades\App::getLocale() !== $language->code)
                                <li><a href="{{route('change_language', $language->code)}}" title="{{$language->name}}"><img src="{{flagImageUrl($language->code)}}">{{$language->name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-md-7 col-sm-6 clear-padding search-box">
                <div class="col-md-5 col-xs-5 clear-padding">
                    <form>
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" required placeholder="{{__('Search')}}">
                            <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
                        </div>
                    </form>
                </div>
                @if(auth()->guest())
                <div class="col-md-7 col-xs-7 clear-padding user-logged">
                  
                </div>
                    @elseif(auth()->user())
                    <div class="col-md-7 col-xs-7 clear-padding user-logged">
                        <a href="{{route('dashboard')}}" class="transition-effect">
                            @if(!empty(\App\Models\Profile::getUserInfo(auth()->user()->id)->photo))
                            <img src="{{asset(\App\Models\Profile::getUserInfo(auth()->user()->id)->photo)}}" alt="{{\App\Models\Profile::getUserInfo(auth()->user()->id)->first_name}}">
                            @else
                            <img src="{{asset('frontend/assets/images/portal_images/user.png')}}" alt="user">
                            @endif
                            {{__('Hi')}}, {{\App\Models\Profile::getUserInfo(auth()->user()->id)->first_name}}
                        </a>
                        <a class="btn btn-primary btn-sm" href="{{route('dashboard')}}">
                            {{__('Bookings')}}  
                        </a>
                        <a href="{{url('/logout')}}" class="transition-effect">
                         {{__('Sign in')}}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>