<!DOCTYPE html>
<html dir="ltr" lang="en-US">
    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="SemiColonWeb" />
        @include('portail.layout.css')
        @include('portail.layout.js')

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Adjas</title>

    </head>

    <body class="stretched">

        <!-- Document Wrapper
        ============================================= -->
        <div id="wrapper_" class="clearfix">

            <!-- Top Bar
            ============================================= -->
            <div id="top-bar">

                <div class="container clearfix">

                    <div class="col_half nobottommargin clearfix">

                        <!-- Top Social
                        ============================================= -->
                        <div id="top-social">
                            <ul>
                                <li><a href="#" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
                                <li><a href="#" class="si-twitter"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
                                <li><a href="#" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
                            </ul>
                        </div><!-- #top-social end -->

                    </div>

                    <div class="col_half fright col_last clearfix nobottommargin">

                        <!-- Top Links
                    ============================================= -->
                        @if(Session::has('role_user') and Session::get('role_user')=='user')
                        <div class="top-links">
                            <ul>
                                <div class="btn-group">
                                    <button type="button" class="button button-3d button-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{Str::ucfirst(Session::get('nom_user'))}} {{Str::ucfirst(Session::get('prenom_user'))}}
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{url('/reservations')}}">Mes Réservations </a>
                                        <a class="dropdown-item" href="{{url('/adresses')}}">Mes Adresses </a>
                                        <a class="dropdown-item" href="{{url('/profile')}}">Mon Compte</a>
                                        <a class="dropdown-item" href="{{url('/signout')}}">Déconnecter</a>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        @else 


                        <div class="top-links">
                            <ul>

                                <li><a class="button button-3d button-rounded" href="{{ url('/login') }}">Se connecter</a></li>
                                <li><a class="button button-3d button-rounded" href="{{ url('/inscription') }}">S'inscrire</a></li>
                            </ul>
                        </div><!-- .top-links end -->
                        @endif
                    </div>

                </div>

            </div><!-- #top-bar end -->

            <!-- Header
            ============================================= -->
            <header id="header" class="sticky-style-2">

                <div class="container clearfix">

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="index.html" class="standard-logo"><img src="assets-front/media/ride/images/logo.png" alt="Canvas Logo"></a>
                        <a href="index.html" class="retina-logo"><img src="assets-front/media/ride/images/logo@2x.png" alt="Canvas Logo"></a>
                    </div><!-- #logo end -->

                    <ul class="header-extras">
                        <li>
                            <i class="i-plain icon-call nomargin"></i>
                            <div class="he-text">
                                APPELEZ-NOUS
                                <span>(33) 22 54215821</span>
                            </div>
                        </li>
                        <li>
                            <i class="i-plain icon-line2-envelope nomargin"></i>
                            <div class="he-text">
                                EMAIL NOUS
                                <span>info@adjas.com</span>
                            </div>
                        </li>

                    </ul>

                </div>

                <div id="header-wrap">

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu" class="with-arrows style-2 center">

                        <div class="container clearfix">

                            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                            <ul>
                                <li><a href="{{ url('/') }}"><div>Accueil</div></a></li>
                                <li><a href="{{ url('/course') }}"><div>Course simple</div></a></li>
                                @if(Session::has('role_user') and Session::get('role_user')=='user')
                                <li><a href="{{url('/reservations')}}"><div>Mes courses</div></a></li>
                                <li><a href="{{url('/adresses')}}"><div>Mes adresses</div></a></li>
                                @endif
                            </ul>



                        </div>

                    </nav><!-- #primary-menu end -->

                </div>

            </header><!-- #header end -->



            <!-- Content
            ============================================= -->

            <section id="content">
                @yield('content')
            </section><!-- #content end -->

            <!-- Footer
            ============================================= -->
            <footer id="footer" class="dark">

                <div class="container">

                    <!-- Footer Widgets
                    ============================================= -->
                    <div class="footer-widgets-wrap clearfix">

                        <div class="col_two_third">

                            <div class="widget clearfix">

                                <img src="assets-front/images/footer-widget-logo.png" alt="" class="alignleft" style="margin-top: 8px; padding-right: 18px; border-right: 1px solid #4A4A4A;">

                                <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards with a Retina &amp; Responsive Approach. Browse the amazing Features this template offers.</p>

                                <div class="line" style="margin: 30px 0;"></div>

                                <div class="row">

                                    <div class="col-lg-3 col-6 bottommargin-sm widget_links">
                                        <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">About</a></li>
                                            <li><a href="#">FAQs</a></li>
                                            <li><a href="#">Support</a></li>
                                            <li><a href="#">Contact</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-3 col-6 bottommargin-sm widget_links">
                                        <ul>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Portfolio</a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Events</a></li>
                                            <li><a href="#">Forums</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-3 col-6 bottommargin-sm widget_links">
                                        <ul>
                                            <li><a href="#">Corporate</a></li>
                                            <li><a href="#">Agency</a></li>
                                            <li><a href="#">eCommerce</a></li>
                                            <li><a href="#">Personal</a></li>
                                            <li><a href="#">One Page</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-3 col-6 bottommargin-sm widget_links">
                                        <ul>
                                            <li><a href="#">Restaurant</a></li>
                                            <li><a href="#">Wedding</a></li>
                                            <li><a href="#">App Showcase</a></li>
                                            <li><a href="#">Magazine</a></li>
                                            <li><a href="#">Landing Page</a></li>
                                        </ul>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col_one_third col_last">

                            <div class="widget clear-bottommargin-sm clearfix">

                                <div class="row">

                                    <div class="col-lg-12 bottommargin-sm">
                                        <div class="footer-big-contacts">
                                            <span>Call Us:</span>
                                            (91) 22 55412474
                                        </div>
                                    </div>

                                    <div class="col-lg-12 bottommargin-sm">
                                        <div class="footer-big-contacts">
                                            <span>Send an Email:</span>
                                            info@canvas.com
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="widget subscribe-widget clearfix">
                                <div class="row">

                                    <div class="col-lg-6 clearfix bottommargin-sm">
                                        <a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                                            <i class="icon-facebook"></i>
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
                                    </div>
                                    <div class="col-lg-6 clearfix">
                                        <a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
                                            <i class="icon-rss"></i>
                                            <i class="icon-rss"></i>
                                        </a>
                                        <a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div><!-- .footer-widgets-wrap end -->

                </div>

                <!-- Copyrights
                ============================================= -->
                <div id="copyrights">

                    <div class="container clearfix">

                        <div class="col_half">
                            Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>
                            <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                        </div>

                        <div class="col_half col_last tright">
                            <div class="copyrights-menu copyright-links clearfix">
                                <a href="#">Home</a>/<a href="#">About Us</a>/<a href="#">Team</a>/<a href="#">Clients</a>/<a href="#">FAQs</a>/<a href="#">Contact</a>
                            </div>
                        </div>

                    </div>

                </div><!-- #copyrights end -->

            </footer><!-- #footer end -->

        </div><!-- #wrapper end -->

        <!-- Go To Top
        ============================================= -->
        <div id="gotoTop" class="icon-angle-up"></div>




    </body>
</html>