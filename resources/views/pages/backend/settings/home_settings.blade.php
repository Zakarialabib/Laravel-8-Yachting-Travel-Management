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
              <div class="user-image mb-3 text-center">
                  <div class="imgPreview"> </div>
              </div>            
  
              <div class="custom-file">
                  <input type="file" name="section_photo_1[]" class="custom-file-input" id="images" multiple="multiple">
                  <label class="custom-file-label" for="images">Choose image</label>
              </div>    
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
            <div class="user-image mb-3 text-center">
              <div class="imgPreview"> </div>
          </div>            

          <div class="custom-file">
              <input type="file" name="section_photo_2[]" class="custom-file-input" id="images" multiple="multiple">
              <label class="custom-file-label" for="images">Choose image</label>
          </div>  
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
    
</script>
<script type="text/javascript">
  $(function() {
       // Multiple images preview with JavaScript
       var multiImgPreview = function(input, imgPreviewPlaceholder) {

           if (input.files) {
               var filesAmount = input.files.length;

               for (i = 0; i < filesAmount; i++) {
                   var reader = new FileReader();

                   reader.onload = function(event) {
                       $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                   }

                   reader.readAsDataURL(input.files[i]);
               }
           }

       };

       $('#images').on('change', function() {
           multiImgPreview(this, 'div.imgPreview');
       });
       });    
    </script>
@endpush