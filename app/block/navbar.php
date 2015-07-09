<div class="fixed sticky">
    <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
        <ul class="title-area">
            <li class="name"><h1><a id="firstStop" href="/">Mes Aides Publiques</a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>

        <section class="top-bar-section">
            <!-- Left Nav Section -->
            <ul class="left hide-for-medium-down">
                <li class="has-form">
                    <div class="row collapse">
                        <div class="large-8 small-9 columns">
                            <input type="text" name="rechercher" id="rechercher" placeholder="Dossier, Aides,...">
                        </div>
                        <div class="large-4 small-3 columns">
                            <a id="Nav-01" href="#" class="alert button expand">Rechercher</a>
                        </div>
                    </div>
                </li>
                <li class="divider"></li>
                <li><a><span id="Agrandir" class="DensiaSans" title="Agrandir la police (CTRL+)"><b>+t</b></span></a> </li>
                <li><a><span id="Reduire" class="DensiaSans" title="Diminuer la police (CTRL-)"><b>-t</b></span> </a>  </li>
                <li class="divider"></li>
                <li><a id="aidezmoi" class="DensiaSans" title="Commencer la visite guidée">?</a></li>
            </ul>
            <!-- Right Nav Section -->
            <ul class="right">
                <li><a id="Nav-02" href="/app/consulter/consulter.php"/>Consulter</a></li>
                <li class="divider"></li>
                <li><a id="Nav-03" href="/app/simuler/simuler.php">Simuler</a></li>
                <li class="divider"></li>
                <li><a id="Nav-04" href="/app/declarer/declarer.php">Déclarer</a></li>
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
                        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                    </div>
                </li>
            </ul>
        </section>
    </nav>
    
</div>