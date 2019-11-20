<script src="https://www.google.com/recaptcha/api.js?render=6LehdbEUAAAAANMFXqlZoBkppIgi6mjan55gB7Jr"></script>
<script>
    grecaptcha.ready(function () {
        grecaptcha.execute('6LehdbEUAAAAANMFXqlZoBkppIgi6mjan55gB7Jr', {action: 'homepage'}).then(function (token) {
            // pass the token to the backend script for verification
        });
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{Config::get('services.google_maps')}}&libraries=places&callback=initMap"
async defer></script>
<script>
    "use strict";


    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 48.8575186, lng: 2.2925093},
            zoom: 12,
        });
        new AutocompleteDirectionsHandler(map);
    }



    /**
     * @constructor
     */
    function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'DRIVING';
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originInput = document.getElementById('lieu_depart');
        var destinationInput = document.getElementById('lieu_arrive');
        var modeSelector = document.getElementById('mode-selector');

        var originAutocomplete = new google.maps.places.Autocomplete(originInput);
        // Specify just the place data fields that you need.
        originAutocomplete.setFields(['place_id', 'geometry']);

        var destinationAutocomplete =
                new google.maps.places.Autocomplete(destinationInput);
        // Specify just the place data fields that you need.
        destinationAutocomplete.setFields(['place_id', 'geometry']);

        //    var lieu_depart = document.getElementById('lieu_depart');
