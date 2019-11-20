@extends('admin.layout.menu',  ['utilisateur' => "Ismail"])
@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>
<i class="kt-font-brand flaticon2-line-chart"></i>
Les courses
@endsection
@section('content')

<div class="kt-portlet__body kt-portlet__body--fit">
    <div class="kt-portlet__body">
        <div class="kt-form kt-form--fit kt-margin-b-20">
            <div class="row kt-margin-b-20">
                <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                    <label>Id de course:</label>
                    <input type="text" id="ride_id" class="form-control kt-input" placeholder="E.x: FRD0000102" data-col-index="0">
                </div>


                <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                    <label>Chauffeur:</label>
                    <input type="text" id="driver_id" class="form-control kt-input" placeholder="Id de chauffeur ou son nom" data-col-index="4">
                </div>
                <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                    <label>Date de course:</label>
                    <div class="input-daterange input-group" id="kt_datepicker">
                        <input  id="date_de" class="form-control kt-input" name="start" placeholder="de" data-col-index="5">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                        </div>
                        <input id="date_a" class="form-control kt-input" name="end" placeholder="à" data-col-index="5">
                    </div>
                </div>
                <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                    <label>Status:</label>
                    <select class="form-control kt-input" data-col-index="6" id="statut_id">
                        <option value="">Selectionner</option>
                        <option value="1">On going</option>
                        <option value="2">Payment checking</option>
                        <option value="3">Payment checked</option>
                        <option value="4">Ride propose to driver</option>
                        <option value="5">Ride accept by driver</option>
                        <option value="6">Ride coming</option>
                        <option value="7">Ride</option>
                        <option value="8">Ride finish</option>
                        <option value="9">Payment completed</option>
                        <option value="21">Cancel</option>
                        <option value="22">Interupt</option>
                    </select>
                </div>
            </div>


            <div class="kt-separator kt-separator--md kt-separator--dashed"></div>
            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-primary btn-brand--icon" id="search_dt_rides">
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
        <table class="table table-striped- table-bordered table-hover table-checkable" id="rides_datatables">
            <thead>
                <tr>
                    <th></th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Téléphone de client</th>
                    <th>Email de client</th>
                    <th>Téléphone de chauffeur</th>
                    <th>Affecter à un chauffeur</th>

                </tr>
            </thead>
        </table>


    </div>
</div>
<div id="modal_drivers" class="modal fade" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="min-height: 590px;">
            <div class="modal-header">
                <h5 class="modal-title">
                    Les chauffeurs
                    <small>Adjas</small>
                </h5>
                <div class="kt-subheader__toolbar">
                    <button type="button" id="affecter_btn" class="btn btn-primary btn-sm">Affecter</button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row kt-margin-b-20">
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>Id de chauffeur:</label>
                        <input type="text" id="driver_id" class="form-control kt-input" placeholder="E.x: FRDRV0000102" data-col-index="0">
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>Chauffeur:</label>
                        <input type="text"  id="nom_prenom" class="form-control kt-input" placeholder="Nom ou prénom" data-col-index="4">
                        <input type="hidden" name="ride_id" id="ride_id_mod" value=""/>
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile kt-hide">
                        <label>Téléphone:</label>
                        <input type="text"  id="phone" class="form-control kt-input" placeholder="" data-col-index="0">
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>Email:</label>
                        <input type="text"  id="email" class="form-control kt-input" placeholder="Exemple@exemple.com" data-col-index="0">
                    </div>
                </div>
                <table class="table table-striped- table-bordered table-hover table-checkable" id="users_datatables">
                    <thead>
                        <tr>
                            <th>Nom Prénom</th>
                            <th>Email</th>
                            <th>Numéro de téléphone</th>
                            <th><input name="select_all" value="1" type="checkbox"></th>

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
@include('admin.js.rides')
@endsection
