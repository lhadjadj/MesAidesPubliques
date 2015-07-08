<h3><b>Localisation du Projet</b></h3>
<div class="row">
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns">
                    <label for="right-label" class="right">Région</label>
                </div>
                <div class="small-7 columns">
                    <?php echo $projet['ProjetRegion']; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns">
                    <label for="right-label" class="right">Département</label>
                </div>
                <div class="small-7 columns">
                    <?php echo $projet['ProjetDepartement']; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns">
                    <label for="right-label" class="right">Arrondissement</label>
                </div>
                <div class="small-7 columns">
                    <?php echo $projet['ProjetArrondissement']; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns">
                    <label for="right-label" class="right">Canton</label>
                </div>
                <div class="small-7 columns">
                    <?php echo $projet['ProjetCanton']; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns">
                    <label for="right-label" class="right">Commune</label>
                </div>
                <div class="small-7 columns">
                    <?php echo $projet['ProjetCommune']; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns">
                    <label for="right-label" class="right">Géolocalisation</label>
                </div>
                <div class="small-7 columns">
                    ( <?php echo $projet['ProjetGeoLong']; ?> , <?php echo $projet['ProjetGeoLat']; ?> )
                </div>
            </div>
        </div>
    </div>
</div>