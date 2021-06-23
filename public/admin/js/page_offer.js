(function ($) {
    'use strict';

    $(document).on("click", ".offer_delete", function () {
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
  
    // itinerary event
    $('#itinerary_addmore').click(function () {
        let itinerary_list = $('#itinerary_list');
        let itinerary_item = $('.itinerary_item').length;
        itinerary_list.append(`
            <div class="row form-group itinerary_item" id="itinerary_item_${itinerary_item}">
                <div class="col-md-11">
                    <div class="form-group">
                        <input type="text" class="form-control" name="itinerary[${itinerary_item}][title]" value="" placeholder="Titre">
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control tinymce_editor" name="itinerary[${itinerary_item}][description]" placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger itinerary_item_remove" id="${itinerary_item}">X</button>
                </div>
            </div>
        `);
    });


    $(document).on("click", ".itinerary_item_remove", function (event) {
        let id = event.currentTarget.getAttribute('id');
        $(`#itinerary_item_${id}`).remove();
    });
    
    $('#lfm').filemanager('image');


        
    $('#page_thumb').change(function () {
        previewUploadImage(this, 'preview_thumb')
    });

})(jQuery);