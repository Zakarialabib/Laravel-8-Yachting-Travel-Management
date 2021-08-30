@extends('layouts.backend')
@section('page-title')  {{__('Posts List')}}  @endsection

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Posts')}}</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('post_add', $post_type)}}">+{{__('Add new')}}</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white">
            <div class="x_panel">
                <div class="x_title">
                    @unless(isRoute('post_list_page'))
                        <form class="row">
                            <div class="col-md-3 form-group">
                                <label>{{__('Select Categories')}}:</label>
                                <select class="form-control" id="select_category_id" name="category_id" onchange="this.form.submit()">
                                    <option value="">{{__('All Categories')}}</option>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}" {{isSelected($cat->id, $filter['category_id'])}}>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    @endunless
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped table-bordered col-4-datatable post_list">
                        <thead>
                        <tr>
                            <th >ID</th>
                            <th >{{__('Thumb')}}</th>
                            <th>{{__('Title')}}</th>
                            @unless(isRoute('post_list_page'))
                                <th>{{__('Category')}}</th>
                            @endunless
                            <th>{{__('Status')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td><img class="post_list_thumb" src="{{getImageUrl($post->thumb)}}" alt="post thumb"></td>
                                <td class="row"><a href="{{route('post_detail', [$post->slug, $post->id])}}" target="_blank">{{$post->title}}</a></td>
                                @unless(isRoute('post_list_page'))
                                    <td>
                                        @foreach($post->categories as $cat)
                                            <span class="category_name">{{$cat->name}}</span>
                                        @endforeach
                                    </td>
                                @endunless
                                <td><input type="checkbox" class="js-switch post_status" data-id="{{$post->id}}" {{isChecked($post->status, \App\Models\Post::STATUS_ACTIVE)}}/></td>
                                <td>
                                    <a class="btn btn-warning btn-xs place_edit" href="{{route('post_edit', $post->id)}}">{{__('Edit')}}</a>
                                    @if($user->is_admin === 1)
                                    <form class="d-inline" action="{{route('post_delete', $post->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-xs post_delete">{{__('Delete')}}</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </div>

@stop

@push('scripts')
    <script src="{{asset('admin/js/page_post.js')}}"></script>
@endpush