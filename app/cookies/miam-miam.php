<?php
require_once(dirname(dirname(__DIR__))."/conf/parametres.php");
$titre_page = "Mes Aides publiques - A propos des cookies";
$url_canonical = "/app/cookies/miam-miam.php";
$description="A propos des cookies utilisés par Mes Aides Publiques";
$twitter_domain="En savoir plus sur les cookies utilisées sur Mes Aides Publiques";
$twitter_description="Mes Aides Publiques est un télé-service de simplication administrative";
$aides="Cookies";
?>

<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="fr" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="fr" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr" prefix="og: http://ogp.me/ns#"> <!--<![endif]-->

<head>
    <?php include_once(dirname(__DIR__).'/block/head.php');?>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">Vous utilisez un navigateur <strong>dépassé</strong>. Merci de <a
    href="http://browsehappy.com/"> mettre à jour./a> pour améliorer votre navigation.</p>
<![endif]-->
<?php include_once(dirname(__DIR__).'/block/navbar-light.php');?>

<article class="row">
  <div class="DensiaSans small-12 large-12 columns">
    <h1><strong>A propos des Cookies</strong></h1>
    <h4>Qu'est-ce qu'un cookie ?</h4>
    <p class="text">
        Un cookie est une information déposée sur votre disque dur par le serveur du site que vous visitez.
    </p>
    <p class="text">Il contient plusieurs données :</p>
        <ul class="text">
         <li>le nom du serveur qui l'a déposée ; </li>
         <li>un identifiant sous forme de numéro unique ;</li>
         <li>éventuellement une date d'expiration…</li>
        </ul>
    <p class="text">
        Ces informations sont parfois stockées sur votre ordinateur dans un simple fichier 
        texte auquel un serveur accède pour lire et enregistrer des informations.
    </p>
    <h4>A quoi servent les cookies ?</h4>
    <p class="text">
        Les cookies ont différentes fonctions. Ils peuvent permettre à celui qui l'a déposé de reconnaître un internaute, 
        d'une visite à une autre, grâce à un identifiant unique.
        Certains cookies peuvent aussi être utilisés pour stocker le contenu d'un panier d'achat, 
        d'autres pour enregistrer les paramètres de langue d'un site, d'autres encore pour faire de la publicité ciblée.
    </p>
    <h4>Qui peut déposer des cookies et y accéder ?</h4>
    <p class="text">
        Un site internet peut uniquement relire et écrire les cookies qui lui appartiennent.
        Mais, il faut être conscient qu'une page sur internet contient souvent des informations issues de différents sites, 
        notamment via les bandeaux publicitaires.
        De ce fait des cookies peuvent être déposés et relus par des sites autres que celui auquel vous accédez directement...
        Par exemple, si vous naviguez sur un site d'information, il est possible que d'autres sites comme par exemple 
        des régies publicitaires récupèrent des informations sur votre navigation. 
        Pour cela, il suffit que la régie publicitaire dépose un cookie sur le site d'information que vous consultez.
    </p>
    <h4>Que dit la loi par rapport aux cookies ?</h4>
    <p class="text">
        La réglementation prévoit que <strong>les sites internet doivent recueillir votre consentement avant le dépôt de ces cookies</strong>, 
        vous indiquer à quoi ils servent et comment vous pouvez vous y opposer. 
        En pratique, un message doit apparaître quand vous vous connectez au site pour la première fois pour vous indiquer comment accepter 
        ou au contraire refuser les cookies.
    </p>
  <hr />
  <h2>Pour Allez un peu plus loin</h2>
  <h4><span>Directive 2002/58 sur la vie privée</span></h4>
    <p class="text">
        La directive vie privée et communications électroniques, contient des règles sur l'utilisation des cookies. 
        En particulier, l'article 5, Paragraphe 3 de cette directive exige que le stockage des données (comme les cookies) 
        dans l'ordinateur de l'utilisateur puisse seulement être fait si&#160;:
    </p>
    <ol class="text">
        <li>l'utilisateur est informé de la façon dont les données sont utilisées&#160;;</li>
        <li>
            il est donné à l'utilisateur la possibilité de refuser cette opération de stockage. 
            Cependant, cet article statue aussi que le stockage de données pour raisons techniques est exempté de cette loi.
        </li>
    </ol>

    <p class="text">
        Devant être mise en application à partir d'octobre 2003, la directive n'a cependant été 
        que très imparfaitement mise en pratique selon un rapport de décembre 2004, qui signalait en outre que certains États-membres 
        (Slovaquie, Lettonie, Grèce, Belgique, Luxembourg) n'avaient pas encore transposé la directive en droit interne.
    </p>

    <p class="text">Selon l'avis du G29 de 2010, cette directive, qui conditionne notamment l'usage des cookies à des fins de publicité comportementale, 
        au consentement explicite de l'internaute, demeure très mal appliquée.
    </p>

    <h4> <span>Directive 2009/136/CE</span></h4>
    <p class="text">
        Cette matière a été actualisée par la Directive 2009/136/CE datée du 25 novembre 2009 qui indique que le "stockage d’informations, 
        ou l’obtention de l’accès à des informations déjà stockées, dans l’équipement terminal d’un abonné 
        ou d’un utilisateur n’est permis qu’à condition que l’abonné ou l’utilisateur ait donné son accord, 
        après avoir reçu, dans le respect de la directive 95/46/CE, une information claire et complète, 
        entre autres sur les finalités du traitement". 
        <strong>La nouvelle directive renforce donc les obligations préalables au placement de cookies sur l'ordinateur de l'internaute.</strong>
    </p>
    <p class="text">
        Dans les considérations préalables de la directive le législateur européen précise toutefois&#160;: 
        "Lorsque cela est techniquement possible et effectif, conformément aux dispositions pertinentes de la directive 95/46/CE, 
        l’accord de l’utilisateur en ce qui concerne le traitement peut être exprimé par l’utilisation des paramètres appropriés 
        d’un navigateur ou d’une autre application".
    </p>
  </div>
 </article>

<!-- Chargement du footer de bas de page -->
<?php include_once(dirname(__DIR__).'/block/footer.php');?>

<!-- Chargement de l'aide en ligne -->
<?php include_once(dirname(__DIR__).'/block/aides-miam-miam.php');?>

<script src="/js/vendor/jquery.js?ver=2.1.4"></script>
<script src="/js/foundation/foundation.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.joyride.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.topbar.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.reveal.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.tooltip.js?ver=5.5.2"></script>
<script src="/js/vendor/toucheffects.js"></script>

<script type="text/javascript">
    //Initialisation de foudation
    $(document).foundation(); 
    
    //Fonction qui permet de lancer le guide sur le bouton Aidez-moi
    $("#aidezmoi").click(function() {$(document).foundation('joyride', 'start');});
    
    //Fonction qui permet de diminuer ou d'augmenter la taille de la police de caractère
    $(document).ready(function () {
        var taille = 1.4;
        var augmentation = 0.1;
        var tailleMax = 2.5;
        var tailleMin = 1.2;
        $('#Agrandir').click(function () {
            taille += 0.1;
            if (taille >= tailleMax) {
                taille = tailleMax;
            }
            $('.text').stop().animate({fontSize: taille + "em"}, 300);
        });
        $('#Reduire').click(function () {
            taille -= 0.1;
            if (taille <= tailleMin) {
                taille = tailleMin;
            }
            $('.text').stop().animate({fontSize: taille + "em"}, 300);
        });
    });
</script>

 </body>
</html>