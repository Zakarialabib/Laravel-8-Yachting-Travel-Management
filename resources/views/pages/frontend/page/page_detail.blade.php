@extends('layouts.app')

@section('content')
    <main id="main" class="site-main">
    <section class="breadcrumbs-custom bg-image context-dark" >
            <div class="breadcrumbs-custom-inner">
                <div class="container breadcrumbs-custom-container">
                    <div class="breadcrumbs-custom-main" >
                        <h1 class="breadcrumbs-custom-title">{{ $category->name }}</h1>
                    </div>
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="{{ route('home')}}">{{__('Home')}}</a></li>
                        <li><a href="{{ url('/blog')}}">{{__('Blog')}}</a></li>
                        <li class="active"><a href=""></a>{{$page->title}}</li>
                    </ul>
                </div>
             </div>
        </section><!-- .page-title -->
     
        <div class="site-content">
        <h1 class="">{{$page->title}}</h1>

            <div class="container page-content">

                {!! $page->content !!}

            </div>
            
        </div><!-- .site-content -->
    </main><!-- .site-main -->
@endsection