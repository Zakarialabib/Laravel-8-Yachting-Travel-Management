@extends('layouts.app')

@section('page-title') Welcome @endsection

@php
    $checkout_title_bg = "style='background-image:url(/assets/images/img-bg-blog.png)'";
@endphp
@section('content')
<main id="main" class="site-main">
  <div class="page-title page-title--small page-title--blog align-left" {!! $checkout_title_bg !!}>
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">
                            {{__('Cart')}}
                    </h1>
                </div>
            </div>
        </div><!-- .page-title -->
    <div class="container-fluid my-5">
        <div class="col-md-10 mx-3">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th style="width:50%">{{__('Place')}}</th>
                    <th style="width:10%">{{__('Price')}}</th>
                    <th style="width:10%">{{__('Nuit')}}</th>
                    <th style="width:10%">{{__('Personne')}}</th>
                    <th style="width:20%" class="text-center">{{__('Subtotal')}}</th>
                    <th style="width:10%"></th>
                </tr>
                </thead>
                <tbody>
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                        <tr id="booking-{{$id}}">
                            <td>
                                <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{asset('uploads/' .  $details['thumb'])}}" width="100" height="100" class="img-responsive"/></div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $details['price'] }}</td>
                            <td>
                                <input type="number" value="{{ $details['days'] }}" class="form-control" readonly/>
                            </td>
                            <td>
                                <input type="number" value="{{ $details['quantity'] }}" class="form-control" readonly/>
                            </td>
                            <td data-th="Subtotal" class="text-center">
                                <input type="number"  class="subtotal form-control" value="{{ $details['price'] * $details['quantity'] * $details['days'] }}" readonly>
                            </td>
                            <td class="actions" data-th="">
                                <button class="btn-block remove-from-cart" data-id="{{ $id }}"><i class="las la-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <td><a href="{{ url('/') }}" class="btn"><i class="fa fa-angle-left"></i> {{__('Continue Shopping')}}</a></td>
                    <td colspan="3" class="hidden-xs text-center"><strong id="total"></strong></td>
                    @if (session('cart') && count(session('cart')) > 0)    
                    <td><a href="{{ route('checkout_show') }}" class="btn">{{__('Checkout')}} <i class="fa fa-angle-right"></i></a></td>
                    @endif
                </tr>
                </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
 </main><!-- .site-main -->
@stop

@push('scripts')
    <script type="text/javascript">

    $(document).ready(function(){
        $('#total').text(`Total ${calcTotal()} DH`);
    });

    $(".update-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        var parent_row = ele.parents("tr");
        var quantity = parent_row.find(".quantity").val();
        var place_subtotal = parent_row.find("span.place-subtotal");
        var cart_total = $(".cart-total");
        var loading = parent_row.find(".btn-loading");
        loading.show();

        $.ajax({
            url: `${app_url}/update-cart`,
            method: "patch",
            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: quantity},
            dataType: "json",
            success: function (response) {
                loading.hide();
                $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
                $("#header-bar").html(response.data);
                place_subtotal.text(response.subTotal);
                cart_total.text(response.total);
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        deleteSwal($(this).data('id'));
        /*
        var cart_total = $(".cart-total");
        if(confirm("Are you sure")) {
            $.ajax({
                url: `${app_url}/remove-from-cart`,
                method: "delete",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                dataType: "json",
                success: function (response) {
                    parent_row.remove();
                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
                    $("#header-bar").html(response.data);
                    cart_total.text(response.total);
                }
            });
        }
        */
    });

function deleteSwal(id)
{
    swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            deleteBooking(id);
        }
    });
}

function deleteBooking(id) {
    $.ajax({
        url: `${app_url}/remove-from-cart`,
        method: "delete",
        data: {_token: '{{ csrf_token() }}', id: id},
        dataType: "json",
        success: function (response, status) {
            if(status === 'success') {
                $('#booking-'+id).remove();
                swal({
                    title: "Order deleted successfully",
                    icon: "success",
                });
                $('#total').text(`Total ${calcTotal()} DH`);
            } else {
                swal({
                    title: "Order deleted failed",
                    icon: "error",
                });
            }
        }
    });
}

function calcTotal() {
    let total = 0;
    $('.subtotal').each(function(){
        total+= parseInt($(this).val());
    });
    return total;
}
</script>

@endpush