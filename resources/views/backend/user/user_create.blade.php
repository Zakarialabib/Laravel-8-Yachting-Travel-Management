@extends('layouts.backend')
@section('content')
<div class="page-title">
        <div class="title_left">
            <h3>{{__('Create User')}}</h3>
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
            <form method="post" action="{{ route('admin_user_create') }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                @csrf
                  <div class="row mb-2">
                            <div class="col-md-12 col-sm-12">
                                <div class="dashboard_graph">
                                    <div class="row x_title">
                                    {{__('New user')}}
                                    </div>
                   <div class="row">
                    <div class="col-md-6 form-group">
                    <label>{{__('Name')}}</label>
                    <input type="text" name="name" placeholder="name" class="form-control" >
                    </div>

                    <div class="col-md-6 form-group">
                    <label>{{__('Email')}}</label>
                    <input type="email" name="email" placeholder="email" class="form-control" >
                    </div>


                    <div class="col-md-6 form-group">
                    <label>{{__('Phone Number')}}</label>
                    <input type="text" name="phone_number" placeholder="phone_number" class="form-control" >
                    </div>

                    <div class="col-md-6 form-group">
                    <label>{{__('Password')}}</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    
                    <div class="col-md-6 form-group">
                    <label>{{__('Role')}}</label>
                    <select name="role"  class="form-control">
                    <option  class="form-control" value="Visiteur">{{__('Visitor')}}</option>
                    <option  class="form-control" value="Fournisseur">{{__('Wholeseller')}}</option>
                    <option  class="form-control" value="Agent">{{__('Agent')}}</option>
                    </select>
                    </div>

                                    <div class="clearfix"></div>
                                </div>
                   

                <div class="row m-b-md">
                    <div class="col-md-12">
                        <button class="btn-primary btn">
                             {{__('Save')}}
                        </button>
                    </div>
                </div>
                </div>
                        </div>
            </form>
        </div>
    </div>

@stop


