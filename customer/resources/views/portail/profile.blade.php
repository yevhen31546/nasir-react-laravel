@extends('portail.layout.menu',  ['utilisateur' => "Ismail"])
@section('content')
<div class="section nobg notopmargin nopadding footer-stick">
    <div class="container clearfix">

        <div class="row bottommargin-sm">
            <div class="col-lg-4 topmargin-sm bottommargin-sm">
                <div class="">
                    <div class="card-header hidden"> BESOIN D'AIDE? </div>
                    <div class="">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action "  id="list-home-list"  href="{{url('reservations')}}">Mes réservations</a>
                            <a class="list-group-item list-group-item-action "  id="list-home-list"  href="{{url('adresses')}}">Mes Adresses</a>
                            <a class="list-group-item list-group-item-action active" id="list-profile-list" style="background-color: #F18052;border-color: #F18052;"  href="{{url('profile')}}"  aria-selected="false">Mon compte</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 topmargin-sm bottommargin-sm">
                <div class="form-widget">

                    <div class=""></div>
                    <div class="card">
                        <div class="card-header"><b>PROFILE</b></div>
                        <div class="card-body">
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
