@extends('layouts.backend')

@section('content')

<div class="card">
    <h5 class="card-header">Edit Settings</h5>
    <div class="card-body">
    <form method="post" action="{{route('settings.update')}}">
        @csrf 
        <div class="row">
          <div class="form-group col-6">
            <label for="short_des" class="col-form-label">Section Description 1<span class="text-danger">*</span></label>
            <textarea class="form-control" id="quote" name="short_des">{{$data->short_des}}</textarea>
            @error('short_des')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group col-6">
            <label for="inputPhoto" class="col-form-label">Section photo 1 <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> {{ __('Choose')}}
                    </a>
                </span>
            <input id="thumbnail1" class="form-control" type="text" name="section_photo_1" value="{{$data->section_photo_1}}">
          </div>
          <div id="holder1" style="margin-top:15px;max-height:100px;"></div>
  
            @error('section_photo_1')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        </div>
       
        <div class="form-group">
          <label for="description" class="col-form-label">Description <span class="text-danger">*</span></label>
          <textarea class="form-control" id="description" name="description">{{$data->description}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        

        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Gallery<span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> {{ __('Choose')}}
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="section_photo_2" value="{{$data->section_photo_2}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>

          @error('section_photo_2')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="headscript" class="col-form-label">Head Scripts</label>
          <textarea type="text" class="form-control" name="headscript">{{$data->headscript}}</textarea>
          @error('headscript')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="bodyscript" class="col-form-label">Body Scripts</label>
          <textarea type="text" class="form-control" name="bodyscript">{{$data->bodyscript}}</textarea>
          @error('bodyscript')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">{{ __('Update')}}</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')


@endpush
@push('scripts')
<script>
    $('#lfm').filemanager('image');
    $('#lfm1').filemanager('image');

    $(document).ready(function() {
      $('#quote').summernote({
        placeholder: "Write short Quote.....",
          tabsize: 2,
          height: 100
      });
    });
    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
</script>
@endpush