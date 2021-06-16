@extends('layouts.backend')

@section('page-title')  {{__('Countries List')}}  @endsection

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Countries List')}}</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <button class="btn btn-primary" id="btn_add_country" type="button">{{__('Add country')}}</button>
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
                            <th>{{__('Name')}}</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($countries as $country)
                            <tr>
                                <td>{{$country->id}}</td>
                                <td>{{$country->name}}</td>
                                <td class="golo-flex action">
                                <div class="btn-group row">
                                    <button type="button" class="btn-sm btn-warning country_edit"
                                            data-id="{{$country->id}}"
                                            data-name="{{$country->name}}"
                                            data-slug="{{$country->slug}}"
                                    >{{__('Edit')}}
                                    </button>
                                    <form class="d-inline" action="{{route('country_delete',$country->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn-sm btn-danger country_delete">{{__('Delete')}}</button>
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

    @include('pages.backend.country.modal_add_country')
@endsection

@push('scripts')
    <script src="{{asset('admin/js/page_country.js')}}"></script>
@endpush