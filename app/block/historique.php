<?php
require_once(dirname(dirname(__DIR__))."/lib/Traitement_donnees.class.php");
$historiqueEntreprise = EntrepriseHistorique("23350001600040");
?>
<h2>Historique</h2>
<?php
if(!empty($historiqueEntreprise)) {
?>
    <ul id="listProjet" class="accordion"  data-accordion>
        <?php
        foreach($historiqueEntreprise as $numProjet => $projet):?>
            <li class="accordion-navigation">
                <a href="<?php echo $url_canonical;?>#historique-projet-<?php echo $numProjet?>" aria-expanded="false"><?php  echo $projet['Projet']?> </a>
                <div class="content" id="historique-projet-<?php echo $numProjet?>">
                    <div class="row">
                        <div class="row">
                            <div class="small-12 columns">
                                <div class="row">
                                    <div class="small-3 columns">
                                        <label for="right-label" class="right">Type</label>
                                    </div>
                                    <div class="small-9 columns">
                                        <?php echo $projet['PO']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="small-12 columns">
                                <div class="row">
                                    <div class="small-3 columns">
                                        <label for="right-label" class="right">Dossier - Projet</label>
                                    </div>
                                    <div class="small-9 columns">
                                        <?php echo  '<strong>'.$projet['Dossier'] . '</strong> - ' . $projet['Projet']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach;?>
    </ul>
<?php
} else {
    ?>
    Aucun historique de disponible
    <?php
}
?>
