@extends('portail.layout.menu',  ['utilisateur' => "Ismail"])
@section('content')




<script src="https://www.google.com/recaptcha/api.js"></script>

<style>
    label.error { display: none !important; }
</style>
<!--<section  class="slider-element full-screen clearfix" style="background: url({{asset('assets-front/media/rides/images/hero/2.jpg')}}) top right no-repeat; background-size: cover;" data-height-md="500">-->
<section  class="slider-element full-screen clearfix"  data-height-md="500">
    <div class="form-widget">

        <div class="form-result"></div>
        <div class="full-screen">
            <div class="real-estate-tabs-slider">
                <div class="row clearfix">
                    <div class="col-md-4  tabs advanced-real-estate-tabs nomargin clearfix" style="max-width: 500px;top: 20px;">


                        <div class="tab-container">
                            <div class="tab-content clearfix" id="tab-buy">
                                <div id="error_div" class="style-msg errormsg hidden">
                                    <div id="error_msg" class="sb-msg"><i class="icon-remove"></i>Merci de remplir les champs obligatoires</div>
                                </div>
                                <form class="row" id="course_forme" action="#" method="post" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="col-md-12 col-12 bottommargin-sm">
                                            <label for="">Lieu de départ</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span data-toggle="modal" data-target="#ModalTrainDepart" class="input-group-text"><i class="icon-train"></i></span>
                                                    <span data-toggle="modal" data-target="#ModalPlaneDepart" class="input-group-text"><i class="icon-plane-departure"></i></span>
                                                </div>
                                                <input id="lieu_depart" type="text" name="lieu_depart"  class="form-control required" value="" placeholder="Saisissez une adresse ou un lieu de départ">
                                                <input id="lieu_depart_lat" name="lieu_depart_lat"  type="hidden"  class="form-control required" value="" >
                                                <input id="lieu_depart_let" name="lieu_depart_let"   type="hidden"  class="form-control required" value="" >
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="icon-crosshairs"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12 bottommargin-sm">
                                            <label for="">LIEU D'ARRIVÉE</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span data-toggle="modal" data-target="#ModalTrainArrive" class="input-group-text"><i class="icon-train"></i></span>
                                                    <span data-toggle="modal" data-target="#ModalPlaneArrive" class="input-group-text"><i class="icon-plane-arrival"></i></span>
                                                </div>
                                                <input id="lieu_arrive"  type="text" name="lieu_arrive" id="event-registration-last-name" class="form-control required" value="" placeholder="Saisissez une adresse ou un lieu d'arrivée">
                                                <input id="lieu_arrive_lat" name="lieu_arrive_lat"  type="hidden"  class="form-control required" value="" >
                                                <input id="lieu_arrive_let" name="lieu_arrive_let"  type="hidden"  class="form-control required" value="" >
                                                <input id="distance" name="distance"  type="hidden"  class="form-control required" value="" >
                                                <input id="time" name="time"  type="hidden"  class="form-control required" value="" >
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-md-12 col-12 bottommargin-sm">
                                            <label for="">RÉSERVER</label>

                                            <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                                                <label id="avance_radio" for="template-contactform-platform-mobile" class="btn btn-outline-secondary flex-fill t600 ls0 nott active">
                                                    <input type="radio" name="reservation"  checked="" value="0"> Maintenant
                                                </label>
                                                <label id="avance_radio_" for="template-contactform-platform-web" class="btn btn-outline-secondary flex-fill t600 ls0 nott">
                                                    <input type="radio" name="reservation"    value="1"> À l'avance
                                                </label>

                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12 bottommargin-sm hidden">
                                            <div id="mode-selector" class="controls">
                                                <input type="radio" name="type" id="changemode-walking">
                                                <label for="changemode-walking">Walking</label>

                                                <input type="radio" name="type" id="changemode-transit">
                                                <label for="changemode-transit">Transit</label>

                                                <input type="radio" name="type" id="changemode-driving" checked="checked">
                                                <label for="changemode-driving">Driving</label>
                                            </div>
                                        </div>
                                        <div id="date_depart_form" class="col-md-12 col-12 bottommargin-sm hidden">
                                            <label for="">DATE DÉPART</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="icon-calendar"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="depart_date" name="depart_date" placeholder="MM/DD/YYYY 00:00 AM/PM">
                                            </div>  
                                        </div>                                   

                                        <div class="col-md-12 clearfix">
                                            <button class="button button-3d button-rounded btn-block nomargin" style="margin-top: 35px !important;">Consulter le prix</button>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>

                    </div>
                    <div id="map" class="col-md-8" style="position: relative; overflow: hidden;">

                    </div>

                </div>
            </div>

        </div>
    </div>

