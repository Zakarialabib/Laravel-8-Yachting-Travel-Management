@extends('layouts.backend')
@section('page-title')  {{__('Returns List')}}  @endsection

@section('content')
<div>
    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Returns')}}</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white">
            <div class="x_panel">
                    <div class="pull-right list-inline">
                      <a class="btn btn-primary" href="{{route('return_create_view')}}">{{__('Add New Return')}}</a>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="x_content">

                    <table class="table table-striped table-bordered col-5-datatable">
                        <thead>
                        <tr>
                            <th >ID</th>
                            <th >{{__('Status')}}</th>
                            <th >{{__('Grand total')}}</th>
                            <th >{{__('Payment status')}}</th>
                            <th >{{__('Created at')}}</th>
                            <th >{{__('View details')}}</th>
                            <th >{{__('Status')}}</th>
                            <th >Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($returns as $return)
                            <tr>
                                <td>{{$return->id}}</td>
                                <td>
                                    @if($return->status == App\Models\Returns::STATUS_PENDING)<span class="status-pending">{{__('Pending')}}</span>
                                    @elseif($return->status == App\Models\Returns::STATUS_COMPLETE)<span class="status-approved">{{__('Complete')}}</span>
                                    @endif    
                                </td>
                                <td>{{$return->grand_total}}</td>
                                <td>
                                    @if($return->payment_status == App\Models\Payment::STATUS_PENDING)<span class="status-pending">{{__('Pending')}}</span>
                                    @elseif($return->payment_status == App\Models\Payment::STATUS_DUE)<span class="status-due">{{__('Due')}}</span>
                                    @elseif($return->payment_status == App\Models\Payment::STATUS_PARTIAL)<span class="status-partial">{{__('Partial')}}</span>
                                    @elseif($return->payment_status == App\Models\Payment::STATUS_PAID)<span class="status-approved">{{__('Paid')}}</span>
                                    @endif
                                </td>
                                <td>{{formatDate($return->created_at, 'H:i d/m/Y')}}</td>
                                <td>
                                    <button data-toggle="modal" data-target="#modal-{{$return->id}}" type="button" class="btn-sm btn-success js-see-more" data-id="{{$return->id}}"><i class="las la-eye"></i></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-{{$return->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel-{{$return->id}}" aria-hidden="true">
                                        <div class="modal-dialog" style="margin-top: 6rem; max-width: 700px" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel-{{$return->id}}">{{$return->reference_no}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{__('Close')}}">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <!-- Modal body -->
                                                        <p><strong>{{__('Reference')}}: </strong>{{$return->reference_no}}</p>
                                                        <p><strong>{{__('User')}}: </strong>{{$return->user->profile->sur_name}}</p>
                                                        <p>
                                                            <strong>{{__('return Status')}}: </strong>
                                                            @if($return->status== App\Models\Returns::STATUS_PENDING){{'Pending'}}
                                                            @elseif($return->status== App\Models\Returns::STATUS_COMPLETE){{'Complete'}}
                                                            @endif
                                                        </p>
                                                        <p>
                                                            <strong>{{__('Payment Status')}}: </strong>
                                                            @if($return->payment_status == App\Models\Payment::STATUS_PENDING){{__('Pending')}}
                                                            @elseif($return->payment_status == App\Models\Payment::STATUS_DUE){{__('Due')}}
                                                            @elseif($return->payment_status == App\Models\Payment::STATUS_PARTIAL){{__('Partial')}}
                                                            @elseif($return->payment_status == App\Models\Payment::STATUS_PAID){{__('Paid')}}
                                                            @endif
                                                        </p>
                                                        <h3>Orders Table</h3>
                                                        <table style="border-collapse: collapse; width: 100%;">
                                                            <thead>
                                                                <th style="border: 1px solid #000; padding: 5px">#</th>
                                                                <th style="border: 1px solid #000; padding: 5px">{{__('Product')}}</th>
                                                                <th style="border: 1px solid #000; padding: 5px">Qty</th>
                                                                <th style="border: 1px solid #000; padding: 5px">{{__('Price')}}</th>
                                                                <th style="border: 1px solid #000; padding: 5px">{{__('SubTotal')}}</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($return->details as $key => $detail)
                                                                <tr>
                                                                    <td style="border: 1px solid #000; padding: 5px">{{$key+1}}</td>
                                                                    <td style="border: 1px solid #000; padding: 5px">{{$detail->name}}</td>
                                                                    <td style="border: 1px solid #000; padding: 5px">{{$detail->qty}}</td>
                                                                    <td style="border: 1px solid #000; padding: 5px">{{$detail->price}}</td>
                                                                    <td style="border: 1px solid #000; padding: 5px">{{$detail->total}}</td>
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td colspan="5" style="border: 1px solid #000; padding: 5px"><strong>Qty </strong></td>
                                                                    <td style="border: 1px solid #000; padding: 5px">{{$return->total_qty}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5" style="border: 1px solid #000; padding: 5px"><strong>{{__('Total Cost')}}</strong></td>
                                                                    <td style="border: 1px solid #000; padding: 5px">{{$return->total_cost}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5" style="border: 1px solid #000; padding: 5px"><strong>{{__('Total Tax')}}</strong></td>
                                                                    <td style="border: 1px solid #000; padding: 5px">{{$return->total_tax}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5" style="border: 1px solid #000; padding: 5px"><strong>{{__('Grand total')}}</strong></td>
                                                                    <td style="border: 1px solid #000; padding: 5px">{{$return->grand_total}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5" style="border: 1px solid #000; padding: 5px"><strong>{{__('Recieved Amount')}}</strong></td>
                                                                    <td style="border: 1px solid #000; padding: 5px">
                                                                        @if($return->paid_amount){{$return->paid_amount}}
                                                                        @else 0 @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5" style="border: 1px solid #000; padding: 5px"><strong>{{__('Due')}}</strong></td>
                                                                    <td style="border: 1px solid #000; padding: 5px">{{number_format((float)($return->grand_total - $return->paid_amount), 2, '.', '')}}</td>
                                                                </tr>
                                                                @if ($return->document)  
                                                                <tr>
                                                                    <td colspan="5" style="border: 1px solid #000; padding: 5px"><strong>{{__('Document')}}</strong></td>
                                                                    <td style="border: 1px solid #000; padding: 5px">
                                                                        <a href="/uploads/returns/documents/{{$return->document}}">{{__('Document')}}</a>
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                        <!-- Modal Body end -->
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal End -->
                                </td>
                                <td>
                                  @role('admin')
                                    <input data-id="{{$return->id}}" class="js-switch toggle-class" type="checkbox" {{isChecked($return->is_locked, 1)}}/> 
                              @endrole
                                @role('agent')
                                @if($return->is_locked)
                                     <i class="la la-lock"></i>
                                @else
                                    <i class="la la-lock-open"></i>
                                @endif
                                @endrole
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ __('Actions') }}
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                       @if(!$return->is_locked)            
                                    <a class="dropdown-item" href="{{route('return_edit', $return->id)}}">{{__('Edit')}}</a>
                                    @endif
                                    <a class="dropdown-item" href="{{route('invoice_create', ['type' => App\Models\Invoice::RETURN_TYPE, 'id' => $return->id])}}">{{__('Invoice')}}</a>
                                    <a class="dropdown-item" href="{{route('return_quotation', $return->id)}}">{{__('Bon de Commande')}}</a>
                                    @role('admin')
                                    <form action="{{route('return_delete',$return->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="dropdown-item user_delete">{{__('Delete')}}</button>
                                    </form>
                                    @endrole
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
</div>
@endsection

@push('scripts')
    <script src="{{asset('admin/js/page_user.js')}}"></script>
    <script src="{{asset('admin/js/page_sale.js')}}"></script>
@endpush

@section('css')
    <style>
        .modal-backdrop {
            display: none;
        }
    </style>
@endsection