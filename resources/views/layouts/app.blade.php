<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {!! SEO::generate() !!}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="{{config('app.name')}}">
    <title>{{config('app.name')}} - @yield('page-title')</title>
    
     @include('partials.frontend.css')
     @yield('css')


</head>
<body class="page">

<!-- BEGIN: PRELOADER -->
<div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span></div>
<!-- END: PRELOADER -->

<!-- BEGIN: SITE-WRAPPER -->
<div class="l-theme animated-css" data-header="sticky" data-header-top="200" data-canvas="container">
    <!-- BEGIN: NAV SECTION -->
    @include('partials.frontend.menu')
    <!-- END: NAV SECTION -->

   @yield('content')

    <!-- START: FOOTER -->
    @include('partials.frontend.footer')
    <!-- END: FOOTER -->
</div>
<!-- END: SITE-WRAPPER -->

{!! Toastr::render() !!}

<!-- Load Scripts -->
@include('partials.frontend.javascript')
@yield('javascript')
</body>
</html> 