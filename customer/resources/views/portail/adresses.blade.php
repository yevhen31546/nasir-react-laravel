@extends('portail.layout.menu',  ['utilisateur' => "Ismail"])
@section('content')
<script>

</script>
<style>
    label.error { display: none !important; }
</style>
<div class="section nobg notopmargin nopadding footer-stick">
    <div class="container clearfix">

        <div class="row bottommargin-sm">
            <div class="col-lg-4 topmargin-sm bottommargin-sm">
                <div class="">
                    <div class="card-header hidden"> BESOIN D'AIDE? </div>
                    <div class="">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action " id="list-home-list"  href="{{url('reservations')}}">Mes réservations</a>
                            <a class="list-group-item list-group-item-action active" style="background-color: #F18052;border-color: #F18052;"  id="list-home-list"  href="{{url('adresses')}}">Mes Adresses</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list"  href="{{url('profile')}}"  aria-selected="false">Mon compte</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 topmargin-sm bottommargin-sm">
                <div class="form-widget">

                    <div class=""></div>
                    <div class="card">
                        <div class="card-header"><b>ADRESSES</b>
                            <a href="#" data-toggle="modal" data-target="#modal_add_adresse" style="float: right;" class="button button-3d button-rounded button-blue"><i class="icon-line-plus"></i>Ajouter</a>
                        </div>

                        <div class="card-body">
                            <table id="datatable_adresse" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Adresse</th>
                                        <th>Type</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="delete-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Vous voulez supprimer?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="adresse_id" id="adresse_id_mod" value=""/>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="button" onclick="delete_adresse_id()"  class="btn btn-primary">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_add_adresse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form class="kt-form kt-form--label-right" id="form_add_adresse">
        <div class="modal-dialog">
            <div class="modal-body">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Ajouter adresse</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div id="error_div" class="style-msg errormsg hidden">
                                    <div id="error_msg" class="sb-msg"><i class="icon-remove"></i>Merci de remplir les champs obligatoires</div>
                                </div>
                        <div class="col-md-12 col-12 bottommargin-sm">
                            <label for="">Adresse</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-map-marker1"></i></span>
                                </div>
                                <input id="addresse" type="text" name="addresse" class="form-control required" value="" placeholder="Saisissez une adresse ou un lieu d'arrivée" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-12 col-12 bottommargin-sm">
                            <label for="">Type</label>

                            <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                                <label id="avance_radio" for="template-contactform-platform-mobile" class="btn btn-outline-secondary flex-fill t600 ls0 nott active">
                                    <input type="radio" name="type" checked="" value="f"> Favoris
                                </label>
                                <label id="avance_radio_" for="template-contactform-platform-web" class="btn btn-outline-secondary flex-fill t600 ls0 nott">
                                    <input type="radio" name="type" value="w"> Travail
                                </label>
                                <label id="avance_radio_" for="template-contactform-platform-web" class="btn btn-outline-secondary flex-fill t600 ls0 nott">
                                    <input type="radio" name="type" value="h"> Domocile
                                </label>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="{{asset('assets-front/js/components/bs-datatable.js')}}"></script>

@include('portail.js.adresses')
@endsection
