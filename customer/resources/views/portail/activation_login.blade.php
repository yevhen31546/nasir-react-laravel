@extends('portail.layout.menu',  ['utilisateur' => "Ismail"])
@section('content')
<div class="section nobg notopmargin nopadding footer-stick">
    <div class="container clearfix">

        <div class="row bottommargin-sm">
            <div class="col-lg-4 topmargin-sm bottommargin-sm">
                <div class="card">
                    <div class="card-header"> BESOIN D'AIDE? </div>
                    <div class="card-body">
                        <div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
                            <address>
                                <strong>Headquarters:</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                            </address>
                            <abbr title="Phone Number"><strong>Phone:</strong></abbr> (91) 8547 632521<br>
                            <abbr title="Fax"><strong>Fax:</strong></abbr> (91) 11 4752 1433<br>
                            <abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 topmargin-sm bottommargin-sm">
                <div class="form-widget">

                    <div class=""></div>
                    <div class="card">
                        <div class="card-header"><b>INSCRIPTION</b></div>
                        <div class="card-body">


                            <div id="error_div" class="style-msg errormsg hidden">
                                <div id="error_msg" class="sb-msg"></div>
                            </div>





                            <form class="row" id="event-activation" enctype="multipart/form-data" novalidate="novalidate">
                                <div class="form-process"></div>
                                <div class="col-12 form-group">
                                    <div id="sms3" class="hidden">

                                        <p>
                                            Bonjour {{Session::get('nom_inscription')}},<br><br>
                                            Votre compte Weekab <b>{{Session::get('email_inscription')}}</b> est validée.<br><br>
                                            Veuillez-vous connecter<br><br>
                                            L'équipe de Weekab


                                        </p>
                                        <p></p>
                                        
                                    </div>
                                    <div id="sms2" class="hidden">

                                        <label style="align-items: center">Email : <label style="text-transform: lowercase">{{Session::get('email_inscription')}}</label></label>
                                        <p>
                                            Bonjour {{Session::get('nom_inscription')}},<br><br>
                                            Votre numéro  de téléphone <b>{{Session::get('telephone_inscription')}}</b> est désormais activé<br><br>
                                            Vous allez recevoir un e-mail sur votre boite e-mail : <b>{{Session::get('email_inscription')}}</b><br><br>
                                            Afin de finaliser votre inscription weekab,  merci d’ouvrir votre e-mail et cliquer sur le lien de confirmation<br><br>
                                            L'équipe de Weekab


                                        </p>
                                        <p></p>
                                        <div class="col-12 row " id="formemail">
                                            <div class="col-2"></div>
                                            <div class="col-8">
                                                <button onclick="sendemail();" class="button button-3d button-rounded btn-block nomargin" style="">Renvoyer un email</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 form-group">
                                    <div id="sms1">


                                        <label style="align-items: center">Téléphone :{{Session::get('telephone_inscription')}}</label>
                                        <p>
                                            Bonjour {{Session::get('nom_inscription')}},<br><br>
                                            Nous vous avons envoyé un code d’activation par SMS au <b>{{Session::get('telephone_inscription')}}</b><br><br>
                                            Merci de reporter ce code dans la case ci-dessous pour valider votre numéro de téléphone<br><br>
                                            L'équipe de Weekab

                                        </p>
                                        <p></p>


                                    </div>






                                    <input type="text" id="code_activation" name="code_activation"  class="form-control required" value="" placeholder="">
                                    <input type="hidden" name="email" id="email" class="form-control" value="" placeholder="">
                                </div>

                                <div class="col-12">
                                    <button id="btn_sms" class="button button-3d button-rounded btn-block nomargin" style="">Activer votre Téléphone</button>
                                </div>

                            </form>

                            <form class="row" id="sms-activation" enctype="multipart/form-data" novalidate="novalidate">
                                <label style="margin-left: 2%;">Téléphone*</label>
                                <div class="col-12 row" id="formsms">

                                    <div class="col-8 form-group">

                                        <div class="input-group" > 
                                            <select style="width: 30%" id='pre' name="pre" class="form-control required valid">
                                                <option value="+33">+33</option>
                                                <option value="+54">+54</option>
                                                <option value="+61">+61</option>
                                                <option value="+43">+43</option>
                                                <option value="+32">+32</option>
                                                <option value="+55">+55</option>
                                                <option value="+86">+86</option>
                                                <option value="+45">+45</option>
                                                <option value="+358">+358</option>
                                                <option value="+49">+49</option>
                                                <option value="+30">+30</option>
                                                <option value="+852">+852</option>
                                                <option value="+91">+91</option>
                                                <option value="+353">+353</option>
                                                <option value="+39">+39</option>
                                                <option value="+81">+81</option>
                                                <option value="+352">+352</option>
                                                <option value="+377">+377</option>
                                                <option value="+212">+212</option>
                                                <option value="+31">+31</option>
                                                <option value="+64">+64</option>
                                                <option value="+47">+47</option>
                                                <option value="+48">+48</option>
                                                <option value="+351">+351</option>
                                                <option value="+974">+974</option>
                                                <option value="+7">+7</option>
                                                <option value="+966">+966</option>
                                                <option value="+65">+65</option>
                                                <option value="+27">+27</option>
                                                <option value="+82">+82</option>
                                                <option value="+34">+34</option>
                                                <option value="+46">+46</option>
                                                <option value="+41">+41</option>
                                                <option value="+90">+90</option>
                                                <option value="+380">+380</option>
                                                <option value="+971">+971</option>
                                                <option value="+44">+44</option>
                                                <option value="+1">+1</option>
                                            </select>
                                            <input style="width: 70%" type="text" id="telephone"  name="telephone" class="form-control required valid" value="" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <button id="sendsms" class="button button-3d button-rounded btn-block nomargin" style="">Renvoyer le code</button>
                                    </div>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@include('portail.js.activation_login')
@endsection
