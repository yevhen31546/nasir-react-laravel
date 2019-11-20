@extends('portail.layout.menu',  ['utilisateur' => "Ismail"])
@section('content')
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 100%;
    }

</style>
<div class="section nobg notopmargin nopadding footer-stick">
    <div class="container clearfix">

        <div class="row bottommargin-sm">
            <div class="col-lg-2 topmargin-sm bottommargin-sm">
                <div class="">
                    <div class="card-header hidden"> BESOIN D'AIDE? </div>
                    <div class="">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" style="background-color: #F18052;border-color: #F18052;" id="list-home-list"  href="{{url('reservations')}}"><i class="icon-line-arrow-left"></i>Mes réservations</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 topmargin-sm bottommargin-sm">
                <div class="card">
                    <div class="card-header">Détails
                        <a href="#" style="float: right;" class="button button-3d button-rounded button-white button-light">Enregistrer la facture<i class="icon-line-download"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="row clearfix">
                            <div class="col-md-7">
                                <div id="map"></div>
                                <script>
                                    function initMap() {
                                    var directionsDisplay = new google.maps.DirectionsRenderer;
                                    var directionsService = new google.maps.DirectionsService;
                                    var map = new google.maps.Map(document.getElementById('map'), {
                                    center: {lat: 48.8575186, lng: 2.2925093},
                                            zoom: 12,
                                    });
                                    directionsDisplay.setMap(map);
                                    calculateAndDisplayRoute(directionsService, directionsDisplay);
                                    document.getElementById('mode').addEventListener('change', function() {
                                    calculateAndDisplayRoute(directionsService, directionsDisplay);
                                    });
                                    }

                                    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
                                    var selectedMode = 'DRIVING';
                                    directionsService.route({
                                    origin: {lat: {{$ride['lagitude_depart']}}, lng: {{$ride['longitude_depart']}}}, // Haight.
                                            destination: {lat: {{$ride['lagitude_arrive']}}, lng: {{$ride['longitude_arrive']}}}, // Ocean Beach.
                                            // Note that Javascript allows us to access the constant
                                            // using square brackets and a string value as its
                                            // "property."
                                            travelMode: google.maps.TravelMode[selectedMode]
                                    }, function(response, status) {
                                    if (status == 'OK') {
                                    directionsDisplay.setDirections(response);
                                    } else {
                                    window.alert('Directions request failed due to ' + status);
                                    }
                                    });
                                    }
                                </script>
                                <script async defer
                                        src="https://maps.googleapis.com/maps/api/js?key={{Config::get('services.google_maps')}}&callback=initMap">
                                </script>
                            </div>
                            <div class="col-md-5">
                                <div class="pricing-features">
                                    <ul class="clearfix">
                                        <li><i class="icon-map-marker-alt"></i> {{$ride['lieu_depart']}} </li>
                                        <li><i class="icon-map-marker"></i> {{$ride['lieu_arrive']}} </li>
                                        <li><i class="icon-calendar3"></i> {{$ride['date_debut']}} </li>
                                        <li><i class="icon-sort"></i> {{$ride['distance']}} </li>
                                        <li><i class="icon-stopwatch1"></i> {{$ride['duration']}} </li>
                                        <li><i class="icon-tag"></i> @if($ride['type'] == '0') Maintenant @else A l'avance @endif</li>
                                        <li><i class="icon-money-check-alt"></i> {{$ride['prix_ttc']}} € </li>
                                    </ul>
                                </div>
                            </div> 
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
