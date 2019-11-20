@extends('portail.layout.menu',  ['utilisateur' => "Ismail"])
@section('content')




<script>
    
</script>
<style>

</style>
<section  class="slider-element full-screen clearfix" style="background: url({{asset('assets-front/media/rides/images/hero/2.jpg')}}) top right no-repeat; background-size: cover;" data-height-md="500">
    <div class="form-widget">

        <div class="form-result"></div>
        <div class="full-screen">
            <div class="real-estate-tabs-slider">
                <div class="container clearfix">
                    <div class="tabs advanced-real-estate-tabs nomargin clearfix" style="top: 20px;">


                        <div class="tab-container">
                            <div class="tab-content clearfix" id="tab-buy">
                                <div class="pricing-box pricing-extended clearfix">

						<div class="pricing-desc">
							<div class="pricing-title">
								<h3>ADJAS vous propose une course :</h3>
							</div>
							<div class="pricing-features">
								<ul class="clearfix">
									<li><i class="icon-map-marker-alt"></i>@if(Session::has('lieu_depart')) {{Session::get('lieu_depart')}} @endif</li>
									<li><i class="icon-map-marker"></i>@if(Session::has('lieu_arrive')) {{Session::get('lieu_arrive')}} @endif</li>
									@if(Session::has('depart_date'))<li><i class="icon-calendar3"></i>  {{Session::get('depart_date')}} </li>@endif
									@if(Session::has('depart_time'))<li><i class="icon-time"></i> {{Session::get('depart_time')}} </li>@endif
									<li><i class="icon-sort"></i> @if(Session::has('distance')) {{Session::get('distance')}} @endif</li>
									<li><i class="icon-stopwatch1"></i> @if(Session::has('timing')) {{Session::get('timing')}} @endif</li>
									<li><i class="icon-tag"></i> @if(Session::has('reservation') && Session::get('reservation') == '0') Maintenant @else A l'avance @endif</li>
									<li><i class="icon-info-sign"></i>Autres informations</li>
								</ul>
							</div>
						</div>

						<div class="pricing-action-area">
							
							<div class="pricing-price">
								<span class="price-unit">€</span>@if(Session::has('prix_ride')) {{Session::get('prix_ride')}} @endif
							</div>
							<div class="pricing-action">
								<a href="{{url('/reservation')}}" class="button button-3d button-xlarge btn-block nomargin">Réserver</a>
							</div>
						</div>

					</div>
                               <div class="pricing-box pricing-extended hidden">

						<div class="pricing-desc">
							<div class="pricing-title">
								<h3>How many Themes can you Download today?</h3>
							</div>
							<div class="pricing-features">
								<ul class="clearfix">
									<li><i class="icon-map-marker-alt"></i>@if(Session::has('lieu_depart')) {{Session::get('lieu_depart')}} @endif</li>
									<li><i class="icon-map-marker"></i>@if(Session::has('lieu_arrive')) {{Session::get('lieu_arrive')}} @endif</li>
									<li><i class="icon-calendar3"></i> @if(Session::has('depart_date')) {{Session::get('depart_date')}} @endif</li>
									<li><i class="icon-time"></i>@if(Session::has('depart_time')) {{Session::get('depart_time')}} @endif</li>
									<li><i class="icon-sort"></i> @if(Session::has('distance')) {{Session::get('distance')}} @endif</li>
									<li><i class="icon-stopwatch1"></i> @if(Session::has('timing')) {{Session::get('timing')}} @endif</li>
									<li><i class="icon-tag"></i> @if(Session::has('reservation')) {{Session::get('reservation')}} @endif</li>
									<li><i class="icon-info-sign"></i>Autres informations</li>
								</ul>
							</div>
						</div>

						<div class="pricing-action-area">
							<div class="pricing-price">
								<span class="price-unit">€</span>@if(Session::has('prix_ride')) {{Session::get('prix_ride')}} @endif
							</div>
							<div class="pricing-action">
								<a href="#" class="button button-3d button-xlarge btn-block nomargin">Réserver</a>
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

