@extends('portail.layout.menu',  ['utilisateur' => "Ismail"])
@section('content')

<link rel="stylesheet" href="{{asset('assets-front/css/components/radio-checkbox.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('assets-front/css/components/flags.css')}}" type="text/css" />
<script src="{{asset('assets-front/js/components/prettify.min.js')}}"></script>
<script src="{{asset('assets-front/js/components/flagstrap.js')}}"></script>
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

                    <div class="form-result"></div>
                    <div class="card">
                        
                        <div class="card-header"><b>INSCRIPTION</b></div>
                        <div class="card-body">
                            <div id="error_div" class="style-msg errormsg hidden">
                                <div id="error_msg" class="sb-msg"><i class="icon-remove"></i>Merci de remplir les champs obligatoires</div>
                            </div>
                            <form class="row" id="event-registration" enctype="multipart/form-data" novalidate="novalidate">
                                <div class="form-process"></div>
                                <div class="col-6 form-group">
                                    <label>Prénom*</label>
                                    <input type="text"  name="prenom" class="form-control required valid"  placeholder="" @if (session('prenom'))value="{{ session('prenom') }}" @endif>
                                    <input type="hidden"  name="type" class="form-control required valid"  placeholder="" @if (session('type'))value="{{ session('type') }}" @endif>
                                </div>
                                <div class="col-6 form-group">
                                    <label>Nom*</label>
                                    <input type="text"  name="nom" class="form-control required"  placeholder="" @if (session('nom')) value="{{ session('nom') }}" @endif>
                                </div>
                                <div class="col-6 form-group">
                                    <label>Téléphone*</label>
                                    <div class="input-group" > 
                                        <select style="width: 30%" name="pre" class="form-control required valid">
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
                                        <input style="width: 70%" type="text"  name="telephone" class="form-control required valid" value="" placeholder="">
                                           </div>
                                     </div>
                                <div class="col-6 form-group">
                                    <label>E-mail*</label>
                                    <input type="text"  name="email" class="form-control required"  placeholder="" @if (session('email')) value="{{ session('email') }}" @endif>
                                    <input type="text"  name="id_social" class="form-control hidden"  @if (session('id')) value="{{ session('id') }}" @endif>
                                </div>
                                <div class="col-6 form-group @if ((session('id')) or (session('id')))  hidden @endif">
                                    <label>Mot de passe*</label>
                                    <input type="password" name="password" id="password" class="form-control required valid" value="" placeholder="">
                                </div>
                                <div class="col-6 form-group @if ((session('id')) or (session('id')))  hidden @endif ">
                                    <label>Confirmer le mot de passe*</label>
                                    <input type="password" name="password_verify" class="form-control required" value="" placeholder="">
                                </div>
                                    
                                <div class="col-12 form-group hidden">
                                    <div class="checkbox-inline">
                                        <label class="checkbox">
                                            <input type="checkbox" name="checkbox" class="form-control">
                                            
                                        </label>
                                    </div>
                                    <div>
                                        <input id="checkbox-12" class="checkbox-style form-control" name="check_cgu" type="checkbox">
                                        <label for="checkbox-12" class="checkbox-style-3-label">                                   
                                            <a href="#"> J’ai lu et j’accepte les mentions légales et les conditions générales d’utilisation notamment la mention relative à la protection des données personnelles . </a>
                                        </label>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <button class="@if ((session('type')) or (session('id')))button-3d button-rounded btn-block nomargin loginBtn loginBtn--{{ session('type') }} @else button button-3d button-rounded btn-block nomargin @endif " >S'inscrire @if ((session('type')) or (session('id'))) avec {{ session('type') }} @endif</button>
                                </div>

                                <input type="hidden" name="prefix" value="event-registration-">
                            </form>
                            <div  class="col-12 row form-group @if ((session('id')) or (session('id')))  hidden @endif">

                                <div style="text-align: center;" class="col-md-6 row-block">
                                    <a href="{{ url('inscription/facebook') }}">
                                        <button class="loginBtn loginBtn--facebook ">
                                            S'inscrire avec Facebook
                                        </button>
                                    </a>
                                </div>

                                <div style="text-align: center;" class="col-md-6 row-block">
                                    <a href="{{ url('inscription/google') }}">
                                        <button class="loginBtn loginBtn--google ">
                                            S'inscrire avec Google
                                        </button>
                                    </a>
                                </div>

                                <div class="col-md-12 row-block hidden">
                                    <a href="{{ url('auth/facebook') }}" class="btn btn-lg btn-primary btn-block">
                                        <strong>Login With Facebook</strong>
                                        </a>     
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@include('portail.js.inscription')
@endsection
<style>
    


/* Shared */
.loginBtn {
        width: 260px;
  box-sizing: border-box;
  position: relative;
  /* width: 13em;  - apply for fixed size */
  margin: 0.2em;
  padding: 0 15px 0 46px;
  border: none;
  text-align: left;
  line-height: 34px;
  white-space: nowrap;
  border-radius: 0.2em;
  font-size: 16px;
  color: #FFF;
}
.loginBtn:before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  top: 0;
  left: 0;
  width: 34px;
  height: 100%;
}
.loginBtn:focus {
  --outline: none;
}
.loginBtn:active {
  box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
}


/* Facebook */
.loginBtn--facebook {
  background-color: #4C69BA;
  background-image: linear-gradient(#4C69BA, #3B55A0);
  /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
  text-shadow: 0 -1px 0 #354C8C;
}
.loginBtn--facebook:before {
  border-right: #364e92 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
}
.loginBtn--facebook:hover,
.loginBtn--facebook:focus {
  background-color: #5B7BD5;
  background-image: linear-gradient(#5B7BD5, #4864B1);
}


/* Google */
.loginBtn--google {
  /*font-family: "Roboto", Roboto, arial, sans-serif;*/
  background: #DD4B39;
}
.loginBtn--google:before {
  border-right: #BB3F30 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
}
.loginBtn--google:hover,
.loginBtn--google:focus {
  background: #E74B37;
}
</style>
