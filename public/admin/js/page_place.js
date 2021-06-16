
$(document).on("click", ".place_delete", function () {
    swal({
        title: "Êtes-vous sûr?",
        text: "La destination supprimé ne peut pas restaurer!",
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


$(document).on("change", ".place_status", function () {
    let place_id = $(this).attr('data-id');
    let status = $(this).is(':checked');
    updateStatusPlace(place_id, status);
});

$(document).on("click", ".place_approve", function () {
    let place_id = $(this).attr('data-id');
    if (confirm('Êtes-vous sûr?')) {
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

