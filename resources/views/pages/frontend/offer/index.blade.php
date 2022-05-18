@extends('layouts.app')
@section('content')

<div class="section-title-page area-bg area-bg_dark area-bg_op_60">
    <div class="area-bg__inner">
      <div class="container text-center">
        <h1 class="b-title-page">Our Fleet</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Our Fleet</li>
          </ol>
        </nav>
        <!-- end .breadcrumb-->
      </div>
    </div>
  </div>
  <!-- end .b-title-page-->
  
  <div class="l-main-content">
     <div class="ui-decor ui-decor_mirror ui-decor_sm-h bg-primary"></div>
     <div class="container">
     
      
      <div class="b-goods-group-2 row">
          @foreach ($offers as $offer)
          <div class="col-xl-4 col-md-6">
          <div class="b-goods-flip">
            <button class="flip-btn"><span></span><span class="flip-btn-mdl"></span><span></span></button>
            <div class="flip-container">
              <div class="flipper">
                <div class="flip__front">
                  <div class="b-goods-flip__img">
                    @php
                    $photos=explode(',',$offer->thumb);
                    // dd($photo);
                    @endphp
                    <img class="img-scale" src="{{$photos[0]}}" alt="photo"/>
                  </div>                  
                  <div class="b-goods-flip__main">
                    <div class="b-goods-flip__header row no-gutters align-items-center">
                      <div class="col"><a class="b-goods-flip__title" href="{{route('offer.show', $offer->slug)}}">{{$offer->name}}</a></div>
                      <div class="col-auto">
                        <div class="b-goods-flip__price text-primary">{{$offer->price}} <span>starting from</span></div>
                      </div>
                    </div>
                      <div class="b-goods-descrip_nev_wrap">
                            <div class="b-ex-info">{!! Str::limit($offer->description, 200) !!}</div>
                            <a class="btn btn-default w-100" href="{{route('offer.show', $offer->slug)}}">READ MORE</a>
                     </div>
                  </div>
                </div>
                <div class="flip__back">
                  <div class="b-goods-flip__header">
                    <div class="b-goods-flip__title">{{$offer->name}}</div>
                    <div class="b-goods-flip__category">Classic Boat</div>
                    <div class="flip-btn-hide"></div>
                  </div>
                  @foreach ($offer->packages as $package)
                    <div class="b-goods-flip-info">
                            <div class="b-goods-flip-info__item row no-gutters justify-content-between">
                              <span class="b-goods-flip-info__title col-auto">Feature</span>
                              @foreach ($package->features as $feature)    
                              <span class="b-goods-flip-info__desc col-auto">{{$feature->title}}</span>
                              @endforeach
                            </div>
                            <div class="b-goods-flip-info__item row no-gutters justify-content-between">
                              <span class="b-goods-flip-info__title col-auto">Condition</span>
                              @foreach ($package->conditions as $condition)    
                              <span class="b-goods-flip-info__desc col-auto">{{$condition->title}}</span>
                              @endforeach
                            </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>   <!-- end .b-goods-->
        @endforeach

    </div>
    
    
    <div class="pagination">
        {{$offers->links()}}
    </div><!-- .pagination -->

</div>


@endsection