@extends('layouts.backend')
@section('page-title')  {{__('New Customer')}}  @endsection
@section('content')
<div class="page-title">
        <div class="title_left">
            <h3>{{__('Create Customer')}}</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 bg-white"> 
            <form method="post" action="{{ route('customer_create') }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                @csrf
                  <div class="row mb-2">
                     <div class="col-md-12 col-sm-12">
                        <div class="dashboard_graph">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>{{__('Name')}}</label>
                                    <input type="text" name="name" placeholder="{{__('Name')}}" class="form-control" >
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>{{__('Company Name')}}</label>
                                    <input type="text" name="company_name" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>{{__('Email')}}</label>
                                    <input type="email" name="email" placeholder="{{__('Email')}}" class="form-control" >
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>{{__('Phone Number')}}</label>
                                    <input type="text" name="phone_number" placeholder="{{__('Phone Number')}}" class="form-control" >
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>{{__('Tax Number')}}</label>
                                    <input type="text" name="tax_no" class="form-control"  placeholder="{{__('ICE')}}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>{{__('Address')}}</label>
                                    <input type="text" name="address" class="form-control"  placeholder="{{__('Adresse')}}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>{{__('Postal Code')}}</label>
                                    <input type="text" name="postal_code" class="form-control"  placeholder="{{__('Code Postal')}}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>{{__('City')}} *</label>
                                    <input type="text" name="city" class="form-control"  placeholder="{{__('Ville')}}">
                                </div>
                                 <div class="col-md-6 form-group">
                                    <label>{{__('Country')}}</label>
                                    <input type="text" name="country" class="form-control"  placeholder="{{__('Pays')}}">
                                 </div>
                              <div class="clearfix"></div>
                         </div>
                      <div class="row m-b-md">
                        <div class="col-md-12">
                            <button class="btn-primary btn">
                                {{__('Save')}}
                            </button>
                            <a class="btn btn-primary" href="{{route('customer_list')}}"> {{__('Back')}}</a>
                        </div>
                      </div>
                   </div>
                </div>
            </form>
        </div>
    </div>
@stop