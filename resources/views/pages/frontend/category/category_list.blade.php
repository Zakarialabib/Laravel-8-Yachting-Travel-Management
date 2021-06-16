@extends('layouts.app')

@section('page-title')  {{__('Category detail')}}  @endsection

@section('content')

<main class="site-main normal_view">
        <section class="breadcrumbs-custom bg-image context-dark">
            <div class="breadcrumbs-custom-inner">
                <div class="container breadcrumbs-custom-container">
                    <div class="breadcrumbs-custom-main" >
                        <h1 class="breadcrumbs-custom-title"> {{__('Category')}}</h1>
                    </div>
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="{{ route('home')}}">{{__('Home')}}</a></li>
                        <li><a href="{{ url('/categorie')}}">{{__('Category')}}</a></li>
                    </ul>
                </div>
             </div>
        </section>   
  <div class="container">
     <div class="mw-box">
         <div class="mw-grid ">
           @foreach($categories as $category)
              <div class="col-lg-4 col-md-6">
                  <div>
                      <div class="places-item hover__box">
                          <div class="places-item__thumb hover__box__thumb">
                              <a title="{{$category->name}}" href="{{route('category_detail', $category->slug)}}">
                                  <img src="{{getImageUrl($category->image)}}" alt="{{$category->name}}"></a>
                          </div>
                          <div class="places-item__info">
                          <a title="{{$category->name}}" href="{{route('category_detail', $category->slug)}}">
                              <h3>{{$category->name}}</h3>
                          </a>
                          <p style="color:white">({{ $category->offers->count() }})</p>
                          </div>
                      </div>
                  </div>
              </div>
             @endforeach
            </div>
        </div><!-- .mw-box -->
    </div>
</main>
@stop

