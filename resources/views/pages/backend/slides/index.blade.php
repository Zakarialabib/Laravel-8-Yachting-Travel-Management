@extends('layouts.backend')
@section('page-title')  {{__('Sliders List')}}  @endsection

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{ __('Slider List') }}</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('slides.create')}}">{{ __('Add New Slider') }}</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white">
            <div class="x_panel">
                <div class="x_content">
                    <table class="table table-striped table-bordered col-5-datatable">
                        <thead>
                            <tr>
                                <th width="3%">ID</th>
                                <th width="10%">{{ __('Title') }}</th>
                                <th width="10%">{{ __('Image') }}</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td><img src="{{url('images')}}/{{$slider->photo}}" alt="image"></td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('slides.edit', $slider->id)}}">{{__('Edit')}}</a>
                                        @if($user->is_admin === 1)
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['slides.destroy', $slider->id] ]) !!}
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        {!! Form::close() !!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
