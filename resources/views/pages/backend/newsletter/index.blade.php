@extends('layouts.backend')

@section('content')

<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> {{ __('Newsletters') }} - {{ __('Email List') }}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline">
                        <li><a class="btn btn-primary" href="{{ route('admin.newsletter.add')}}">{{ __('Add Email') }}</a></li>
                        <li><a class="btn btn-danger" href="{{ route('admin.mailsubscriber')}}" >{{ __('Send Email Promotion') }}</a></li>   
                        </ul>
                    </div>      
                </div>
                    <!-- /.card-header -->
                    <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered file-export">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newsletters as $id=>$newsletter)
                            <tr>
                                <td>
                                    {{ $id }}
                                </td>
                                <td scope='row'>
                                    {{ $newsletter->email }}
                                </td>
                                <td scope='row'>
                                <button type="button" class="btn-sm btn-success"  style='margin-bottom:2px;'>
                                  <a href="{{ route('admin.newsletter.edit', $newsletter->id) }}" class="no-underline text-white ">Modifier</a>

                                  </button> 
                                    <form  id="deleteform" class="inline-block" action="{{ route('admin.newsletter.delete', $newsletter->id ) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $newsletter->id }}">
                                        <button type="button" class="btn-sm btn-danger place_delete" id='delete'>{{__('Delete')}}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </div>
                    </div>
                   </div>
                  </div>
                </div>
            </div>
    
@endsection