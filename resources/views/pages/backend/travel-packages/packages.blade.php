@extends('layouts.backend')

@section('page-title') {{__('Travel Packages')}} @endsection

@section('content')
<div class="title_right">
    <a class="btn btn-primary" href="{{url('backoffice/travel-packages/create')}}">{{__('Create New Package')}}</a>
    </div>
    <div class="row">
     
        <div class="col-md-12">
           
            <div class="card card-white">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper">
                            <table id="flight_table" class="display table dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
                                <thead>
                                <tr>
                                    <th rowspan="1" colspan="1">#</th>
                                    <th rowspan="1" colspan="1">{{__('Package type')}}</th>
                                    <th rowspan="1" colspan="1">{{__('Package category')}}</th>
                                    <th rowspan="1" colspan="1">{{__('Package name')}}</th>
                                    <th rowspan="1" colspan="1">{{__('Phone number')}}</th>
                                    <th rowspan="1" colspan="1">{{__('Adult price')}}</th>
                                    <th rowspan="1" colspan="1">{{__('Children price')}}</th>
                                    <th rowspan="1" colspan="1">{{__('Infants price')}}</th>
                                    <th rowspan="1" colspan="1">{{__('Status')}}</th>
                                    <th rowspan="1" colspan="1">{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($packages as $serial=> $package)
                                    <tr>
                                        <td>{{$package->id}}</td>
                                        <td>
                                            @if($package->flight)
                                                <button data-toggle="modal" data-target="#flight_{{$package->id}}" class="btn btn-success btn-sm">{{__('Flight')}}</button>
                                            @endif
                                            @if($package->hotel)
                                                <button data-toggle="modal" data-target="#hotel_{{$package->id}}" class="btn btn-info btn-sm">{{__('Hotel')}}</button>
                                            @endif
                                            @if($package->attraction)
                                                <button data-toggle="modal" data-target="#atrraction_{{$package->id}}"class="btn btn-warning btn-sm">{{__('Attraction')}}</button>
                                            @endif
                                            {{--{{$package->packageType->type}}--}}
                                        </td>
                                        <td>{{ \App\Models\PackageCategory::find($package->category_id)->category}}</td>
                                        <td>{{$package->name}}</td>
                                        <td>{{$package->phone_number}}</td>
                                        <td>{{number_format($package->adult_price)}}</td>
                                        <td>{{number_format($package->child_price)}}</td>
                                        <td>{{number_format($package->infant_price)}}</td>
                                        <td id="status{{$package->id}}">
                                            @if($package->status == \App\Models\Package::DEACTIVATED)
                                                <span disabled class="btn btn-danger btn-xs">{{__('Deactivated')}}</span>
                                            @elseif($package->status == \App\Models\Package::ACTIVATED)
                                                <span disabled class="btn btn-success btn-xs">{{__('Activated')}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-sm" data-toggle="title" title="Activate Package" onclick="activate({{$package->id}})"><i class="la la-check"></i></a>
                                            <a class="btn btn-warning btn-sm" data-toggle="title" title="Deactivate Package" onclick="deactivate({{$package->id}})"><i class="la la-times"></i></a>
                                            <a class="btn btn-info btn-sm" data-toggle="title" title="Edit Package" href="{{url('backoffice/travel-packages/edit')}}/{{$package->id}}"><i class="la la-edit"></i></a>
                                            {{--<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_{{$package->id}}"><i class="fa fa-trash"></i></a>--}}
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="add_trip_{{$package->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            {!! Form::open(['url'=>'packages/sight-seeing']) !!}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="mySmallModalLabel">{{__('Add sight seeing')}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            {!! Form::label('trip_schedule', 'Title') !!}
                                                            {!! Form::text('title', null, ['class'=>'form-control', 'required'=>'required']) !!}
                                                            {!! Form::hidden('package_id', $package->id) !!}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            {!! Form::label('description', 'Schedule description') !!}
                                                            {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>'10', 'cols'=> '10', 'required'=>'required']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
                                                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>

                                    <div class="modal fade" id="delete_{{$package->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="mySmallModalLabel">{{__('Confirmation')}}</h4>
                                                </div>
                                                <div class="modal-body">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
                                                    <a type="button" class="btn btn-danger" href="{{url('backoffice/travel-packages/delete')}}/{{$package->id}}">{{__('Delete')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="flight_{{$package->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

                                        <div class="modal-dialog modal-md">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="mySmallModalLabel">{{__('Flight Information')}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {{__('Are you sure')}}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
                                                    <a type="button" class="btn btn-danger" href="{{url('packages/delete')}}/{{$package->id}}">{{__('Delete')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
@section('javascript')
    <script src="{{asset('backend/js/pages/travel-packages.js')}}" type="text/javascript"></script>
@endsection