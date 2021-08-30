@extends('layouts.backend')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{ __('Edit Slider') }}</h3>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 bg-white">

        {{ Form::model($slider, ['route' => ['slides.update', $slider->id], 'method' => 'PUT', 'files' => true]) }}

        {{ Form::label('title', 'Titre') }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
        <br>
        {{ Form::label('slogan', 'Slogan') }}
        {{ Form::text('slogan', null, ['class' => 'form-control']) }}
        <br>
        {{ Form::label('label', 'Label') }}
        {{ Form::text('label', null, ['class' => 'form-control']) }}
        <br>
        {{ Form::label('link', 'Link') }}
        {{ Form::text('link', null, ['class' => 'form-control']) }}
        <br>

        {{ Form::label('photo', 'Image') }}
        {{ Form::file('photo', ['class' => 'form-control']) }}

        <br>
        <img src="{{ url('images') }}/{{ $slider->photo }}" alt="image">

        <br><br><br>

        {{ Form::submit('Mise à jour', ['class' => 'btn btn-success']) }}

        {{ Form::close() }}

    </div>

@endsection
