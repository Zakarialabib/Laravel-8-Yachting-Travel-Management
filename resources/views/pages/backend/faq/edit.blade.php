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
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}<span
                                    class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" placeholder="{{ __('Title') }}"
                                    value="{{ $faq->title }}">
                                @if ($errors->has('title'))
                                    <p class="text-danger"> {{ $errors->first('title') }} </p>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="content">{{ __('Content') }}<span
                                    class="text-danger">*</span></label>
                                <textarea name="content" class="form-control" id="ckeditor" rows="3"
                                    placeholder="{{ __('Content') }}">{{ $faq->content }}</textarea>
                                @if ($errors->has('content'))
                                    <p class="text-danger"> {{ $errors->first('content') }} </p>
                                @endif
                        </div>
                        <div class="row">
                        <div class="form-group col-6">
                            <label for="type">{{ __('Type') }}<span
                                    class="text-danger">*</span></label>

                                <select class="form-control" name="type">
                                    <option value="sale" {{ $faq->type == 'sale' ? 'selected' : '' }}>{{ __('Sale') }}</option>
                                    <option value="faq" {{ $faq->type == 'faq' ? 'selected' : '' }}>{{ __('Faq') }}</option>
                                    <option value="privacy" {{ $faq->type == 'privacy' ? 'selected' : '' }}>{{ __('Privacy') }}</option>
                                </select>
                                @if ($errors->has('type'))
                                    <p class="text-danger"> {{ $errors->first('type') }} </p>
                                @endif
                        </div>
                        <div class="form-group col-6">
                            <label for="status">{{ __('Status') }}<span
                                    class="text-danger">*</span></label>

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
