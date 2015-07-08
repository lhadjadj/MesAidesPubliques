<?php
require_once(dirname(dirname(__DIR__))."/lib/Traitement_donnees.class.php");
if (isset($_POST['siret']) && isset($_POST['email']))
    {$historiqueEntreprise = EntrepriseHistorique($_POST['siret']);}
    setlocale(LC_MONETARY, 'fr_FR.utf8');
?>

<h2><b>Historique</b></h2>

<?php
if(!empty($historiqueEntreprise)) { ?>
<ul id="listProjet" class="accordion"  data-accordion>
 <?php
  foreach($historiqueEntreprise as $numProjet => $projet):?>
    <li class="accordion-navigation">
      <a href="<?php echo $url_canonical;?>#historique-projet-<?php echo $numProjet?>" aria-expanded="false">
          <?php  echo $projet['DateDepotDossier'] . " - " . $projet['Projet']?> 
      </a>
      <div class="content" id="historique-projet-<?php echo $numProjet?>">
        <div class="row">
          <div class="row">
            <div class="small-12 columns">
             <div class="row">
                <div class="small-3 columns"><label for="right-label" class="right">Type</label></div>
                <div class="small-9 columns"><?php echo $projet['PO']; ?></div>
             </div>
            </div>
          </div>
          <div class="row">
           <div class="small-12 columns">
             <div class="row">
                <div class="small-3 columns"><label for="right-label" class="right">Dossier - Montant Total - Engagé</label></div>
                <div class="small-9 columns"><?php echo  '<strong>'.$projet['Dossier'] . '</strong> - ' . money_format('%.2n', $projet['PaiementTotalValideAC']) . ' - ' . money_format('%.2n', $projet['PaiementTotal']); ?></div>
             </div>
           </div>
          </div>
        </div>
      </div>
    </li>
 <?php endforeach;?>
 </ul>
<?php } else { echo "Aucun historique disponible"; } ?>