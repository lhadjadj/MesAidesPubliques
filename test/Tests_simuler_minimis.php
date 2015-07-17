<?php
require_once(dirname(dirname(__DIR__))."/MesAidesPubliques/lib/Traitement_donnees.class.php");
$Minimis = SimulerMinimis("18290013400012");
setlocale(LC_MONETARY, 'fr_FR.utf8');
?>

<!DOCTYPE html>
<!--
Laurent Hadjadj - ASP - Hackathon du 18/19 juin 2015
-->
<html>
    <head>
        <title>Page de tests de la page Simuler les Minimis</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- ////////////// Chargement des CSS  ////////////////////////////// -->
        <link href="/css/foundation/normalize.css" type="text/css" media="screen, projection" rel="stylesheet"/>
        <link href="/css/foundation/foundation.css" type="text/css" media="screen, projection" rel="stylesheet"/>
        <link href="/css/police.css" type="text/css" media="screen, projection" rel="stylesheet"/>
    </head>
    <body>
    <h2>Remonte le tableau de la somme des Aides d'Etat par Année</h2>
    <?php print_r($Minimis); ?>
    <br/>
    <br/>
    <?php $tempo=$Minimis[RqTotalAidesEtat]['result']; 
          echo "Montant d'aides publiques pour : <b>" . $tempo['0']['_id'] . "</b> = <b>" .$tempo['0']['MontantAidesEtat'] . "</b>";
    ?>
    
   </body>
</html>
