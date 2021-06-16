@extends('layouts.backend')

@section('content')

<div class="page-title">
    <div class="title_left">
        <h3>{{ __('Create Slider') }}</h3>
    </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 bg-white">

{{ Form::open(array('route' => 'slides.store', 'files' => true)) }}

  {{ Form::label('title', 'Title') }}

  {{ Form::text('title', null, array('class' => 'form-control')) }}


  {{ Form::label('photo', 'Photo') }}

  {{ Form::file('photo', array('class' => 'form-control')) }}


  {{ Form::submit('Add', array('class' => 'pull-right btn btn-primary')) }}

{{ Form::close() }}

</div>

@endsection
