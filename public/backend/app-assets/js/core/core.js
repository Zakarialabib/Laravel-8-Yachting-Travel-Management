

(function ($) {
    'use strict';

    $('.language_default').change(function (e) {
        let language_id = e.currentTarget.getAttribute('data-id');
        let data_resp = callAPI({
            url: getUrlAPI('/languages/default', 'api'),
            method: "put",
            body: {
                "language_id": language_id
            }
        });
        data_resp.then(res => {
            if (res.code === 200) {
                notify(res.message);
                location.reload();
            } else {
                console.log(res);
                notify('Error!', 'error');
            }
        });
    });


    $(document).on("click", ".place_delete", function () {
        if (confirm('Are you sure? The place that deleted can not restore!'))
            $(this).parent().submit();
    });
    
    $(document).on("change", ".place_status", function () {
        let place_id = $(this).attr('data-id');
        let status = $(this).is(':checked');
        updateStatusPlace(place_id, status);
    });
    
    $(document).on("click", ".place_approve", function () {
        let place_id = $(this).attr('data-id');
        if (confirm('Are you sure?')) {
            updateStatusPlace(place_id, 1);
            location.reload();
        }
    });
    
    function updateStatusPlace(place_id, status) {
        let data_resp = callAPI({
            url: getUrlAPI('/places/status', 'api'),
            method: "put",
            body: {
                "place_id": place_id,
                "status": status
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
    }

    
// USER REGISTER NOTIFICATION

$(document).ready(function(){
    setInterval(function(){
            $.ajax({
                    type: "GET",
                    url:$("#user-notf-count").data('href'),
                    success:function(data){
                        $("#user-notf-count").html(data);
                      }
              });
    }, 1000 * 60 * 10);

    setInterval(function(){
        $.ajax({
                type: "GET",
                url:$("#booking-notf-count").data('href'),
                success:function(data){
                    $("#booking-notf-count").html(data);
                  }
          });
    },  1000 * 60 * 10);
});

$(document).on('click','#notf_user',function(){
  $("#user-notf-count").html('0');
  $('#user-notf-show').load($("#user-notf-show").data('href'));
});

$(document).on('click','#user-notf-clear',function(){
  $(this).parent().parent().trigger('click');
  $.get($('#user-notf-clear').data('href'));
});

// USER REGISTER NOTIFICATION ENDS

// booking NOTIFICATION


$(document).on('click','#notf_booking',function(){
  $("#booking-notf-count").html('0');
  $('#booking-notf-show').load($("#booking-notf-show").data('href'));
});

$(document).on('click','#booking-notf-clear',function(){
  $(this).parent().parent().trigger('click');
  $.get($('#booking-notf-clear').data('href'));
});

// booking NOTIFICATION ENDS



// iCheck
$(document).ready(function () {
    if ($("input.flat")[0]) {
        $(document).ready(function () {
            $('input.flat').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
        });
    }
});
// /iCheck

})(jQuery);
