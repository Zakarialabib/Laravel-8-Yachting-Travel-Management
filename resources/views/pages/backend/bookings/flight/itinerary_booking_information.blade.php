@extends('layouts.backend')

@section('page-title') Itinerary Booking Information  @endsection



@section('content')

   @php

      $user = \App\Models\User::find($booking->user_id);
      $profile = \App\Models\Profile::where('user_id',$booking->user_id)->first();
      $user['profile'] = $profile;
   @endphp
<div class="row">
    <div class="col-md-4">
         @if($booking->payment_status == 0)
            @if(strtotime(date('y-m-d H:i:s')) < strtotime($booking->ticket_time_limit))
            <div class="card">
            <div class="card-header">
                <h4 class="card-title">Payment Pending (Try Again)</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="la la-minus"></i></a></li>
                        <li><a data-action="expand"><i class="la la-expand"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse">
                <div class="card-body">
                    <p class="info"> Your payment is still pending for this booking, we will not be able to issue the ticket for this reservation until you make payment</p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>Pay with </th>
                                <td>
                                    <input  type="hidden"  class="booking_reference" value="{{$booking->reference}}"/>
                                   
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            @endif
        @endif
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Booking Information</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="la la-minus"></i></a></li>
                        <li><a data-action="expand"><i class="la la-expand"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                   <div class="table-responsive">
                       <table class="table">
                           <tbody>
                           <tr>
                               <td>PNR</td>
                               <th>{{$booking->pnr}}</th>
                           </tr>
                           <tr>
                               <td>{{__('Reference')}}</td>
                               <td>{{$booking->reference}}</td>
                           </tr>
                           <tr>
                               <td>{{__('Payment Status')}}</td>
                               <td>
                                   @if($booking->payment_status == 1)
                                       <b class="success"><i class="la la-check"></i> Paid</b>
                                   @elseif($booking->payment_status == 0)
                                       <b class="warning"><i class="la la-warning"></i> Pending</b>
                                   @endif
                               </td>
                           </tr>
                           <tr>
                               <td>{{__('Reservation Status')}}</td>
                               <td>
                                   @if($booking->cancel_ticket_status == 1)
                                       <b class="danger"><i class="la la-danger"></i> Cancelled</b>
                                   @elseif($booking->cancel_ticket_status == 0)
                                       @if(strtotime(date('y-m-d H:i:s')) < strtotime($booking->ticket_time_limit))
                                           <b class="success"><i class="la la-check"></i> Reserved</b>
                                       @else
                                           <b class="danger"><i class="la la-times-circle-o"></i> Expired</b>
                                       @endif
                                   @endif
                               </td>
                           </tr>
                           <tr>
                               <td>Ticket Status</td>
                               <td>
                                   @if($booking->issue_ticket_status == 1)
                                       <b class="success"><i class="la la-check"></i> Issued</b>
                                   @else
                                       @if(strtotime(date('y-m-d H:i:s')) < strtotime($booking->ticket_time_limit))
                                           @if($booking->void_ticket_status == 1)
                                               <b class="error"><i class="icon-shield"></i> Void</b>
                                           @else
                                               <b class="warning"><i class="la la-warning"></i> Pending</b>
                                           @endif
                                       @else
                                           @if($booking->void_ticket_status == 1)
                                               <b class="error"><i class="icon-shield"></i> Void</b>
                                           @else
                                               <b class="danger"><i class="la la-times-circle-o"></i> Expired</b>
                                           @endif
                                       @endif
                                   @endif
                               </td>
                           </tr>
                           <tr>
                               <td>Base Amount</td>
                               <td> + &#x20a6;{{number_format(($booking->itinerary_amount/100),2)}}</td>
                           </tr>
                           <tr>
                               <td>Service Charge</td>
                               <td> + &#x20a6;{{number_format(($booking->markup/100),2)}}</td>
                           </tr>
                           <tr>
                               <td>Discount</td>
                               <td> - &#x20a6;{{number_format(($booking->markdown/100),2)}}</td>
                           </tr>
                           <tr>
                               <td>VAT</td>
                               <td> + &#x20a6;{{number_format(($booking->vat/100),2)}}</td>
                           </tr>
                           <tr>
                               <td>Voucher Amount</td>
                               <td> - &#x20a6;{{number_format(($booking->voucher_amount/100),2)}}</td>
                           </tr>
                           <tr>
                               <th>Total Amount Paid</th>
                               <th> &#x20a6;{{number_format(($booking->total_amount/100),2)}}</th>
                           </tr>
                           </tbody>
                       </table>
                   </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-8 col-md-offset">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Passenger(s) Information</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="la la-minus"></i></a></li>
                                <li><a data-action="expand"><i class="la la-expand"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                         <div class="row">
                             @if(isset(json_decode($booking->pnr_request_response,true)['passengers']))
                             @foreach(json_decode($booking->pnr_request_response,true)['passengers'] as $serial => $passenger)
                             <div class="col-md-12">
                                 <div class="row">
                                     <div class="col-md-2">
                                      <h4>{{$passenger['Customer']['PersonName']['@attributes']['NameType']}}</h4>
                                     </div>
                                     <div class="col-md-10">
                                        <h5><b>{{$passenger['Customer']['PersonName']['Surname']}} {{$passenger['Customer']['PersonName']['GivenName']}}</b></h5>
                                     </div>
                                 </div>
                             </div>
                             @endforeach
                             @endif
                         </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(isset(json_decode($booking->pnr_request_response,true)['flights']))
            @foreach(json_decode($booking->pnr_request_response,true)['flights'] as $serial => $flight)
            <div class="col-md-12">
                <div class="card pull-up border-blue-grey">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                              <div class="col-md-12" align="center">
                                 <div class="row">
                                     <div class="col-md-2">
                                         <img class="img-circle" style="max-width: 80px; max-height:80px;" src="{{\App\Services\AmadeusConfig::airlineLogo(\App\Airline::where('name',$flight['Air']['OperatingAirline'])->first()->code)}}"/>
                                     </div>
                                     <div class="col-md-4">
                                         <h4><b>{{$flight['Air']['DepartureAirport']}}</b></h4>
                                        <p>{{date('d, D M Y. G:i A',strtotime($flight['Air']['@attributes']['DepartureDateTime']))}}</p>
                                     </div>
                                     <div class="col-md-2">
                                          <p>Flight - {{$flight['Air']['@attributes']['FlightNumber']}}</p>
                                         <p>{{$flight['Air']['Equipment']}}</p>
                                     </div>
                                     <div class="col-md-4">
                                         <h4><b>{{$flight['Air']['ArrivalAirport']}}</b></h4>
                                         <p>{{date('d, D M Y. G:i A',strtotime($flight['Air']['@attributes']['ArrivalDateTime']))}}</p>
                                     </div>
                                 </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

    </div>
</div>

@endsection



@section('javascript')
    <script src="{{asset('backend/js/pages/payment_option.js')}}"></script>
@endsection

@section('css')

@endsection