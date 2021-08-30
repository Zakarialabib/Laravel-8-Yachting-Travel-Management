@extends('layouts.backend')

@section('page-title') {{__('User Management')}} @endsection

@section('content')

    <div class="py-10">
        <div class="w-full mx-auto py-10 sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden sm:rounded-lg px-4 py-4">


                @if (count($errors) > 0)

                    <div class="alert alert-danger">

                        <strong>Whoops!</strong> There were some problems with your input.<br><br>

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-3 sm:col-span-3">

                        <strong>Name:</strong>

                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}

                    </div>

                    <div class="col-span-3 sm:col-span-3">
                        <strong>Email:</strong>

                        {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                    </div>

                    <div class="col-span-3 sm:col-span-3">
                        <strong>Phone:</strong>

                        {!! Form::text('phone', null, ['placeholder' => 'Phone', 'class' => 'form-control']) !!}
                    </div>

                    <div class="col-span-3 sm:col-span-3">

                        <strong>Password:</strong>

                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}

                    </div>

                    <div class="col-span-3 sm:col-span-3">

                        <strong> Password Confirmation</strong>
                        {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles, $userRole, ['class' => 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm', 'multiple']) !!}
                    </div>
                    <div class="col-span-12 sm:col-span-6 text-center">
                        <a class="btn btn-danger"
                            href="{{ route('users.index') }}">Back</a>
                        <button type="submit"
                            class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>

@endsection