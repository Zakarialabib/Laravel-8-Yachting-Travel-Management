@extends('layouts.backend')

@section('page-title')  {{__('City List')}}  @endsection

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{__('City')}}</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <button class="btn btn-primary " id="btn_add_city" type="button">{{__('Add city')}}</button>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>{{__('Select country')}}:</label>
                            <form>
                                <select class="form-control" id="select_country_id" name="country_id" onchange="this.form.submit()">
                                    <option value="">{{__('Select country')}}</option>
                                    @foreach($countries as $country)
                                        @if($country_id)
                                            <option value="{{$country->id}}" {{isSelected($country->id, $country_id)}}>{{$country->name}}</option>
                                        @else
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <table class="table table-striped table-bordered col-4-datatable">
                        <thead>
                        <tr>
                            <th >ID</th>
                            <th >Image</th>
                             <th>{{__('City Name')}}</th>
                            <th>{{__('Description')}}</th>
                            <th>{{__('Priority')}}</th>
                            <th >{{__('Status')}}</th>
                             <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($cities as $city)
                            <tr>
                                <td>{{$city->id}}</td>
                                <td><img class="city_list_img" src="{{getImageUrl($city->thumb)}}" alt="city thumb"></td>
                                <td>{{$city->name}}</td>
                                <td>{{$city->description}}</td>
                                <td>{{$city->priority}}</td>
                                <td>
                                    <input type="checkbox" class="js-switch city_status" data-id="{{$city->id}}" {{isChecked($city->status, 1)}}/>
                                </td>
                                <td class="golo-flex action">
                                <div class="btn-group row">
                                    <button type="button" class="btn-sm btn-warning city_edit"
                                            data-id="{{$city->id}}"
                                            data-countryid="{{$city->country_id}}"
                                            data-name="{{$city->name}}"
                                            data-slug="{{$city->slug}}"
                                            data-intro="{{$city->intro}}"
                                            data-description="{{$city->description}}"
                                            data-thumb="{{$city->thumb}}"
                                            data-banner="{{$city->banner}}"
                                            data-besttimetovisit="{{$city->best_time_to_visit}}"
                                            data-currency="{{$city->currency}}"
                                            data-language="{{$city->language}}"
                                            data-lat="{{$city->lat}}"
                                            data-lng="{{$city->lng}}"
                                            data-priority="{{$city->priority}}"
                                            data-translations="{{$city->translations}}"
                                            data-seotitle="{{$city->seo_title}}"
                                            data-seodescription="{{$city->seo_description}}"
                                    >{{__('Edit')}}
                                    </button>
                                    @if($user->is_admin === 1)
                                    <form class="d-inline" action="{{route('city_delete',$city->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn-sm btn-danger city_delete">{{__('Delete')}}</button>
                                    </form>
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

    @include('pages.backend.city.modal_add_city')
@endsection

@push('scripts')
    <script src="{{asset('admin/js/page_city.js')}}"></script>
@endpush