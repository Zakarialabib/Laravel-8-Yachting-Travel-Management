@extends('layouts.app')

@section('content')

<div class="section-title-page area-bg area-bg_dark area-bg_op_60">
    <div class="area-bg__inner">
      <div class="container text-center">
        <h1 class="b-title-page">
            @if($category)
            {{$category->name}}
        @else
            {{__('Blog')}}
        @endif
        </h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home')}}">{{__('Home')}}</a></li>
            @if($category)
            <li class="breadcrumb-item active" aria-current="page">
                {{$category->name}}
            </li>
            @else
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('post_list_all')}}">
                {{__('Blog')}}
            </a>
            </li>
            @endif
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


                <div class="text-center mb-4">
                    <ul>
                        <li><a class="{{!isRoute('post_list_all')?: 'active'}}" href="{{route('post_list_all')}}" title="All"><span class="entry-label">{{__('All')}}</span> <span class="count">({{$post_total}})</span></a></li>
                        @foreach($categories as $cat)
                            <li><a class="{{isActive($cat_slug, $cat->slug)}}" href="{{route('post_list', $cat->slug)}}" title="{{$cat->name}}"><span class="entry-label">{{$cat->name}}</span> <span class="count">({{$cat->post_count}})</span></a></li>
                        @endforeach
                    </ul>
                </div><!-- .isotope__nav -->

        <main class="b-post-group_main">
            <div class="js-scroll-content">
                @foreach($posts as $post)
                <section class="b-post b-post-2 row">
                    <div class="entry-media col-lg-6"><a href="{{route('post_detail', [$post->slug, $post->id])}}"><img class="img-scale" src="{{getImageUrl($post->thumb)}}" alt="photo"/></a></div>
                    <div class="entry-main col-lg-6">
                      <div class="entry-header">
                        <h2 class="entry-title"><a href="post.html">{{$post->title}}</a></h2>
                      </div>
                      <div class="entry-meta">
                         @foreach($post['categories'] as $cat)
                            <span class="entry-meta__item">
                                <a class="entry-meta__link text-primary" href="{{route('post_list', $cat->slug)}}" title="{{$cat->name}}">
                                    {{$cat->name}}
                                </a>
                            </span>
                        @endforeach
                      </div>
                      <div class="entry-content">{!! Str::limit($post->content, 200) !!}
                        </div>
                      <div class="entry-footer"><a class="btn text-primary" href="{{route('post_detail', [$post->slug, $post->id])}}">{{__('Read More')}}</a></div>
                    </div>
                </section>
                  @endforeach                 

                <div class="pagination">
                    {{$posts->render('frontend.common.pagination')}}
                </div><!-- .pagination -->

            </div>
        </main>
      </div>
    </div>
@endsection