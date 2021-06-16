@extends('layouts.backend')
@section('page-title')  {{__('Edit Purchase')}}  @endsection
@section('content')
<div class="page-title">
        <div class="title_left">
            <h3>{{__('Edit Supplier')}}</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 bg-white"> 
            <form method="POST"  action="{{ route('supplier_update' , $supplier->id) }}"   >
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="row mb-2">
                            <div class="col-md-12 col-sm-12">
                                <div class="dashboard_graph">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>{{__('Name')}}</label>
                        <input type="text" name="name" value="{{$supplier->name}}" id="name" class="form-control" >
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{__('Company Name')}}</label>
                        <input type="text" name="company_name" value="{{$supplier->company_name}}" id="company_name"  class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{__('Email')}}</label>
                        <input type="email" name="email" value="{{$supplier->email}}"  class="form-control" >
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{__('Phone Number')}}</label>
                        <input type="text" name="phone_number" value="{{$supplier->phone_number}}"  class="form-control" >
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{__('Tax Number')}}</label>
                        <input type="text" name="tax_number" value="{{$supplier->tax_number}}"  class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{__('Address')}}</label>
                        <input type="text" name="address" value="{{$supplier->address}}"  class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{__('Postal Code')}}</label>
                        <input type="text" name="postal_code" value="{{$supplier->postal_code}}"  class="form-control">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>{{__('City')}}</label>
                        <input type="text" name="city" value="{{$supplier->city}}"  class="form-control">
                    </div>
                     <div class="col-md-6 form-group">
                         <label>{{__('Country')}}</label>
                         <input type="text" name="country" value="{{$supplier->country}}"  class="form-control">
                     </div>
                </div>
                         <div class="row m-b-md">
                             <div class="col-md-12">
                                 <button class="btn-primary btn" type="submit">
                                      {{__('Update')}}
                                 </button>
                                 <a class="btn btn-primary" href="{{route('supplier_list')}}"> {{__('Back')}}</a>
                            </div>
                         </div>
                   </div>
                </div>
            </form>
        </div>
    </div>

@endsection

