@extends('layouts.backend')
@section('page-title')  {{__('Suppliers List')}}  @endsection

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Suppliers List')}}</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('supplier_create_view')}}">{{__('Add New Supplier')}}</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white">
            <div class="x_panel">
                <div class="x_content">
                    <table class="table table-striped table-bordered col-5-datatable">
                        <thead>
                        <tr>
                            <th >ID</th>
                            <th >{{__('Supplier Name')}}</th>
                            <th >{{__('Supplier Company')}}</th>
                            <th >{{__('Phone Number')}}</th>
                            <th >{{__('Email')}}</th>
                            <th >{{__('Created at')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($suppliers as $supplier)
                            <tr>
                                <td>{{$supplier->id}}</td>
                                <td>{{$supplier->name}}</td>
                                <td>{{$supplier->company_name}}</td>
                                <td>{{$supplier->phone_number}}</td>
                                <td>{{$supplier->email}}  </td>
                                <td>{{formatDate($supplier->created_at, 'H:i d/m/Y')}}</td>
                                <td>
                                <a class="btn-sm btn-warning" href="{{route('supplier_edit', $supplier->id)}}">{{__('Edit')}}</a>
                                @if($user->is_admin === 1)
                                    <form action="{{route('supplier_delete',$supplier->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn-sm btn-danger user_delete">{{__('Delete')}}</button>
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
@endsection

@push('scripts')
    <script src="{{asset('admin/js/page_user.js')}}"></script>
@endpush