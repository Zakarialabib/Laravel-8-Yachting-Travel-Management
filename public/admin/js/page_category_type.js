(function ($) {
  'use strict';

$(document).on("click", ".category_type_edit", function () {
    let cat_id = $(this).attr('data-catid');
    let category_type_id = $(this).attr('data-id');
    let category_type_name = $(this).attr('data-name');
    let category_type_color = $(this).attr('data-color');

    let translations = JSON.parse($(this).attr('data-translations'));

    translations.forEach(function (value) {
        $(`input[name="${value.locale}[name]"]`).val(value.name);
    });

    $('#submit_add_category_type').hide();
    $('#submit_edit_category_type').show();
    $('#add_category_type_method').val('PUT');

    $('#category_id').val(cat_id);
    $('#category_type_id').val(category_type_id);
    $('#category_type_name').val(category_type_name);
    $('#category_type_color').val(category_type_color);

    $('#modal_add_category_type').modal('show');
});

$(document).on("click", ".category_type_delete", function () {
    swal({
        title: "Êtes-vous sûr?",
        text: "L'information supprimé ne peut pas restaurer!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $(this).parent().submit();
        } 
      });
});


$('#btn_add_category_type').click(function () {
    let selected_category_id = $('#select_category_id').val();
    $('#submit_add_category_type').show();
    $('#submit_edit_category_type').hide();
    $('#add_category_type_method').val('POST');
    $('#category_id').val(selected_category_id);
    $('#modal_add_category_type').modal('show');
});

$('#icon').change(function () {
  previewUploadImage(this, 'preview_icon')
});

})(jQuery);