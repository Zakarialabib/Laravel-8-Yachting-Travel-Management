@extends('layouts.backend')

@section('page-title')  {{__('Offer List')}}  @endsection

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Offer List')}}</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('offer_create')}}">{{__('Add Offer')}}</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white">
            <div class="x_panel">
                <div class="x_content">
                    <table class="table table-striped table-bordered col-4-datatable">
                        <thead>
                        <tr>
                            <th >ID</th>
                            <th >Image</th>
                            <th>{{__('Offer name')}}</th>
                            <th>{{__('Is Featured')}}</th>
                            <th>{{__('Category')}}</th>
                            <th>{{__('Status')}}</th>
                             <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offers as $offer)
                            <tr>
                                <td>{{$offer->id}}</td>
                                <td>
                                    @php
                                    $photos=explode(',',$offer->thumb);
                                    // dd($photo);
                                    @endphp
                                    <img class="offer_list_thumb" src="{{$photos[0]}}" alt="{{$offer->name}}" />
                                </td>
                                <td>
                                    <a href="{{route('offer.show', $offer->slug)}}">
                                        {{$offer->name}}
                                    </a>
                                </td>
                                <td>
                                {{(($offer->is_featured==1)? 'Yes': 'No')}}
                                </td>
                                <td>
                                {{$offer->categories->name}}
                                </td>
                                <td>
                                    @if($offer->status === \App\Models\Offer::STATUS_PENDING)
                                        {{STATUS[$offer->status]}}
                                    @else
                                        <input type="checkbox" class="js-switch offer_status" name="status" data-id="{{$offer->id}}" {{isChecked(1, $offer->status)}} />
                                    @endif
                                </td>
                                <td class="golo-flex">
                                <div class="btn-group row">
                                 <a class="btn-sm btn-warning offer_edit" href="{{route('offer_edit', $offer->id)}}">{{__('Edit')}}</a>
                                    @if($user->is_admin === 1)
                                    <form action="{{route('offer_delete',$offer->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn-sm btn-danger offer_delete">{{__('Delete')}}</button>
                                    </form>
                                    @endif
                                    @if($offer->status === \App\Models\Offer::STATUS_PENDING)
                                        <button type="button" class="btn-sm btn-success offer_approve" data-id="{{$offer->id}}">{{__('Approve')}}</button>
                                    @endif
                                        <a class="btn-sm btn-success" href="{{ route('package_index', ['offer' => $offer->id]) }}">{{__('Packages')}}</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection
@push('scripts')
    <script src="{{asset('admin/js/page_offer.js')}}"></script>
@endpush