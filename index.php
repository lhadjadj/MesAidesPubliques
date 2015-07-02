<?php
session_start(); 
$titre_page = "Mes Aides publiques - Portail d'accès";
$url_canonical = "/";
$description="Mes Aides Publiques, une procédure de simplification des demandes d'aides publiques.";
$twitter_domain="En savoir plus sur mes aides";
$twitter_description="Mes Aides Publiques est un télé-service de simplication administrative.";
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="fr" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="fr" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="fr" prefix="og: http://ogp.me/ns#"> <!--<![endif]-->

<head>
    <?php include_once(dirname(__DIR__).'/MesAidesPubliques/app/block/head.php');?>
    <link href="/css/slick/slick.css" type="text/css" media="screen, projection" rel="stylesheet"/>
    <link href="/css/slick/slick-theme.css" type="text/css" rel="stylesheet" media="screen, projection"/>
    <link href="/css/banner.css" type="text/css" media="screen, projection" rel="stylesheet"/>

</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">Vous utilisez un navigateur <strong>dépassé</strong>. Merci de <a
    href="http://browsehappy.com/"> mettre à jour./a> pour améliorer votre navigation.</p>
<![endif]-->

<!-- //////////////////////////////  Début de la page ////////////////////// -->
<!-- //////////////////// Ajout du banner de pub /////////////////////////// -->
<section class="top-banner banner-hidden">
    <div class="banner">
        <a href="http://www.asp-public.fr/">
            <div class="container"><span></span></div>
        </a>
    <span class="close-icon">
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" enable-background="new 0 0 40 40">
         <line x1="15" y1="15" x2="25" y2="25" stroke="#084977" stroke-width="2.5" stroke-linecap="round"
               stroke-miterlimit="10"/>
         <line x1="25" y1="15" x2="15" y2="25" stroke="#084977" stroke-width="2.5" stroke-linecap="round"
               stroke-miterlimit="10"/>
         <circle class="circle" cx="20" cy="20" r="19" opacity="0" stroke="#000" stroke-width="2.5"
                 stroke-linecap="round" stroke-miterlimit="10" fill="none"/>
         <path d="M20 1c10.45 0 19 8.55 19 19s-8.55 19-19 19-19-8.55-19-19 8.55-19 19-19z" class="progress"
               stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-miterlimit="10" fill="none"/>
     </svg>
    </span>
    </div>
</section>

<!-- //////////////// Header de la page ////////////////////////////////// -->
<!-- <div id="container-hearder" class="row DensiaSans"> -->
<header id="menu-container" class="row medium-uncollapse large-collapse DensiaSans" role="banner">
    <div class="small-12 medium-4 large-6 columns">
        <h1 class="Aaargh"><b>Mes Aides Publiques</b></h1>
    </div>
    <div class="small-4 medium-2 large-1 columns">
        <div id="Agrandir" class="Aaarg"><b>+a</b></div>
        <div id="Reduire" class="Aaarg">-a</div>
    </div>
    <div class="small-12 medium-3 large-2 columns">
        <figure class="pub_responsive"><img src="/img/Logo/responsive.png" alt="je suis responsive" /></figure>
        <figure class="pub_rgaa"><img src="/img/Logo/logo_e_accessible.jpg" alt="je suis rgaa" /></figure>
    
    </div>
    <div class="small-12 medium-3 large-3 columns">

        <div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true"
             role="dialog">

            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
        </div>
        <figure class="boutonFC">
            <a data-tooltip aria-haspopup="true" 
               class="has-tip tip-right radius" 
               data-options="show_on:large; hover_delay: 50;" 
               title="Cliquez ici pour vous authentifier avec FranceConnect" 
               data-reveal-id="FranceConnect" 
               rel="group" href="#">
               <img src="/img/Logo/FranceConnect.jpg"
               alt="Identification France-Connect"/>
            </a>

            <div id="FranceConnect" class="reveal-modal" data-reveal aria-labelledby="FranceConnectTitle"
                 aria-hidden="true" role="dialog">
                <h2 id="FranceConnectTitle">Saisie des informations d'identification</h2>

                <form Method="POST" action="/app/consulter/consulter.php">
                    <fieldset>
                        <legend>identification de l'entreprise</legend>
                        <label for="siret">Votre N° de Siret
                            <input type="text" name="siret" id="siret" placeholder="0123456789012345"
                                   maxlength="15 required focus"/>
                        </label>
                        <label for="adresse mél">Votre adresse mél
                            <input type="email" name="email" id="email" placeholder="laurent.hadjadj@asp-public.fr"
                                   required/>
                        </label>
                        <label for="date de naissance">Votre date de naissance
                            <input type="date" name="date de naissance" id="date de naissance" placeholder="07/04/1971"
                                   maxlength="10" required/>
                        </label>
                    </fieldset>
                    <p><em>En validant ce formulaire, vous <b>autorisez Mes Aides Publiques</b> à ré-utiliser vos données déjà déclarées.</em></p>
                    <br />
                    <br />
                    <input type="submit" value="Valider" class="button">
                </form>
                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>
        </figure>

    </div>
</header>
<!-- Chargement du bloc Hackathon -->
<?php include_once(dirname(__DIR__).'/MesAidesPubliques/app/block/hackathon.php');?>