<div class="content-wrap hidden">

    <div class="container clearfix">

        <div id="processTabs">
            <ul class="process-steps bottommargin clearfix">
                <li>
                    <a href="#ptab1" class="i-circled i-bordered i-alt divcenter">1</a>
                    <h5>Indiquez votre itinéraire</h5>
                </li>
                <li>
                    <a href="#ptab2" class="i-circled i-bordered i-alt divcenter">2</a>
                    <h5>Consultez le prix</h5>
                </li>
                <li>
                    <a href="#ptab3" class="i-circled i-bordered i-alt divcenter">3</a>
                    <h5>Confirmez votre règlement</h5>
                </li>
                <li>
                    <a href="#ptab4" class="i-circled i-bordered i-alt divcenter">4</a>
                    <h5>Commande terminée</h5>
                </li>
            </ul>
            <div>
                <div id="ptab1">

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, ipsa, fuga, modi, corporis maiores illum fugit ratione cumque dolores sint obcaecati quod temporibus. Expedita, sapiente, veritatis, impedit iusto labore sed itaque sunt fugiat non quis nihil hic quos necessitatibus officiis mollitia nesciunt neque! Minus, mollitia at iusto unde voluptate repudiandae.</p>


                    <a href="#" class="button button-3d nomargin fright tab-linker" rel="2">Checkout &rArr;</a>

                </div>
                <div id="ptab2">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, deleniti, atque soluta ratione blanditiis maxime at architecto laudantium eius eaque distinctio dolorem voluptatem nam ab molestias velit nemo. Illo, hic.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, modi, odit, aspernatur veritatis ipsum molestiae impedit iusto blanditiis voluptatem ab voluptas ullam expedita repellendus porro assumenda non deserunt repellat eius rem dolorem corporis temporibus voluptatibus ut! Quod, corporis, tempora, dolore, sint earum minus deserunt eveniet natus error magnam aliquam nemo.</p>
                    <div class="line"></div>
                    <a href="#" class="button button-3d nomargin tab-linker" rel="1">Previous</a>
                    <a href="#" class="button button-3d nomargin fright tab-linker" rel="3">Pay Now</a>
                </div>
                <div id="ptab3">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, sit, culpa, placeat, tempora quibusdam molestiae cupiditate atque tempore nemo tenetur facere voluptates autem aliquid provident distinctio beatae odio maxime pariatur eos ratione quae itaque quod. Distinctio, temporibus, cupiditate, eaque vero illo molestiae vel doloremque dolorum repellat ullam possimus modi dicta eum debitis ratione est in sunt et corrupti adipisci quibusdam praesentium optio laborum tempora ipsam aut cum consectetur veritatis dolorem.</p>
                    <div class="line"></div>
                    <a href="#" class="button button-3d nomargin tab-linker" rel="2">Previous</a>
                    <a href="#" class="button button-3d nomargin fright tab-linker" rel="4">Complete Order</a>
                </div>
                <div id="ptab4">
                    <div class="alert alert-success">
                        <strong>Thank You.</strong> Your order will be processed once we verify the Payment.
                    </div>
                </div>
            </div>
        </div>

        <div class="clear"></div>

        <div class="divider divider-center"><i class="icon-circle"></i></div>
    </div>

</div>

<div class="section nobg notopmargin nopadding footer-stick hidden">
    <ul class="process-steps process-3 bottommargin clearfix">
        <li class="active">
            <a href="#" class="i-bordered i-rounded divcenter">1</a>
            <h5>Indiquez votre itinéraire</h5>
        </li>
        <li>
            <a href="#" class="i-bordered i-rounded divcenter">2</a>
            <h5>Consultez le prix</h5>
        </li>
        <li>
            <a href="#" class="i-bordered i-rounded divcenter">3</a>
            <h5>Confirmez votre règlement</h5>
        </li>
    </ul>
</div>

@endsection
<style>.process-steps li { pointer-events: none; }</style>

