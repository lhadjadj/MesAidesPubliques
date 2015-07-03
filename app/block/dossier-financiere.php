<h3 class="Aaargh"><b>Données Financières</b></h3>
<div class="row">
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Montant global du projet</label></div>
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['MontantGlobal']); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><hr /></div>
            </div>
        </div>
    </div>
        <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Coût total éligible programmé</label></div>
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['DepenseEligibleProgramme']); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Union Européenne</label></div>
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['DepenseTotalProgrammeUE']); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Etat</label></div>
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['DepenseTotalProgrammeEtat']); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Région</label></div>
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['DepenseTotalProgrammeRegion']); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Département</label></div>
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['DepenseTotalProgrammeDepartement']); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Autre Public</label></div>
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['DepenseTotalProgrammeAutrePublic']); ?></div>
            </div>
        </div>
    </div>

    <br />
        <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><hr /></div>
                <div class="small-7 columns">Coût total éligible programmé CPER</div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Etat</label></div>
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['DepenseTotalProgrammeCperEtat']); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Région</label></div>
                <div class="small-7 columns"><?php echo $projet['DepenseTotalProgrammeCperRegion']; ?></div>
            </div>
        </div>
    </div>

    <br />
    <div class="row">
      <div class="small-12 columns">
         <div class="row">
            <div class="small-5 columns"><hr /></div>
            <div class="small-7 columns">Montant total payé :</div>
         </div>
       </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Union Européenne</label></div>
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['PaiementTotalUE']); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Etat</label></div>     
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['PaiementTotalEtat']); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Région</label></div>
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['PaiementTotalRegion']); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Département</label></div>
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['PaiementTotalDepartement']); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Autre Public</label></div>
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['PaiementTotalAutrePublic']); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Privée</label></div>
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['PaiementTotalPrive']); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Bénéficiaire</label></div>
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['PaiementTotal']); ?></div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
      <div class="small-12 columns">
         <div class="row">
            <div class="small-5 columns"><hr /></div>
         </div>
       </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 columns"><label for="right-label" class="right">Dépenses certifiées</label></div>
                <div class="small-7 columns"><?php echo money_format('%.2n', $projet['PaiementTotalValideAC']); ?></div>
            </div>
        </div>
    </div>
</div>