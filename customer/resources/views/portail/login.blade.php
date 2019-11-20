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
                    <div class="card-header"><b>SE CONNECTER</b></div>
                    <div class="card-body">
                        @if (session('exist_facebook'))  
                        <div id="" class="style-msg errormsg">
                            <div id="" class="sb-msg">Cette adresse Email est déja existe, merci de se connecter avec ton compte facebook</div>
                        </div>
                        @endif
                        
                        @if (session('exist_simple'))  
                        <div id="" class="style-msg errormsg">
                            <div id="" class="sb-msg">Cette adresse Email est déja existe, merci de se connecter avec ton compte</div>
                        </div>
                        @endif
                        
                        @if (session('exist_google'))  
                        <div id="" class="style-msg errormsg">
                            <div id="" class="sb-msg">Cette adresse Email est déja existe, merci de se connecter avec ton compte google</div>
                        </div>
                        @endif
                        
                        @if (session('erreur_googlee'))  
                        <div id="" class="style-msg errormsg">
                            <div id="" class="sb-msg">Cette adresse Email est déja existe</div>
                        </div>
                        @endif
                        @if (session('erreur_facebook'))  
                        <div id="" class="style-msg errormsg">
                            <div id="" class="sb-msg">Compte Facebook incorrect, essayer de nouveau</div>
                        </div>
                        @endif
                        @if (session('erreur_google'))  
                        <div id="" class="style-msg errormsg">
                            <div id="" class="sb-msg">Compte Google incorrect, essayer de nouveau</div>
                        </div>
                        @endif
                        <div id="error_div" class="style-msg errormsg hidden">
                            <div id="error_msg" class="sb-msg"><i class="icon-remove"></i>Merci de remplir les champs obligatoires</div>
                        </div>
                        <form class="row" id="event-login" enctype="multipart/form-data" novalidate="novalidate">
                            <div class="form-process"></div>
                            
                            @if(session('exist_activation_email'))
                            <div style="margin-left: 3%;" id="sms2" class="">
                                
                                <p>
                                    Bonjour {{ session('nom_activaction') }},<br><br>
                                    Votre compte Weekab <b>{{ session('email_activaction') }}</b> est validée.<br><br>
                                    L'équipe de Weekab



                                </p>
                                <p></p>
                                </div>
                            @endif
                            
                            @if(session('exist_inscription_email'))
                            <div style="margin-left: 3%;" id="exist_inscription_email" class="">
                                
                                <p>
                                    Bonjour {{ session('nom_inscription') }},<br><br>
                                    L’adresse e-mail <b>{{ session('email_inscription') }}</b> est déjà utilisée pour un compte Weekab @if(session('type_inscription'))  avec <b>{{ session('type_inscription') }}</b> @endif<br><br>
                                    @if(session('type_inscription'))
                                    
                                    @else
                                    Si vous avez oublié votre mot de passe, vous pouvez le réinitialiser.<br><br>
                                    
                                    @endif
                                    L'équipe de Weekab
                                </p>
                                <p></p>
                                </div>
                            @endif
                            <div class="col-12 form-group">
                                <label>E-mail*</label>
                                <input type="text" name="email"  class="form-control" @if(session('exist_inscription_email')) value={{ session('email_inscription') }} @endif @if(session('exist_activation_email')) value={{ session('email_activaction') }} @endif placeholder="">
                            </div>
                            <div class="col-12 form-group">
                                <label>Mot de passe*</label>
                                <input type="password" name="password"  class="form-control" value="" placeholder="">
                            </div>
                            
                            <div class="col-12 form-group">
                                <label><a href="{{url('resetpassword')}}">Mot de passe oublié?</a></label>
                            </div>

                            <div class="col-12">
                                <button class="button button-3d button-rounded btn-block nomargin" style="">Se connecter</button>
                            </div>
                           

                        </form>
                         <div id='social1' class="col-12 row form-group">

                                <div style="text-align: center;" class="col-md-6 row-block">
                                    <a href="{{ url('login/facebook') }}">
                                        <button class="loginBtn loginBtn--facebook ">
                                            Se connecter avec Facebook
                                        </button>
                                    </a>
                                </div>

                                <div style="text-align: center;" class="col-md-6 row-block">
                                    <a href="{{ url('login/google') }}">
                                        <button class="loginBtn loginBtn--google ">
                                            Se connecter avec Google
                                        </button>
                                    </a>
                                </div>

                                <div class="col-md-12 row-block hidden">
                                    <a href="{{ url('auth/facebook') }}" class="btn btn-lg btn-primary btn-block">
                                        <strong>Login With Facebook</strong>
                                        </a>     
                                    </div>
                                
                            </div>
                        
                        <div id='social2' class="col-12  form-group hidden">

                                <div id='social_facebook' style="text-align: center;" class="col-md-12 hidden">
                                    <a href="{{ url('login/facebook') }}">
                                        <button class="loginBtn loginBtn--facebook ">
                                            Se connecter avec Facebook
                                        </button>
                                    </a>
                                </div>

                                <div id='social_google' style="text-align: center;" class="col-md-12 hidden">
                                    <a href="{{ url('login/google') }}">
                                        <button class="loginBtn loginBtn--google ">
                                            Se connecter avec Google
                                        </button>
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
@include('portail.js.login')
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