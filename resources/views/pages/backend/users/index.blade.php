@extends('layouts.backend')

@section('page-title') {{__('User Management')}} @endsection

@section('content')

<div class="card">
    <div class="card-header">
            <div class="title_right">
                <div class="pull-right">
                    <a class="btn btn-primary"
                        href="{{ route('users.create') }}"> New User </a>
                </div>
            </div>
                @if (session()->has('success'))
                    <div class="bg-green-550 border-t-4 border-green-300 rounded-b text-black font-bold px-4 py-3 shadow-md my-3"
                        role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
    </div>
                <div class="card-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">

                    <tr class="bg-gray-100">

                        <th class="">No</th>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Phone</th>
                        <th class="px-4 py-2">Roles</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>

                    @foreach ($data as $key => $user)

                        <tr>

                            <td class="border">{{ ++$i }}</td>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2">{{ $user->phone }}</td>
                            <td class="border px-4 py-2">
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td>

                                <a class="btn btn-primary"
                                    href="{{ route('users.show', $user->id) }}">Show</a>
                                <a class="btn btn-secondary"
                                    href="{{ route('users.edit', $user->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('delete', ['class' => 'btn btn-warning']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach

                </table>
                {!! $data->render() !!}
            </div>
        </div>
    </div>
</div>

@endsection