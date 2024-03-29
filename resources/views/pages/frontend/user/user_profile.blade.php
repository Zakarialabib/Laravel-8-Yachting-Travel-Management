@extends('layouts.app')
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
                        <h3><strong> Manage Your Information</strong></h3>
                    </div>
                    <div class="col-md-12">
                        <form method="post" action="{{route('pageProfile')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Surname</label>
                                        <input type="text" name="customer_sur_name" required class="form-control" value="{{$user->name}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" name="customer_phone_number" required class="form-control" value="{{$user->phone}}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="customer_email" required disabled class="form-control" value="{{$user->email}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary pull-left" type="button" id="update_customer_information">Update Customer Information</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <h3><strong> Edit Your Profile Image</strong></h3>
                    </div>
                    <div class="col-md-12">
                        <form method="post" id="profile_image_form" enctype="multipart/form-data" action="{{route('update-profile-image')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Enter New Image</label>
                                        <input class="form-control" type="file" id="customer_profile_photo" name="customer_profile_photo" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <button class="btn btn-primary btn-block" name="profile_upload" id="update_image" type="button">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <h3><strong> Change Password</strong></h3>
                    </div>
                    <div class="col-md-12">
                        <form>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Enter New Password</label>
                                        <input class="form-control" type="password" name="customer_new_password" required/>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Confirm New Password</label>
                                        <input class="form-control" type="password" name="customer_new_password_confirm" required/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <button class="btn btn-primary btn-block" type="button" id="update_password">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- .card-body -->
        </div><!-- .card -->
        <!-- /End Main Profile card -->

    </div><!-- .col -->
</div>

@endsection

@section('javascript')
<script src="{{asset('backend/js/pages/profile.js')}}"></script>
@endsection
