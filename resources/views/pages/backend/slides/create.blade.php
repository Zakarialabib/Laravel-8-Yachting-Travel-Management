@extends('layouts.backend')

@section('content')

<div class="page-title">
    <div class="title_left">
        <h3>{{ __('Create Slider') }}</h3>
    </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 bg-white">
  <form action="{{route('slides.store')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="title">title</label>
<input type="text" class="form-control"  name="title" id="title">  
  </div>

  <div class="form-group">
    <label for="slogan">slogan</label>
<input type="text" class="form-control"  name="slogan" id="slogan">  
  </div>

  <div class="form-group">
    <label for="label">label</label>
<input type="text" class="form-control" name="label" id="label">  
  </div>

  <div class="form-group">
    <label for="Link">Link</label>
<input type="text" class="form-control" name="link" id="link">  
  </div>

<div class="form-group">
  <label for="photo">photo</label>
        <div class="input-group">
          <span class="input-group-btn">
              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
              <i class="fa fa-picture-o"></i> {{ __('Choose')}}
              </a>
          </span>
      <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
    </div>
  </div>

  

  <button class="pull-right btn btn-primary" type="submit">save</button>

  </form>

</div>

@endsection

@push('scripts')

<script>

$('#lfm').filemanager('image');

</script>

@endpush