@extends('layouts.backend')

@section('content')

<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                     <h3 class="card-title"> {{ __('Send Mail to Subscribers') }} </h3>
                </div>
        <div class="card-content">        
                            <form class="" action="{{route('admin.subscribers.sendmail')}}" method="post">
                                @csrf
                                <div class="flex flex-wrap  justify-center">
                                    <div class="lg:w-2/3 pr-4 pl-4">
                                        <div class="mb-4">
                                            <label for="">{{ __('Subject') }} <span class="text-red-600">*</span></label>
                                            <input type="text" class="form-control" name="subject" value="" 
                                            placeholder="{{ __('Enter subject of E-mail') }}">
                                            @if ($errors->has('subject'))
                                              <p class="text-red-600 mb-0">{{$errors->first('subject')}}</p>
                                            @endif
                                          </div>
                                          <div class="mb-4">
                                            <label for="">{{ __('Message') }} <span class="text-red-600">*</span></label>
                                            <textarea type="text" class="form-control" id="ckeditor" 
                                            name="content_message" rows="6"></textarea>

                                            @if ($errors->has('message'))
                                              <p class="text-red-600 mb-0">{{$errors->first('message')}}</p>
                                            @endif
                                          </div>
                                          <button type="submit" class="btn-sm btn-success">
                                          {{ __('Send Mail') }} 
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div> 
                    </div> 
            </div>
      </div>
    <!-- /.row -->
@endsection