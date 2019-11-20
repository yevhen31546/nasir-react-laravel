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
                    <div class="card-header"><b>REINITIALISER  VOTRE MOT DE PASSE</b></div>
                    <div class="card-body">
                        <div class="card-body">
                        <div id="" class="style-msg successmsg hidden">
                            <div id="msg_success" class="sb-msg">Un e-mail a été envoyé à votre adresse e-mail.</div>
                        </div>
                        <div id="" class="style-msg errormsg hidden">
                            <div id="" class="sb-msg">Un e-mail n'a été envoyé à cause d'une erreur.</div>
                        </div>
                        <div id="social_account" class="style-msg errormsg hidden">
                            <div id="social_account_msg" class="sb-msg">Un e-mail n'a été envoyé à cause d'une erreur.</div>
                        </div>
                        <div id="msg_txt" class="col-12 form-group">
                            <div id="" class="">Pour réinitialiser votre mot de passe, merci de renter votre adresse e-mail.</div>
                        </div>
                        </div>
                        <form class="row" id="event-login" enctype="multipart/form-data" novalidate="novalidate">
                            <div class="form-process"></div>
                            <div class="col-12 form-group">
                                <label>E-mail*</label>
                                <input type="text" id="email" name="email"  class="form-control" value="" placeholder="">
                            </div>
                            
                            <div class="col-12">
                                <button class="button button-3d button-rounded btn-block nomargin" style="">Envoyer un e-mail</button>
                            </div>
                           

                        </form>
                        
                    </div>
                </div>
            </div>
            </div>
        </div>

    </div>
</div>
@include('portail.js.resetpassword')
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