//    var lieu_arrive = document.getElementById('lieu_arrive');
//    var autocomplete_lieu_depart = new google.maps.places.Autocomplete(lieu_depart);
//    var autocomplete_lieu_arrive = new google.maps.places.Autocomplete(lieu_arrive);
//
//
        google.maps.event.addListener(originAutocomplete, 'place_changed', function (event) {
            var place = originAutocomplete.getPlace();
            //console.log(place)
            document.getElementById('lieu_depart_lat').value = place.geometry.location.lat();
            document.getElementById('lieu_depart_let').value = place.geometry.location.lng();
        });

        google.maps.event.addListener(destinationAutocomplete, 'place_changed', function (event) {
            var place = destinationAutocomplete.getPlace();
            //console.log(place)
            document.getElementById('lieu_arrive_lat').value = place.geometry.location.lat();
            document.getElementById('lieu_arrive_let').value = place.geometry.location.lng();
        });

        this.setupClickListener('changemode-walking', 'WALKING');
        this.setupClickListener('changemode-transit', 'TRANSIT');
        this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');


    }

    // Sets a listener on a radio button to change the filter type on Places
    // Autocomplete.
    AutocompleteDirectionsHandler.prototype.setupClickListener = function (
            id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;

        radioButton.addEventListener('click', function () {
            me.travelMode = mode;
            me.route();
        });
    };

    AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function (
            autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();

            if (!place.place_id) {
                window.alert('Please select an option from the dropdown list.');
                return;
            }
            if (mode === 'ORIG') {
                me.originPlaceId = place.place_id;
            } else {
                me.destinationPlaceId = place.place_id;
            }
            me.route();
        });
    };

    AutocompleteDirectionsHandler.prototype.route = function () {
        if (!this.originPlaceId || !this.destinationPlaceId) {
            return;
        }
        var me = this;

        this.directionsService.route(
                {
                    origin: {'placeId': this.originPlaceId},
                    destination: {'placeId': this.destinationPlaceId},
                    travelMode: this.travelMode
                },
                function (response, status) {
                    if (status === 'OK') {
                        me.directionsDisplay.setDirections(response);
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });
    };

    $("#course_forme").validate({
        lang: 'fr',

        invalidHandler: function (event, validator) {
            //alert('hda')
            var alert = $('#error_div');
            alert.removeClass('hidden').show();
        },

        submitHandler: function (form) {
            event.preventDefault();
            grecaptcha.ready(function () {
                // do request for recaptcha token
                // response is promise with passed token
                grecaptcha.execute('6LehdbEUAAAAANMFXqlZoBkppIgi6mjan55gB7Jr', {action: 'recaptcha'}).then(function (token) {
                    // add token to form
                    $('#course_forme').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
                    $.post("{{ url('/recaptcha') }}", {token: token}, function (result) {
                        console.log(result);
                        result = JSON.parse(result);
                        if (result.success == 'true') {
                            $.ajax({
                                type: "POST",
                                url: "{{ url('/course_1') }}",
                                data: $(form).serialize(),
                                dataType: "json",
                                success: function (data) {
                                    //response = $.parseJSON(data);
                                    //redirection(data);
                                    //console.log(data);
                                    if (data.code == '200') {
                                        window.location = "{{ url('/infocourse') }}";
                                    } else {
                                        setTimeout(function () {
                                            var alert = $('#error_div');
                                            alert.removeClass('hidden').show();
                                            $('#error_msg').text('Erreur de saisi la course');
                                        }, 1000);
                                    }

                                }
                            });
                        } else {
                            return false;
                        }
                    });
                });
                ;
            });
            /*$.ajax({
             type: "POST",
             url: "{{ url('/course_1') }}",
             data: $(form).serialize(),
             dataType: "json",
             success: function (data) {
             //response = $.parseJSON(data);
             //redirection(data);
             //console.log(data);
             if (data.statut_course == 'ok') {
             window.location = "{{ url('/infocourse') }}";
             } else {
             setTimeout(function () {
             var alert = $('#error_div');
             alert.removeClass('hidden').show();
             $('#error_msg').text('Erreur de saisi la course');
             }, 1000);
             }
             
             }
             });*/
            return false;
        }


    });
    $('#depart_date').datetimepicker({
        //format: 'yyyy-mm-dd'
    }).on('changeDate', function (e) {
        $(this).datetimepicker('hide');
    });

    $("#avance_radio").click(function () {
        $('#date_depart_form').addClass('hidden').show();
        $('#depart_date').removeClass('required');
        $('#depart_date').data("DateTimePicker").clear();
        $('#depart_date').text('');
    });

    $("#avance_radio_").click(function () {
        $('#date_depart_form').removeClass('hidden').show();
        $('#depart_date').addClass('required');
    });


    jQuery(document).ready(function () {
        $(function () {
            $("#processTabs").tabs({show: {effect: "fade", duration: 400}});
            $(".tab-linker").click(function () {
                $("#processTabs").tabs("option", "active", $(this).attr('rel') - 1);
                return false;
            });
        });
    });

//    var lieu_depart = document.getElementById('lieu_depart');
//    var lieu_arrive = document.getElementById('lieu_arrive');
//    var autocomplete_lieu_depart = new google.maps.places.Autocomplete(lieu_depart);
//    var autocomplete_lieu_arrive = new google.maps.places.Autocomplete(lieu_arrive);
//
//
//    google.maps.event.addListener(autocomplete_lieu_depart, 'place_changed', function () {
//        var place = autocomplete_lieu_depart.getPlace();
//        console.log(place)
//        document.getElementById('lieu_depart_lat').value = place.geometry.location.lat();
//        document.getElementById('lieu_depart_let').value = place.geometry.location.lng();
//    });
//
//    google.maps.event.addListener(autocomplete_lieu_arrive, 'place_changed', function () {
//        var place = autocomplete_lieu_arrive.getPlace();
//        console.log(place)
//        document.getElementById('lieu_arrive_lat').value = place.geometry.location.lat();
//        document.getElementById('lieu_arrive_let').value = place.geometry.location.lng();
//    });







    jQuery(document).ready(function () {

        $(".price-range-slider").ionRangeSlider({
            type: "double",
            prefix: "$",
            min: 200,
            max: 10000,
            max_postfix: "+"
        });

        $(".area-range-slider").ionRangeSlider({
            type: "double",
            min: 50,
            max: 20000,
            from: 50,
            to: 20000,
            postfix: " sqm.",
            max_postfix: "+"
        });

        jQuery(".bt-switch").bootstrapSwitch();

        $('#trainBoxArrive').change(function () {
            var selected = $(this).find('option:selected');
            var lat = selected.data('lat');
            var leg = selected.data('let');
            var lieu = selected.text();
            $('#lieu_arrive').val(lieu);
            $('#lieu_arrive_lat').val(lat);
            $('#lieu_arrive_let').val(leg);
            $('#ModalTrainArrive').modal('toggle');
        });
        $('#trainBoxDepart').change(function () {
            var selected = $(this).find('option:selected');
            var lat = selected.data('lat');
            var leg = selected.data('let');
            var lieu = selected.text();
            $('#lieu_depart').val(lieu);
            $('#lieu_depart_lat').val(lat);
            $('#lieu_depart_let').val(leg);
            $('#ModalTrainDepart').modal('toggle');
        });
        $('#selectBoxPlanetArrive').change(function () {
            var selected = $(this).find('option:selected');
            var lat = selected.data('lat');
            var leg = selected.data('let');
            var lieu = selected.text();
            $('#lieu_arrive').val(lieu);
            $('#lieu_arrive_lat').val(lat);
            $('#lieu_arrive_let').val(leg);
            $('#ModalPlaneArrive').modal('toggle');
        });
        $('#selectBoxPlanetDepart').change(function () {
            var selected = $(this).find('option:selected');
            var lat = selected.data('lat');
            var leg = selected.data('let');
            var lieu = selected.text();
            $('#lieu_depart').val(lieu);
            $('#lieu_depart_lat').val(lat);
            $('#lieu_depart_let').val(leg);
            $('#ModalPlaneDepart').modal('toggle');
        });

    });





</script>