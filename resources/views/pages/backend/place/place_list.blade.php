@extends('layouts.backend')

@section('page-title')  {{__('Places List')}}  @endsection

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Places List')}}</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('place_create')}}">{{__('Add place')}}</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white">
            <div class="x_panel">
                <div class="x_title">
                    <form class="row">
                        <div class="col-md-3 form-group">
                            <label>{{__('Select country')}}:</label>
                            <select class="form-control myselect" id="select_category_id" name="country_id" onchange="this.form.submit()">
                                <option value="">{{__('All Country')}}</option>
                                @foreach($countries as $country)
                                    @if($country_id)
                                        <option value="{{$country->id}}" {{isSelected($country->id, $country_id)}}>{{$country->name}}</option>
                                    @else
                                        <option value="{{$country->id}}" {{isSelected($country->default, 1)}}>{{$country->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>{{__('Select city')}}:</label>
                            <select class="form-control myselect" id="select_city_id" name="city_id" onchange="this.form.submit()">
                                <option value="">{{__('All City')}}</option>
                                @foreach($cities as $city)
                                    @if($city_id)
                                        <option value="{{$city->id}}" {{isSelected($city->id, $city_id)}}>{{$city->name}}</option>
                                    @else
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>{{__('Select Activity')}}:</label>
                            <select class="form-control myselect" id="select_category_id" name="category_id" onchange="this.form.submit()">
                                <option value="">{{__('All Activities')}}</option>
                                @foreach($categories as $cat)
                                    @if($cat_id)
                                        <option value="{{$cat->id}}" {{isSelected($cat->id, $cat_id)}}>{{$cat->name}}</option>
                                    @else
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <table class="table table-striped table-bordered col-4-datatable">
                        <thead>
                        <tr>
                            <th >ID</th>
                            <th >Image</th>
                            <th>{{__('Place name')}}</th>
                            <th>{{__('City')}}</th>
                            <th>{{__('Activity')}}</th>
                            <th>{{__('Status')}}</th>
                             <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($places as $place)
                            <tr>
                                <td>{{$place->id}}</td>
                                <td><img class="place_list_thumb" src="{{getImageUrl($place->thumb)}}" alt="page thumb"></td>
                                <td><a href="{{route('place_detail', $place->slug)}}">{{$place->name}}</a></td>
                                <td>{{$place['city']['name']}}</td>
                                <td>
                                    @foreach($place->categories as $cat)
                                        <span class="category_name">{{$cat->name}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if($place->status === \App\Models\Place::STATUS_PENDING)
                                        {{STATUS[$place->status]}}
                                    @else
                                        <input type="checkbox" class="js-switch place_status" name="status" data-id="{{$place->id}}" {{isChecked(1, $place->status)}} />
                                    @endif
                                </td>
                                <td class="golo-flex">
                                <div class="btn-group row">
                                 <a class="btn-sm btn-warning place_edit" href="{{route('place_edit', $place->id)}}">{{__('Edit')}}</a>
                                   @if($user->is_admin === 1)
                                    <form action="{{route('place_delete',$place->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn-sm btn-danger place_delete">{{__('Delete')}}</button>
                                    </form>
                                    @endif
                                    @if($place->status === \App\Models\Place::STATUS_PENDING)
                                        <button type="button" class="btn-sm btn-success place_approve" data-id="{{$place->id}}">{{__('Approve')}}</button>
                                    @endif
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
    <script src="{{asset('admin/js/page_place.js')}}"></script>
@endpush