@extends('admin.layout.menu',  ['utilisateur' => "Ismail"])
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
                                    <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" id="Mask" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" id="Mask-Copy" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#identification_tabs" role="tab" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg> Mot de passe
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="tab-content">
                <div class="tab-pane active" id="informations_tabs" role="tabpanel">
                    <div class="kt-form kt-form--label-right">
                        <form class="kt-form kt-form--label-right" id="form_update_profile" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="form-group form-group-last " >
                                                <div class="alert alert-danger kt-hide" role="alert" id="kt_form_update_profile_msg">
                                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                    <div class="alert-text" id="error_message_update_prodile">Merci de remplir les champs obligatoires</div>
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
                                            <div class="form-group row kt-hide">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_apps_user_add_avatar">
                                                        <div class="kt-avatar__holder" style="background-image: url({{asset('media/driver/default.jpg')}});"></div>
                                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                            <i class="fa fa-pen"></i>
                                                            <input class="form-control" type="file" id="avatar_driver" multiple  name="avatar_driver" accept=".png, .jpg, .jpeg">
                                                        </label>
                                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                            <i class="fa fa-times"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Prénom*</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" name="prenom" id="prenom" type="text" value="{{$user['prenom']}}">
                                                        <input class="form-control" name="id" id="id" type="hidden" value="{{$user['id_users']}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Nom*</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" name="nom" id="nom" type="text" value="{{$user['nom']}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Compagnie</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" name="compagnie" id="compagnie" type="text" value="{{$user['compagnie']}}">
                                                </div>
                                            </div>
                                            <div class="form-group row kt-hide">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Téléphone valide*</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" name="telephone" id="telephone" class="form-control" value="{{$user['phone_valide']}}" placeholder="Phone" aria-describedby="basic-addon1">
                                                    <input type="hidden" name="id_telephone_valide" id="id_telephone_valide" class="form-control" placeholder="Phone" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Email*</label>
                                                <div class="col-lg-9 col-xl-6">

                                                    <input type="text" name="email" id="email" class="form-control" value="{{$user['email']}}" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3 col-form-label">Date de naissance</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" id="date_naissance" name="date_naissance" value="{{$user['date_naissance']}}" class="form-control" value="" placeholder="" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Lieu de naissance</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" name="lieu_naissance" id="lieu_naissance" type="text" value="{{$user['lieu_naissance']}}">
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
                    <form class="kt-form kt-form--label-right" id="password_form">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">
                                    <div class="form-group form-group-last">
                                        <div class="alert alert-danger kt-hide" role="alert" id="kt_form_update_password_msg">
                                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                            <div class="alert-text" id="error_message_update_password">Merci de rspecter les régles de mot de passe</div>
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
                                            <h3 class="kt-section__title kt-section__title-sm">Changer le mot de passe:</h3>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Nouveau mot de passe</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="password" name="password" id="password" class="form-control" value="" placeholder="Nouveau mot de passe">
                                            <input type="hidden" name="id_user" id="id_user" class="form-control" value="{{$user['id_users']}}" placeholder="Nouveau mot de passe">
                                        </div>
                                    </div>
                                    <div class="form-group form-group-last row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Vérifier mot de passe</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="password" name="password_verify" id="password_verify" class="form-control" value="" placeholder="Vérifier mot de passe">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-3 col-xl-3">
                                    </div>
                                    <div class="col-lg-9 col-xl-9">
                                        <button type="submit" class="btn btn-brand btn-bold">Changer mot de passe</button>&nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.js.profile')
@endsection