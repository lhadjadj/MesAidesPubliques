<?php
//session_start();
require_once(dirname(dirname(__DIR__))."/lib/Traitement_donnees.class.php");
require_once (dirname(dirname(__DIR__))."/conf/parametres.php");

$titre_page = "Mes Aides publiques - Effectuer une recherche sur mes dossiers";
$url_canonical = "/app/rechercher/rechercher.php";
$description="Effectuer une recherche sur mes dossiers";
$twitter_domain="Effectuer une recherche sur mes dossiers";
$twitter_description="Mes Aides Publiques est un télé-service de simplication administrative";
$aides="Rechercher";
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

<section class="row">
    <h1>Rechercher des informations sur mes dossiers</h1>
    <section>
    <?php if (isset($_SESSION['numsiret']))
    {
        if (strlen($_POST['recherche'])=='0')
            {
                echo '<div id="mainAlert" data-alert class="alert-box warning" tabindex="0" aria-live="assertive" role="dialogalert">
                        <p id="message" style="font-size:1.6em;">Je n\'ai rien trouvé</p>
                        <button href="#" tabindex="0" class="close" aria-label="Close Alert">&times;</button>
                     </div>';
            }
            else
            {
                $Resultat=Rechercher($_SESSION['numsiret'],$_POST['recherche']);
                $NombreDonnees=(count($Resultat)-2)/59;
                echo '<div id="mainAlert" data-alert class="alert-box" tabindex="0" aria-live="assertive" role="dialogalert">
                        <p id="message" style="font-size:1.6em;">J\'ai trouvé ' . $NombreDonnees . ' dossiers pertinents.</p>
                        <button href="#" tabindex="0" class="close" aria-label="Close Alert">&times;</button>
                     </div>';
             ?>
        <br/>
                <ul id="listProjet" class="accordion" data-accordion>
                <?php
                  for ($i = 1; $i < $NombreDonnees+1; $i++) {
                   if ($i==1){$decalage=58;} else {$decalage=$i*58;}
                   ?>
                    <li class="accordion-navigation">
                     <a href="<?php echo $url_canonical;?>#Recherche-<?php echo $i; ?>" aria-expanded="false">
                        <label for="left-label" class="left Aaargh" style="margin-right:-570px; font-size:1.4em;">
                            <img style="width:5%;" src="/img/Icone/more_005577.png" alt="Details" title="Pour en savoir un peu plus."/>
                        </label>
                        <p><?php $score=$decalage+$i-1; 
                                  echo "(" . number_format($Resultat[$score]*100, 2, ',', '') . "%) "; 
                                  $dossier=$decalage-35+$i; 
                                  $projet=$decalage-33+$i;  
                                  echo "Dossier - " . $Resultat[$dossier] . ' Projet - ' . $Resultat[$projet]; 
                             ?>
                        </p>
                    </a>
                    <div class="content" id="Recherche-<?php echo $i; ?>">
                    <div class="row">
                        <div class="row">
                         <div class="small-12 columns">
                            <div class="row">
                                <div class="small-3 columns"><label for="left-label" class="left">Programme</label></div>
                                <div class="small-7 columns">
                                    <label for="right-label" class="right">
                                          <?php 
                                                $programme=$decalage-34+$i; 
                                                echo substr($Resultat[$programme],0,strlen($Resultat[$programme])-1); 
                                          ?>
                                    </label>
                                </div>
                                <div class="small-2 columns"></div>
                            </div>
                           <div class="row">
                             <div class="small-3 columns"><label for="left-label" class="left">Statut du dossier</label></div>
                            <div class="small-7 columns">
                                 <label for="right-label" class="right">
                                       <?php 
                                            $statut=$decalage-32+$i; 
                                            echo substr($Resultat[$statut],0,strlen($Resultat[$statut])-1); 
                                       ?>
                                 </label>
                            </div>
                            <div class="small-2 columns"></div>
                           </div>
                           <div class="row">
                             <div class="small-3 columns"><label for="left-label" class="left">Déposé le </label></div>
                             <div class="small-7 columns">
                                 <label for="right-label" class="right">
                                       <?php 
                                            $depot=$decalage-29+$i; 
                                            echo substr($Resultat[$depot],0,strlen($Resultat[$depot])-1); 
                                       ?>
                                 </label>
                            </div>
                            <div class="small-2 columns"></div>
                          </div>
                                                     <div class="row">
                             <div class="small-3 columns"><label for="left-label" class="left">Montant global du projet </label></div>
                             <div class="small-7 columns">
                                 <label for="right-label" class="right">
                                       <?php 
                                            $montantG=$decalage-19+$i; 
                                            echo substr($Resultat[$montantG],0,strlen($Resultat[$montantG])-1) . " €";
                                       ?>
                                 </label>
                            </div>
                            <div class="small-2 columns"></div>
                          </div>
                          </div>
                        </div>
                    </div>
                    </li>
         <?php };?>
    </ul>
            <?php }
    }
    else
    {
       echo '<div id="mainAlert" data-alert class="alert-box alert" tabindex="0" aria-live="assertive" role="dialogalert">
               <p id="message" style="font-size:1.6em;">Vous devez vous connecter à FranceConnect</p>
               <button href="#" tabindex="0" class="close" aria-label="Close Alert">&times;</button>
             </div>';
    }     
    
 ?>
    </section>        
</section>
<!-- Chargement du bloc Partenaires -->
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