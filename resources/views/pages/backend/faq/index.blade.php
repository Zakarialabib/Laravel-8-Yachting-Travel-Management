@extends('layouts.backend')
@section('page-title')  {{__('Terms and Conditions List')}}  @endsection

@section('content')

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title title_left mt-1">{{ __('Terms and Conditions List') }}</h3>
                        <div class="card-tools pull-right d-flex">
                            <a href="{{ route('faq.add')}}" class="btn btn-primary btn-sm">
                                {{ __('Add') }}
                            </a>
                        </div>
                    </div>
                    <div class="x_content">
                    <table class="table table-striped table-bordered col-4-datatable">
                        <thead>
                            <tr>
                                <th>{{ __('Type') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($faqs as $id=>$faq)
                            <tr>
                                <td>
                                    @if($faq->type === \App\Models\FAQ::TYPE_SALE)
                                    <span class="badge badge-success">{{ $faq->type }}</span>
                                    @elseif($faq->type === \App\Models\FAQ::TYPE_FAQ)
                                    <span class="badge badge-warning">{{ $faq->type }}</span>
                                    @elseif($faq->type === \App\Models\FAQ::TYPE_PRIVACY)
                                    <span class="badge badge-primary">{{ $faq->type }}</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $faq->title }}
                                </td>
                                
                                <td>
                                    @if($faq->status == 1)
                                        <span class="badge badge-success">{{ __('Publish') }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ __('Unpublish') }}</span>
                                    @endif

                                </td>
                               
                                <td>
                                    <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>
                                    @if($user->is_admin === 1)
                                    <form  id="deleteform" class="d-inline-block" action="{{ route('faq.delete', $faq->id ) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $faq->id }}">
                                      
                                        <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                        {{ __('Delete') }}
                                        </button>
                                    </form>
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
    <!-- /.row -->
@endsection
