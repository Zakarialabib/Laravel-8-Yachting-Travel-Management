@extends('layouts.backend')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Add new')}}</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div>
        <form action="{{route('post_create')}}" enctype="multipart/form-data" method="post">
            @if(isRoute('post_edit'))
                @method('put')
            @endif
            @csrf
    <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8 bg-white">
                <div class="x_panel">
                    <div class="x_content">
                        <ul class="nav nav-tabs bar_tabs" role="tablist">
                            @foreach($languages as $index => $language)
                                <li class="nav-item">
                                    <a class="nav-link {{$index !== 0 ?: "active"}}" id="home-tab" data-toggle="tab" href="#language_{{$language->code}}" role="tab" aria-controls="" aria-selected="">{{$language->name}}</a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content">
                            @foreach($languages as $index => $language)
                                @php
                                    $trans = $post ? $post->translate($language->code) : [];
                                @endphp
                                <div class="tab-pane fade show {{$index !== 0 ?: "active"}}" id="language_{{$language->code}}" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="post_title_{{$language->code}}">{{__('Title')}}<small>({{$language->code}})</small>: *</label>
                                            <input type="text" class="form-control post_title" id="post_title_{{$language->code}}" name="{{$language->code}}[title]" value="{{$trans ? $trans->title :''}}" placeholder="{{__('Title')}}" autocomplete="off" {{$index !== 0 ?: "required"}}>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="post_content_{{$language->code}}">{{__('Content')}}<small>({{$language->code}})</small>:</label>
                                        <textarea type="text" class="form-control" id="ckeditor" id="post_content_{{$language->code}}" name="{{$language->code}}[content]" rows="10">{{$trans ? $trans->content :''}}</textarea>
                                   
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

                <div class="x_panel">
                    <div class="x_title">
                        <h2>SEO</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="form-group">
                            <label for="seo_title">{{__('SEO title')}} - <small>{{__('60 characters or less')}}</small>:</label>
                            <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{$post['seo_title']}}">
                               <div id="count">
                                          <span id="current_count">0</span>
                                           <span id="maximum_count">/ 60</span>
                                        </div>
                        </div>
                        <div class="form-group">
                            <label for="seo_description">{{__('Meta Description')}} - <small>{{__('160 characters or less')}}</small>:</label>
                            <textarea class="form-control" id="seo_description" name="seo_description">{{$post['seo_description']}}</textarea>
                            <div id="counter">
                                          <span id="count_current">0</span>
                                           <span id="count_maximum">/ 160</span>
                                        </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{__('Publish')}}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <input type="hidden" name="type" value="{{$post_type}}">
                        <input type="hidden" name="post_id" value="{{$post['id']}}">
                        <button type="submit" class="btn btn-success">
                            @if(isRoute('post_edit'))
                               {{__('Update')}} 
                            @else
                               {{__('Save')}}  
                            @endif
                        </button>
                    </div>
                </div>

                @if(($post_type === \App\Models\Post::TYPE_BLOG) || ($post['type'] === \App\Models\Post::TYPE_BLOG))
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{__('Category')}}</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @foreach($categories as $cat)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="flat" name="category[]" value="{{$cat->id}}" {{isChecked($cat->id, $post['category'])}}> {{$cat->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{__('Thumbnail image')}}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <label class="post_thumb" for="post_thumb">
                            <img id="preview_thumb" src="{{getImageUrl($post['thumb'])}}" alt="post thumb">
                            <input type="file" class="form-control" id="post_thumb" name="thumb" accept="image/*">
                        </label>
                    </div>
                </div>

            </div>
        </div>

        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('admin/js/page_post.js')}}"></script>

    @if(($post_type === \App\Models\Post::TYPE_BLOG) || ($post['type'] === \App\Models\Post::TYPE_BLOG))
        <script>
            $("#menu_blog").addClass("active");
            $("#menu_blog .child_menu").show();
        </script>
    @else
        <script>
            $("#menu_pages").addClass("active");
        </script>
    @endif
@endpush