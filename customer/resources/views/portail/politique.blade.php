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
                        <div class="card-header">conditions générales de vente</div>
                        <div class="card-body">
                            <div class="content">
                                <div class="inline">
                                    <div class="btn_print">
                                        <a href="#" class="print" title="Imprimer" onclick="window.print();"></a>
                                        <a class="html" href="questionnaire.php?action=exportHtml" title="Sauvegarder en HTML" onclick=""></a>
                                        <a class="xml" href="export.php?action=exportXml" title="Sauvegarder en XML" onclick=""></a>
                                        <a class="mail" href="#" title="Envoyer par courriel" onclick="afficherEnvoieEmail();"></a>
                                    </div>

                                    <div class="form">
                                        <form action="questionnaire.php" method="post" id="etape4PolitiqueProtection" name="etape4PolitiqueProtection">
                                            <input type="hidden" name="action" id="action" value="">

                                            <h1><span></span></h1>

                                            <div class="text question">


                                            </div>
                                            <div class="subtext question">
                                                Le <i>Générateur de politique de confidentialité</i> est un questionnaire. La politique qui vous est présentée ici tient compte des réponses que vous avez fournies. <u>Cette politique n'est qu'un modèle</u>. En effet, le <i>Générateur de politique de confidentialité</i> <u>n'a pas pour fonction de certifier</u> vos engagements en matière de protection des renseignements personnels. <br>
                                                Par conséquent, ni le recours au <i>Générateur de politique de confidentialité</i>, ni la politique qui est ici présentée <u>ne constituent un avis juridique</u>. En aucun cas, ces outils ne sauraient remplacer une expertise spécifique dans des cas particuliers. Les personnes qui sont confrontées avec un problème spécifique d'application de la loi sont invitées à consulter un avocat ou un notaire.
                                                <hr>

                                                <h1>Politique modèle de confidentialité.</h1>
                                                <p>
                                                    Nous nous engageons à ne collecter aucun renseignement personnel, d'aucune sorte que ce soit.
                                                </p>

                                            </div>



                                            <div class="info">
                                                <div class="bouton">



                                                    <a href="questionnaire.php?action=doRecommencer" class="btn_recommencer" onclick=""></a>
                                                </div>
                                            </div>
                                            <br clear="all">
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