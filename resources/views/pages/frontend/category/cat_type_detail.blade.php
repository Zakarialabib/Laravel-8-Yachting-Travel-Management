@extends('layouts.app')

@php
    $banner_img = getImageUrl($categorytype->image);
    $page_title_bg = "style=background-image:url({$banner_img});";
@endphp

@section('content')
 <main class="site-main normal_view">
   <div class="page-title" {!! $page_title_bg !!}>
     <div class="container">
                <div class="category-title__content">
                    <h1 class="page-title__name">{{ $categorytype->name }}</h1>
                </div>
          <div class="place-cat_grp">
            <div class="place-cat-grp">
              <div class="place-cat">
              </div>
            </div>
         </div>
     </div>
        </div><!-- .page-title -->
        <div class="intro">
            <div class="container">
                    <div class="city-grid">
                        <div class="row" id="list_places">

                                    <div class="col-xl-3 col-lg-4 col-6">

                                    </div>

                                <div class="col-md-12 text-center">
                                    {{__('No places')}}
                                </div>
                        </div>
                        <div class="pagination">

                        </div><!-- .pagination -->
                    </div><!-- .city__grid -->
                </div><!-- .city-content__panel -->
            </div>
        </div><!-- .intro -->
    </main><!-- .site-main -->
@stop

