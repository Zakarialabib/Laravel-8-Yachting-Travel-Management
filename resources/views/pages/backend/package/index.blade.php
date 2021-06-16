@extends('layouts.backend')

@section('page-title')  {{__('Package List')}}  @endsection

@section('content')

  <div class="page-title">
      <div class="title_left">
          <h3>{{__('Package List')}}</h3>
      </div>
      <div class="title_right">
          <div class="pull-right">
              <a class="btn btn-primary" href="{{route('package_create', ['offer' => $offer->id])}}">{{__('Add Package')}}</a>
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
                            <th>#</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Min Stay')}}</th>
                            <th>{{__('Available On')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($offer->packages as $key => $package)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$package->title}}</td>
                            <td>{{$package->period}}</td>
                            <td>{{$package->start_date}} - {{$package->end_date}}</td>
                            <td class="golo-flex">
                                <div class="btn-group row">
                                    <a class="btn-sm btn-warning" href="{{route('package_edit', $package->id)}}">{{__('Edit')}}</a>
                                    <form action="{{route('package_delete', $package->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn-sm btn-danger">{{__('Delete')}}</button>
                                    </form>                            
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