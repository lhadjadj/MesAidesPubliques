<?php
$titre_page = "Mes Aides publiques - Aidez-moi";
$url_canonical = "/app/aides/aidez-mmoi.php";
$description="Aidez-moi à utiliser Mes Aides Publiques";
$twitter_domain="En savoir plus sur Mes Aides Publiques";
$twitter_description="Mes Aides Publiques est un télé-service de simplication administrative.";
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
 
 </article>     
 
<!-- Chargement du bloc Partenaires -->
 <?php include_once(dirname(__DIR__).'/block/footer.php');?>


<script src="/js/vendor/jquery.js?ver=2.1.4"></script>
<script src="/js/foundation/foundation.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.topbar.js?ver=5.5.2"></script>
<script src="/js/foundation/foundation.reveal.js?ver=5.5.2"></script>
<script src="js/foundation/foundation.tooltip.js?ver=5.5.2"></script>
<script src="/js/vendor/toucheffects.js"></script>

<script type="text/javascript">
    $(document).foundation();
    
    $(document).ready(function () {
        var taille = 1.2;
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