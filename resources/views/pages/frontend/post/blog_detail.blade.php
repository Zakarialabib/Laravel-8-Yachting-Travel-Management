@extends('layouts.app')
@section('content')
<div class="section-title-page area-bg area-bg_dark area-bg_op_60">
    <div class="area-bg__inner">
      <div class="container text-center">
        <h1 class="b-title-page b-title-post">{{$post->title}}</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('post_list_all')}}">{{__('Blog')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
          </ol>
        </nav>
        <!-- end .breadcrumb-->
      </div>
    </div>
  </div>
  <!-- end .b-title-page-->
  <div class="l-main-content">
    <div class="ui-decor ui-decor_mirror ui-decor_sm-h bg-primary"></div>
<main>
<article class="b-post b-post-full">
<div class="container">
  <div class="row">
    <div class="col-xl-10 offset-xl-1">
      <div class="entry-media">
          <a class="js-zoom-images" href="{{getImageUrl($post->thumb)}}"><img class="img-fluid" src="{{getImageUrl($post->thumb)}}  " alt="photo"/></a>
      </div>
    <div class="entry-meta-post">
        <div class="row justify-content-beetween align-items-baseline">
                <div class="col-md">
                <div class="entry-meta">
                        @foreach($post['categories'] as $cat)
                        <span class="entry-meta__item">
                            <a class="entry-meta__link text-primary" href="{{route('post_list', $cat->slug)}}">{{$cat->name}}</a></span>
                    @endforeach
                </div>
                </div>
                <div class="col-md-auto">
                <div class="b-post-soc">
                    <div class="b-post-soc__title">Share This</div>
                    <div class="b-post-soc__item"><a class="b-post-soc__link" href="#" target="_blank"><i class="ic fab fa-twitter"></i></a></div>
                    <div class="b-post-soc__item"><a class="b-post-soc__link" href="#" target="_blank"><i class="ic fab fa-facebook-f"></i></a></div>
                    <div class="b-post-soc__item"><a class="b-post-soc__link" href="#" target="_blank"><i class="ic fab fa-pinterest-p"></i></a></div>
                    <div class="b-post-soc__item"><a class="b-post-soc__link" href="#" target="_blank"><i class="ic fab fa-behance"></i></a></div>
                </div>
                </div>
            </div>
        </div>
    </div>
  </div>
        <div class="entry-main">
            <div class="entry-content">                           
            {!! $post->content !!}
            </div>
        </div>
            <div class="entry-footer">
                <div class="text-center mb-4">
                <div class="entry-label">Summer Holiday</div>
                <div class="entry-label">Yachts Rental</div>
                <div class="entry-label">Fishing</div>
                </div><span class="entry-tag-title">TAGS: </span>
                <a class="entry-tag text-primary" href="blog.html">Boats, </a>
                <a class="entry-tag text-primary" href="blog.html">Yachts, </a>
                <a class="entry-tag text-primary" href="blog.html">Summer, </a>
                <a class="entry-tag text-primary" href="blog.html">Holiday</a>
            </div>
        </div>
    </article>
    <!-- end .post-->
<div class="container">
    <div class="b-post-group_grid">
        <h2>{{__('Related Articles')}}</h2>
        <div class="b-post-group_2-col row mb-4">
            @foreach($related_posts as $related_post)
                <article class="col-lg-6">
                    <div class="b-post b-post-1">
                        <a title="{{$related_post->title}}" href="{{route('post_detail', [$related_post->slug, $related_post->id])}}"><img class="img-scale" src="{{getImageUrl($related_post->thumb)}}" alt="{{$related_post->title}}"></a>
                    </div>
                    <div class="post__info">
                        <div class="entry-meta">
                            @foreach($post['categories'] as $cat)
                                <a href="{{route('post_list', $cat->slug)}}" title="{{$cat->name}}">{{$cat->name}}</a>
                            @endforeach
                        </div>
                        <div class="entry-header">
                        <h2 class="entry-title"><a title="{{$related_post->title}}" href="{{route('post_detail', [$related_post->slug, $related_post->id])}}">{{$related_post->title}}</a></h2>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div><!-- .related-post -->
</div>
                       
@endsection