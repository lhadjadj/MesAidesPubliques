<?php
session_start();
require_once(dirname(dirname(__DIR__))."/lib/Traitement_donnees.class.php");
require_once (dirname(dirname(__DIR__))."/conf/parametres.php");
if (isset($_SESSION['numsiret']))
   {
   $identiteEntreprise = EntrepriseIdentite($_SESSION['numsiret']);
   $message="Nous avons retrouvé vos coordonnées";
   $type_message="success";
   }
else 
   { 
   $message="Nous n'avons pas retrouvé vos coordonnées. Merci de vous reconnecter via FranceConnect.";
   $type_message="alert";
   }

$titre_page = "Mes Aides publiques - Simuler votre Eligibilité à la régle du Minimis";
$url_canonical = "/app/simuler/siimuler.php";
$description="Simuler votre Eligibilité à la régle du Minimis";
$twitter_domain="En savoir plus sur la régle des Minims";
$twitter_description="Mes Aides Publiques est un télé-service de simplication administrative";
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
    <?php include_once(dirname(__DIR__).'/block/head.php');?>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">Vous utilisez un navigateur <strong>dépassé</strong>. Merci de <a
    href="http://browsehappy.com/"> mettre à jour./a> pour améliorer votre navigation.</p>
<![endif]-->


<?php include_once(dirname(__DIR__).'/block/navbar.php');?>

<section>
<div id="mainAlert" data-alert class="alert-box <?php echo $type_message; ?>" tabindex="0" aria-live="assertive" role="dialogalert">
        <p id="message" style="font-size:1.6em;"><?php echo $message;?></p>
       <button href="#" tabindex="0" class="close" aria-label="Close Alert">&times;</button>
</div>
</section>
<br />
<section class="clearfix">
    <div class="large-6 columns" id="fiche-entreprise">
        <?php include_once(dirname(__DIR__).'/block/fiche-entreprise-reduite.php');?>
    </div>

    <div class="large-6 columns" id="simuler-minimis">
        <?php include_once(dirname(__DIR__).'/block/simuler-minimis.php');?>
    </div>
</section>

<!-- Chargement du bas de page -->
<?php include_once(dirname(__DIR__).'/block/footer.php');?>

<script src="/js/vendor/jquery.js?ver=2.1.4"></script>
<script src="/js/vendor/jquery.cookie.js?ver=1.4.1"></script>
<script src="/js/vendor/jquery.placeholder.js?ver=2.1.2"></script>
<script src="/js/foundation/foundation.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.topbar.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.alert.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.accordion.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.reveal.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.tooltip.js?ver=5.5.2"></script>
<script src="/js/vendor/toucheffects.js"></script>


<script type="text/javascript">
    //initialisation de Foundation avec option accordéon
    $(document).foundation({accordion: {callback : function (accordion) {console.log(accordion);}}});

    // Foundation gestion des evements de l'accordeon
    $('#listProjet').on('toggled', function (event, accordion) {console.log(accordion);});

    //Fonction qui permet de lancer le guide sur le bouton Aidez-moi
    $("#aidezmoi").click(function() {$(document).foundation('joyride', 'start');});

    //Fonction qui permet de diminuer ou d'augmenter la taille de la police de caractère   
    $(document).ready(function () {
        var taille = 1.4;
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