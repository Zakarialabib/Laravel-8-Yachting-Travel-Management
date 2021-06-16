$(function() {

	setSubTotal();

    $('#add_return_details').on('click', function() {
        duplicateTableRow();
    });

    $(document).on('click', '.delete-row', function() {
        if($('#return_details').find('tr').length > 2)
            removeTableRow($(this));
            setSubTotal();
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
  let tr = $(`#return_details`).find('tr:last').clone();
  tr.children('td').first('td').text(parseInt(tr.first('td').text()) + 1);
  tr.find('input[name="name[]"]').val('');
  tr.find('input[name="qty[]"]').val('');
  tr.find('input[name="price[]"]').val('');
  tr.find('input[name="total[]"]').val('');
  $(`#return_details`).append(tr);
}

function removeTableRow(element) {
  element.closest("tr").remove();
}