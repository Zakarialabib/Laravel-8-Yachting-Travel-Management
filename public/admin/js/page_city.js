(function ($) {
    'use strict';

    $(document).on("click", ".city_edit", function () {
        let city_id = $(this).attr('data-id');
        let city_country_id = $(this).attr('data-countryid');
        // let city_name = $(this).attr('data-name');
        let city_slug = $(this).attr('data-slug');
        // let city_intro = $(this).attr('data-intro');
        // let city_description = $(this).attr('data-description');
        let city_thumb = $(this).attr('data-thumb');
        let city_banner = $(this).attr('data-banner');
        let city_time_to_visit = $(this).attr('data-besttimetovisit');
        let city_currency = $(this).attr('data-currency');
        let city_language = $(this).attr('data-language');
        let city_lat = $(this).attr('data-lat');
        let city_lng = $(this).attr('data-lng');
        let translations = JSON.parse($(this).attr('data-translations'));
        let seo_title = $(this).attr('data-seotitle');
        let seo_description = $(this).attr('data-seodescription');

        translations.forEach(function (value) {
            $(`input[name="${value.locale}[name]"]`).val(value.name);
            $(`input[name="${value.locale}[intro]"]`).val(value.intro);
            $(`textarea[name="${value.locale}[description]"]`).html(value.description);
        });

        $('#submit_add_city').hide();
        $('#submit_edit_city').show();
        $('#add_city_method').val('PUT');

        $('#city_id').val(city_id);
        $('#country_id').val(city_country_id);
        // $('#city_name').val(city_name);
        $('#city_slug').val(city_slug);
        // $('#city_intro').val(city_intro);
        // $('#city_description').val(city_description);
        $('#city_time_to_visit').val(city_time_to_visit);
        $('#city_currency').val(city_currency);
        $('#city_language').val(city_language);
        $('#city_lat').val(city_lat);
        $('#city_lng').val(city_lng);
        $('#pac-input').val(city_lat + ',' + city_lng);
        $('#seo_title').val(seo_title);
        $('#seo_description').val(seo_description);

        if (city_thumb) {
            $('#preview_thumb').attr('src', `/uploads/${city_thumb}`);
        } else {
            $('#preview_thumb').attr('src', `https://via.placeholder.com/120x150?text=Rentacs-Tours`);
        }

        if (city_banner) {
            $('#preview_banner').attr('src', `/uploads/${city_banner}`);
        } else {
            $('#preview_banner').attr('src', `https://via.placeholder.com/372x150?text=Rentacs-Tours`);
        }

        $('#modal_add_city').modal('show');
    });

    $(document).on("click", ".city_delete", function () {
        swal({
            title: "Êtes-vous sûr?",
            text: "La ville supprimé ne peut pas restaurer!",
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

    $('#btn_add_city').click(function () {
        let selected_country_id = $('#select_country_id').val();
        $('#submit_add_city').show();
        $('#submit_edit_city').hide();
        $('#add_city_method').val('POST');
        $('#country_id').val(selected_country_id);
        $('#modal_add_city').modal('show');
    });

    $(document).on("change", ".city_status", function () {
        let city_id = $(this).attr('data-id');
        let status = $(this).is(':checked');

        let data_resp = callAPI({
            url: getUrlAPI('/city/status', 'api'),
            method: "put",
            body: {
                "city_id": city_id,
                "status": status ? 1 : 0
            }
        });
        data_resp.then(res => {
            if (res.code === 200) {
                notify(res.message);
            } else {
                console.log(res);
                notify('Error!', 'error');
            }
        });
    });


    /**
     * Popup add/edit city
     */
    $('#city_name').keyup(function () {
        let city_name = $(this).val();
        let slug = toSlug(city_name);
        $('#city_slug').val(slug);
    });

    $('#city_thumb').change(function () {
        previewUploadImage(this, 'preview_thumb')
    });

    $('#city_banner').change(function () {
        previewUploadImage(this, 'preview_banner')
    });

})(jQuery);
