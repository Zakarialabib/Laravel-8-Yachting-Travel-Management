@extends('layouts.app')
@section('content')
<div class="section-title-page area-bg area-bg_dark area-bg_op_60">
    <div class="area-bg__inner">
      <div class="container text-center">
        <h1 class="b-title-page">Contact</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
            <div class="col-md-6">
              <div class="map" id="map"></div>
            </div>
            <div class="col-md-6">
              <section class="section-form-contacts">
                <h2 class="ui-title-inner">Send a Message</h2>
                <p>Nulla pariatur excepteur sint occaecat cupidatat no proident culpa qui officia des mollit anim id est lab orum ut perspiciatis unde omnis iste natuser sit volupta tem accusantium sed ipsum laudantium.</p>
                <div id="success"></div>
                <form action="{{route('contact_send')}}" method="POST" class="b-form-contacts ui-form" id="contactForm">                 
                    @csrf
                    <div class="form-group">
                    <input class="form-control" id="username" type="text" name="username" placeholder="Your Name" required="required"/>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" name="email" placeholder="Your email"/>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="phone" name="user-email" placeholder="Your Phone"/>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
              </section>
              <!-- end .b-form-contact-->
            </div>
          </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- User map-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCreq2ZVp-3lJ-_KCZpeJVZ5RN3VJXk-9c"></script>
<!-- Maps customization-->
<script src="assets/js/map-custom.js"></script>
@endpush