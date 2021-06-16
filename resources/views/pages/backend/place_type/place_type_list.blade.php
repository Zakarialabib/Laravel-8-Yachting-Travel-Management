@extends('layouts.backend')
@section('page-title')  {{__('Activity Type List')}}  @endsection

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Activity Type')}}</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <button class="btn btn-primary" id="btn_add_place_type">{{__('Add Activity Type')}}</button>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>{{__('Select Category')}}:</label>
                            <form>
                                <select class="form-control" id="select_category_id" name="category_id" onchange="this.form.submit()">
                                    <option value="">{{__('Select Category')}}</option>
                                    @foreach($categories as $cat)
                                        @if($category_id)
                                            <option value="{{$cat->id}}" {{isSelected($cat->id, $category_id)}}>{{$cat->name}}</option>
                                        @else
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped table-bordered col-4-datatable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{__('Place type name')}}</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($place_types as $place_type)
                            <tr>
                                <td>{{$place_type->id}}</td>
                                <td>{{$place_type->name}}</td>
                                <td class="golo-flex">
                                <div class="btn-group row">
                                    <button type="button" class="btn-sm  btn-warning place_type_edit"
                                            data-id="{{$place_type->id}}"
                                            data-catid="{{$place_type->category_id}}"
                                            data-name="{{$place_type->name}}"
                                            data-translations="{{$place_type->translations}}"
                                    >{{__('Edit')}}
                                    </button>
                                    <form class="d-inline" action="{{route('place_type_delete',$place_type->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn-sm  btn-danger place_type_delete">{{__('Delete')}}</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('pages.backend.place_type.modal_add_place_type')
@endsection

@push('scripts')
    <script src="{{asset('admin/js/page_place_type.js')}}"></script>
@endpush