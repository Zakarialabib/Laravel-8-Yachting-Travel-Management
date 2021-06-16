(function ($) {
    'use strict';

    $(document).on("click", ".booking_approve, .booking_cancel", function () {
        if (confirm('Êtes-vous sûr?'))
            $(this).parent().submit();
    });
  

    $(document).on("click", ".booking_delete", function () {
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

    $(document).on("click", ".booking_detail", function (e) {
        let booking_name = e.currentTarget.getAttribute('data-name'),
            booking_reference = e.currentTarget.getAttribute('data-reference'),
            booking_email = e.currentTarget.getAttribute('data-email'),
            booking_phone = e.currentTarget.getAttribute('data-phone'),
            booking_place = e.currentTarget.getAttribute('data-place'),
            booking_datetime = e.currentTarget.getAttribute('data-bookingdatetime'),
            booking_numberofadult = e.currentTarget.getAttribute('data-adult'),
            booking_numberofchildren = e.currentTarget.getAttribute('data-children'),
            booking_price = e.currentTarget.getAttribute('data-price'),
            booking_message = e.currentTarget.getAttribute('data-message'),
            booking_status = e.currentTarget.getAttribute('data-status'),
            booking_at = e.currentTarget.getAttribute('data-bookingat')
        ;

        $('#booking_name').text(booking_name);
        $('#booking_reference').text(booking_reference);
        $('#booking_email').text(booking_email);
        $('#booking_phone').text(booking_phone);
        $('#booking_place').text(booking_place);
        $('#booking_datetime').text(booking_datetime);
        $('#booking_numberofadult').text(booking_numberofadult);
        $('#booking_numberofchildren').text(booking_numberofchildren);
        $('#booking_price').text(booking_price);
        $('#booking_message').text(booking_message);
        $('#booking_status').text(booking_status);
        $('#booking_at').text(booking_at);

        $('#modal_booking_detail').modal('show');
    });

})(jQuery);