@extends('layouts.app')
@section('content')
<div class="section-title-page area-bg area-bg_dark area-bg_op_60">
    <div class="area-bg__inner">
      <div class="container text-center">
        <h1 class="b-title-page">About Us</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
          </ol>
        </nav>
        <!-- end .breadcrumb-->
      </div>
    </div>
  </div>
  <!-- end .b-title-page-->

  <div class="l-main-content">
    <div class="container">
        <div class="row">
          {!! setting('home_description') !!}
          </div>
    </div>
</div>
@endsection

