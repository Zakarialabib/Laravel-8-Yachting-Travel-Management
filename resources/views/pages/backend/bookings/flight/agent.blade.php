@extends('layouts.backend')

@section('page-title') Agent Flight Bookings  @endsection



@section('content')

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info">{{$agentReservations}}</h3>
                                <h6>{{__('Reservations Created')}}</h6>
                            </div>
                            <div>
                                <i class="icon-check info font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{$issuedTickets}}</h3>
                                <h6>{{__('Issued Ticket')}}</h6>
                            </div>
                            <div>
                                <i class="icon-plane success font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="warning">{{number_format($canceledReservations)}}</h3>
                                <h6>{{__('Cancelled Reservation')}}</h6>
                            </div>
                            <div>
                                <i class="icon-close warning font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="danger">{{$voidTickets}}</h3>
                                <h6>{{__('Void Tickets')}}</h6>
                            </div>
                            <div>
                                <i class="icon-shield danger font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('Agent Flight Reservations')}}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="la la-minus"></i></a></li>
                            <li><a data-action="expand"><i class="la la-expand"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-responsive table-bordered">
                            <thead>
                            <tr>
                                <th>{{__('Reference')}}</th>
                                <th>{{__('PNR')}}</th>
                                <th>{{__('Agent Name')}}</th>
                                <th>{{__('Amount')}}</th>
                                <th>{{__('Ticket Time Limit')}}</th>
                                <th>{{__('Payment Status')}}</th>
                                <th>{{__('Reservation Status')}}</th>
                                <th>{{__('Ticket Status')}}</th>
                                <th>{{__('Created Date')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bookings as $serial => $booking)
                                @if(App\Models\User::find($booking->user_id)->hasRole('agent'))
                                    <tr>
                                        <td>{{$booking->reference}}</td>
                                        <td>{{$booking->pnr}}</td>
                                        <td>{{\App\Models\Profile::getUserInfo($booking->user_id)->sur_name}} {{\App\Models\Profile::getUserInfo($booking->user_id)->first_name}}</td>
                                        <th>&#x20a6; {{number_format(($booking->total_amount/100), 2)}}</th>
                                        <td>{{date('d D, M Y G:i A',strtotime($booking->ticket_time_limit))}}</td>
                                        <td>
                                            @if($booking->payment_status == 1)
                                                <p class="success"><i class="la la-check"></i> Paid</p>
                                            @elseif($booking->payment_status == 0)
                                                <p class="warning"><i class="la la-warning"></i> Pending</p>
                                            @endif
                                        </td>
                                        <td class="cancel_status_{{$booking->pnr}}">
                                            @if($booking->cancel_ticket_status == 1)
                                                <p class="danger"><i class="la la-danger"></i> Cancelled</p>
                                            @elseif($booking->cancel_ticket_status == 0)
                                                @if(strtotime(date('y-m-d H:i:s')) < strtotime($booking->ticket_time_limit))
                                                    <p class="success"><i class="la la-check"></i> Reserved</p>
                                                @else
                                                    <p class="danger"><i class="la la-times-circle-o"></i> Expired</p>
                                                @endif
                                            @endif
                                        </td>
                                        <td class="ticket_status_{{$booking->pnr}}">
                                            @if($booking->issue_ticket_status == 1)
                                                <p class="success"><i class="la la-check"></i> Issued</p>
                                            @else
                                                @if(strtotime(date('y-m-d H:i:s')) < strtotime($booking->ticket_time_limit))
                                                    @if($booking->void_ticket_status == 1)
                                                        <p class="error"><i class="icon-shield"></i> Void</p>
                                                    @else
                                                        <p class="warning"><i class="la la-warning"></i> Pending</p>
                                                    @endif
                                                @else
                                                    @if($booking->void_ticket_status == 1)
                                                        <p class="error"><i class="icon-shield"></i> Void</p>
                                                    @else
                                                        <p class="danger"><i class="la la-times-circle-o"></i> Expired</p>
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{date('d D, M Y G:i A',strtotime($booking->created_at))}}</td>
                                        <td>
                                    <span class="dropdown">
				                        <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-danger dropdown-toggle">Actions</button>
				                        <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
				                            <a href="{{url('bookings/flight/itinerary-booking-information/'.$booking->reference)}}" class="dropdown-item"><i class="las la-eye"></i> View</a>
                                            {{--<button class="dropdown-item btn issue_ticket" value="{{$booking->pnr}}"><i class="la la-check"></i> Issue Ticket</button>--}}
                                            @if($booking->issue_ticket_status == 1)
                                                {{-- @if(strtotime(date('y-m-d H:i:s')) < strtotime($booking->ticket_time_limit))
                                                     <button class="dropdown-item btn void_ticket"><i class="la la-remove"></i> Void Ticket</button>
                                                 @endif--}}
                                            @else
                                                @if(strtotime(date('y-m-d H:i:s')) < strtotime($booking->ticket_time_limit))
                                                    @if($booking->cancel_ticket_status == 0)
                                                        <button class="dropdown-item btn cancel_pnr" value="{{$booking->pnr}}"><i class="la la-times-circle"></i> Cancel PNR</button>
                                                        @if($booking->payment_status == 1)
                                                            <button class="dropdown-item btn issue_ticket" value="{{$booking->pnr}}"><i class="la la-check"></i> Issue Ticket</button>
                                                        @endif
                                                    @endif
                                                @else
                                                    <button class="dropdown-item btn cancel_pnr" value="{{$booking->pnr}}"><i class="la la-times-circle"></i> Cancel PNR</button>
                                                @endif
                                            @endif
				                        </span>
				                    </span>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('javascript')
    <script src="{{asset('backend/js/pages/bookings_management.js')}}"></script>
@endsection

@section('css')

@endsection