@extends('admin.layout.menu',  ['utilisateur' => "Ismail"])
@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>
<i class="kt-font-brand flaticon2-line-chart"></i>
Simulation des prix
@endsection
@section('content')

<div class="kt-portlet__body kt-portlet__body--fit">
    <div class="kt-portlet">

        <div class="kt-portlet__body">

            <!--begin::Section-->
            <div class="kt-section">
                <form class="kt-form kt-form--label-right" id="simulation_form">
                    <div class="kt-section__content">
                        <table class="table table-bordered table-hover">
                            <tr >
                             <td style="width: 20%;"><strong>Nombre kilometres</strong></td>   
                             <td><input id="kilometres" name="kilometres" type="text" class="form-control bootstrap-touchspin-vertical-btn" value=""></td>
                             <td rowspan="2" style="vertical-align : middle;text-align:center;">
                                 <div  class="kt-portlet__head-label">
                                     <button  type="submit"   class="btn btn-primary btn-sm">Simuler</button>
                                 </div>
                             </td> 
                            </tr>
                            <tr>
                             <td style="width: 20%;"><strong>Nombre de Minutes</strong></td>   
                             <td><input id="minutes" name="minutes" type="text" class="form-control bootstrap-touchspin-vertical-btn" value=""></td>
                            </tr>
                           
                        </table>
                    </div>
                </form>
                    <div class="kt-section__content">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th colspan="2"></th>
                                <th>Lundi/Vendredi</th>
                                <th>Samedi/Dimanche</th>
                            </tr>
                            <tr>
                                <td rowspan="3"><strong>Maintenant</strong></td>
                                <td><strong>00 - 06 H</strong></td>
                                <td><input id="0_WB_00" name="0_WB_00" type="text" class="form-control bootstrap-touchspin-vertical-btn" value=""></td>
                                <td><input id="0_WE_00" name="0_WE_00" type="text" class="form-control bootstrap-touchspin-vertical-btn" value=""></td>
                            </tr>
                            <tr>
                                <td><strong>06 - 22 H</strong></td>
                                <td><input id="0_WB_06" name="0_WB_06" type="text" class="form-control bootstrap-touchspin-vertical-btn" value=""></td>
                                <td><input id="0_WE_06" name="0_WE_06" type="text" class="form-control bootstrap-touchspin-vertical-btn" value=""></td>
                            </tr>
                            <tr>
                                <td><strong>22 - 00 H</strong></td>
                                <td><input id="0_WB_22" name="0_WB_22" type="text" class="form-control bootstrap-touchspin-vertical-btn" value=""></td>
                                <td><input id="0_WE_22" name="0_WE_22" type="text" class="form-control bootstrap-touchspin-vertical-btn" value=""></td>
                            </tr>
                            <tr>
                                <td rowspan="3"><strong>A l'avance</strong></td>
                                <td><strong>00 - 06 H</strong></td>
                                <td><input id="1_WB_00" name="1_WB_00" type="text" class="form-control bootstrap-touchspin-vertical-btn" value=""></td>
                                <td><input id="1_WE_00" name="1_WE_00" type="text" class="form-control bootstrap-touchspin-vertical-btn" value=""></td>
                            </tr>
                            <tr>
                                <td><strong>06 - 22 H</strong></td>
                                <td><input id="1_WB_06" name="1_WB_06" type="text" class="form-control bootstrap-touchspin-vertical-btn" value=""></td>
                                <td><input id="1_WE_06" name="1_WE_06" type="text" class="form-control bootstrap-touchspin-vertical-btn" value=""></td>
                            </tr>
                            <tr>
                                <td><strong>22 - 00 H</strong></td>
                                <td><input id="1_WB_22" name="1_WB_22" type="text" class="form-control bootstrap-touchspin-vertical-btn" value=""></td>
                                <td><input id="1_WE_22" name="1_WE_22" type="text" class="form-control bootstrap-touchspin-vertical-btn" value=""></td>
                            </tr>
                        </table>
                        
                    </div>
                
            </div>

            <!--end::Section-->
        </div>


        <!--end::Form-->
    </div>
</div>
@include('admin.js.simulation')
@endsection
