<?php
require_once(dirname(dirname(__DIR__))."/lib/Traitement_donnees.class.php");
if (isset($_POST['siret']) && isset($_POST['email']))
    {$projetsEntreprise = EntrepriseProjet($_POST['siret']);}
?>

<h2>Demande en cours - <strong><?php echo $projetsEntreprise->count();?></strong> dossiers</h2>
<?php
if(!empty($projetsEntreprise)) {

    ?>
    <ul id="listProjet" class="accordion"  data-accordion>
        <?php
        foreach($projetsEntreprise as $numProjet => $projet):global $projet;?>
            <li class="accordion-navigation">
                <a href="<?php echo $url_canonical;?>#projet-<?php echo $numProjet?>" aria-expanded="false"><?php  echo $projet['Projet']?> (<strong><?php echo $projet['MontantGlobal']; ?> &euro;</strong>) </a>
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