<section>
    <article class="row about">
        <div class="small-9 medium-8 large-9 columns">
            <h3>A propos</h3>

            <p class="text">
                <em><b>Mes Aides Publiques</b>, un Télé-service simple et efficace, au service des entreprises.</em>
            </p>

            <p class=text">
                Vérifiez votre éligibilité à la règle des minimis.
                Plus besoin de déclarer le détail de vos subventions à l’administration : visualisez la synthèse de vos
                aides sur les trois dernières années
                et déterminez votre plafond de minimis.
            </p>

        </div>
        <div class="small-3 medium-4 large-3 columns">
            <img src="/img/Logo/simplifier_pour_les_entreprises.png">
        </div>
    </article>
</section>

<!-- Chargement du bloc Partenaires -->
<?php include_once(dirname(__DIR__).'/MesAidesPubliques/app/block/partenaires.php');?>

<section>
    <div class="row contact">
        <hr>
        <div class="large-12 columns">
            <h4>Contactez-nous</h4>

            <div class="contact large-4 columns">
                <strong>Mél</strong>: <br/>
                <a href="#">
        <span>
         <script type="text/javascript">
            //<!-- 
             var fijnmhl = ['m', 'u', 'a', '"', '.', ' ', 'e', '>', 'o', '@', 's', 's', 'l', '"', 'd', 'b', 't', 'e', 'i', ':', 'e', 'p', 'f', 's', 'o', 'e', 's', '"', 'l', 'c', '=', 'i', 'q', '"', '<', 'h', 's', 'l', 'e', '/', 'r', 'r', 'r', 'u', 's', 'i', 'r', '<', 'i', 'm', 't', 'a', 'i', 'i', 'd', 's', 'n', 'a', 'i', 'u', 'f', '@', 'a', 'p', 'f', 'n', 'n', 'm', 'n', 'm', 'e', 'u', ' ', 'e', 'r', '=', 'q', '>', 'b', 'a', 'a', 't', 'o', 'o', 'i', 'f', 'f', 'a', 'i', 'l', 'a', 'e', 'm', 's', 'a', 'l', 'm', 'o', 'i', '.'];
             var jbmtkrp = [21, 42, 79, 8, 45, 49, 5, 99, 67, 75, 54, 53, 12, 56, 81, 38, 13, 43, 80, 15, 82, 84, 46, 30, 73, 91, 35, 48, 51, 50, 55, 11, 89, 62, 0, 3, 78, 39, 77, 97, 47, 20, 4, 37, 44, 64, 68, 96, 16, 76, 71, 22, 60, 32, 33, 92, 17, 59, 88, 90, 6, 27, 52, 36, 66, 26, 74, 28, 65, 9, 34, 85, 2, 29, 95, 7, 41, 63, 86, 10, 1, 23, 14, 25, 24, 18, 94, 31, 72, 61, 70, 57, 69, 83, 98, 87, 58, 19, 40, 93];
             var tuyolfh = new Array();
             for (var i = 0; i < jbmtkrp.length; i++) {
                 tuyolfh[jbmtkrp[i]] = fijnmhl[i];
             }
             for (var i = 0; i < tuyolfh.length; i++) {
                 document.write(tuyolfh[i]);
             } //-->
         </script>
        <noscript>[Mél protégé] Merci d'activer Javascript</noscript>
        </span>
                </a>
            </div>

            <div class="contact large-2 columns">
                <strong>Twitter</strong>: <br/>@MesAidesPub
            </div>
            <div class="contact large-3 columns">
                <strong>Téléphone</strong>: <br/>(+33) 1 733 018 76
            </div>
            <div class="contact large-3 columns">
                <strong>Se tenir informer</strong>: <br/><a href="/feed/flux.xml">Fil RSS</a>
            </div>
        </div>
    </div>
</section>

<!--<section>-->
    <?php include_once(dirname(__DIR__).'/MesAidesPubliques/app/block/footer.php');?>
<!--</section>-->

<script src="/js/vendor/jquery.js?ver=2.1.4"></script>
<script src="/js/vendor/jquery.placeholder.js?ver=2.1.0"></script>
<script src="/js/vendor/jquery.cookie.js?ver=1.4.1"></script>
<script src="/js/slick/slick.js?ver=1.5.0"></script>
<script src='/js/vendor/banner.js?ver=1.1'></script>
<script src="/js/foundation/foundation.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.reveal.js"></script>
<script src="/js/foundation/foundation.tooltip.js?ver=5.5.2"></script>
<script src="/js/vendor/toucheffects.js"></script>


<script type="text/javascript">
    $(document).foundation();
    $(document).ready(function () {
        $('.fade').slick({});
    });
    $(document).ready(function () {
        $('.sponsors').slick({});
    });
    $('.fade').slick({
        accessibility: true,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 2000,
        pauseOnHover: true,
        mobileFirst: true,
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        slidesToScroll: 1
    });

    $('.sponsors').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        autoplay: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });


    $(document).ready(function () {
        var taille = 1.2;
        var augmentation = 0.1;
        var tailleMax = 2.5;
        var tailleMin = 1.2;
        $('#Agrandir').click(function () {
            taille += 0.1;
            if (taille >= tailleMax) {
                taille = tailleMax;
            }
            $('.text').stop().animate({fontSize: taille + "em"}, 300);
        });
        $('#Reduire').click(function () {
            taille -= 0.1;
            if (taille <= tailleMin) {
                taille = tailleMin;
            }
            $('.text').stop().animate({fontSize: taille + "em"}, 300);
        });
    });
</script>
</body>
</html>

    