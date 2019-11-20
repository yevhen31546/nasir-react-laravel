@extends('admin.layout.menu',  ['utilisateur' => "Ismail"])
@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>
<script src="{{asset('assets/js/pages/croppie.js')}}" type="text/javascript"></script>
<link href="{{asset('assets/css/croppie.min.css')}}" rel="stylesheet" type="text/css" />

<h3 class="kt-subheader__title">
    Modification Chauffeur
</h3>
<span class="kt-subheader__separator kt-subheader__separator--v"></span>
<div class="kt-subheader__group" id="kt_subheader_search">
    <span class="kt-subheader__desc" id="kt_subheader_total">
        {{$driver['nom']}} {{$driver['prenom']}} </span>
</div>
@endsection
@section('toolbar')
<a href="{{url('admin/drivers')}}" class="btn btn-default btn-bold">
    Retour </a>

@endsection

@section('content')

<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet kt-portlet--tabs">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#informations_tabs" role="tab" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#identification_tabs" role="tab" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" id="Mask" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" id="Mask-Copy" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg> Identification personnelle morale
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#car_tabs" role="tab" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                    <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" id="Path-50" fill="#000000" opacity="0.3"></path>
                                    <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" id="Mask" fill="#000000" opacity="0.3"></path>
                                    <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" id="Mask-Copy" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg> Véhicules
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#permis_tabs" role="tab" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                    <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                    <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" id="Combined-Shape" fill="#000000"></path>
                                </g>
                            </svg> Permis et assurances
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="kt-portlet__body">

            <div class="tab-content">
                <div class="tab-pane active" id="informations_tabs" role="tabpanel">
                    <div class="kt-form kt-form--label-right">
                        <form class="kt-form kt-form--label-right" id="form_update_driver" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" class="form-control" name="id" id="id" value="{{$driver['id_users']}}">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="form-group form-group-last " >
                                                <div class="alert alert-danger kt-hide" role="alert" id="kt_form_1_msg">
                                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                    <div class="alert-text" id="error_message">Merci de remplir les champs obligatoires</div>
                                                    <div class="alert-close">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true"><i class="la la-close"></i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-xl-3"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <h3 class="kt-section__title kt-section__title-sm">Informations:</h3>
                                                </div>
                                            </div>
                                            @php
                                                        $avatar = config('globals.url_api').'media/images/drivers/'.$driver['id_users'].'/'.$driver['id_users'].'.png';
                                                        @endphp
                                            
                                            
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle" >
                                                        
                                                        
                                                        
                                                        <div id="preview-crop-image"  class="kt-avatar__holder" style="background-image: @if($exists_picture=='true') url({{$avatar}}) @else url({{asset('media/driver/default.jpg')}}) @endif"></div>
                                                        <label data-toggle="modal" data-target="#change-pic" class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                            <i class="fa fa-pen"></i>
                                                        </label>
                                                        <input type="hidden" id="image_src">
                                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                            <i class="fa fa-times"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="change-pic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Changer Avatar</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="alert alert-danger kt-hide" role="alert" id="kt_form_1_msg_picture">
                                                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                                <div class="alert-text" id="error_message">Merci de choisir une image</div>
                                                                <div class="alert-close">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true"><i class="la la-close"></i></span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-xl-6">
                                                                <div class="col-md-4 text-center">
                                                                    <div id="upload-demo"></div>
                                                                </div>

                                                                <strong>Selectionner image:</strong>
                                                                <input type="file" id="image" accept="image/*">
                                                                    

                                                                   
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary btn-upload-image">Modifier Avatar</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">Civilité*</label>
                                                <div class="col-9">
                                                    <div class="kt-radio-inline">
                                                        <label class="kt-radio">
                                                            <input name="civilite" value="1" type="radio" @if($driver['civilite']=="1") checked="checked" @endif name="radio4"> M.
                                                                   <span></span>
                                                        </label>
                                                        <label class="kt-radio">
                                                            <input name="civilite" value="2" type="radio" @if($driver['civilite']=="2") checked="checked" @endif  name="radio4"> Mr
                                                                   <span></span>
                                                        </label>
                                                        <label class="kt-radio">
                                                            <input name="civilite" value="3" type="radio" @if($driver['civilite']=="3") checked="checked" @endif name="radio4"> MM
                                                                   <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Prénom*</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" name="prenom" id="prenom" type="text" value="{{$driver['prenom']}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Nom*</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" name="nom" id="nom" type="text" value="{{$driver['nom']}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Compagnie</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" name="compagnie" id="compagnie" type="text" value="{{$driver['compagnie']}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Téléphone valide*</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" name="telephone" id="telephone" class="form-control" @isset($driver['phones_valide']['0']['numero']) value="{{$driver['phones_valide']['0']['numero']}}" @endisset placeholder="Phone" aria-describedby="basic-addon1">
                                                           <input type="hidden" name="id_telephone_valide" id="id_telephone_valide" class="form-control" @isset($driver['phones_valide']['0']['id_phone']) value="{{$driver['phones_valide']['0']['id_phone']}}" @endisset placeholder="Phone" aria-describedby="basic-addon1">
                                                           </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Email*</label>
                                                                <div class="col-lg-9 col-xl-6">

                                                                    <input type="text" name="email" id="email" class="form-control" value="{{$driver['email']}}" placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-lg-3 col-form-label">Date de naissance</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                        <input type="text" id="date_naissance" name="date_naissance" class="form-control" value="{{$driver['date_naissance']}}" placeholder="" aria-describedby="basic-addon1">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Lieu de naissance</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <input class="form-control" name="lieu_naissance" id="lieu_naissance" type="text" value="{{$driver['lieu_naissance']}}">
                                                                </div>
                                                            </div>

                                                            </div>
                                                            </div>
                                                            <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                                            <div class="kt-section kt-section--first">
                                                                <div class="kt-section__body">
                                                                    <div class="row">
                                                                        <label class="col-xl-3"></label>
                                                                        <div class="col-lg-9 col-xl-6">
                                                                            <h3 class="kt-section__title kt-section__title-sm">Adresse:</h3>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group row">
                                                                        <label class="col-xl-3 col-lg-3 col-form-label">Rue</label>
                                                                        <div class="col-lg-9 col-xl-6">
                                                                            <input class="form-control" id="adresse" name="adresse" type="text" value="{{$driver['adresse']}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-xl-3 col-lg-3 col-form-label">Code postal</label>
                                                                        <div class="col-lg-9 col-xl-6">
                                                                            <input class="form-control" id="code_postal" name="code_postal" type="text" value="{{$driver['code_postal']}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-xl-3 col-lg-3 col-form-label">Ville</label>
                                                                        <div class="col-lg-9 col-xl-6">
                                                                            <input class="form-control" type="text" id="ville" name="ville" value="{{$driver['ville']}}">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer" data-ktwizard-type="action-next">
                                                                <button type="submit" class="btn btn-primary">Modifier</button>
                                                            </div>
                                                            </div>
                                                            </form>
                                                            </div>
                                                            </div>
                                                            <div class="tab-pane" id="identification_tabs" role="tabpanel">
                                                                <div class="kt-form kt-form--label-right">
                                                                    <div class="kt-form__body">
                                                                        <div class="kt-section kt-section--first">
                                                                            <div class="kt-section__body">

                                                                                <div class="kt-section">

                                                                                    <div class="kt-section__content">
                                                                                        <table class="table">
                                                                                            <thead class="thead-light">
                                                                                                <tr>
                                                                                                    <th st>Immatriculation au RCS Numéro</th>
                                                                                                    <th>Dénomination ou raison sociale</th>
                                                                                                    <th>Forme juridique</th>
                                                                                                    <th style="width: 15%">
                                                                                                        <button id="add_id" data-toggle="modal" data-target="#new_id_popup"  class="btn btn-primary">Ajouter</button>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @isset($driver["id_perso_moral"])
                                                                                                @foreach ($driver["id_perso_moral"] as $item)
                                                                                                <tr>
                                                                                                    <th scope="row">{{$item['immatriculation_tcs']}}</th>
                                                                                                    <td>{{$item['denomination']}}</td>
                                                                                                    <td>{{$item['forme_juridique']}}</td>
                                                                                                    <td>
                                                                                                            <button onclick="show_details_id({{$item['id_identification_personnelle_morale']}})" id="" type="button" class="btn btn-brand">
                                                                                                                <span class="kt-hidden-mobile">Détails</span>
                                                                                                            </button>
                                                                                                            
                                                                                                            
                                                                                                    </td>
                                                                                                </tr>
                                                                                                @endforeach
                                                                                                @endisset
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                                                        <div id ="hide_details_tabs" class="kt-section kt-section--first kt-hide">
                                                                            @isset($driver["id_perso_moral"])
                                                                            @foreach ($driver["id_perso_moral"] as $item)
                                                                            <div class="kt-portlet kt-portlet--tabs" data-bind="show_details" id="hide_details_{{$item['id_identification_personnelle_morale']}}">
                                                                                <div class="kt-portlet__head">
                                                                                    <div class="kt-portlet__head-label">
                                                                                        <h3 class="kt-portlet__head-title">
                                                                                            Détails
                                                                                        </h3>
                                                                                    </div>
                                                                                    <div class="kt-portlet__head-toolbar">
                                                                                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-right" role="tablist">
                                                                                            <li class="nav-item">
                                                                                                <a class="nav-link active" data-toggle="tab" href="#kt_portlet_base_demo_1_tab_content_{{$item['id_identification_personnelle_morale']}}" role="tab">
                                                                                                    <i class="flaticon-multimedia"></i> Détails
                                                                                                </a>
                                                                                            </li>

                                                                                            <li class="nav-item">
                                                                                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_3_tab_content_{{$item['id_identification_personnelle_morale']}}" role="tab">
                                                                                                    <i class="flaticon-lifebuoy"></i> Gérants / Co-gérants
                                                                                                </a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="kt-portlet__body">


                                                                                    <div class="tab-content">
                                                                                        <div class="tab-pane active" id="kt_portlet_base_demo_1_tab_content_{{$item['id_identification_personnelle_morale']}}" role="tabpanel">
                                                                                            <form class="kt-form kt-form--label-right" id="form_update_id_{{$item['id_identification_personnelle_morale']}}">
                                                                                                <div class="form-group form-group-last">
                                                                                                    <div class="alert alert-danger kt-hide" role="alert" id="kt_form_update_msg_{{$item['id_identification_personnelle_morale']}}">
                                                                                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                                                                        <div class="alert-text" id="error_message_update_{{$item['id_identification_personnelle_morale']}}">
                                                                                                            Erreur d'insertion, merci de vous essayer
                                                                                                        </div>
                                                                                                        <div class="alert-close">
                                                                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                                                <span aria-hidden="true"><i class="la la-close"></i></span>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group row">
                                                                                                            <label class="col-xl-5 col-lg-5 col-form-label">RCS Numéro</label>
                                                                                                            <div class="col-lg-7 col-xl-7">
                                                                                                                <input class="form-control" name="immatriculation_tcs" type="text" value="{{$item['immatriculation_tcs']}}" >
                                                                                                                    <input class="form-control" name="id" type="hidden" value="{{$item['id_identification_personnelle_morale']}}" >
                                                                                                                        <input class="form-control" name="user_id" type="hidden" value="{{$driver['id_users']}}" >
                                                                                                                            </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group row">
                                                                                                                                <label class="col-xl-5 col-lg-5 col-form-label">Date d'immatriculation</label>
                                                                                                                                <div class="col-lg-7 col-xl-7">
                                                                                                                                    <input class="form-control" name="date_imma" id="date_imma_{{$item['id_identification_personnelle_morale']}}" type="text" value="{{$item['date_imma']}}" >
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group row">
                                                                                                                                <label class="col-xl-5 col-lg-5 col-form-label">Raison sociale</label>
                                                                                                                                <div class="col-lg-7 col-xl-7">
                                                                                                                                    <input class="form-control" name="denomination" type="text" value="{{$item['denomination']}}" >
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group row">
                                                                                                                                <label class="col-xl-5 col-lg-5 col-form-label">Forme juridique</label>
                                                                                                                                <div class="col-lg-7 col-xl-7">
                                                                                                                                    <input class="form-control" name="forme_juridique" type="text" value="{{$item['forme_juridique']}}" >
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-6">
                                                                                                                                <div class="form-group row">
                                                                                                                                    <label class="col-xl-5 col-lg-5 col-form-label">Activité principale</label>
                                                                                                                                    <div class="col-lg-7 col-xl-7">
                                                                                                                                        <input class="form-control" name="activite_principale" type="text" value="{{$item['activite_principale']}}" >
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="form-group row">
                                                                                                                                    <label class="col-xl-5 col-lg-5 col-form-label">SIRET</label>
                                                                                                                                    <div class="col-lg-7 col-xl-7">
                                                                                                                                        <input class="form-control" name="siret" type="text" value="{{$item['siret']}}" >
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="form-group row">
                                                                                                                                    <label class="col-xl-5 col-lg-5 col-form-label">Code NAF</label>
                                                                                                                                    <div class="col-lg-7 col-xl-7">
                                                                                                                                        <input class="form-control" name="code_naf" type="text" value="{{$item['code_naf']}}" >
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="form-group row">
                                                                                                                                    <label class="col-xl-5 col-lg-5 col-form-label">TVA Intracommunautaire</label>
                                                                                                                                    <div class="col-lg-7 col-xl-7">
                                                                                                                                        <input class="form-control" name="tva_intracommunautaire" type="text" value="{{$item['tva_intracommunautaire']}}" >
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div>

                                                                                                                            </div>
                                                                                                                            <div class="modal-footer" data-ktwizard-type="action-next">
                                                                                                                                <button  onclick="update_id({{$item['id_identification_personnelle_morale']}})"  class="btn btn-primary">Modifier</button>
                                                                                                                                <button type="button"  data-toggle="modal" data-target="#modal_delete_{{$item['id_identification_personnelle_morale']}}"   class="btn btn-danger">Supprimer</button>
                                                                                                                            </div>
                                                                                                                            <div class="modal fade" id="modal_delete_{{$item['id_identification_personnelle_morale']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                                                                                                                <div class="modal-dialog modal-sm" role="document">
                                                                                                                                    <div class="modal-content">
                                                                                                                                        <div class="modal-header">
                                                                                                                                            <h5 class="modal-title" id="exampleModalLabel">Vous voulez vraiemnt supprimer ?</h5>
                                                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                            </button>
                                                                                                                                        </div>

                                                                                                                                        <div class="modal-footer">
                                                                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                                                                                            <button type="button" onclick="delete_id({{$item['id_identification_personnelle_morale']}})" class="btn btn-danger">Supprimer</button>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            </form>
                                                                                                                            </div>

                                                                                                                            <div class="tab-pane" id="kt_portlet_base_demo_3_tab_content_{{$item['id_identification_personnelle_morale']}}" role="tabpanel">
                                                                                                                                <div class="kt-section__content">
                                                                                                                                    @isset($item["gerants"])
                                                                                                                                    <table class="table">
                                                                                                                                        <thead>
                                                                                                                                            <tr>
                                                                                                                                                <th>Nom et prénom</th>
                                                                                                                                                <th>Date et lieu de naissance</th>
                                                                                                                                                <th>Nationalité</th>
                                                                                                                                                <th>Domicile</th>
                                                                                                                                                <th>
                                                                                                                                                    <button id="add_gerant" data-identification-personnelle-morale-id="{{$item['id_identification_personnelle_morale']}}" data-toggle="modal" data-target="#new_gerant_popup" class="btn btn-primary">Ajouter</button>
                                                                                                                                                </th>
                                                                                                                                            </tr>
                                                                                                                                        </thead>
                                                                                                                                        <tbody>
                                                                                                                                            @foreach ($item["gerants"] as $ids)
                                                                                                                                            <tr>
                                                                                                                                                <th>{{$ids["nom"]}} {{$ids["prenom"]}}</th>
                                                                                                                                                <td>{{$ids["lieu_naissance"]}} au {{$ids["date_naissance"]}}</td>
                                                                                                                                                <td>{{$ids["nationalite"]}}</td>
                                                                                                                                                <td>{{$ids["domicile_personnelle"]}}</td>
                                                                                                                                                <td>
                                                                                                                                                    <button data-toggle="modal" data-target="#modal_delete_gerant_{{$ids['id_gerant']}}"  type="button" class="btn btn-danger btn-icon"><i class="la la-close"></i></button>
                                                                                                                                                </td>
                                                                                                                                            </tr>
                                                                                                                                            <div class="modal fade" id="modal_delete_gerant_{{$ids['id_gerant']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                                                                                                                                <div class="modal-dialog modal-sm" role="document">
                                                                                                                                                    <div class="modal-content">
                                                                                                                                                        <div class="modal-header">
                                                                                                                                                            <h5 class="modal-title" id="exampleModalLabel">Vous voulez vraiemnt supprimer ?</h5>
                                                                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                                            </button>
                                                                                                                                                        </div>

                                                                                                                                                        <div class="modal-footer">
                                                                                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                                                                                                            <button type="button" onclick="delete_gerant({{$ids['id_gerant']}})" class="btn btn-danger">Supprimer</button>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            @endforeach
                                                                                                                                        </tbody>
                                                                                                                                    </table>
                                                                                                                                    @endisset
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            </div>
                                                                                                                            </div>
                                                                                                                            </div>
                                                                                                                            @endforeach
                                                                                                                            @endisset
                                                                                                                            </div>


                                                                                                                            </div>
                                                                                                                            </div>
                                                                                                                            </div>
                                                                                                                            <div class="tab-pane" id="car_tabs" role="tabpanel">
                                                                                                                                <div class="kt-form kt-form--label-right">
                                                                                                                                    <div class="kt-form__body">
                                                                                                                                        <div class="kt-section kt-section--first">
                                                                                                                                            <div class="kt-section__body">
                                                                                                                                                <div class="kt-section__content">
                                                                                                                                                    <table class="table">
                                                                                                                                                        <thead class="thead-light">
                                                                                                                                                            <tr>
                                                                                                                                                                <th st>Id local</th>
                                                                                                                                                                <th>Catégorie local</th>
                                                                                                                                                                <th>Immatriculation</th>
                                                                                                                                                                <th style="width: 15%">
                                                                                                                                                                    <button id="add_id" data-toggle="modal" data-target="#new_car_popup" class="btn btn-primary">Ajouter</button>
                                                                                                                                                                </th>
                                                                                                                                                            </tr>
                                                                                                                                                        </thead>
                                                                                                                                                        <tbody>
                                                                                                                                                            @isset($driver["cars"])
                                                                                                                                                            @foreach ($driver["cars"] as $item)
                                                                                                                                                            <tr>
                                                                                                                                                                <th scope="row">{{$item['id_car']}}</th>
                                                                                                                                                                <td>{{$item['cat_local']}}</td>
                                                                                                                                                                <td>{{$item['immatricule']}}</td>
                                                                                                                                                                <td>
                                                                                                                                                                    <div class="btn-group">
                                                                                                                                                                        <button onclick="show_details_car({{$item['id_car']}})" id="" type="button" class="btn btn-brand">
                                                                                                                                                                            <span class="kt-hidden-mobile">Détails</span>
                                                                                                                                                                        </button>
                                                                                                                                                                        
                                                                                                                                                                        
                                                                                                                                                                    </div>
                                                                                                                                                                </td>
                                                                                                                                                            </tr>
                                                                                                                                                            @endforeach
                                                                                                                                                            @endisset
                                                                                                                                                        </tbody>
                                                                                                                                                    </table>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>

                                                                                                                                </div>
                                                                                                                                <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                                                                                                                <div id="car_hide_details_tabs" class="kt-hide">
                                                                                                                                @isset($driver["cars"])
                                                                                                                                @foreach ($driver["cars"] as $item)
                                                                                                                                <div id="car_hide_details_{{$item['id_car']}}" class="kt-hide">
                                                                                                                                    <form class="kt-form kt-form--label-right" id="form_update_car_{{$item['id_car']}}">
                                                                                                                                        <div class="kt-form__body ">
                                                                                                                                            <div class="form-group form-group-last">
                                                                                                                                                <div class="alert alert-danger kt-hide" role="alert" id="kt_form_car_update_msg">
                                                                                                                                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                                                                                                                    <div class="alert-text" id="error_message_update_car">
                                                                                                                                                        Erreur d'insertion, merci de vous essayer
                                                                                                                                                    </div>
                                                                                                                                                    <div class="alert-close">
                                                                                                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                                                                                            <span aria-hidden="true"><i class="la la-close"></i></span>
                                                                                                                                                        </button>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="row">
                                                                                                                                        <div class="col-md-6">
                                                                                                                                            <div class="form-group row">
                                                                                                                                                <label class="col-xl-5 col-lg-5 col-form-label">Cat local</label>
                                                                                                                                                <div class="col-lg-7 col-xl-7">
                                                                                                                                                    <input class="form-control" type="text" name="cat_local" value="{{$item['cat_local']}}">
                                                                                                                                                    <input class="form-control" name="id_car" type="hidden" value="{{$item['id_car']}}">
                                                                                                                                                    <input class="form-control" name="user_id" type="hidden" value="{{$driver['id_users']}}">
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group row">
                                                                                                                                                <label class="col-xl-5 col-lg-5 col-form-label">Immatriculation</label>
                                                                                                                                                <div class="col-lg-7 col-xl-7">
                                                                                                                                                    <input class="form-control" type="text" name="immatricule" value="{{$item['immatricule']}}" >
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group row">
                                                                                                                                                <label class="col-xl-5 col-lg-5 col-form-label">Date premiere immatriculation</label>
                                                                                                                                                <div class="col-lg-7 col-xl-7">
                                                                                                                                                    <input class="form-control" type="text" id="date_immatricule_update_{{$item['id_car']}}" name="date_immatricule" value="{{$item['date_immatricule']}}" >
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group row">
                                                                                                                                                <label class="col-xl-5 col-lg-5 col-form-label">Code d'identification national du Type</label>
                                                                                                                                                <div class="col-lg-7 col-xl-7">
                                                                                                                                                    <input class="form-control" type="text" name="type_national" value="{{$item['type_national']}}">
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group row">
                                                                                                                                                <label class="col-xl-5 col-lg-5 col-form-label">Rue</label>
                                                                                                                                                <div class="col-lg-7 col-xl-7">
                                                                                                                                                    <input class="form-control" type="text" name="rue" value="{{$item['rue']}}">
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group row">
                                                                                                                                                <label class="col-xl-5 col-lg-5 col-form-label">Code postal</label>
                                                                                                                                                <div class="col-lg-7 col-xl-7">
                                                                                                                                                    <input class="form-control" type="text" name="code" value="{{$item['code']}}">
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="col-md-6">
                                                                                                                                            <div class="form-group row">
                                                                                                                                                <label class="col-xl-5 col-lg-5 col-form-label">Marque</label>
                                                                                                                                                <div class="col-lg-7 col-xl-7">
                                                                                                                                                    <input class="form-control" type="text" name="marque" value="{{$item['marque']}}">
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group row">
                                                                                                                                                <label class="col-xl-5 col-lg-5 col-form-label">Type</label>
                                                                                                                                                <div class="col-lg-7 col-xl-7">
                                                                                                                                                    <input class="form-control" name="type" type="text" value="{{$item['type']}}" >
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group row">
                                                                                                                                                <label class="col-xl-5 col-lg-5 col-form-label">Modèle</label>
                                                                                                                                                <div class="col-lg-7 col-xl-7">
                                                                                                                                                    <input class="form-control" type="text" name="modele" value="{{$item['modele']}}" >
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            
                                                                                                                                            <div class="form-group row">
                                                                                                                                                <label class="col-xl-5 col-lg-5 col-form-label">Mention précisant si le Titulaire est le propriétaire du véhicule</label>
                                                                                                                                                <div class="col-lg-7 col-xl-7">
                                                                                                                                                    <span class="kt-switch kt-switch--icon">
                                                                                                                                                        <label>
                                                                                                                                                            <input type="checkbox" name="titulaire_proprietaire" @if($item['titulaire_proprietaire']=="1") checked="checked" @endif name="check_titulaire">
                                                                                                                                                                <span></span>
                                                                                                                                                        </label>
                                                                                                                                                    </span>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group row">
                                                                                                                                                <label class="col-xl-5 col-lg-5 col-form-label">Ville</label>
                                                                                                                                                <div class="col-lg-7 col-xl-7">
                                                                                                                                                    <input class="form-control" type="text" name="ville" value="{{$item['ville']}}" >
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group row">
                                                                                                                                                <label class="col-xl-5 col-lg-5 col-form-label">Pays</label>
                                                                                                                                                <div class="col-lg-7 col-xl-7">
                                                                                                                                                    <input class="form-control" type="text" name="pays" value="{{$item['pays']}}" >
                                                                                                                                                </div>
                                                                                                                                            </div>

                                                                                                                                        </div>

                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                                                                                                                <div class="kt-section kt-section--first">
                                                                                                                                    <div class="kt-section__body">
                                                                                                                                        <div class="row">
                                                                                                                                            <label class="col-xl-3"></label>
                                                                                                                                            <div class="col-lg-9 col-xl-6">
                                                                                                                                                <h3 class="kt-section__title kt-section__title-sm">Assurance pro:</h3>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group row">
                                                                                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Assureur :</label>
                                                                                                                                            <div class="col-lg-9 col-xl-6">
                                                                                                                                                <input class="form-control" name="assureur" type="text" @isset($item['assurance_car']['0']['assureur']) value="{{$item['assurance_car']['0']['assureur']}}" @endisset> 
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group row">
                                                                                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Contrat Numéro :</label>
                                                                                                                                            <div class="col-lg-9 col-xl-6">
                                                                                                                                                <input class="form-control" name="contrat" type="text" @isset($item['assurance_car']['0']['contrat']) value="{{$item['assurance_car']['0']['contrat']}}" @endisset> 
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group row">
                                                                                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Date de fin de validité :</label>
                                                                                                                                            <div class="col-lg-9 col-xl-6">
                                                                                                                                                <input class="form-control" id="date_fin_validite_car_update_{{$item['id_car']}}"  name="date_fin_validite" type="text" @isset($item['assurance_car']['0']['date_fin_validite']) value="{{$item['assurance_car']['0']['date_fin_validite']}}" @endisset> 
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="modal-footer" data-ktwizard-type="action-next">
                                                                                                                                    <button onclick="update_car({{$item['id_car']}})" class="btn btn-primary">Modifier</button>
                                                                                                                                    <button type="button" data-toggle="modal" data-target="#modal_delete_car_{{$item['id_car']}}" class="btn btn-danger">Supprimer</button>
                                                                                                                                </div>
                                                                                                                                <div class="modal fade" id="modal_delete_car_{{$item['id_car']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                                                                                                                <div class="modal-dialog modal-sm" role="document">
                                                                                                                                    <div class="modal-content">
                                                                                                                                        <div class="modal-header">
                                                                                                                                            <h5 class="modal-title" id="exampleModalLabel">Vous voulez vraiemnt supprimer ?</h5>
                                                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                            </button>
                                                                                                                                        </div>

                                                                                                                                        <div class="modal-footer">
                                                                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                                                                                            <button type="button" onclick="delete_car({{$item['id_car']}})" class="btn btn-danger">Supprimer</button>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                                </form>
                                                                                                                                </div>
                                                                                                                                @endforeach
                                                                                                                                @endisset
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="tab-pane" id="permis_tabs" role="tabpanel">
                                                                                                                                <form class="kt-form kt-form--label-right" id="form_update_assurances">
                                                                                                                                    <div class="alert alert-danger kt-hide" role="alert" id="kt_form_assurance_msg">
                                                                                                                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                                                                                                        <div class="alert-text" id="error_message_assurance">Erreur dans la modification</div>
                                                                                                                                        <div class="alert-close">
                                                                                                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                                                                                <span aria-hidden="true"><i class="la la-close"></i></span>
                                                                                                                                            </button>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="kt-form kt-form--label-right">
                                                                                                                                        <div class="kt-form__body">
                                                                                                                                            <div class="kt-section kt-section--first">
                                                                                                                                                <div class="kt-section__body">
                                                                                                                                                    <div class="row">
                                                                                                                                                        <label class="col-xl-3"></label>
                                                                                                                                                        <div class="col-lg-9 col-xl-6">
                                                                                                                                                            <h3 class="kt-section__title kt-section__title-sm">Numéro de carte:</h3>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="form-group row">
                                                                                                                                                        <label class="col-xl-3 col-lg-3 col-form-label">Numéro de Carte :</label>
                                                                                                                                                        <div class="col-lg-9 col-xl-6">
                                                                                                                                                            <input class="form-control" name="numero_carte" type="text" @isset($driver['cart_pro']['0']['numero_carte']) value="{{$driver['cart_pro']['0']['numero_carte']}}" @endisset> 
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group row">
                                                                                                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Date de fin de validité :</label>
                                                                                                                                                    <div class="col-lg-9 col-xl-6">
                                                                                                                                                        <input class="form-control" type="text" name="date_fin_validite" id="date_fin_validite"  @isset($driver['cart_pro']['0']['date_fin_validite']) value="{{$driver['cart_pro']['0']['date_fin_validite']}}" @endisset> 
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                                                                                                                    <div class="kt-section kt-section--first">
                                                                                                                                        <div class="kt-section__body">
                                                                                                                                            <div class="row">
                                                                                                                                                <label class="col-xl-3"></label>
                                                                                                                                                <div class="col-lg-9 col-xl-6">
                                                                                                                                                    <h3 class="kt-section__title kt-section__title-sm">Permis de conduire:</h3>
                                                                                                                                                </div>
                                                                                                                                            </div>

                                                                                                                                            <div class="form-group row">
                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Numéro :</label>
                                                                                                                                                <div class="col-lg-9 col-xl-6">
                                                                                                                                                    <input class="form-control" name="numero" type="text"  @isset($driver['permis']['0']['numero']) value="{{$driver['permis']['0']['numero']}}" @endisset> 
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group row">
                                                                                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Date :</label>
                                                                                                                                            <div class="col-lg-9 col-xl-6">
                                                                                                                                                <input class="form-control" id="date" name="date" type="text"  @isset($driver['permis']['0']['date']) value="{{$driver['permis']['0']['date']}}" @endisset> 
                                                                                                                                                       <input name="user_id" value="{{$driver['id_users']}}" class="form-control" type="hidden" value=""> 
                                                                                                                                                        </div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="form-group row">
                                                                                                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Délivré par :</label>
                                                                                                                                                            <div class="col-lg-9 col-xl-6">
                                                                                                                                                                <input class="form-control" name="delivre" type="text"  @isset($driver['permis']['0']['delivre']) value="{{$driver['permis']['0']['delivre']}}" @endisset> 
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="form-group row">
                                                                                                                                                        <label class="col-xl-3 col-lg-3 col-form-label">CATEGORIE A depuis :</label>
                                                                                                                                                        <div class="col-lg-9 col-xl-6">
                                                                                                                                                            <input class="form-control" id="categorie_a" name="categorie_a" type="text"  @isset($driver['permis']['0']['categorie_a']) value="{{$driver['permis']['0']['categorie_a']}}" @endisset> 
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group row">
                                                                                                                                                    <label class="col-xl-3 col-lg-3 col-form-label">CATEGORIE B depuis :</label>
                                                                                                                                                    <div class="col-lg-9 col-xl-6">
                                                                                                                                                        <input class="form-control" id="categorie_b" name="categorie_b" type="text"  @isset($driver['permis']['0']['categorie_b']) value="{{$driver['permis']['0']['categorie_b']}}" @endisset> 
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            </div>
                                                                                                                                            </div>

                                                                                                                                            <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                                                                                                                            <div class="kt-section kt-section--first">
                                                                                                                                                <div class="kt-section__body">
                                                                                                                                                    <div class="row">
                                                                                                                                                        <label class="col-xl-3"></label>
                                                                                                                                                        <div class="col-lg-9 col-xl-6">
                                                                                                                                                            <h3 class="kt-section__title kt-section__title-sm">Assurance pro:</h3>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="form-group row">
                                                                                                                                                        <label class="col-xl-3 col-lg-3 col-form-label">Assureur :</label>
                                                                                                                                                        <div class="col-lg-9 col-xl-6">
                                                                                                                                                            <input class="form-control" name="assureur" type="text"  @isset($driver['assurance_driver']['0']['assureur']) value="{{$driver['assurance_driver']['0']['assureur']}}" @endisset> 
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group row">
                                                                                                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Contrat Numéro :</label>
                                                                                                                                                    <div class="col-lg-9 col-xl-6">
                                                                                                                                                        <input class="form-control" name="contrat" type="text"  @isset($driver['assurance_driver']['0']['contrat']) value="{{$driver['assurance_driver']['0']['contrat']}}" @endisset> 
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group row">
                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Date de fin de validité :</label>
                                                                                                                                                <div class="col-lg-9 col-xl-6">
                                                                                                                                                    <input class="form-control" id="date_fin_validite_assurance" name="date_fin_validite_assurance" type="text"  @isset($driver['assurance_driver']['0']['date_fin_validite']) value="{{$driver['assurance_driver']['0']['date_fin_validite']}}" @endisset> 
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                </div>
                                                                                                                                <div class="modal-footer" data-ktwizard-type="action-next">
                                                                                                                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                                                                                                                </div>
                                                                                                                                </div>
                                                                                                                                </form>
                                                                                                                                </div>
                                                                                                                                </div>
                                                                                                                                </div>
                                                                                                                                </div>
                                                                                                                                </div>

                                                                                                                                <div class="modal modal-stick-to-bottom fade" id="new_id_popup" role="dialog" data-backdrop="false" aria-hidden="true" style="display: none;">
                                                                                                                                    <form class="kt-form kt-form--label-right" id="form_add_id">
                                                                                                                                        <div class="modal-dialog" role="document">
                                                                                                                                            <div class="modal-content">
                                                                                                                                                <div class="modal-header">
                                                                                                                                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter identification personnelle morale</h5>
                                                                                                                                                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                                                                                                                <div class="alert alert-danger kt-hide" role="alert" id="kt_form_id_msg">
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
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Immatriculation au RCS Numéro*</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">
                                                                                                                                                                                    <input class="form-control" id="immatriculation_tcs" name="immatriculation_tcs" type="text">
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                            <input class="form-control" id="user_id" name="user_id" type="hidden" value="{{$driver['id_users']}}">
                                                                                                                                                                                <div class="form-group row">
                                                                                                                                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Date d'immatriculation*</label>
                                                                                                                                                                                    <div class="col-lg-9 col-xl-9">
                                                                                                                                                                                        <input class="form-control" name="date_imma" id="date_imma_id" type="text" >
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="form-group row">
                                                                                                                                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Dénomination ou raison sociale</label>
                                                                                                                                                                                    <div class="col-lg-9 col-xl-9">
                                                                                                                                                                                        <input id="compagnie" name="denomination" class="form-control" type="text" >
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="form-group row">
                                                                                                                                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Forme juridique</label>
                                                                                                                                                                                    <div class="col-lg-9 col-xl-9">
                                                                                                                                                                                        <input type="text" name="forme_juridique" id="forme_juridique" class="form-control"  placeholder="" aria-describedby="basic-addon1">
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>

                                                                                                                                                                                <div class="form-group row">
                                                                                                                                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Activité principale</label>
                                                                                                                                                                                    <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                        <input type="text" class="form-control" name="activite_principale" placeholder="">
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>

                                                                                                                                                                                <div class="form-group row">
                                                                                                                                                                                    <label class="col-xl-3 col-lg-3 col-form-label">SIRET</label>
                                                                                                                                                                                    <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                        <input type="text" class="form-control" name="siret" placeholder="">
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="form-group row">
                                                                                                                                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Code NAF</label>
                                                                                                                                                                                    <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                        <input type="text" class="form-control" name="code_naf" placeholder="">
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="form-group row">
                                                                                                                                                                                    <label class="col-xl-3 col-lg-3 col-form-label">TVA Intracommunautaire</label>
                                                                                                                                                                                    <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                        <input type="text" class="form-control" name="tva_intracommunautaire" placeholder="">
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


                                                                                                                                <div class="modal modal-stick-to-bottom fade" id="new_gerant_popup" role="dialog" data-backdrop="false" aria-hidden="true" style="display: none;">
                                                                                                                                    <form class="kt-form kt-form--label-right" id="form_add_gerant">
                                                                                                                                        <div class="modal-dialog" role="document">
                                                                                                                                            <div class="modal-content">
                                                                                                                                                <div class="modal-header">
                                                                                                                                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter gérant</h5>
                                                                                                                                                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                                                                                                                <div class="alert alert-danger kt-hide" role="alert" id="kt_form_gerant_add_msg">
                                                                                                                                                                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                                                                                                                                                    <div class="alert-text" id="error_message_add_gerant">
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
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Nom*</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">
                                                                                                                                                                                    <input class="form-control" id="nom" name="nom" type="text">
                                                                                                                                                                                        <input class="form-control" type="hidden" id="identification_personnelle_morale_id" name="identification_personnelle_morale_id"/>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                            <div class="form-group row">
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Prénom*</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">
                                                                                                                                                                                    <input class="form-control" name="prenom" id="prenom" type="text" >
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                            <div class="form-group row">
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Date de naissance</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">
                                                                                                                                                                                    <input id="date_naissance_gerant" name="date_naissance" class="form-control" type="text" >
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                            <div class="form-group row">
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Lieu de naissance</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">
                                                                                                                                                                                    <input type="text" name="lieu_naissance" id="lieu_naissance" class="form-control"  placeholder="" aria-describedby="basic-addon1">
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>

                                                                                                                                                                            <div class="form-group row">
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Nationalité</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                    <input type="text" class="form-control" name="nationalite" placeholder="">
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>

                                                                                                                                                                            <div class="form-group row">
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Domicile personnelle</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                    <input type="text" class="form-control" name="domicile" placeholder="">
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

                                                                                                                                <div class="modal modal-stick-to-bottom fade" id="new_car_popup" role="dialog" data-backdrop="false" aria-hidden="true" style="display: none;">
                                                                                                                                    <form class="kt-form kt-form--label-right" id="form_add_car">
                                                                                                                                        <div class="modal-dialog" role="document">
                                                                                                                                            <div class="modal-content">
                                                                                                                                                <div class="modal-header">
                                                                                                                                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter véhicule</h5>
                                                                                                                                                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                                                                                                                <div class="alert alert-danger kt-hide" role="alert" id="kt_form_car_add_msg">
                                                                                                                                                                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                                                                                                                                                    <div class="alert-text" id="error_message_add_car">
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
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Catégorie local</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">
                                                                                                                                                                                    <input class="form-control" id="cat_local" name="cat_local" type="text">
                                                                                                                                                                                        <input class="form-control" type="hidden" id="user_id" name="user_id" value="{{$driver['id_users']}}"/>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                            <div class="form-group row">
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Immatriculation*</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">
                                                                                                                                                                                    <input class="form-control" name="immatricule" id="immatricule" type="text" >
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                            <div class="form-group row">
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Date premiere immatriculation</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">
                                                                                                                                                                                    <input  id="date_immatricule" name="date_immatricule" class="form-control" type="text" >
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                            <div class="form-group row">
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Marque</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">
                                                                                                                                                                                    <input type="text" name="marque" id="marque" class="form-control"  placeholder="" aria-describedby="basic-addon1">
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>

                                                                                                                                                                            <div class="form-group row">
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Type</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                    <input type="text" class="form-control" name="type" placeholder="">
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                            
                                                                                                                                                                            <div class="form-group row">
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Code d'identification national du Type</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                    <input type="text" class="form-control" name="type_national" placeholder="">
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                            

                                                                                                                                                                            <div class="form-group row">
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Code national</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                    <input type="text" class="form-control" name="code_national" placeholder="">
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>

                                                                                                                                                                            <div class="form-group row">
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Modele</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                    <input type="text" class="form-control" name="modele" placeholder="">
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>

                                                                                                                                                                            <div class="form-group row">
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Titulaire carte grise</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                    <input type="text" class="form-control" name="titulaire_carte_grise" placeholder="">
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>

                                                                                                                                                                            <div class="form-group row">
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Code national</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                    <input type="text" class="form-control" name="code_national" placeholder="">
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>

                                                                                                                                                                            <div class="form-group row">
                                                                                                                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Mention précisant si le Titulaire est le propriétaire du véhicule</label>
                                                                                                                                                                                <div class="col-lg-9 col-xl-9">
                                                                                                                                                                                    <span class="kt-switch kt-switch--icon">
                                                                                                                                                                                        <label>
                                                                                                                                                                                            <input type="checkbox" name="check_titulaire">
                                                                                                                                                                                                <span></span>
                                                                                                                                                                                        </label>
                                                                                                                                                                                    </span>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>


                                                                                                                                                                            <div id="check_titu" class="">
                                                                                                                                                                                <div class="form-group row">
                                                                                                                                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Rue</label>
                                                                                                                                                                                    <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                        <input type="text" class="form-control" name="rue" placeholder="">
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>

                                                                                                                                                                                <div class="form-group row">
                                                                                                                                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Code postal</label>
                                                                                                                                                                                    <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                        <input type="text" class="form-control" name="code_postal" placeholder="">
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>

                                                                                                                                                                                <div class="form-group row">
                                                                                                                                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Pays</label>
                                                                                                                                                                                    <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                        <input type="text" class="form-control" name="pays" placeholder="">
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="form-group row">
                                                                                                                                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Ville</label>
                                                                                                                                                                                    <div class="col-lg-9 col-xl-9">

                                                                                                                                                                                        <input type="text" class="form-control" name="ville" placeholder="">
                                                                                                                                                                                    </div>
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

                                                                                                                                @include('admin.js.driver')
                                                                                                                                @endsection