</section><!-- #slider end -->
<div class="modal fade" id="ModalTrainDepart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Séléctionnez votre gare de train</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <select id="trainBoxDepart" class="form-control" data-selectsplitter-secondselect-selector="" size="7">
                        <option data-lat="48.841833" data-let="2.366111" value="1">Gare d'Austerlitz</option>
                        <option data-lat="48.839306" data-let="2.382750" value="2">Gare de Bercy</option>
                        <option data-lat="48.876944" data-let="2.359306" value="3">Gare de l'Est</option>
                        <option data-lat="48.844444" data-let="2.374417" value="4">Gare de Lyon</option>
                        <option data-lat="48.881139" data-let="2.355278" value="5">Gare du Nord</option>
                        <option data-lat="48.841306" data-let="2.320472" value="6">Gare Montparnasse</option>
                        <option data-lat="48.876000" data-let="2.323694" value="8">Gare Saint-Lazare</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalTrainArrive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Séléctionnez votre gare de train</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <select id="trainBoxArrive" class="form-control" data-selectsplitter-secondselect-selector="" size="7">
                        <option data-lat="48.841833" data-let="2.366111" value="1">Gare d'Austerlitz</option>
                        <option data-lat="48.839306" data-let="2.382750" value="2">Gare de Bercy</option>
                        <option data-lat="48.876944" data-let="2.359306" value="3">Gare de l'Est</option>
                        <option data-lat="48.844444" data-let="2.374417" value="4">Gare de Lyon</option>
                        <option data-lat="48.881139" data-let="2.355278" value="5">Gare du Nord</option>
                        <option data-lat="48.841306" data-let="2.320472" value="6">Gare Montparnasse</option>
                        <option data-lat="48.876000" data-let="2.323694" value="8">Gare Saint-Lazare</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalPlaneDepart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Séléctionnez votre aéroport</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <select id="selectBoxPlanetDepart" class="form-control" data-selectsplitter-secondselect-selector="" size="17">
                        <optgroup label="Airport Roissy Charles de Gaules">
                            <option data-lat="49.014361" data-let="2.542083" value="3">Terminal 1</option>
                            <option data-lat="49.002861" data-let="2.562722" value="3">Terminal 2A</option>
                            <option data-lat="49.004722" data-let="2.562083" value="3">Terminal 2B</option>
                            <option data-lat="49.003417" data-let="2.567417"  value="3">Terminal 2C</option>
                            <option data-lat="49.005000" data-let="2.566806"  value="3">Terminal 2D</option>
                            <option data-lat="49.003917" data-let="2.578000"  value="3">Terminal 2E</option>
                            <option data-lat="49.005194" data-let="2.577639"  value="3">Terminal 2F</option>
                            <option data-lat="49.006000" data-let="2.603139"  value="3">Terminal 2F</option>
                            <option data-lat="49.012667" data-let="2.558889"  value="3">Terminal 3</option>
                        </optgroup>
                        <optgroup label="Airport Orly">
                            <option data-lat="48.728861" data-let="2.358917"  value="3">Terminal 1</option>
                            <option data-lat="48.728250" data-let="2.359417"  value="3">Terminal 2</option>
                            <option data-lat="48.729667" data-let="2.359889"  value="3">Terminal 3</option>
                            <option data-lat="48.729250" data-let="2.370222"  value="3">Terminal 4</option>
                        </optgroup>
                        <optgroup label="Airport Le Bourget">
                            <option data-lat="48.961889" data-let="2.437278"  value="3">Airport Le Bourget</option>
                        </optgroup>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalPlaneArrive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Séléctionnez votre aéroport</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <select id="selectBoxPlanetArrive" class="form-control" data-selectsplitter-secondselect-selector="" size="17">
                        <optgroup label="Airport Roissy Charles de Gaules">
                            <option data-lat="49.014361" data-let="2.542083" value="3">Terminal 1</option>
                            <option data-lat="49.002861" data-let="2.562722" value="3">Terminal 2A</option>
                            <option data-lat="49.004722" data-let="2.562083" value="3">Terminal 2B</option>
                            <option data-lat="49.003417" data-let="2.567417"  value="3">Terminal 2C</option>
                            <option data-lat="49.005000" data-let="2.566806"  value="3">Terminal 2D</option>
                            <option data-lat="49.003917" data-let="2.578000"  value="3">Terminal 2E</option>
                            <option data-lat="49.005194" data-let="2.577639"  value="3">Terminal 2F</option>
                            <option data-lat="49.006000" data-let="2.603139"  value="3">Terminal 2F</option>
                            <option data-lat="49.012667" data-let="2.558889"  value="3">Terminal 3</option>
                        </optgroup>
                        <optgroup label="Airport Orly">
                            <option data-lat="48.728861" data-let="2.358917"  value="3">Terminal 1</option>
                            <option data-lat="48.728250" data-let="2.359417"  value="3">Terminal 2</option>
                            <option data-lat="48.729667" data-let="2.359889"  value="3">Terminal 3</option>
                            <option data-lat="48.729250" data-let="2.370222"  value="3">Terminal 4</option>
                        </optgroup>
                        <optgroup label="Airport Le Bourget">
                            <option data-lat="48.961889" data-let="2.437278"  value="3">Airport Le Bourget</option>
                        </optgroup>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('portail.js.course')
<style>
    /* Always set the map height explicitly to define the size of the div
* element that contains the map. */

    /* Optional: Makes the sample page fill the window. */

</style>
@endsection




