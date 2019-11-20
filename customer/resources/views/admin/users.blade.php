@extends('admin.layout.menu',  ['utilisateur' => "Ismail"])
@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>
<i class="kt-font-brand flaticon2-line-chart"></i>
Les clients
@endsection
@section('content')

<div class="kt-portlet__body kt-portlet__body--fit">
    <div class="kt-portlet__body">
        <div class="kt-form kt-form--fit kt-margin-b-20">
            <div class="row kt-margin-b-20">
                <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                    <label>Email de client:</label>
                    <input type="text" id="email" class="form-control kt-input" placeholder="exemple@exemple.com" data-col-index="0">
                </div>


                <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                    <label>Client:</label>
                    <input type="text" id="nom_prenom" class="form-control kt-input" placeholder="Id de client ou son nom" data-col-index="4">
                </div>
                <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                    <label>Type d'inscription:</label>
                    <select class="form-control kt-input" data-col-index="6" id="type_id">
                        <option value="">Selectionner</option>
                        <option value="0">Standard</option><option value="1">Facebook</option><option value="2">Google</option></select>
                </div>

            </div>


            <div class="kt-separator kt-separator--md kt-separator--dashed"></div>
            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-primary btn-brand--icon" id="search_dt_users">
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
        <table class="table table-striped- table-bordered table-hover table-checkable" id="users_datatables">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email de client</th>
                    <th>Téléphone de client</th>
                    <th>Type d'inscription</th>
                    <th style="width: 20%">Actions</th>

                </tr>
            </thead>
        </table>


    </div>
</div>
<div id="modal_drivers" class="modal fade" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vous voulez vraiment supprimer?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
                <input type="hidden" name="users_id" id="users_id_mod" value=""/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" onclick="delete_user_id()"  class="btn btn-primary">Supprimer</button>
            </div>

        </div>
    </div>
</div>

<div id="modal_adresses" class="modal fade" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="min-width: 450px;">
            <div class="modal-header">
                <h5 class="modal-title">
                    Les adresses
                    <small>de l'utilisateur</small>
                </h5>
                <div class="kt-subheader__toolbar">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
            </div>
            <div class="modal-body">
                <input type="hidden" name="user_id_adresse" id="user_id_adresse" value=""/>
                <table class="table table-striped- table-bordered table-hover table-checkable" id="adresses_users_datatables">
                    <thead>
                        <tr>
                            <th>Adresse</th>
                            <th>Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-body modal-body-fit">

                <!--begin: Datatable -->

                <!--end: Datatable -->
            </div>

        </div>
    </div>
</div>


<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script>
@include('admin.js.users')
@endsection
