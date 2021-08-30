<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="travel, tourism, tickets, flight, hotel">
    <meta name="author" content="{{config('app.name')}}">
    <title> {{config('app.name')}} - @yield('page-title')</title>

@include('partials.backend.css')
@yield('css')
<!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-overlay-menu 2-columns fixed-navbar pace-done" data-open="click" data-menu="vertical-overlay-menu" data-col="2-columns">

<!-- fixed-top-->
@include('partials.backend.header')
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>


        @include('partials.backend.sidebar')

        <div class="content-body">

            @yield('content')

        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
{!! Toastr::render() !!}


@include('partials.backend.footer')

<!-- BEGIN VENDOR JS-->
@include('partials.backend.js')
@yield('javascript')
<!-- END PAGE LEVEL JS-->
</body>
