@extends('layouts.backend')

@section('page-title') {{__('User Profile')}}  @endsection

@section('activeSettings') Profil  @endsection

@section('content')

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="text-center">
                    <div class="card-body">
                        @if(empty($profile->photo))
                            <img src="{{getImageUrl(setting('logo'))}}" id="user_image" class="rounded-circle  height-150" alt="Card image">
                        @else
                            <img src="{{asset($profile->photo)}}" class="rounded-circle  height-150" id="user_image" alt="Card image">
                        @endif
                    </div>
                    <div class="card-body">
                        <h4 class="card-title customer_full_name">{{$user->name}}</h4>
                    </div>
                </div>
            </div>

            <!-- /End Photo & Description card -->

        </div>

        <div class="col-md-9">

            <!-- Main Profile card -->
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3><strong> {{__('Manage Your Information')}}</strong></h3>
                        </div>
                        <div class="col-md-12"> 
                            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users_update', $user->id], 'enctype' => 'multipart/form-data' ,'files' => true]) !!}

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>{{__('Name')}}</label>
                                            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>{{__('Phone Number')}}</label>
                                            {!! Form::text('phone', null, ['placeholder' => 'Phone', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>{{__('Email')}}</label>
                                            {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('Enter New Password')}}</label>
                                                {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('Confirm New Password')}}</label>
                                                {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{__('Enter New Image')}}</label>
                                            {!! Form::file('photo', ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary pull-left" type="submit">{{__('Update Information')}}</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                    </div>                   
                    <br/>
                </div><!-- .card-body -->
            </div><!-- .card -->
            <!-- /End Main Profile card -->
        </div><!-- .col -->
    </div>

@endsection

@section('javascript')
    <script src="{{asset('backend/js/pages/profile.js')}}"></script>
@endsection
