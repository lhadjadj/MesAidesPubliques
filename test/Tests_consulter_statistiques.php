<?php
require_once(dirname(dirname(__DIR__))."/MesAidesPubliques/lib/Traitement_donnees.class.php");
    
$statistiquesEntreprise = EntrepriseStatistique("18290013400012");
    setlocale(LC_MONETARY, 'fr_FR.utf8');
?>

<!DOCTYPE html>
<!--
Laurent Hadjadj - ASP - Hackathon du 18/19 juin 2015
-->
<html>
    <head>
        <title>Page des fonctions statistiques</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- ////////////// Chargement des CSS  ////////////////////////////// -->
        <link href="/css/foundation/normalize.css" type="text/css" media="screen, projection" rel="stylesheet"/>
        <link href="/css/foundation/foundation.css" type="text/css" media="screen, projection" rel="stylesheet"/>
        <link href="/css/police.css" type="text/css" media="screen, projection" rel="stylesheet"/>
    </head>
    <body>
    <h2>Remonte le tableau des statuts des dossiers présents pour un Siret</h2>
    <?php print_r($statistiquesEntreprise['RépartitionDossier']['result']); ?>
    <br />
    <?php $tempo=$statistiquesEntreprise['RépartitionDossier']['result']; 
          echo $tempo['1']['NBDossier'];
    ?>
    <h2>Remonte la somme des montants globaux</h2>
    <?php print_r($statistiquesEntreprise['RépartitionMontant']['result']); ?>
    <br />
    <?php $tempo=$statistiquesEntreprise['RépartitionMontant']['result']; 
          echo $tempo['0']['MoyenneMontant'];
    ?>
    <h2>Remonte la somme des montants Eligibles</h2>
    <?php print_r($statistiquesEntreprise['StatDepensesEligibles']['result']); ?>
    <br />
    <?php $tempo=$statistiquesEntreprise['StatDepensesEligibles']['result']; 
          echo $tempo['0']['DepensesEligibles'];
    ?>
   </body>
</html>
