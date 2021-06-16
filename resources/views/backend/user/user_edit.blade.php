@extends('layouts.backend')
@section('content')
<div class="page-title">
        <div class="title_left">
            <h3>{{__('Edit User')}}</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
            <a class="btn btn-primary" href="{{route('admin_user_list')}}"> {{__('Back')}}</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 bg-white"> 
            <form method="POST" action="{{ route('admin_user_update', $user->id) }}" class="form-horizontal">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="row mb-2">
                            <div class="col-md-12 col-sm-12">
                                <div class="dashboard_graph">
                                    <div class="row x_title">
                                    {{__('Edit User')}}
                                    </div>
                   <div class="row">

                    <div class="col-md-6 form-group">
                    <label>{{__('Name')}}</label>
                    <input type="text" name="name" placeholder="name" id="name" class="form-control" value="{{$user->name}}" >
                    </div>

                    <div class="col-md-6 form-group">
                    <label>{{__('Email')}}</label>
                    <input type="email" name="email" id="email" placeholder="email" class="form-control" value="{{$user->email}}">
                    </div>

                    <div class="col-md-6 form-group">
                    <label>{{__('Phone Number')}}</label>
                    <input type="text" name="phone_number" id="phone_number" placeholder="phone_number" class="form-control" value="{{$user->phone_number}}">
                    </div>

                    <div class="col-md-6 form-group">
                    <label>{{__('Role')}}</label>
                    <select name="status"  class="form-control">
                    <option  class="form-control" value="{{$user->role}}">{{$user->role}}</option>
                    <option  class="form-control" value="Visiteur">{{__('Visitor')}}</option>
                    <option  class="form-control" value="Fournisseur">{{__('Wholeseller')}}</option>
                    <option  class="form-control" value="Agent">{{__('Agent')}}</option>
                    </select>
                    </div>
                    <input type="hidden" name="status" id="status" class="form-control" value="{{$user->status}}">
                 </div>
                     

                <div class="row m-b-md">
                    <div class="col-md-12">
                        <button class="btn-primary btn">
                             {{__('Update')}}
                        </button>
                    </div>
                    </div>
                        </div>
                </div>
            </form>
        </div>
    </div>

@endsection

