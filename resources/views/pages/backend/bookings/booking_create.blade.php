@extends('layouts.backend')
@section('content')
<div class="page-title">
        <div class="title_left">
            <h3>{{__('Create Booking')}}</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 bg-white"> 
            <form method="post" action="{{ route('booking_store') }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                @csrf
                  <div class="row mb-2">
                            <div class="col-md-12 col-sm-12 bg-white ">
                                <div class="dashboard_graph">
                   <div class="row">
                    <div class="col-md-6 form-group">
                        <label>{{__('User Name')}}</label>
                        <select name="user_id" id="user_id"  class="form-control">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{__('Place')}}</label>
                        <select name="place_id" id="place_id" class="form-control myselect">
                        @foreach ($places as $place)
                            <option  value="{{$place->id}}">{{$place->name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>{{__('Number of adult')}}</label>
                    <input type="number" name="numbber_of_adult" value="0" class="form-control">
                    </div>

                    <div class="col-md-6 form-group">
                        <label>{{__('Number of Children')}}</label>
                    <input type="number" name="numbber_of_children" value="0" class="form-control">
                    </div>

                    <div class="col-md-6 form-group">
                    <label>{{__('Date')}}</label>
                    <input type="text" name="date" placeholder="{{__('Date')}}" class="form-control" autocomplete="off">
                    </div>

                    <div class="col-md-6 form-group">
                    <label>{{__('Name')}}</label>
                    <input type="text" name="name" placeholder="{{__('Name')}}" class="form-control" >
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
                    <label>{{__('Status')}}</label>
                    <select name="status"  class="form-control">
                    <option  class="form-control" value="{{\App\Models\Booking::STATUS_ACTIVE}}">{{__('ACTIVE')}}</option>
                    <option  class="form-control" value="{{\App\Models\Booking::STATUS_DEACTIVE}}">{{__('INACTIVE')}}</option>
                    <option  class="form-control" value="{{\App\Models\Booking::STATUS_PENDING}}">{{__('PENDING')}}</option>
                    </select>
                    </div>
                    <input type="hidden" name="type" id="type" value="1">

                                    <div class="clearfix"></div>
                                </div>
                        

                <div class="row m-b-md">
                    <div class="col-md-12">
                        <button class="btn-primary btn">
                             {{__('Save')}}
                        </button>
                        <a class="btn btn-primary" href="{{route('booking_list')}}"> {{__('Back')}}</a>

                    </div>
                  </div>
                </div>
             </div>
            </form>
        </div>
    </div>

@endsection

