@extends('layouts.backend')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Amenities')}}</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <button class="btn btn-primary" id="btn_add_amenities" type="button">{{__('Add amenities')}}</button>
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
                            <th >ID</th>
                            <th >Icon</th>
                            <th>{{__('Amenities Name')}}</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($amenities as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td><img class="amenities_icon" src="{{getImageUrl($item->icon)}}" class="height:70px" alt="Amenities icon"></td>
                                <td>{{$item->name}}</td>
                                <td class="golo-flex action">
                                <div class="btn-group row">
                                    <button type="button" class="btn-sm btn-warning amenities_edit"
                                            data-id="{{$item->id}}"
                                            data-name="{{$item->name}}"
                                            data-translations="{{$item->translations}}"
                                    >{{__('Edit')}}
                                    </button>
                                    <form class="d-inline" action="{{route('amenities_delete',$item->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn-sm btn-danger amenities_delete">{{__('Delete')}}</button>
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

    @include('pages.backend.amenities.modal_add_amenities')
@endsection

@push('scripts')
    <script src="{{asset('admin/js/page_amenities.js')}}" type="text/javascript"></script>
@endpush