(function ($) {
    'use strict';

    $(document).on("change", ".post_status", function () {
        let page_id = $(this).attr('data-id');
        let status = $(this).is(':checked');

        let data_resp = callAPI({
            url: getUrlAPI('/pages/status', 'api'),
            method: "put",
            body: {
                "page_id": page_id,
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

    $('#page_thumb').change(function () {
        previewUploadImage(this, 'preview_thumb')
    });

})(jQuery);