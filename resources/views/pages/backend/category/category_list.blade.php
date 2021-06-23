@extends('layouts.backend')

@section('page-title')  {{__('Category List')}}  @endsection

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Category')}}</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <button class="btn btn-primary" id="btn_add_category">{{__('Add Category')}}</button>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white">
            <div class="x_panel">
                <div class="x_content">
                    <table class="table table-striped table-bordered col-4-datatable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{__('Category Name')}}</th>
                            @if($type === \App\Models\Category::TYPE_PLACE)
                                <th>{{__('Priority')}}</th>
                                <th>{{__('Is feature')}}</th>
                            @endif
                            <th>{{__('Status')}}</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{$category->id}}
                                </td>
                                <td><a href="{{route('category_detail', $category->slug)}}">
                                    {{$category->name}}
                                </a></td>
                                @if($type === \App\Models\Category::TYPE_PLACE)
                                <td>{{$category->priority}}</td>
                                <td>
                                    <input type="checkbox" class="js-switch category_is_feature" name="is_feature" data-id="{{$category->id}}" {{isChecked(1, $category->is_feature)}} />
                                </td>
                                @endif
                                <td>
                                    <input type="checkbox" class="js-switch category_status" name="status" data-id="{{$category->id}}" {{isChecked(1, $category->status)}} />
                                </td>
                                <td>
                                    <button type="button" class="btn-sm btn-warning category_edit"
                                            data-id="{{$category->id}}"
                                            data-name="{{$category->name}}"
                                            data-slug="{{$category->slug}}"
                                            data-priority="{{$category->priority}}"
                                            data-isfeature="{{$category->is_feature}}"
                                            data-featuretitle="{{$category->feature_title}}"
                                            data-colorcode="{{$category->color_code}}"
                                            data-image="{{$category->image}}"
                                            data-translations="{{$category->translations}}"
                                            data-seotitle="{{$category->seo_title}}"
                                            data-seodescription="{{$category->seo_description}}"
                                    >{{__('Edit')}}
                                    </button>
                                    @if($user->is_admin === 1)
                                    <form class="d-inline" action="{{route('category_delete',$category->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn-sm btn-danger category_delete">{{__('Delete')}}</button>
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
    @include('pages.backend.category.modal_add_category')
@endsection

@push('scripts')
    <script src="{{asset('admin/js/page_category.js')}}"></script>
@endpush
