@extends('portail.layout.menu',  ['utilisateur' => "Ismail"])
@section('content')
<style>
    .ag {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
    }
    .ex {
        max-height: 90px;
    }
    .d5 {
        margin-bottom: 16px;
    }
    .ez {
        margin: 4px 16px 0px 0px;
    }
    .f0 {
        border-radius: 50%;
    }
    .f1 {
        width: 9px;
    }
    .f2 {
        height: 9px;
    }
    .f3 {
        border-width: 7px;
        border-style: solid;
        border-color: rgb(226, 226, 226);
        border-image: initial;
    }
    .f4 {
        margin-bottom: 4px;
    }
    .f5 {
        background: rgb(226, 226, 226);
    }
    .f7 {
        margin: 2px 0px 2px 6px;
    }
    .f6 {
        width: 2px;
    }
    .f5 {
        background: rgb(226, 226, 226);
    }
    .er {
        height: 100%;
    }
    .ak {
        box-sizing: border-box;
    }
    .f8 {
        margin: 0px;
    }
    .ek {
        display: block;
    }
    .fb {
        color: rgb(119, 121, 122);
    }
    .fa {
        margin-top: 4px;
    }
    .f9 {
        text-transform: uppercase;
    }
    .b5 {
        line-height: 20px;
    }
    .fh {
        padding: 16px 0px 16px 24px;
    }
    .bi {
        text-decoration: none;
    }
    .fs {
        color: rgb(23, 66, 145);
    }
    .fr {
        -webkit-box-pack: center;
        justify-content: center;
    }
    .cn {
        cursor: pointer;
    }
    .bk {
        font-family: Medium;
    }
    .b5 {
        line-height: 20px;
    }
    .b4 {
        font-size: 14px;
    }
    .as {
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        flex-direction: row;
    }
    .ai {
        -webkit-box-align: center;
        align-items: center;
    }
</style>
<div class="section nobg notopmargin nopadding footer-stick">
    <div class="container clearfix">

        <div class="row bottommargin-sm">
            <div class="col-lg-4 topmargin-sm bottommargin-sm">
                <div class="">
                    <div class="card-header hidden"> BESOIN D'AIDE? </div>
                    <div class="">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" style="background-color: #F18052;border-color: #F18052;" id="list-home-list"  href="{{url('reservations')}}">Mes réservations</a>
                            <a class="list-group-item list-group-item-action "  id="list-home-list"  href="{{url('adresses')}}">Mes Adresses</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list"  href="{{url('profile')}}"  aria-selected="false">Mon compte</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 topmargin-sm bottommargin-sm">
                <div class="tabs  tabs-alt tabs-justify clearfix ui-tabs ui-corner-all ui-widget ui-widget-content" id="tab-2">

                    <ul class="tab-nav clearfix ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header" role="tablist">
                        <li role="tab" tabindex="0" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active" aria-controls="tabs-5" aria-labelledby="ui-id-5" aria-selected="true" aria-expanded="true"><a href="#tabs-5" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-5">Courses du jour</a></li>
                        <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-6" aria-labelledby="ui-id-6" aria-selected="false" aria-expanded="false"><a href="#tabs-6" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-6">Courses effectuées</a></li>
                        <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-7" aria-labelledby="ui-id-7" aria-selected="false" aria-expanded="false"><a href="#tabs-7" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-7">Courses annullées</a></li>
                    </ul>

                    <div class="tab-container">

                        <div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-5" aria-labelledby="ui-id-5" role="tabpanel" aria-hidden="false" style="">
                            @isset($rides_ec)
                            @foreach ($rides_ec as $ride)

                            <div class="toggle toggle-bg">
                                <div class="togglet"><i class="toggle-closed icon-line-square-plus"></i><i class="toggle-open icon-line-square-minus"></i>{{$ride['date_debut']}}, {{$ride['time_debut']}} <br> {{$ride['prix_ht']}} €</div>
                                <div class="togglec" style="display: none;">
                                    <div class="ag">
                                        <div class="">
                                            <div class="ag d5 ex ey">
                                                <div class="ez">
                                                    <div class="f0 f1 f2 f3 f4 f5"></div>
                                                    <div class="f6 er ak f5 f7"></div>
                                                </div>
                                                <div class="f8 ek">{{$ride['lieu_depart']}}<div class="f9 b5 fa fb dx fc">07:59 pm</div></div>
                                            </div>
                                            <div class="ag">
                                                <div class="ez">
                                                    <div class="f1 f2 f3 f5"></div>

                                                </div>
                                                <div class="f8 ek">{{$ride['lieu_arrive']}}<div class="f9 b5 fa fb dx fc"></div>

                                                </div>

                                            </div>

                                        </div>
                                        
                                    </div>
                                    <div style="text-align: right;">
                                        <a href="#" class="button button-3d button-rounded button-white button-light">Enregistrer la facture<i class="icon-line-download"></i></a>
                                        <a href="{{url('ride')}}/{{$ride['id_ride']}}" class="button button-3d button-rounded button-white button-light">Détails<i class="icon-line-arrow-right"></i></a>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                            @endisset

                        </div>
                        <div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-con                                            tent" id="tabs-6" aria-labelledby="ui-id-6" role="tabpanel" aria-hidden="true" style="display: none;">
                            @isset($rides_ef)
                            @foreach ($rides_ef as $ride)
                            <div class="toggle toggle-bg">
                                <div class="togglet"><i class="toggle-closed icon-line-square-plus"></i><i class="toggle-open icon-line-square-minus"></i>{{$ride['date_debut']}}, {{$ride['time_debut']}}<br> {{$ride['prix_ht']}} €</div>
                                <div class="togglec" style="display: none;">
                                    dddddddddddddd
                                </div>
                            </div>
                            @endforeach
                            @endisset

                        </div>
                        <div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-7" aria-labelledby="ui-id-7" role="tabpanel" aria-hidden="true" style="display: none;">
                            @isset($rides_an)
                            @foreach ($rides_an as $ride)
                            <div class="toggle toggle-bg">
                                <div class="togglet"><i class="toggle-closed icon-line-square-plus"></i><i class="toggle-open icon-line-square-minus"></i>{{$ride['date_debut']}}, {{$ride['time_debut']}} <br> {{$ride['prix_ht']}} €</div>
                                <div class="togglec" style="display: none;">
                                    dddddddddddddd
                                </div>
                            </div>
                            @endforeach
                            @endisset

                        </div>


                    </div>

                </div>


            </div>
        </div>

    </div>
</div>
@endsection
