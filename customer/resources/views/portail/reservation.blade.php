@extends('portail.layout.menu',  ['utilisateur' => "Ismail"])
@section('content')




<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<style>
    label.error { display: none !important; }
    /* optional */




.shell {
  position: relative;
  line-height: 1; }
  .shell span {
    position: absolute;
    left: 3px;
    top: 1px;
    color: #ccc;
    pointer-events: none;
    z-index: -1; }
    .shell span i {
      font-style: normal;
      /* any of these 3 will work */
      color: transparent;
      opacity: 0;
      visibility: hidden; }

input.masked,
.shell span {
  font-size: 16px;
  font-family: monospace;
  padding-right: 10px;
  background-color: transparent;
  text-transform: uppercase; }

/*# sourceMappingURL=masking-input.css.map */
/* additional styles */
  label {display: inline-block; width: 200px;}
</style>
<section  class="slider-element full-screen clearfix" style="background: url({{asset('assets-front/media/rides/images/hero/2.jpg')}}) top right no-repeat; background-size: cover;" data-height-md="500">
    <div class="form-widget">

        <div class="form-result"></div>
        <div class="full-screen">
            <div class="real-estate-tabs-slider">
                <div class="container clearfix">
                    <div class="tabs advanced-real-estate-tabs nomargin clearfix" style="top: 20px;">


                        <div class="tab-container">
                            <div class="row bottommargin-sm">
                                <div class="col-lg-4 topmargin-sm bottommargin-sm">
                                    <div class="card">
                                        <div class="card-header"> <b>INFORMATIONS DE COURSES</b> </div>
                                        <div class="card-body">
                                            <div class="clearfix">

						<div class="pricing-desc">
							<div class="pricing-features">
								<ul class="clearfix">
									<li><i class="icon-map-marker-alt"></i>@if(Session::has('lieu_depart')) {{Session::get('lieu_depart')}} @endif</li>
									<li><i class="icon-map-marker"></i>@if(Session::has('lieu_arrive')) {{Session::get('lieu_arrive')}} @endif</li>
									<li><i class="icon-calendar3"></i> @if(Session::has('depart_date')) {{Session::get('depart_date')}} @endif</li>
									<li><i class="icon-time"></i>@if(Session::has('depart_time')) {{Session::get('depart_time')}} @endif</li>
									
								</ul>
							</div>
						</div>

						<div class="pricing-action-area">
							
							<div class="pricing-price">
								<span class="price-unit">€</span>@if(Session::has('prix_ride')) {{Session::get('prix_ride')}} @endif
							</div>
						</div>

					</div>
                              
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 topmargin-sm bottommargin-sm">
                                    <div class="form-widget">

                                        <div class="form-result"></div>
                                        <div class="card">

                                            <div class="card-header">Paiement</div>
                                            <div class="card-body">
                                                <div id="error_div" class="style-msg errormsg hidden">
                                                    <div id="error_msg" class="sb-msg"><i class="icon-remove"></i>Merci de remplir les champs obligatoires</div>
                                                </div>
                                                <form class="row" id="event-order" method="POST">
                                                    <div class="form-process"></div>
                                                    <div class="col-12 form-group">
                                                        <label>Nom du titulaire de la carte*</label>
                                                        <input type="text"  id="titulaire" class="form-control required" value="" placeholder="">
                                                    </div>
                                                    <div class="col-12 form-group">
                                                        <label>Numéro de la carte*</label>
                                                        <input type="text"  id="number" class="form-control required valid masked" placeholder="XXXX XXXX XXXX XXXX" pattern="\d{4} \d{4} \d{4} \d{4}">
                                                    </div>
                                                    
                                                    <div class="col-6 form-group">
                                                        <label>Date d'expiration*</label>
                                                        <div class="input-group">
                                                            <select class="custom-select required required" id="exp_month"  style="max-width: 40%;" aria-invalid="false">
                                                                <option value="01">01</option>
                                                                <option value="02">02</option>
                                                                <option value="03">03</option>
                                                                <option value="04">04</option>
                                                                <option value="05">05</option>
                                                                <option value="06">06</option>
                                                                <option value="07">07</option>
                                                                <option value="08">08</option>
                                                                <option value="09">09</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                
                                                            </select>
                                                            <select class="custom-select required required" id="exp_year"  style="max-width: 60%;" aria-invalid="false">
                                                                <option value="19">2019</option>
                                                                <option value="20">2020</option>
                                                                <option value="21">2021</option>
                                                                <option value="22">2022</option>
                                                                <option value="23">2023</option>
                                                                <option value="24">2024</option>
                                                                <option value="25">2025</option>
                                                                <option value="26">2026</option>
                                                                <option value="27">2027</option>
                                                                <option value="28">2028</option>
                                                                <option value="29">2029</option>
                                                                <option value="30">2030</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 form-group">
                                                        <label>Cryptograme visuel*</label>
                                                        <input type="text" name="cvc" class="form-control required" value="" placeholder="">
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <button type="submit" class="button button-3d button-rounded btn-block nomargin" style="">Valider</button>
                                                    </div>

                                                    <input type="hidden" name="prefix" value="event-registration-">
                                                    <input type="hidden" name="distance" value="@if(Session::has('distance')) {{Session::get('distance')}} @endif">
                                                    <input type="hidden" name="lieu_arrive" value="@if(Session::has('lieu_arrive')) {{Session::get('lieu_arrive')}} @endif">
                                                    <input type="hidden" name="lieu_arrive_lat" value="@if(Session::has('lieu_arrive_lat')) {{Session::get('lieu_arrive_lat')}} @endif">
                                                    <input type="hidden" name="lieu_arrive_let" value="@if(Session::has('lieu_arrive_let')) {{Session::get('lieu_arrive_let')}} @endif">
                                                    <input type="hidden" name="lieu_depart" value="@if(Session::has('lieu_depart')) {{Session::get('lieu_depart')}} @endif">
                                                    <input type="hidden" name="lieu_depart_lat" value="@if(Session::has('lieu_depart_lat')) {{Session::get('lieu_depart_lat')}} @endif">
                                                    <input type="hidden" name="lieu_depart_let" value="@if(Session::has('lieu_depart_let')) {{Session::get('lieu_depart_let')}} @endif">
                                                    <input type="hidden" name="reservation" value="@if(Session::has('reservation')) {{Session::get('reservation')}} @endif">
                                                    <input type="hidden" name="distance" value="@if(Session::has('distance')) {{Session::get('distance')}} @endif">
                                                    <input type="hidden" name="timing" value="@if(Session::has('timing')) {{Session::get('timing')}} @endif">
                                                    <input type="hidden" name="statut_course" value="@if(Session::has('statut_course')) {{Session::get('statut_course')}} @endif">                                                    
                                                    <input type="hidden" name="depart_date" value="@if(Session::has('depart_date')) {{Session::get('depart_date')}} @endif">                                                    
                                                    <input type="hidden" name="depart_time" value="@if(Session::has('depart_time')) {{Session::get('depart_time')}} @endif">                                                    
                                                    <input type="hidden" name="distance_value" value="@if(Session::has('distance_value')) {{Session::get('distance_value')}} @endif">                                                    
                                                    <input type="hidden" name="timing_value" value="@if(Session::has('timing_value')) {{Session::get('timing_value')}} @endif">                                                    
                                                    <input type="hidden" id= "prix" name="prix" value="@if(Session::has('prix_ride')) {{Session::get('prix_ride')}} @endif">                                                    
                                                    <input type="hidden" name="type" value="@if(Session::has('type')) {{Session::get('type')}} @endif">                                                    
                                                </form>
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
    </div>

</section><!-- #slider end -->

@include('portail.js.reservation')
@endsection
<style>.process-steps li { pointer-events: none; }</style>

