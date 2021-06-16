@extends('layouts.app')

@section('page-title')  {{__('Category Type detail')}}  @endsection

@php
    $banner_img = getImageUrl($category->image);
    $page_title_bg = "style=background-image:url({$banner_img});";
@endphp

@section('content')
 <main class="site-main normal_view">
   <div class="page-title" {!! $page_title_bg !!}>
     <div class="container">
                <div class="category-title__content">
                  <h3 class="page-title__capita">{{ $category->feature_title }}</h3>
                    <h1 class="page-title__name">{{ $category->name }}</h1>
                </div>
          <div class="place-cat_grp">
            @foreach($place_types['category'] as $place_type)
            <div class="place-cat-grp">
              <div class="place-cat">
                  <a title="{{ $place_type->name }}" href="{{route('category_type_detail', $place_type->id)}}">{{ $place_type->name }}</a>
              </div>
            </div>
            @endforeach      
         </div>
     </div>
        </div><!-- .page-title -->
        <div class="intro">
            <div class="container">
                    <div class="city-grid">
                        <div class="row" id="list_places">
                            @if(count($places_by_category['places']))
                                @foreach($places_by_category['places'] as $place)
                                    <div class="col-xl-3 col-lg-4 col-6">
                                        @include('frontend.common.place_item')
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-12 text-center">
                                    {{__('No places')}}
                                </div>
                            @endif
                        </div>
                        <div class="pagination">
                            {{$places_by_category['places']->render('frontend.common.pagination')}}
                        </div><!-- .pagination -->
                    </div><!-- .city__grid -->
                </div><!-- .city-content__panel -->
            </div>
        </div><!-- .intro -->
    </main><!-- .site-main -->
@stop

