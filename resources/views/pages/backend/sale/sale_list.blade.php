@extends('layouts.backend')

@section('page-title')  {{__('Sales List')}}  @endsection

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Sales List')}}</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('sale_create_view')}}">{{__('Add New Sale')}}</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white">
            <div class="x_panel">
                <div class="x_content">
                    <table class="table table-striped table-bordered col-5-datatable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{__('User')}}</th>
                            <th>{{__('Customer')}}</th>
                            <th>{{__('Grand total')}}</th>
                            <th>{{__('Payment status')}}</th>
                            <th>{{__('Created at')}}</th>
                            <th>{{__('View details')}}</th>
                            <th>{{__('Status')}}</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{$sale->id}}</td>
                                <td>{{$sale->user->profile->sur_name}}</td>
                                <td>{{$sale->customer->profile->sur_name}}</td>
                                <td>{{$sale->grand_total}}</td>
                                <td>
                                    @if($sale->payment_status == App\Models\Payment::STATUS_PENDING)<span class="status-pending">{{__('Pending')}}</span>
                                    @elseif($sale->payment_status == App\Models\Payment::STATUS_DUE)<span class="status-due">{{__('Due')}}</span>
                                    @elseif($sale->payment_status == App\Models\Payment::STATUS_PARTIAL)<span class="status-partial">{{__('Partial')}}</span>
                                    @elseif($sale->payment_status == App\Models\Payment::STATUS_PAID)<span class="status-approved">{{__('Paid')}}</span>
                                    @endif
                                </td>
                                <td>{{formatDate($sale->created_at, 'H:i d/m/Y')}}</td>
                                <td> <button data-toggle="modal" data-target="#modal-{{$sale->id}}" type="button" class="btn-sm btn-success js-see-more" data-id="{{$sale->id}}"><i class="las la-eye"></i></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-{{$sale->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel-{{$sale->id}}" aria-hidden="true">
                                        <div class="modal-dialog" style="margin-top: 6rem; max-width: 700px" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel-{{$sale->id}}">{{$sale->reference_no}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{__('Close')}}">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <!-- Modal body -->
                                                        <p><strong>{{__('Reference')}}: </strong>{{$sale->reference_no}}</p>
                                                        <p><strong>{{__('Customer')}}: </strong>{{$sale->customer->name}}</p>
                                                        <p><strong>{{__('User')}}: </strong>{{$sale->user->profile->sur_name}}</p>
                                                        <p>
                                                            <strong>{{__('Sale Status')}}: </strong>
                                                            @if($sale->status== App\Models\Sale::STATUS_PENDING){{'Pending'}}
                                                            @elseif($sale->status== App\Models\Sale::STATUS_COMPLETE){{'Complete'}}
                                                            @endif
                                                        </p>
                                                        <p>
                                                            <strong>{{__('Payment Status')}}: </strong>
                                                            @if($sale->payment_status == App\Models\Payment::STATUS_PENDING){{__('Pending')}}
                                                            @elseif($sale->payment_status == App\Models\Payment::STATUS_DUE){{__('Due')}}
                                                            @elseif($sale->payment_status == App\Models\Payment::STATUS_PARTIAL){{__('Partial')}}
                                                            @elseif($sale->payment_status == App\Models\Payment::STATUS_PAID){{__('Paid')}}
                                                            @endif
                                                        </p>
                                                        <h3>{{__('Orders Table')}}</h3>
                                                        <table style="border-collapse: collapse; width: 100%;">
                                                            <thead>
                                                                <th style="border: 1px solid #000; padding: 5px">#</th>
                                                                <th style="border: 1px solid #000; padding: 5px">{{__('Product')}}</th>
                                                                <th style="border: 1px solid #000; padding: 5px">Qty</th>
                                                                <th style="border: 1px solid #000; padding: 5px">{{__('Price')}}</th>
                                                                <th style="border: 1px solid #000; padding: 5px">{{__('SubTotal')}}</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($sale->details as $key => $detail)
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
                                                                    <td style="border: 1px solid #000; padding: 5px">{{$sale->total_qty}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5" style="border: 1px solid #000; padding: 5px"><strong>{{__('Total Price')}}</strong></td>
                                                                    <td style="border: 1px solid #000; padding: 5px">{{$sale->total_price}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5" style="border: 1px solid #000; padding: 5px"><strong>{{__('Total Tax')}}</strong></td>
                                                                    <td style="border: 1px solid #000; padding: 5px">{{$sale->total_tax}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5" style="border: 1px solid #000; padding: 5px"><strong>{{__('Grand total')}}</strong></td>
                                                                    <td style="border: 1px solid #000; padding: 5px">{{$sale->grand_total}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5" style="border: 1px solid #000; padding: 5px"><strong>{{__('Recieved Amount')}}</strong></td>
                                                                    <td style="border: 1px solid #000; padding: 5px">
                                                                        @if($sale->paid_amount){{$sale->paid_amount}}
                                                                        @else 0 @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5" style="border: 1px solid #000; padding: 5px"><strong>{{__('Due')}}</strong></td>
                                                                    <td style="border: 1px solid #000; padding: 5px">{{number_format((float)($sale->grand_total - $sale->paid_amount), 2, '.', '')}}</td>
                                                                </tr>
                                                                @if ($sale->document)  
                                                                <tr>
                                                                    <td colspan="5" style="border: 1px solid #000; padding: 5px"><strong>{{__('Document')}}</strong></td>
                                                                    <td style="border: 1px solid #000; padding: 5px">
                                                                        <a href="/uploads/sales/documents/{{$sale->document}}">{{__('Document')}}</a>
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
                                    <input data-id="{{$sale->id}}" class="js-switch toggle-class" type="checkbox" {{isChecked($sale->is_locked, 1)}}/> 
                                @endrole
                                @role('agent')
                                @if($sale->is_locked)
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
                                            @if(!$sale->is_locked)    
                                    <a class="dropdown-item" href="{{route('sale_edit', $sale->id)}}">{{__('Edit')}}</a>
                                    @endif
                                    <a class="dropdown-item" href="{{route('invoice_create', ['type' => App\Models\Invoice::SALE_TYPE, 'id' => $sale->id])}}">{{__('Invoice')}}</a>
                                    <a class="dropdown-item" href="{{route('sale_quotation', $sale->id)}}">{{__('Quotation')}}</a>
                                    <form class="d-inline" action="{{route('return_create')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="sale_id" value="{{$sale->id}}">
                                        <button type="submit" class="dropdown-item">{{__('Return')}}</button>
                                    </form>
                                    @role('admin')
                                    <form action="{{route('sale_delete',$sale->id)}}" method="POST">
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