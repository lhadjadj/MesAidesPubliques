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
    <h2>Tests du formulaire de recherche</h2>
    <br/>
    <form Method="POST" action="/app/rechercher/rechercher.php">
        <div class="large-6 columns">
        <div class="row collapse postfix-round">
            <div class="small-9 columns">
                <input type="text" placeholder="Dossier" name="recherche">
            </div>
            <div class="small-3 columns">
                <input type="submit" value="Rechercher" class="button postfix">
            </div>
      </div>
    </div>
    </form>
   </body>
</html>
