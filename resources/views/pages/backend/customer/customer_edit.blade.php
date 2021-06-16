@extends('layouts.backend')

@section('page-title')  {{__('Edit Customer')}}  @endsection

@section('content')
<div class="page-title">
        <div class="title_left">
            <h3>{{__('Edit Customer')}}</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 bg-white"> 
            <form method="POST" action="{{ route('customer_update', $customer->id) }}" class="form-horizontal">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="row mb-2">
                            <div class="col-md-12 col-sm-12">
                                <div class="dashboard_graph">
               <div class="row">
                    <div class="col-md-6 form-group">
                        <label>{{__('Name')}}</label>
                        <input type="text" name="name" value="{{$customer->name}}" class="form-control" >
                    </div>
                    <div class="col-md-6 form-group">
                       <label>{{__('Company Name')}}</label>             
                       <input type="text" name="company_name" value="{{$customer->company_name}}" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                       <label>{{__('Email')}}</label>
                       <input type="email" name="email" value="{{$customer->email}}"  class="form-control" >
                    </div>
                    <div class="col-md-6 form-group">
                       <label>{{__('Phone Number')}}</label>
                       <input type="text" name="phone_number" value="{{$customer->phone_number}}"  class="form-control" >
                    </div>
                    <div class="col-md-6 form-group">
                       <label>{{__('Tax Number')}}</label>
                       <input type="text" name="tax_no" value="{{$customer->tax_no}}"  class="form-control">
                   </div>
                   <div class="col-md-6 form-group">
                        <label>{{__('Address')}}</label>
                        <input type="text" name="address" value="{{$customer->address}}"  class="form-control">
                   </div>
                   <div class="col-md-6 form-group">
                        <label>{{__('Postal Code')}}</label>
                        <input type="text" name="postal_code" value="{{$customer->postal_code}}"  class="form-control">
                   </div>
                   <div class="col-md-6 form-group">
                        <label>{{__('City')}}</label>
                        <input type="text" name="city" value="{{$customer->city}}"  class="form-control">
                   </div>
                     <div class="col-md-6 form-group">
                        <label>{{__('Country')}}</label>
                        <input type="text" name="country" value="{{$customer->country}}"  class="form-control">
                    </div>
                 <div class="clearfix"></div>
             </div>
                <div class="row m-b-md">
                    <div class="col-md-12">
                        <button class="btn-primary btn">
                             {{__('Update')}}
                        </button>
                        <a class="btn btn-primary" href="{{route('customer_list')}}"> {{__('Back')}}</a>
                    </div>
                </div>
           </div>
                </div>
            </form>
        </div>
    </div>

@endsection

