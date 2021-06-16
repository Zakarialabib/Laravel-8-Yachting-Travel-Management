(function ($) {
    'use strict';

    $(document).on("change", ".post_status", function () {
        let post_id = $(this).attr('data-id');
        let status = $(this).is(':checked');

        let data_resp = callAPI({
            url: getUrlAPI('/posts/status', 'api'),
            method: "put",
            body: {
                "post_id": post_id,
                "status": status ? 1 : 0
            }
        });
        data_resp.then(res => {
            if (res.code === 200) {
                notify(res.message);
            } else {
                console.log(res);
                notify('Error! Please check console.', 'error');
            }
        });
    });

    $('#post_thumb').change(function () {
        previewUploadImage(this, 'preview_thumb')
    });

    $(document).on("click", ".post_delete", function () {
        swal({
            title: "Êtes-vous sûr?",
            text: "La réservation supprimé ne peut pas restaurer!",
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

})(jQuery);