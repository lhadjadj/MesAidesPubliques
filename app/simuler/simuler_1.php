<?php
//session_start();
//require_once(dirname(dirname(__DIR__))."/lib/Traitement_donnees.class.php");
require_once (dirname(dirname(__DIR__))."/conf/parametres.php");

if (isset($_SESSION['numsiret']))
   {
    //$identiteEntreprise = EntrepriseIdentite($_SESSION['numsiret']);
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
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="fr" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="fr" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr" prefix="og: http://ogp.me/ns#"> <!--<![endif]-->

<head>
    <?php include_once(dirname(__DIR__).'/block/head.php');?>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">Vous utilisez un navigateur <strong>dépassé</strong>. Merci de <a
    href="http://browsehappy.com/"> mettre à jour./a> pour améliorer votre navigation.</p>
<![endif]-->
<?php include_once(dirname(__DIR__).'/block/navbar-light.php');?>

<div id="mainAlert" data-alert class="alert-box warning" tabindex="0" aria-live="assertive" role="dialogalert">
                <p id="message" style="font-size:1.6em;">Le hackathon, c\'est fini. On utilise la base de tests locale - :) - avec ' . $traitement['NbDossier'] . ' dossiers</p>
                <button href="#" tabindex="0" class="close" aria-label="Close Alert">&times;</button>
</div>
<!--<section class="row">
  <div class="small-12 medium 12 large-12 columns">
   <table class="tableizer-table">
    <caption><h2 class="DensiaSans"><b>Informations financières - Banque de France</b></h2></caption>
    <tr class="tableizer-firstrow"><th></th><th>&nbsp;</th><th>SIREN</th><th><php echo $_POST['siret'] ?> </th><th>&nbsp;</th></tr>
    <tr><td colspan="2"  style="text-align:center"><img src="/img/Logo/logo_banque_france-200x133.jpg" alt="Banque de France"/></td><td><b>Nom de l'entreprise</b></td><td colspan="2">Les pécheurs de Bretagne</td></tr>
    <tr><td colspan="2">&nbsp;</td><td><b>Date de clôture des derniers états financiers</b></td><td colspan="2">31/12/21014</td></tr>
    <tr><td colspan="5">&nbsp;</td></tr>
    <tr><td>&nbsp;</td><td colspan="4"><em>Chiffres en K€</em></tr>
    <tr><td colspan="5"><h3 class="DensiaSans">Indicateurs de performance</h3></td></tr>
    <tr><td colspan="2">&nbsp;</td><td style="text-align:center"><b>N</b></td><td style="text-align:center"><b>N-1</b></td><td style="text-align:center"><b>Evolution N/ N-1</b></td></tr>
    <tr><td colspan="2">Chiffre d'affaires HT</td><td style="text-align:right">1 000</td><td style="text-align:right">900</td><td style="text-align:center">11%</td></tr>
    <tr><td colspan="2">Valeur ajoutée </td><td style="text-align:right">500</td><td style="text-align:right">480</td><td style="text-align:center">4%</td></tr>
    <tr><td colspan="2">EBE</td><td style="text-align:right">350</td><td style="text-align:right">340</td><td style="text-align:center">3%</td></tr>
    <tr><td colspan="2">CAF</td><td style="text-align:right">400</td><td style="text-align:right">380</td><td style="text-align:center">5%</td></tr>
    <tr><td colspan="2">Résultat net</td><td style="text-align:right">50</td><td style="text-align:right">45</td><td style="text-align:center">11%</td></tr>
    <tr><td colspan="5">&nbsp;</td></tr>
    <tr><td colspan="5"><h3 class="DensiaSans">Indicateurs de structure financière</h3></tr>
    <tr><td colspan="5">&nbsp;</td></tr>
    <tr><td colspan="2">Capital social de l'entreprise</td><td style="text-align:right">100</td><td style="text-align:right">100</td><td style="text-align:center">0%</td></tr>
    <tr><td colspan="2">Capitaux propres & autres fonds propres</td><td style="text-align:right">1 500</td><td style="text-align:right">1 450</td><td style="text-align:center">3%</td></tr>
    <tr><td colspan="2">Ratio Capital social  / capitaux propres et autres fonds propres</td><td style="text-align:right">0.07</td><td style="text-align:right">0.07</td><td style="text-align:center">-3%</td></tr>
    <tr><td colspan="2">Fonds de roulement</td><td style="text-align:right">400</td><td style="text-align:right">388</td><td style="text-align:center">3%</td></tr>
    <tr><td colspan="2">Besoins en fonds de roulement</td><td>280</td><td style="text-align:right">290</td><td style="text-align:center">-3%</td></tr>
    <tr><td colspan="2">Fonds de roulement  / besoins en fonds de roulement</td><td style="text-align:right">1.4</td><td style="text-align:right">1.3</td><td style="text-align:center">7%</td></tr>
    <tr><td colspan="2">Disponibilités et valeurs mobilières de placement</td><td style="text-align:right">220</td><td style="text-align:right">210</td><td style="text-align:center">5%</td></tr>
    <tr><td colspan="2">Dettes financières</td><td style="text-align:right">300</td><td style="text-align:right">330</td><td style="text-align:center">-9%</td></tr>
    <tr><td colspan="5">&nbsp;</td></tr>
    <tr><td colspan="2"><h4 class="DensiaSans">Total du bilan</h4></td><td style="text-align:right">2 500</td><td  style="text-align:right">2 400</td><td  style="text-align:center">4%</td></tr>
   </table>
  </div>
</section>-->
<!-- Chargement du bloc Partenaires -->
<?php include_once(dirname(__DIR__).'/block/footer.php');?>

  <script src="/js/vendor/jquery.js?ver=2.1.4"></script>
  <script src="/js/vendor/jquery.cookie.js?ver=1.4.1"></script>
  <script src="/js/foundation/foundation.js?ver=5.5.2"></script>
  <script src="/js/foundation/foundation.topbar.js"></script>
  <script src="/js/foundation/foundation.reveal.js"></script>
  <script src="/js/foundation/foundation.tooltip.js?ver=5.5.2"></script>
  <script src="/js/foundation/foundation.joyride.js?ver=5.5.2"></script>
  <script src="/js/vendor/toucheffects.js"></script>
  
  <script type="text/javascript">
    //Initialisation de foudation
    $(document).foundation(); 
    
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