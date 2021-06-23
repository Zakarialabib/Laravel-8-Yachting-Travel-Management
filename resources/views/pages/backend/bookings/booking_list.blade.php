@extends('layouts.backend')

@section('page-title')  {{__('Bookings List')}}  @endsection

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Bookings')}}</h3>
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
                                    <th >{{__('Client infos')}}</th>
                                    <th >{{__('Place')}}</th>
                                    <th >{{__('Booking For')}}</th>
                                    <th >{{__('Booking at')}}</th>
                                    <th >{{__('Status')}}</th>
                                    <th >{{__('Payment')}}</th>
                                    <th >{{__('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                     @foreach($bookings as $booking)
                                     <tr>
                                    @if($booking->type === \App\Models\Booking::TYPE_BOOKING_FORM)
                                        @php
                                            $booking_name = $booking->name;
                                            $booking_email = $booking->email;
                                            $booking_phone = $booking->phone_number;
                                        @endphp
                                        <td>{{$booking_name}} -
                                            <small> {{$booking->phone_number}} - {{$booking->email}}</small>
                                        </td>
                                    @else
                                        @php
                                            $booking_name = $booking->name;
                                            $booking_email = $booking->email;
                                            $booking_phone = $booking->phone_number;
                                        @endphp
                                        <td>{{$booking_name}}</td>
                                    @endif
                                    @if($booking->bookable && (get_class($booking->bookable) === 'App\Models\Place'))
                                        <td><a href="{{route('place_detail', $booking->bookable->slug)}}" target="_blank">{{$booking->bookable->name}}</a></td>
                                    @elseif($booking->bookable && (get_class($booking->bookable) === 'App\Models\Package'))
                                    <td><a href="{{route('offer.show', $booking->bookable->offer->slug)}}" target="_blank">{{$booking->bookable->offer->name}}</a></td>                                        
                                    @else
                                    <td> Booking Form  </td>  
                                    @endif
                                    <td>{{$booking->date}}</td>
                                <td>{{formatDate($booking->created_at, 'd/m/Y H:i')}}</td>
                                <td>
                                    @if($booking->status === \App\Models\Booking::STATUS_PENDING)
                                        <span class="status-pending">{{__('PENDING')}}</span>
                                    @elseif($booking->status === \App\Models\Booking::STATUS_ACTIVE)
                                        <span class="status-approved">{{__('Approved')}}</span>
                                    @else
                                        <span class="status-cancel">{{__('Cancel')}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($booking->payment_status === \App\Models\Booking::STATUS_PAID)
                                        <span class="status-approved">{{__('Paid')}}</span>
                                    @else
                                        <span class="status-pending">{{__('Unpaid')}}</span>
                                    @endif
                                </td>
                                <td>
                                <div class="dropdown">
                                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __('Actions') }}
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @if(isset($booking['place']))
                                        <button type="button" data-target="modal_booking_detail"  class="dropdown-item booking_detail"
                                                data-id="{{$booking->id}}"
                                                data-reference="{{$booking->reference}}"
                                                data-name="{{$booking_name}}"
                                                data-email="{{$booking_email}}"
                                                data-phone="{{$booking_phone}}"
                                                data-place="{{$booking['place']['name']}}"
                                                data-bookingdatetime="{{$booking->time}} {{formatDate($booking->date, 'd/m/Y')}}"
                                                data-bookingat="{{formatDate($booking->created_at, 'H:i d/m/Y')}}"
                                                data-status="{{STATUS[$booking->status]}}"
                                                data-price="{{$booking['place']['price']}}"
                                                data-message="{{$booking->message}}"
                                                data-adult="{{$booking->numbber_of_adult}}"
                                                data-children="{{$booking->numbber_of_children}}"
                                                data-type="{{$booking->type}}"
                                        >{{__('Detail')}}
                                        </button>
                                        @elseif($booking->bookable && (get_class($booking->bookable) === 'App\Models\Package'))
                                                <button type="button" data-target="modal_booking_detail"  class="dropdown-item booking_detail"
                                                data-id="{{$booking->bookable->offer->id}}"
                                                data-reference="{{$booking->reference}}"
                                                data-name="{{$booking_name}}"
                                                data-email="{{$booking_email}}"
                                                data-phone="{{$booking_phone}}"
                                                data-place="{{$booking->name}}"
                                                data-bookingdatetime="{{$booking->bookable->offer->time}} {{formatDate($booking->bookable->offer->date, 'd/m/Y')}}"
                                                data-bookingat="{{formatDate($booking->bookable->offer->created_at, 'H:i d/m/Y')}}"
                                                data-status="{{STATUS[$booking->bookable->offer->status]}}"
                                                data-price="{{$booking->bookable->offer->price}}"
                                                data-message="{{$booking->bookable->offer->message}}"
                                                data-adult="{{$booking->bookable->offer->numbber_of_adult}}"
                                                data-children="{{$booking->bookable->offer->numbber_of_children}}"
                                                data-type="{{$booking->bookable->offer->type}}"
                                        >{{__('Detail')}}
                                        </button>
                                        @else()
                                        <button type="button" data-target="modal_booking_detail"  class="dropdown-item booking_detail"
                                        data-id="{{$booking->id}}"
                                        data-reference="{{$booking->reference}}"
                                        data-name="{{$booking_name}}"
                                        data-email="{{$booking_email}}"
                                        data-phone="{{$booking_phone}}"
                                        data-bookingdatetime="{{$booking->time}} {{formatDate($booking->date, 'd/m/Y')}}"
                                        data-bookingat="{{formatDate($booking->created_at, 'H:i d/m/Y')}}"
                                        data-status="{{STATUS[$booking->status]}}"
                                        data-message="{{$booking->message}}"
                                        data-adult="{{$booking->numbber_of_adult}}"
                                        data-children="{{$booking->numbber_of_children}}"
                                        data-type="{{$booking->type}}"
                                        >{{__('Detail')}}
                                        </button>
                                    @endif
                                    @if($booking->status === \App\Models\Booking::STATUS_PENDING || $booking->status === \App\Models\Booking::STATUS_DEACTIVE)
                                            <form class="d-inline" action="{{route('booking_update_status')}}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="booking_id" value="{{$booking->id}}">
                                                <input type="hidden" name="status" value="{{\App\Models\Booking::STATUS_ACTIVE}}">
                                                <button type="button" class="dropdown-item booking_approve" data-id="{{$booking->id}}">{{__('Approve')}}</button>
                                            </form>
                                        @endif
                                        @if($booking->status === \App\Models\Booking::STATUS_PENDING || $booking->status === \App\Models\Booking::STATUS_ACTIVE)
                                            <form class="d-inline" action="{{route('booking_update_status')}}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="booking_id" value="{{$booking->id}}">
                                                <input type="hidden" name="status" value="{{\App\Models\Booking::STATUS_DEACTIVE}}">
                                                <button type="button" class="dropdown-item booking_cancel">{{__('Cancel')}}</button>
                                            </form>
                                        @endif
                                    @if($user->is_admin === 1)
                                    <form action="{{route('booking_delete',$booking->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="dropdown-item booking_delete">{{__('Delete')}}</button>
                                    </form>
                                    @endif
                                    </div>
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
    @include('pages.backend.bookings.modal_booking_detail')
   
    @endsection


@push('scripts')
    <script src="{{asset('admin/js/page_booking.js')}}"></script>
@endpush