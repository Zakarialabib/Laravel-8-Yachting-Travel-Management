(function ($) {
    'use strict';

    $('input[type=text]').on('keydown', function (e) {
        if (e.which === 13) {
            e.preventDefault();
        }
    });

    /**
     * Event select country => show list city
     */
    $('#select_country').change(function () {
        let country_id = $(this).val();
        let select_city = $('#select_city');
        let data_resp = callAPI({
            url: getUrlAPI(`${app_url}/cities/${country_id}`, 'full'),
            method: "GET"
        });
        data_resp.then(res => {
            let html = '';
            res.forEach(function (value, index) {
                html += `<option value="${value.id}">${value.name}</option>`;
            });
            select_city.find('option').remove();
            select_city.append(html);
        });
    });

    $('#lfm').filemanager('image');

    /**
     * Upload gallery
     */
    $('#gallery').change(function () {
        var form_data = new FormData();
        form_data.append('image', this.files[0]);
        form_data.append('_token', CSRF_TOKEN);
        $.ajax({
            url: getUrlAPI('/upload-image', 'api'),
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (res) {
                console.log("res");

                if (res.fail) {
                    alert(res.errors['image']);
                } else {
                    if (res.code === 200) {
                        let html = `
                                <div class="col-sm-2 media-thumb-wrap">
                                    <figure class="media-thumb">
                                        <img src="/uploads/${res.file_name}">
                                        <div class="media-item-actions">
                                            <a class="icon icon-delete" data-filename="${res.file_name}" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                                    <g fill="#5D5D5D" fill-rule="nonzero">
                                                        <path d="M14.964 2.32h-4.036V0H4.105v2.32H.07v1.387h1.37l.924 12.25H12.67l.925-12.25h1.369V2.319zm-9.471-.933H9.54v.932H5.493v-.932zm5.89 13.183H3.65L2.83 3.707h9.374l-.82 10.863z"></path>
                                                        <path d="M6.961 6.076h1.11v6.126h-1.11zM4.834 6.076h1.11v6.126h-1.11zM9.089 6.076h1.11v6.126h-1.11z"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                            <input type="hidden" name="gallery[]" value="${res.file_name}">
                                            <span class="icon icon-loader"><i class="fa fa-spinner fa-spin"></i></span>
                                        </div>
                                    </figure>
                                </div>
                            `;
                        $('#gallery_preview').append(html);
                    }
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseJSON);
                alert(xhr.responseJSON.message);
            }
        });
    });

    // Delete preview gallery
    $(document).on("click", ".icon-delete", function (event) {
        event.preventDefault();
        let thumbnail = $(this).closest('.media-thumb-wrap');
        thumbnail.remove();
    });

    // Show thumbnail preview
    $('#thumb_image').change(function () {
        previewUploadImage(this, 'thumb_preview')
    });


})(jQuery);

/**
 * Google map
 */
// function placeMap() {
let place_lat = parseFloat($('#place_lat').val()) || -33.8688;
let place_lng = parseFloat($('#place_lng').val()) || 151.2195;

let map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: place_lat, lng: place_lng},
    zoom: 16,
    mapTypeId: 'roadmap',
    mapTypeControl: false,
    fullscreenControl: true,
    streetViewControl: false,
    disableDefaultUI: false,
});

// Create marker by lat,lng
let latLng = new google.maps.LatLng(place_lat, place_lng);
new google.maps.Marker({
    position: latLng,
    map: map,
    draggable: true
});

// Create the search box and link it to the UI element.
let input = document.getElementById('pac-input');
let searchBox = new google.maps.places.SearchBox(input);
// map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

// Bias the SearchBox results towards current map's viewport.
map.addListener('bounds_changed', function () {
    searchBox.setBounds(map.getBounds());
});

let markers = [];
// Listen for the event fired when the user selects a prediction and retrieve
// more details for that place.
searchBox.addListener('places_changed', function () {
    let places = searchBox.getPlaces();

    if (places.length === 0) {
        return;
    }

    // Clear out the old markers.
    markers.forEach(function (marker) {
        marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    let bounds = new google.maps.LatLngBounds();
    places.forEach(function (place) {
        if (!place.geometry) {
            console.log("Returned place contains no geometry");
            return;
        }

        // Create a marker for each place.
        markers.push(new google.maps.Marker({
            map: map,
            title: place.name,
            position: place.geometry.location
        }));

        if (place.geometry.viewport) {
            // Only geocodes have viewport.
            bounds.union(place.geometry.viewport);
        } else {
            bounds.extend(place.geometry.location);
        }

        $('#place_address').val(place.formatted_address);
        $('#place_lat').val(place.geometry.location.lat());
        $('#place_lng').val(place.geometry.location.lng());

    });
    map.fitBounds(bounds);
});
// }
