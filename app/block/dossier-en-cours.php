<?php
require_once(dirname(dirname(__DIR__))."/lib/Traitement_donnees.class.php");
if (isset($_POST['siret']) && isset($_POST['email']))
    {$projetsEntreprise = EntrepriseProjet($_POST['siret']);}
    setlocale(LC_MONETARY, 'fr_FR.utf8');
?>

<h2>Demande en cours  <strong><?php echo $projetsEntreprise->count();?></strong> dossier(s)</h2>
<?php
if(!empty($projetsEntreprise)) {

    ?>
    <ul id="listProjet" class="accordion"  data-accordion>
        <?php
        foreach($projetsEntreprise as $numProjet => $projet):global $projet;?>
            <li class="accordion-navigation">
            <a href="<?php echo $url_canonical;?>#projet-<?php echo $numProjet?>" aria-expanded="false">
           <?php 
            switch ($projet['EtatStatus']) {
              case "Déposé" :
                    echo '<span class="label round success">DP</span>' . ' - ' . '(<strong>' . money_format('%.2n', $projet['MontantGlobal']) . '</strong>)' . ' - ' . $projet['Projet']; 
                                                break;
              case "Proposé comité" :
                    echo '<span class="label round warning">PC</span>' . ' - ' . '(<strong>' . money_format('%.2n', $projet['MontantGlobal']) . '</strong>)' . ' - ' . $projet['Projet']; 
                                                break;
              case "Refusé en comité" :
                    echo '<span class="label round alert">RC</span>' . ' - ' . '(<strong>' . money_format('%.2n', $projet['MontantGlobal']) . '</strong>)' . ' - ' . $projet['Projet'];  
                                                break;
              case "Programmé" : 
                    echo '<span class="label round success">PG</span>' . ' - ' . '(<strong>' . money_format('%.2n', $projet['MontantGlobal']) . '</strong>)' . ' - ' . $projet['Projet']; 
                                                break;
              case "Abandonné / Déprogrammé" :
                    echo '<span class="label round alert">AD</span>' . ' - ' . '(<strong>' . money_format('%.2n', $projet['MontantGlobal']) . '</strong>)' . ' - ' . $projet['Projet'];  
                                                break;
                }
            ?>
           </a>
                
                
                <div class="content" id="projet-<?php echo $numProjet?>">
                    <?php include(dirname(__DIR__).'/block/dossier.php');?>
                </div>
            </li>
        <?php endforeach;?>
    </ul>
    <?php
} else {
    ?>
    Aucun résultat
    <?php
}
?>
