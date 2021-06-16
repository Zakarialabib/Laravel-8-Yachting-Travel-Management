$(function() {

    setSubTotal();

    $('#add_details').on('click', function() {
        duplicateTableRow();
    });

    $(document).on('click', '.delete-row', function() {
        if($('#details_table').find('tr').length > 2) {
            removeTableRow($(this));
            setSubTotal();
        }
    });

    $(document).on('change keyup', '.qty', function() {
        let total = $(this).val() * $(this).closest('tr').find('.price').val();
        setItemTotal($(this),total);
    });

    $(document).on('change keyup', '.price', function() {
        let total = $(this).val() * $(this).closest('tr').find('.qty').val();
        setItemTotal($(this), total);
    });

    $(document).on('change keyup', '#tax', function() {
        setTaxAmount();
    });

    $(document).on('change keyup', '#paid_amount', function() {
        setChange();
    });

    $('#js-validate-btn').on('click', function(event){
        event.preventDefault();
        $('input[name="is_locked"]').val(1);
        swal({
            title: "Validation success",
            text: "purchase validated successfully",
            icon: "success",
        });
    });

    $( "#js-save" ).on('click', function(event) {
        event.preventDefault();
        if($('input[name="is_locked"]').val() == 0) {
            swal({
                title: "Validation",
                text: "purchase need validation",
                icon: "error",
            });
        } else {
            $( "#form" ).submit();
        }
    });

    $(document).on("change", ".toggle-class", function () {
        let is_locked = $(this).prop('checked') == true ? 1 : 0 ;
        let purchase_id = $(this).data('id');
    
        $.ajax({
            type : "get",
            dataType : "json",
            url : 'purchases/status',
            data : { 'is_locked' : is_locked, 'purchase_id' : purchase_id },
            success : function(data) {
                swal({
                title: "ACTIVATED",
                text: "Changement de status reussie!",
                icon: "warning",
                buttons: false,
                dangerMode: true,
                });
            }
        });
    });

});

function setChange() {
    $('#change').val(($('#amount_topay').val() - $('#paid_amount').val()).toFixed(2));
}

function setTaxAmount() {
    $('#tax_amount').val($('#sub_total').val() * $('#tax').val() / 100);
    setTotal();
}

function setTotal() {
    let total = (parseFloat($('#sub_total').val()) + parseFloat($('#sub_total').val() * $('#tax').val() / 100)).toFixed(2);
    $('#total_amount').val(total);
    $('#amount_topay').val(total);
    setChange();
}

function setSubTotal() {
    let subTotal = 0;
    $('.total').each(function() {
        subTotal += parseFloat($(this).val());
    });
    $('#sub_total').val(parseFloat(subTotal).toFixed(2));
    setTaxAmount();
}

function setItemTotal(element, total) {
    element.closest('tr').find('.total').val(total.toFixed(2));
    setSubTotal();
}

function duplicateTableRow() {
    let tr = $(`#details_table`).find('tr:last').clone();
    tr.children('td').first('td').text(parseInt(tr.first('td').text()) + 1);
    tr.find('input[name="name[]"]').val('');
    tr.find('input[name="qty[]"]').val('');
    tr.find('input[name="price[]"]').val('');
    tr.find('input[name="total[]"]').val('');
    $(`#details_table`).append(tr);
}

function removeTableRow(element) {
    element.closest("tr").remove();
}

function handleDocumentDelete() {
    var id = $('#form').data('sale');

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this document",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: `/backoffice/achats/ajax-delete-file`,
                data: {
                    'purchase': id
                },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data.status === true) {
                        $('#document').data('document', '0');
                        $('#document-yes').css('display', 'none');
                        $('#document-no').css('display', 'block');
                        swal("Document has been deleted!", {
                            icon: "success",
                        });
                    }
                },
                error: function (e) {
                    console.log(e);
                }
            });
        }
    });
}
