<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" navigation-header">
                <span data-i18n="nav.category.layouts">{{ __('Menu') }}</span>
                <i class="la la-ellipsis-h la la-minus" data-toggle="tooltip" data-placement="right"
                    data-original-title="Layouts"></i>
            </li>

            <li class="@yield('activeDashboard') nav-item">
                <a href="{{ route('dashboard') }}">
                    <i class="la la-dashboard"></i>
                    <span class="menu-title">{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li class="@yield('activebooking_list') nav-item">
                <a href="{{ route('booking_list') }}">
                    <i class="la la-money"></i>
                    <span class="menu-title">{{ __('Booking list') }}</span>
                </a>
            </li>


            <li class="@yield('activePlace') nav-item"><a href="#"><i class="la la-users"></i><span
                        class="menu-title">{{ __('Offers') }}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="#">{{ __('Special Offers') }}</a>
                        <ul class="menu-content">
                            <li><a class="menu-item"
                                    href="{{ route('place_list') }}">{{ __('Special Offers List') }}</a>
                            </li>
                            <li><a class="menu-item"
                                    href="{{ route('category_list', \App\Models\Category::TYPE_PLACE) }}">{{ __('Place Type List') }}</a>
                            </li>
                            <li><a class="menu-item"
                                    href="{{ route('amenities_list') }}">{{ __('Amenities List') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="menu-item" href="#">{{ __('Offers') }}</a>
                        <ul class="menu-content">
                            <li><a class="menu-item"
                                    href="{{ route('offer_list') }}">{{ __('Offers List') }}</a>
                            </li>
                            <li><a class="menu-item"
                                    href="{{ route('category_list', \App\Models\Category::TYPE_OFFER) }}">{{ __('Offers Category List') }}</a>
                            </li>
                            <li><a class="menu-item"
                                    href="{{ route('category_type_list') }}">{{ __('Offers Category Type List') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="menu-item"
                            href="{{ route('city_list') }}">{{ __('Cities List') }}</a>
                    </li>
                    <li><a class="menu-item"
                            href="{{ route('country_list') }}">{{ __('Countries List') }}</a>
                    </li>
                </ul>
            </li>

            <li class="@yield('activePost') nav-item"><a href="#"><i class="la la-bank"></i><span
                        class="menu-title">{{ __('Manage Pages') }} </span></a>
                <ul class="menu-content">
                    <li><a class="menu-item"
                            href="{{ route('post_list_blog') }}">{{ __('All Posts') }}</a>
                    </li>
                    <li><a class="menu-item"
                            href="{{ route('category_list', \App\Models\Category::TYPE_POST) }}">{{ __('Categories List') }}</a>
                    </li>
                    <li><a class="menu-item"
                            href="{{ route('post_list_page') }}">{{ __('Pages Management') }}</a>
                    </li>
                    <li><a class="menu-item"
                            href="{{ route('faq') }}">{{ __('Termes et Conditions') }}</a>
                    </li>
                    <li><a class="menu-item"
                            href="{{ route('slides.index') }}">{{ __('Slides') }}</a>
                    </li>
                </ul>
            </li>

            <li class="@yield('activeCommercial') nav-item"><a href="#"><i class="la la-home"></i><span
                        class="menu-title">{{ __('Administration') }}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="#">{{ __('Users') }}</a>
                        <ul class="menu-content">
                            <li><a class="menu-item"
                                    href="{{ route('users.management') }}">{{ __('Users List') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="menu-item" href="#">{{ __('Sales') }}</a>
                        <ul class="menu-content">
                            <li><a class="menu-item"
                                    href="{{ route('sale_create_view') }}">{{ __('Create New') }}</a>
                            </li>
                            <li><a class="menu-item"
                                    href="{{ route('sale_list') }}">{{ __('Sale List') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="menu-item" href="#">{{ __('Purchase') }}</a>
                        <ul class="menu-content">
                            <li><a class="menu-item"
                                    href="{{ route('purchase_create_view') }}">{{ __('Create New') }}</a>
                            </li>
                            <li><a class="menu-item"
                                    href="{{ route('purchase_list') }}">{{ __('Purchase List') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="menu-item" href="#">{{ __('Return') }}</a>
                        <ul class="menu-content">
                            <li><a class="menu-item"
                                    href="{{ route('return_create_view') }}">{{ __('Create New') }}</a>
                            </li>
                            <li><a class="menu-item"
                                    href="{{ route('return_list') }}">{{ __('Return List') }}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a class="menu-item" href="#" data-i18n="nav.templates.vert.main"><i
                        class="la la-money"></i>{{ __('Subscribers') }}</a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('admin.newsletter') }}"
                            data-i18n="nav.templates.vert.main">{{ __('Subscribers') }}</a></li>
                    <li><a class="menu-item" href="{{ route('admin.mailsubscriber') }}"
                            data-i18n="nav.templates.horz.main">{{ __('Mail to Subscribers') }}</a>
                    </li>
                </ul>
            </li>

            

            <li class="nav-item @yield('activeSettings')"><a href="#"><i class="la la-cogs"></i><span
                        class="menu-title">{{ __('Settings') }}</span></a>
                <ul class="menu-content">
                    <li class="menu-item"><a
                            href="{{ route('profile') }}">{{ __('Manage Profile') }}</a>
                    </li>
                    <li><a class="menu-item"
                            href="{{ route('clear-cache') }}">{{ __('Clear Cache') }}
                        </a></li>
                    <li><a class="menu-item" href="{{ route('settings') }}">
                            {{ __('Home Settings') }}</a></li>
                    <li><a class="menu-item"
                            href="{{ url('settings/vats') }}">{{ __('Vats') }}</a>
                    </li>
               
            <li><a href="{{ url('settings/language') }}"> {{ __('Language') }}</a>
            </li>
          
        </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.logout') }}">
                <i class="la la-sign-out"></i>
                <span class="menu-title">{{ __('Log Out') }}</span>
            </a>
        </li>
        </ul>
    </div>
</div>
