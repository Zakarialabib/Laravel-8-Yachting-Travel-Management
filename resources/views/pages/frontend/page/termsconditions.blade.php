@extends('layouts.app')
@php
$about_title_bg = "style='background-image:url(/assets/images/about-01.png)'";
@endphp

@section('content')
<main id="main" class="site-main" >
    <section class="breadcrumbs-custom bg-image context-dark">
            <div class="breadcrumbs-custom-inner">
                <div class="container breadcrumbs-custom-container">
                    <div class="breadcrumbs-custom-main" >
                        <h1 class="breadcrumbs-custom-title">{{__('Terms and Conditions')}}</h1>
                    </div>
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="{{ route('home')}}">{{__('Home')}}</a></li>
                        <li class="active"><a href=""></a>{{__('Terms and Conditions')}}</li>
                    </ul>
                </div>
             </div>
        </section>
    
    <!-- Faq Area Start -->
 <section id="faq" class="faq">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="panel-group accordion" id="accordion-1">
                @foreach($faqs as $key => $faq)
                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="@if ($loop->first) true @endif" data-target="#id{{ $faq->id }}" aria-controls="id{{ $faq->id }}" class="panel-title">
                            {{ $faq->title }}
                        </h4>
                    </div>
                    <div id="id{{ $faq->id }}" class="panel-collapse collapse @if ($loop->first) show @endif" aria-labelledby="id{{ $faq->id }}" data-parent="#accordion-1">
                        <div class="panel-body">
                            {!! $faq->content !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Faq Area End -->

</main><!-- .site-main -->
@endsection

@section('css')
    
<style>
.faq {
  padding: 30px 0px 80px;
}

.faq .search-faq {
  position: relative;
  margin-bottom: 40px;
}

.faq .search-faq .form-control {
  width: 100%;
  height: 40px;
  padding-right: 50px;
}

.faq .search-faq .form-control:focus {
  border-color: #983ce9;
}

.faq .search-faq button {
  position: absolute;
  top: 0px;
  right: 0px;
  height: 40px;
  width: 40px;
  border: 0px;
  background: none;
  color: #777;
}

.faq .search-faq button:focus {
  outline: none;
}

.faq .accordion .panel {
  margin-bottom: 20px;
  background: #fff;
  border-radius: 3px;
  box-shadow: rgba(36, 37, 38, 0.15) 4px 4px 30px 0px;
  overflow: hidden;
}

.faq .accordion .panel .panel-body {
  padding: 4px 20px 20px;
}

.faq .accordion .panel-title {
  display: block;
  width: 100%;
  padding: 15px 20px 15px 20px;
  font-size: 21px;
  line-height: 31px;
  font-weight: 600;
  margin-bottom: 0px;
  position: relative;
  cursor: pointer;
}

.faq .accordion .panel-title::after {
  position: absolute;
  content: "";
  width: 40px;
  height: 100%;
  border-radius: 3px 0px 0px 3px;
  right: 0;
  top: 0;
  text-align: center;
}

.faq .accordion .panel-title i {
  position: absolute;
  font-weight: 900;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 40px;
  text-align: center;
  z-index: 1;
  font-size: 16px;
  transition: 0.3s ease-in;
}

.faq .accordion .panel-title[aria-expanded=true] i {
  font-weight: 900;
}

</style>

@endsection
