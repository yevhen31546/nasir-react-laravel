@extends('admin.layout.menu',  ['utilisateur' => "Ismail"])
@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>
<i class="kt-font-brand flaticon2-line-chart"></i>
Gestion des prix
@endsection
@section('content')

<div class="kt-portlet__body kt-portlet__body--fit">
    <div class="kt-portlet">

        <div class="kt-portlet__body">

            <!--begin::Section-->
            <div class="kt-section">
                <form class="kt-form kt-form--label-right" id="save_coef">
                    <div class="kt-section__content">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Prise en charge</th>
                                <th>Prix au kilomere</th>
                                <th>Prix à la minute</th>
                            </tr>
                            <tr>
                                <td><input id="prise_charge" name="prise_charge" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="{{$params['prise_charge']}}"></td>
                                <td><input id="prix_km" name="prix_km" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="{{$params['prix_km']}}"></td>
                                <td><input id="prix_min" name="prix_min" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="{{$params['prix_min']}}"></td>

                            </tr>
                        </table>
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th colspan="2"></th>
                                <th>Lundi/Vendredi</th>
                                <th>Samedi/Dimanche</th>
                            </tr>
                            <tr>
                                <td rowspan="3"><strong>Maintenant</strong></td>
                                <td><strong>00 - 06 H</strong></td>
                                <td><input id="0_WB_00" name="0_WB_00" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="{{$coef['1']['00']}}"></td>
                                <td><input id="0_WE_00" name="0_WE_00" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="{{$coef['0']['00']}}"></td>
                            </tr>
                            <tr>
                                <td><strong>06 - 22 H</strong></td>
                                <td><input id="0_WB_06" name="0_WB_06" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="{{$coef['1']['06']}}"></td>
                                <td><input id="0_WE_06" name="0_WE_06" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="{{$coef['0']['06']}}"></td>
                            </tr>
                            <tr>
                                <td><strong>22 - 00 H</strong></td>
                                <td><input id="0_WB_22" name="0_WB_22" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="{{$coef['1']['22']}}"></td>
                                <td><input id="0_WE_22" name="0_WE_22" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="{{$coef['0']['22']}}"></td>
                            </tr>
                            <tr>
                                <td rowspan="3"><strong>A l'avance</strong></td>
                                <td><strong>00 - 06 H</strong></td>
                                <td><input id="1_WB_00" name="1_WB_00" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="{{$coef['3']['00']}}"></td>
                                <td><input id="1_WE_00" name="1_WE_00" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="{{$coef['2']['00']}}"></td>
                            </tr>
                            <tr>
                                <td><strong>06 - 22 H</strong></td>
                                <td><input id="1_WB_06" name="1_WB_06" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="{{$coef['3']['06']}}"></td>
                                <td><input id="1_WE_06" name="1_WE_06" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="{{$coef['2']['06']}}"></td>
                            </tr>
                            <tr>
                                <td><strong>22 - 00 H</strong></td>
                                <td><input id="1_WB_22" name="1_WB_22" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="{{$coef['3']['22']}}"></td>
                                <td><input id="1_WE_22" name="1_WE_22" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="{{$coef['2']['22']}}"></td>
                            </tr>
                        </table>
                        <div style='text-align: right;' class="kt-portlet__head-label">
                            <button  type="submit" data-toggle="modal" data-target="#new_ride_popup" class="btn btn-primary btn-sm">Sauvegarder</button>
                        </div>
                    </div>
                </form>
            </div>

            <!--end::Section-->
        </div>


        <!--end::Form-->
    </div>
</div>
@include('admin.js.prix')
@endsection
