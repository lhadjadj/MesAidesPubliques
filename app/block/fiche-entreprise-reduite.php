<?php
require_once(dirname(dirname(__DIR__))."/lib/Traitement_donnees.class.php");
if (isset($_POST['siret']) && isset($_POST['email']))
   {$identiteEntreprise = EntrepriseIdentite($_POST['siret']);}
?>
<h2 id="Etape-01"><?php echo $identiteEntreprise['RaisonSocial']; ?></h2>
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-3 columns">
                <label for="right-label" class="right">Siret</label>
            </div>
            <div class="small-9 columns">
                <?php echo $identiteEntreprise['NumeroSiret']; ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-3 columns">
                <label for="right-label" class="right">Activité</label>
            </div>
            <div class="small-9 columns">
                <?php echo $identiteEntreprise['CodeActivité']; ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-3 columns">
                <label for="right-label" class="right">Adresse</label>
            </div>
            <div class="small-9 columns">
                <?php echo $identiteEntreprise['AdresseRue']; ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-3 columns">
                <label for="right-label" class="right"></label>
            </div>
            <div class="small-9 columns inline">
                <?php echo $identiteEntreprise['AdresseCodePostale']; ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-3 columns">
                <label for="right-label" class="right"></label>
            </div>
            <div class="small-9 columns">
                <?php echo $identiteEntreprise['AdresseVille']; ?>
            </div>
        </div>
    </div>
</div>
<br />
<div class="row">
    <div class="small-12 medium-12 large-12 columns">
        <div class="row small-collapse medium-collapse large-collapse">
            <div class="small-5 medium-5 large-5 columns">
                <figure class="aps"><img src="/img/Logo/logo_aps2.png" alt="je suis aps" /></figure>
            </div>
            <div class="small-7 medium-7 large-7 columns">
            <p class="text">
                Dans le cadre du projet "Dites-le nous une seule fois", Mes Aides Publiques utilise les services de l'Etat 
                pour connaître les informations relative à votre entreprise entreprise.
                Le dispositif APS - Entreprise (données Insee) et l'Api-Carto (géocodage) sont utilisés.
            </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-12 medium-12 large-12 columns">
        <div class="row small-collapse medium-collapse large-collapse">
            <div class="small-5 medium-5 large-5 columns">
                <figure class="aps"><img src="/img/Icone/check.png" alt="Pour allez plus loin" /></figure>
            </div>
            <div class="small-7 medium-7 large-7 columns">
            <p class="text">
                L’article 107 du Traité sur le Fonctionnement de l’Union Européenne (TFUE) interdit en principe les aides octroyées 
                par les personnes publiques aux entreprises. 
                Ainsi, l’alinéa 1 énonce que « sauf dérogations prévues par les traités, sont incompatibles avec le marché intérieur, 
                dans la mesure où elles affectent les échanges entre États membres, les aides accordées par les États ou au moyen 
                de ressources d'État sous quelque forme que ce soit qui faussent ou qui menacent de fausser la concurrence en favorisant 
                certaines entreprises ou certaines productions ».
            </p>
            <p>On peut, en conséquence, qualifier une aide d’aide d’Etat lorsque les 4 critères suivants sont remplis : </p>
            <ul>
                <li>une aide accordée à une <strong>entreprise</strong>,</li>
                <li>par <strong>l’Etat</strong> au moyen de <strong>ressources publiques</strong>,</li>
                <li>procurant un <strong>avantage sélectif</strong>, et</li>
                <li><strong>affectant les échanges entre Etats membres et la concurrence.</strong></li>
            </ul>
            </div>
        </div>
    </div>
</div>

