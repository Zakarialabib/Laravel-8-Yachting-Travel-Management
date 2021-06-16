@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-1">{{ __('Edit Terms and Conditions') }}</h3>
                    <div class="card-tools pull-right">
                        <a href="{{ route('faq') }}" class="btn btn-primary btn-sm">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('faq.update', $faq->id) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">{{ __('Title') }}<span
                                    class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" placeholder="{{ __('Title') }}"
                                    value="{{ $faq->title }}">
                                @if ($errors->has('title'))
                                    <p class="text-danger"> {{ $errors->first('title') }} </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">{{ __('Content') }}<span
                                    class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <textarea name="content" class="form-control" id="ckeditor" rows="3"
                                    placeholder="{{ __('Content') }}">{{ $faq->content }}</textarea>
                                @if ($errors->has('content'))
                                    <p class="text-danger"> {{ $errors->first('content') }} </p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-sm-2 control-label">{{ __('Status') }}<span
                                    class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <select class="form-control" name="status">
                                    <option value="0" {{ $faq->status == '0' ? 'selected' : '' }}>
                                        {{ __('Unpublish') }}</option>
                                    <option value="1" {{ $faq->status == '1' ? 'selected' : '' }}>{{ __('Publish') }}
                                    </option>
                                </select>
                                @if ($errors->has('status'))
                                    <p class="text-danger"> {{ $errors->first('status') }} </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>

                    </form>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.row -->

@endsection
