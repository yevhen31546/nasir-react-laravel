@extends('admin.layout.menu',  ['utilisateur' => "Ismail"])
@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>
<i class="kt-font-brand flaticon2-line-chart"></i>
Les chauffeurs
@endsection
@section('toolbar')
<button type="button" data-toggle="modal" data-target="#new_ride_popup" class="btn btn-primary btn-sm">Nouveau chauffeur</button>
@endsection
@section('content')

<div class="kt-portlet__body kt-portlet__body--fit">
    <div class="kt-portlet__body">
        <div class="kt-form kt-form--fit kt-margin-b-20">
            <div class="row kt-margin-b-20">
                <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                    <label>Id de chauffeur:</label>
                    <input type="text" id="driver_id" class="form-control kt-input" placeholder="E.x: FRDRV0000102" data-col-index="0">
                </div>
                <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                    <label>Chauffeur:</label>
                    <input type="text" id="nom_prenom" class="form-control kt-input" placeholder="Nom ou prénom" data-col-index="4">
                </div>
                <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile kt-hide">
                    <label>Téléphone:</label>
                    <input type="text" id="phone" class="form-control kt-input" placeholder="" data-col-index="0">
                </div>
                <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                    <label>Email:</label>
                    <input type="text" id="email" class="form-control kt-input" placeholder="Exemple@exemple.com" data-col-index="0">
                </div>
            </div>

            <div class="kt-separator kt-separator--md kt-separator--dashed"></div>
            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-primary btn-brand--icon" id="search_dt_drivers">
                        <span>
                            <i class="la la-search"></i>
                            <span>Chercher</span>
                        </span>
                    </button>
                    <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                        <span>
                            <i class="la la-close"></i>
                            <span>Initialiser</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <table class="table table-striped- table-bordered table-hover table-checkable" id="drivers_datatables">
            <thead>
                <tr>
                    <th>Civilité</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Numéro de téléphone</th>
                    <th>Id localt</th>
                    <th></th>

                </tr>
            </thead>
        </table>


    </div>
</div>
<div class="modal modal-stick-to-bottom fade" id="new_ride_popup" role="dialog" data-backdrop="false" aria-hidden="true" style="display: none;">
    <form class="kt-form kt-form--label-right" id="form_add_driver">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter chauffeur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                        <div class="kt-section kt-section--first">

                            <div class="kt-wizard-v4__form">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="kt-section__body">
                                            <div class="form-group form-group-last">
                                                <div class="alert alert-danger kt-hide" role="alert" id="kt_form_1_msg">
                                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                    <div class="alert-text" id="error_message">
                                                        Erreur d'insertion, merci de vous essayer
                                                    </div>
                                                    <div class="alert-close">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true"><i class="la la-close"></i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--                                        <div class="form-group row">
                                                                                        <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                                                                        <div class="col-lg-9 col-xl-6">
                                                                                            <div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_apps_user_add_avatar">
                                                                                                <div class="kt-avatar__holder" style="background-image: url(./assets/media/users/300_10.jpg)"></div>
                                                                                                <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                                                                    <i class="fa fa-pen"></i>
                                                                                                    <input type="file" name="kt_apps_user_add_user_avatar">
                                                                                                </label>
                                                                                                <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                                                                    <i class="fa fa-times"></i>
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>-->
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Prénom*</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input class="form-control" id="prenom" name="prenom" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Nom*</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input class="form-control" name="nom" id="nom" type="text" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Compagnie</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input id="compagnie" name="compagnie" class="form-control" type="text" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Téléphone*</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input type="text" name="telephone" id="telephone" class="form-control"  placeholder="" aria-describedby="basic-addon1">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Email*</label>
                                                <div class="col-lg-9 col-xl-9">

                                                    <input type="text" class="form-control" name="email" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </div>
    </form>

</div>
@include('admin.js.drivers')
@endsection
