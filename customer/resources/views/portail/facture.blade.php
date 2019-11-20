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
                        <div class="card-header"><b>FACTURE</b></div>
                        <div class="card-body">
                            <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                                <div class="kt-portlet">
                                    <div class="kt-portlet__body kt-portlet__body--fit">
                                        <div class="kt-invoice-1">
                                            <div class="kt-invoice__wrapper">
                                                <div class="kt-invoice__head" style="">
                                                    <div class="kt-invoice__container kt-invoice__container--centered">
                                                        <div class="logo-container">
                                                            <a href="#">
                                                                <h1>Facture</h1>
                                                            </a>
                                                            <a href="#">
                                                                <img src="./assets/media/company-logos/logo_client_white.png">
                                                            </a>
                                                        </div>
                                                        <span class="kt-invoice__desc">
                                                            <span>Cecilia Chapman, 711-2880 Nulla St, Mankato</span>
                                                            <span>Mississippi 96522</span>
                                                        </span>
                                                        <div class="kt-invoice__items">
                                                            <div class="kt-invoice__item">
                                                                <span class="kt-invoice__subtitle">DATA</span>
                                                                <span class="kt-invoice__text">Dec 12, 2017</span>
                                                            </div>
                                                            <div class="kt-invoice__item">
                                                                <span class="kt-invoice__subtitle">INVOICE NO.</span>
                                                                <span class="kt-invoice__text">GS 000014</span>
                                                            </div>
                                                            <div class="kt-invoice__item">
                                                                <span class="kt-invoice__subtitle">INVOICE TO.</span>
                                                                <span class="kt-invoice__text">Iris Watson, P.O. Box 283 8562 Fusce RD.<br>Fredrick Nebraska 20620</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="kt-invoice__body kt-invoice__body--centered">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>DESCRIPTION</th>
                                                                    <th>HOURS</th>
                                                                    <th>RATE</th>
                                                                    <th>AMOUNT</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Creative Design</td>
                                                                    <td>80</td>
                                                                    <td>$40.00</td>
                                                                    <td>$3200.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Front-End Development</td>
                                                                    <td>120</td>
                                                                    <td>$40.00</td>
                                                                    <td>$4800.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Back-End Development</td>
                                                                    <td>210</td>
                                                                    <td>$60.00</td>
                                                                    <td>$12600.00</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="kt-invoice__footer">
                                                    <div class="kt-invoice__container kt-invoice__container--centered">
                                                        <div class="kt-invoice__content">
                                                            <span>BANK TRANSFER</span>
                                                            <span><span>Account Name:</span><span>Barclays UK</span></span>
                                                            <span><span>Account Number:</span><span>1234567890934</span></span>
                                                            <span><span>Code:</span><span>BARC0032UK</span></span>
                                                        </div>
                                                        <div class="kt-invoice__content">
                                                            <span>TOTAL AMOUNT</span>
                                                            <span class="kt-invoice__price">$20.600.00</span>
                                                            <span>Taxes Included</span>
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
            </div>
        </div>

    </div>
</div>
@endsection
