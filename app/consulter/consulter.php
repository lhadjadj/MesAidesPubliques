<?php
require_once(dirname(dirname(__DIR__))."/lib/Traitement_donnees.class.php");
require_once(dirname(dirname(__DIR__))."/conf/parametres.php");
$traitement = TraitementsDonneesPO();
$titre_page = "Mes Aides publiques - Consulter mes Aides Publiques";
$url_canonical = "/app/consulter/consulter.php";
$description = "Consulter mes Aides Publiques";
$twitter_domain = "En savoir plus sur mes aides";
$twitter_description = "Mes Aides Publiques est un télé-service de simplication administrative";
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
    <link href="/css/pizza/pizza.css" media="screen, projector, print" rel="stylesheet" type="text/css" />
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&language=fr&region=FR&key=<?php echo $googleAPI ?>"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">Vous utilisez un navigateur <strong>dépassé</strong>. Merci de <a
    href="http://browsehappy.com/"> mettre à jour./a> pour améliorer votre navigation.</p>
<![endif]-->

<?php //Si je n'ai pas de numero de siret alors je retourne sur le page d'accueil et je destroy le session
if (!$_POST['siret']) {
           session_destroy();
           echo '<SCRIPT LANGUAGE="JavaScript"> document.location.href="/index.php";</SCRIPT>';
           exit();
    }
?>

<?php include_once(dirname(__DIR__).'/block/navbar.php');?>

<section>
    <?php 
    // Si je ne suis plus au Hackathon alors j'affiche la banner ci-dessous 
    if ($_SESSION['hackathon'] == 1) {
         echo '<div id="mainAlert" data-alert class="alert-box warning" tabindex="0" aria-live="assertive" role="dialogalert">
                <p id="message" class=Comic">Le hackathon, c\'est fini. On utilise la base de tests locale - :) - avec ' . $traitement['NbDossier'] . ' dossiers</p>
                <button href="#" tabindex="0" class="close" aria-label="Close Alert">&times;</button>
              </div>';
       }

    ?>
    <div id="mainAlert" data-alert class="alert-box <?php echo $traitement['TypeAlerte']; ?>" tabindex="0" aria-live="assertive"
         role="dialogalert">
        <p id="message" class=Comic"><?php echo $traitement['Message']; ?></p>
        <button href="#" tabindex="0" class="close" aria-label="Close Alert">&times;</button>
    </div>
</section>

<section class="clearfix">
    <div class="large-6 columns" id="fiche-entreprise">
        <?php include_once(dirname(__DIR__).'/block/fiche-entreprise.php');?>
    </div>

    <div class="large-6 columns" id="demande-en-cours">
        <?php include_once(dirname(__DIR__).'/block/dossier-en-cours.php');?>
    </div>
</section>
<section class="clearfix">
    <div class="large-6 columns" id="statistiques">
        <?php include_once(dirname(__DIR__).'/block/statistiques.php');?>
    </div>
    <div class="large-6 columns" id="historique">
        <?php include_once(dirname(__DIR__).'/block/historique.php');?>
    </div>
</section>

<!-- Chargement du bas de page -->
<?php include_once(dirname(__DIR__).'/block/footer.php');?>

<!-- Chargement de l'aide en ligne -->
<?php include_once(dirname(__DIR__).'/block/aides-consulter.php');?>

<script src="/js/vendor/jquery.js?ver=2.1.4"></script>
<script src="/js/vendor/jquery.cookie.js?ver=1.4.1"></script>
<script src="/js/vendor/jquery.placeholder.js?ver=2.1.2"></script>
<script src="/js/foundation/foundation.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.topbar.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.alert.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.accordion.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.reveal.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.tooltip.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.joyride.js?ver=5.5.2"></script>
<script src="/js/vendor/toucheffects.js"></script>
<script src="/js/pizza/pizza.js?ver=0.2.1"></script>
<script src="/js/pizza/snapsvg.js?ver=0.1.1"></script>

<script type="text/javascript">
    //initialisation de Foundation avec option accordéon
    $(document).foundation({
        accordion: {
            callback : function (accordion) {
                console.log(accordion);
            }
        }
    });

    //Fonction qui permet de lancer le guide sur le bouton Aidez-moi
    $("#aidezmoi").click(function() {$(document).foundation('joyride', 'start');});

    // Foundation gestion des evements de l'accordeon
    $('#listProjet').on('toggled', function (event, accordion) {
        console.log(accordion);
    });

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
    
    //Initialisation de la Pizza :)
    Pizza.init(document.body, {percent_offset:20});

</script>
</body>
</html>