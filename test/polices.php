<!DOCTYPE html>
<!--
Laurent Hadjadj - ASP - Hackathon du 18/19 juin 2015
-->
<html>
    <head>
        <title>Page de tests des polices de caractères</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- ////////////// Chargement des CSS  ////////////////////////////// -->
        <link href="/css/foundation/normalize.css" type="text/css" media="screen, projection" rel="stylesheet"/>
        <link href="/css/foundation/foundation.css" type="text/css" media="screen, projection" rel="stylesheet"/>
        <link href="/css/police.css" type="text/css" media="screen, projection" rel="stylesheet"/>
    </head>
    <body>
    <?php $texte="  Il y avait en Westphalie, dans le château de M. le baron de Thunder-ten-tronckh, 
                un jeune garçon à qui la nature avait donné les moeurs les plus douces. 
                Sa physionomie annonçait son âme. Il avait le jugement assez droit, 
                avec l'esprit le plus simple ; c'est, je crois, pour cette raison 
                qu'on le nommait Candide. Les anciens domestiques de la maison soupçonnaient 
                qu'il était fils de la soeur de monsieur le baron et d'un bon et 
                honnête gentilhomme du voisinage, que cette demoiselle ne voulut 
                jamais épouser parce qu'il n'avait pu prouver que soixante et onze quartiers, 
                et que le reste de son arbre généalogique avait été perdu par l'injure du temps."; ?>
    <div class="Comic" style="font-size:2em;">Comic</div>
    <div class="Comic"><p style="font-size:1em;"><?php echo $texte; ?></p></div>
    <div class="Comic"><p style="font-size:1.4em;"><?php echo $texte; ?></p></div>
    <div class="Comic"><p style="font-size:2em;"><?php echo $texte; ?></p></div>
    
    <div class="Aaargh" style="font-size:2em;">Aaargh</div>
    <div class="Aaargh"><p style="font-size:1em;"><?php echo $texte; ?></p></div>
    <div class="Aaargh"><p style="font-size:1.4em;"><?php echo $texte; ?></p></div>
    <div class="Aaargh"><p style="font-size:2em;"><?php echo $texte; ?></p></div>

    <div class="DensiaSans" style="font-size:2em;">DensiaSans</div>
    <div class="DensiaSans" style="font-size:1em;"><p  style="font-size:1em;"><?php echo $texte; ?></p></div>
    <div class="DensiaSans"><p style="font-size:1.4em;"><?php echo $texte; ?></p></div>
    <div class="DensiaSans"><p style="font-size:2em;"><?php echo $texte; ?></p></div>

    <div class="Andika" style="font-size:2em;">Andika</div>
    <div class="Andika"><p style="font-size:1em;"><?php echo $texte; ?></p></div>
    <div class="Andika"><p style="font-size:1.4em;"><?php echo $texte; ?></p></div>
    <div class="Andika"><p style="font-size:2em;"><?php echo $texte; ?></p></div>
   </body>
</html>
