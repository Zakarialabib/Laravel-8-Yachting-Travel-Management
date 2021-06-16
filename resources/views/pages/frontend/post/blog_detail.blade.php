@extends('layouts.app')
@section('content')
    <main id="main" class="site-main">
        <div class="blog-banner">
            <img src="{{getImageUrl($post->thumb)}}" alt="{{$post->title}}">
        </div><!-- .blog-banner -->
        <div class="blog-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="blog-left">
                            <ul class="breadcrumbs">
                                @foreach($post['categories'] as $cat)
                                    <li><a href="{{route('post_list', $cat->slug)}}" title="{{$cat->name}}">{{$cat->name}}</a></li>
                                @endforeach
                            </ul><!-- .breadcrumbs -->
                            <div class="entry-content">
                                <h1>{{$post->title}}</h1>
                                <div class="entry-desc">
                                    {!! $post->content !!}
                                </div><!-- .entry-desc -->
                            </div><!-- .entry-content -->
                            <div class="related-post">
                                <h2>{{__('Related Articles')}}</h2>
                                <div class="related-grid columns-3">
                                    @foreach($related_posts as $related_post)
                                        <article class="hover__box post">
                                            <div class="post__thumb hover__box__thumb">
                                                <a title="{{$related_post->title}}" href="{{route('post_detail', [$related_post->slug, $related_post->id])}}"><img src="{{getImageUrl($related_post->thumb)}}" alt="{{$related_post->title}}"></a>
                                            </div>
                                            <div class="post__info">
                                                <ul class="post__category">
                                                    @foreach($post['categories'] as $cat)
                                                        <li><a href="{{route('post_list', $cat->slug)}}" title="{{$cat->name}}">{{$cat->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                                <h3 class="post__title"><a title="{{$related_post->title}}" href="{{route('post_detail', [$related_post->slug, $related_post->id])}}">{{$related_post->title}}</a></h3>
                                            </div>
                                        </article>
                                    @endforeach

                                </div>
                            </div><!-- .related-post -->
                        </div><!-- .place__left -->
                    </div>
                </div>
            </div>
        </div><!-- .blog-content -->
    </main><!-- .site-main -->
@stop