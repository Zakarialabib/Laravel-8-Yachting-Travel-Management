@extends('layouts.backend')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Users')}}</h3>
        </div>
        <div class="title_right">
        <div class="pull-right">
        <a class="btn btn-primary" href="{{route('admin_user_create_view')}}">{{__('Add New User')}}</a>
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

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <table class="table table-striped table-bordered col-4-datatable">
                        <thead>
                        <tr>
                            <th >ID</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Email')}}</th>
                            <th >Role</th>
                            <th >{{__('Status')}}</th>
                            <th >{{__('Is Admin')}}</th>
                            <th >{{__('Created at')}}</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>
                                    <input type="checkbox" class="js-switch user_status" data-id="{{$user->id}}" {{isChecked($user->status, \App\Models\User::STATUS_ACTIVE)}}/>
                                </td>
                                <td>
                                    <input type="checkbox" class="js-switch user_admin" data-id="{{$user->id}}" {{isChecked($user->is_admin, \App\Models\User::USER_ADMIN)}}/>
                                </td>
                                <td>{{formatDate($user->created_at, 'H:i d/m/Y')}}</td>
                                <td>
                                <a class="btn-sm btn-warning"  href="{{route('admin_user_edit', $user->id)}}">{{__('Edit')}}</a>
                                    <form action="{{route('admin_user_delete',$user->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn-sm btn-danger user_delete">{{__('Delete')}}</button>
                                    </form>
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
    <script src="{{asset('admin/js/page_user.js')}}"></script>
@endpush