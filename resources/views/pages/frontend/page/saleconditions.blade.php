@extends('layouts.app')

@section('content')

<div class="section-title-page area-bg area-bg_dark area-bg_op_60">
    <div class="area-bg__inner">
      <div class="container text-center">
        <h1 class="b-title-page">{{__('Sale Conditions')}}</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('Sale Conditions')}}</li>
          </ol>
        </nav>
        <!-- end .breadcrumb-->
      </div>
    </div>
  </div>
  <!-- end .b-title-page-->

    
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
