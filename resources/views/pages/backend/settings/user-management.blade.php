@extends('layouts.backend')

@section('page-title') {{__('Users Management')}}  @endsection

@section('activeSettings') open hover  @endsection

@section('content')


    <section class="row">

       <div class="modal fade text-left" id="create-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{url('/settings/users/add-new')}}">

                        @csrf
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel17">{{__('Create User')}}</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-12 sign-up-form">
                               <div class="row">
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <label>{{__('Title')}}</label>
                                           <select class="form-control" name="title_id" required>
                                            @foreach($titles as $serial => $title)
                                             <option value="{{$title->id}}">{{$title->name}}</option>
                                            @endforeach
                                           </select>
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="form-group">
                                         <label>{{__('Gender')}}</label>
                                           <select class="form-control" name="gender_id" required>
                                               @foreach($genders as $serial => $gender)
                                                   <option value="{{$gender->id}}">{{$gender->type}}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <label>{{__('User Type')}}</label>
                                       <select class="form-control" name="user_type" required>
                                           @foreach($roles as $serial => $role)
                                               <option value="{{$role->id}}">{{$role->display_name}}</option>
                                           @endforeach
                                       </select>
                                   </div>
                               </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{__('Surname')}}</label>
                                            <input name="sur_name" type="text" class="form-control" placeholder="{{__('Surname (Family name)')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{__('First name')}}</label>
                                            <input name="first_name" type="text" class="form-control" placeholder="{{__('First name (Your name)')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{__('Other name')}}</label>
                                            <input name="other_name" type="text" class="form-control" placeholder="{{__('Other name (Your other name)')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('Email')}}</label>
                                            <input name="email" type="email" class="form-control" placeholder="{{__('Email')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('Phone')}}</label>
                                            <input name="phone" type="tel" class="form-control" placeholder="{{__('Phone number')}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{__('Address')}}</label>
                                            <textarea class="form-control" name="{{__('address')}}" required>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit"  class="btn btn-outline-primary">{{__('Create User')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            @if ($errors->any())
                @foreach($errors->all() as $i => $error)
                    <div class="alert round bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                        <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>{{__('Oops!')}}</strong> {{$error}}
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                        <h4 class="card-title">{{__('All Users')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="title_right">
                              <div class="pull-right">
                                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create-user">Create New User</button>
                             </div>
                        </div>
                    </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                {{--<th>SN</th>--}}
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Phone')}}</th>
                                <th>{{__('Profile Status')}}</th>
                                <th>{{__('Role')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @foreach($users as $serial => $user)
                                     <div class="modal fade text-left edit_user_{{$user->user_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
                                          aria-hidden="true">
                                         <div class="modal-dialog modal-lg" style="padding: 60px;" role="document">
                                             <div class="modal-content">
                                                 <form method="POST" action="{{url('/settings/users/update-user')}}">

                                                     @csrf
                                                     <input type="hidden" value="{{$user->user_id}}" name="user_id"/>
                                                     <div class="modal-header">
                                                         <h3 class="modal-title" id="myModalLabel17">{{__('Create User')}}</h3>
                                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                             <span aria-hidden="true">&times;</span>
                                                         </button>
                                                     </div>
                                                     <div class="modal-body">
                                                         <div class="col-sm-12 sign-up-form">
                                                             <div class="row">
                                                                 <div class="col-md-4">
                                                                     <div class="form-group">
                                                                         <label>{{__('Title')}}</label>
                                                                         <select class="form-control" name="title_id" required>
                                                                             <option value="{{$user->title_id}}">{{\App\Title::find($user->title_id)->name}}</option>
                                                                             @foreach($titles as $serial => $title)
                                                                                 <option value="{{$title->id}}">{{$title->name}}</option>
                                                                             @endforeach
                                                                         </select>
                                                                     </div>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                     <div class="form-group">
                                                                         <label>{{__('Gender')}}</label>
                                                                         <select class="form-control" name="gender_id" required>
                                                                             <option value="{{$user->gender_id}}">{{\App\Gender::find($user->gender_id)->type}}</option>
                                                                             @foreach($genders as $serial => $gender)
                                                                                 <option value="{{$gender->id}}">{{$gender->type}}</option>
                                                                             @endforeach
                                                                         </select>
                                                                     </div>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                     <label>{{__('User Type')}}</label>
                                                                     <select class="form-control" name="user_type" required>
                                                                         <option value="{{$user->role_id}}">{{\App\Role::find($user->role_id)->display_name}}</option>
                                                                         @foreach($roles as $serial => $role)
                                                                             <option value="{{$role->id}}">{{$role->display_name}}</option>
                                                                         @endforeach
                                                                     </select>
                                                                 </div>
                                                             </div>
                                                             <div class="row">
                                                                 <div class="col-md-4">
                                                                     <div class="form-group">
                                                                         <label>{{__('Surname')}}</label>
                                                                         <input name="sur_name" value="{{$user->sur_name}}" type="text" class="form-control" placeholder="Surname (Family name)" required>
                                                                     </div>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                     <div class="form-group">
                                                                         <label>{{__('First name')}}</label>
                                                                         <input name="first_name" type="text" value="{{$user->first_name}}" class="form-control" placeholder="First name (Your name)" required>
                                                                     </div>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                     <div class="form-group">
                                                                         <label>{{__('Other name')}}</label>
                                                                         <input name="other_name" type="text" value="{{$user->other_name}}" class="form-control" placeholder="Other name (Your other name)">
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="row">
                                                                 <div class="col-md-6">
                                                                     <div class="form-group">
                                                                         <label>{{__('Email')}}</label>
                                                                         <input name="email" type="email" value="{{$user->email}}" class="form-control" placeholder="Email" required>
                                                                     </div>
                                                                 </div>
                                                                 <div class="col-md-6">
                                                                     <div class="form-group">
                                                                         <label>{{__('Phone')}}</label>
                                                                         <input name="phone" type="tel" value="{{$user->phone_number}}" class="form-control" placeholder="Phone number" required>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="row">
                                                                 <div class="col-md-12">
                                                                     <div class="form-group">
                                                                         <label>{{__('Address')}}</label>
                                                                         <textarea class="form-control" name="address" required>{{$user->address}}</textarea>
                                                                     </div>
                                                                 </div>
                                                             </div>

                                                         </div>
                                                     </div>
                                                     <div class="modal-footer">
                                                         <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">{{__('Close')}}</button>
                                                         <button type="submit"  class="btn btn-outline-primary">{{__('Update User')}}</button>
                                                     </div>
                                                 </form>
                                             </div>
                                         </div>
                                     </div>

                                     <tr class="user_id_{{$user->user_id}}">
                                         <td>{{$user->sur_name}} {{$user->first_name}} {{$user->other_name}}</td>
                                         <td>{{$user->email}}</td>
                                         <td>{{$user->phone_number}}</td>
                                         <td>
                                             @if($user->profile_complete_status == 0)
                                                 <p class="warning"><i class="la la-warning"></i> {{__('Incomplete')}}</p>
                                             @elseif($user->profile_complete_status == 0)
                                                 <p class="success"><i class="la la-success"></i> {{__('Complete')}}</p>
                                             @endif
                                         </td>
                                         <td>
                                             @if($user->role_id == 1)
                                                 <p class="danger">{{__('Super Admin')}}</p>
                                             @elseif($user->role_id == 2)
                                                 <p class="success">{{__('Agent')}}</p>
                                             @elseif($user->role_id == 3)
                                                 <p class="info"> {{__('Customer')}}</p>
                                             @endif
                                         </td>
                                         <td>
                                         <div class="dropdown">
                                         <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ __('Actions') }}
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <button class="dropdown-item btn edit_user" data-toggle="modal" data-target=".edit_user_{{$user->user_id}}" value="{{$user->user_id}}"><i class="la la-edit"></i> {{__('Edit')}}</button>
                                              </div>
				                           </div>
                                         </td>
                                     </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')

    <script src="{{asset('backend/js/pages/users-management.js')}}"></script>

@endsection
