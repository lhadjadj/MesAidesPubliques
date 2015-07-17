<?php
session_start();
require_once(dirname(dirname(__DIR__))."/lib/Traitement_donnees.class.php");
require_once (dirname(dirname(__DIR__))."/conf/parametres.php");
if (isset($_SESSION['numsiret']))
   {$Minimis = SimulerMinimis($_SESSION['numsiret']);}
   setlocale(LC_MONETARY, 'fr_FR.utf8');
?>

<h2>Montant des Aides d'Etat</h2>
<?php
if(!empty($Minimis)) 
 { ?>
 <ul id="listProjet" class="accordion" data-accordion>
 <?php
  $tempo=-1;
  foreach($Minimis['RqTotalAidesEtat']['result'] as $AidesEtat):?>
    <li class="accordion-navigation">
    <a href="<?php echo $url_canonical;?>#AidesEtat-<?php echo $AidesEtat['_id']; ?>" aria-expanded="false">
        <label for="left-label" class="left">
              <img style="width:5%;" src="/img/Icone/more_005577.png" alt="Details" title="Pour en savoir un peu plus."/>
        </label>
        <h4><?php echo $AidesEtat['_id'] . " - " . money_format('%.2n', $AidesEtat['MontantAidesEtat']); ?></h4>
    </a>
       <div class="content" id="AidesEtat-<?php echo $AidesEtat['_id']; ?>">
        <?php $tempo=++$tempo;?>
        <div class="row">
          <div class="row">
            <div class="small-12 columns">
             <div class="row">
                <div class="small-3 columns"><label for="left-label" class="left">Aides d'Etat </label></div>
                <div class="small-2 columns"><label for="right-label" class="right"><?php echo money_format('%.2n', $Minimis['RqTotalAidesEtatEtat']['result'][$tempo]['MontantAidesEtat']); ?></label></div>
                <div class="small-7 columns"></div>
             </div>
             <div class="row">
                <div class="small-3 columns"><label for="left-label" class="left">Aides Régionales </label></div>
                <div class="small-2 columns"><label for="right-label" class="right"><?php echo money_format('%.2n', $Minimis['RqTotalAidesEtatRegion']['result'][$tempo]['MontantAidesEtat']); ?></label></div>
                <div class="small-7 columns"></div>
             </div>
             <div class="row">
                <div class="small-3 columns"><label for="left-label" class="left">Aides Départementales </label></div>
                <div class="small-2 columns"><label for="right-label" class="right"><?php echo money_format('%.2n', $Minimis['RqTotalAidesEtatDepartement']['result'][$tempo]['MontantAidesEtat']); ?></label></div>
                <div class="small-7 columns"></div>
             </div>
             <div class="row">
                <div class="small-3 columns"><label for="left-label" class="left">Aides Autres Publiques </label></div>
                <div class="small-2 columns"><label for="right-label" class="right"><?php echo money_format('%.2n', $Minimis['RqTotalAidesEtatAutrePublic']['result'][$tempo]['MontantAidesEtat']); ?></label></div>
                <div class="small-7 columns"></div>
             </div>
            </div>
          </div>
        </div>
       </div>
    </li>
 <?php endforeach;?>
 <li class="accordion-navigation">
    <a href="<?php echo $url_canonical;?>#AidesEtat-SyntheseBNF" aria-expanded="false">
     <label for="left-label" class="left">
        <img style="width:5%;" src="/img/Icone/more_005577.png" alt="Details" title="Pour en savoir un peu plus."/>
     </label>
     <h4>Synthèse financière</h4>
    </a>
   <div class="content" id="AidesEtat-SyntheseBNF"><?php include_once(dirname(__DIR__).'/block/simuler-synthese-financiere.php');?></div>
   </li>
 </ul>
<?php
$CumulMinimis=$Minimis['RqTotalAidesEtat']['result']['0']['MontantAidesEtat'] + $Minimis['RqTotalAidesEtat']['result']['1']['MontantAidesEtat'] + $Minimis['RqTotalAidesEtat']['result']['2']['MontantAidesEtat'];
if (is_null($CumulMinimis)){$CumulMinimis===0;}
if ($CumulMinimis > 200000) 
    {
    $Ecart=$CumulMinimis-200000;
    echo '<div id="mainAlert" data-alert class="alert-box alert" tabindex="0" aria-live="assertive" role="dialogalert">
          <p id="message" style="font-size:1.6em;">Votre montant d\'Aides d\'Etat s\'éleve à ' . money_format('%.2n',$CumulMinimis) . 
           ', soit une dépassemnet de ' . money_format('%.2n',$Ecart). '</p>
          <button href="#" tabindex="0" class="close" aria-label="Close Alert">&times;</button>
          </div>';    
    }
    else
    {
    $Cagnotte=200000-$CumulMinimis;
    echo '<div id="mainAlert" data-alert class="alert-box success" tabindex="0" aria-live="assertive" role="dialogalert">
          <p style="font-size:1.6em;">Votre montant d\'Aides d\'Etat s\'éleve à ' . money_format('%.2n',$CumulMinimis) . 
           ', vous êtes éligible au régime d\'aides du minimis a hauteur de ' . money_format('%.2n',$Cagnotte). '</p>
          <button href="#" tabindex="0" class="close" aria-label="Close Alert">&times;</button>
          </div>';    
   } 
 }
 else 
    { echo "<h4>Aucun résultat</h4>";}
?>
