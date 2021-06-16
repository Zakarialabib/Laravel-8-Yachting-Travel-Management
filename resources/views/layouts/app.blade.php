<!DOCTYPE html>
<html class="load-full-screen">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">

    {!! SEO::generate() !!}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="{{config('app.name')}}">
    <title>{{config('app.name')}} - @yield('page-title')</title>
    
     @include('partials.frontend.css')
     @yield('css')

     <script type="text/javascript">
        var baseUrl = "{{url("/")}}";
        var path = "{{ route('typeaheadJs') }}";
        var airline_path = "{{route('airlineTypeAheadJs')}}";
    </script>

</head>
<body>

<!-- BEGIN: PRELOADER -->
<div id="loader" class="hidden load-full-screen">
    <div class="loading-animation">
        <p> <i class="fa fa-plane"></i>    </p>
        <p> <i class="fa fa-bed"></i>      </p>
        <p> <i class="fa fa-ship"></i>     </p>
        <p> <i class="fa fa-suitcase"></i> </p>
    </div>
</div>
<!-- END: PRELOADER -->

<!-- BEGIN: SITE-WRAPPER -->
<div class="site-wrapper">
    <!-- BEGIN: NAV SECTION -->
    <section>
        @include('partials.frontend.menu')
    </section>
    <!-- END: NAV SECTION -->

   @yield('content')

    <!-- START: FOOTER -->
    @include('partials.frontend.footer')
    <!-- END: FOOTER -->
</div>
<!-- END: SITE-WRAPPER -->
{!! Toastr::render() !!}

<!-- BEGIN : LOADING PAGE -->
@include('partials.frontend.flight_booking_loader')
@include('partials.frontend.flight_information_loader')
@include('partials.frontend.flight_search_loader')
@include('partials.frontend.flight_multi_search_loader')
@include('partials.frontend.hotel_booking_loader')
@include('partials.frontend.hotel_information_loader')
@include('partials.frontend.hotel_room_information')
@include('partials.frontend.hotel_search_loader')
<!-- END : LOADING PAGE -->

<!-- Load Scripts -->
@include('partials.frontend.javascript')
@yield('javascript')
</body>
</html> 