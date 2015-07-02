<div class="fixed sticky">
    <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
        <ul class="title-area">
            <li class="name"><h1><a href="/">Mes Aides Publiques</a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>

        <section class="top-bar-section">
            <!-- Left Nav Section -->
            <ul class="left">
                <li class="has-form">
                    <div class="row collapse">
                        <div class="large-8 small-9 columns">
                            <input type="text" name="rechercher" id="recharcher" placeholder="Dossier, Aides,...">
                        </div>
                        <div class="large-4 small-3 columns">
                            <a href="#" class="alert button expand">Rechercher</a>
                        </div>
                    </div>
                </li>
                <li class="divider"></li>
                <li><a><span id="Agrandir">+a</span></a></li>
                <li><a> <span id="Reduire">-a</span> </a></li>
                <li class="divider"></li>
            </ul>
            <!-- Right Nav Section -->
            <ul class="right">
                <li><a href="/app/consulter/consulter.php"/>Consulter</a></li>
                <li class="divider"></li>
                <li><a href="/app/simuler/simuler.php">Simuler</a></li>
                <li class="divider"></li>
                <li><a href="/app/declarer/declarer.php">Déclarer</a></li>
                <li class="divider"></li>
                <li><a href="/app/aides/aidez-moi.php">Aidez-moi</a></li>
                <li class="divider"></li>
                <li class="has-form">
                    <a href="#" data-reveal-id="quitter" class="button" role="button">Quitter</a>
                    <div id="quitter" class="reveal-modal" data-reveal aria-labelledby="quitterTitle" aria-hidden="true" role="dialog">
                        <h2 id="quitterTitle">Merci d'avoir utilisé MiniMis mais fait le maximum</h2>
                        <br />
                        <p class="lead">Une idée simple, pour un service simple.</p>
                        <p class="lead">Avec mes Aides Publiques.</p>
                        <a href="/" class="secondary button">Se déconnecter</a>
                        <?php session_destroy(); ?>
                        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                    </div>
                </li>
            </ul>
        </section>
    </nav>
</div>