<h3><b>Statut</b></h3>
<div class="row">
  <div class="row">
   <div class="small-12 columns">
    <div class="row">
     <div class="small-5 columns"><label for="right-label" class="right">Statut du dossier</label></div>
     <div class="small-7 columns"><?php echo $projet['EtatStatus']; ?></div>
    </div>
   </div>
  </div>
  <div class="row">
   <div class="small-12 columns">
    <div class="row">
     <div class="small-5 columns"><label for="right-label" class="right">Paiement</label></div>
     <div class="small-7 columns"><?php echo ($projet['EtatDossierPaye']=='O' || $projet['EtatDossierPaye']=='1')?'O':'N'; ?></div>
    </div>
   </div>
  </div>
  <div class="row">
   <div class="small-12 columns">
    <div class="row">
     <div class="small-5 columns"><label for="right-label" class="right">Certifié</label></div>
      <div class="small-7 columns"><?php echo ($projet['EtatDossierSolde']=='O' || $projet['EtatDossierSolde']=='1')?'O':'N'; ?></div>
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
     <div class="small-5 columns"><label for="right-label" class="right">Date dépôt</label></div>
     <div class="small-7 columns"><?php echo $projet['DateDepotDossier']; ?></div>
    </div>
   </div>
  </div>
  <div class="row">
   <div class="small-12 columns">
    <div class="row">
     <div class="small-5 columns"><label for="right-label" class="right">Date de Démarrage</label></div>
     <div class="small-7 columns"><?php echo $projet['DateLimiteDebutReal']; ?></div>
    </div>
   </div>
  </div>
  <div class="row">
   <div class="small-12 columns">
    <div class="row">
     <div class="small-5 columns"><label for="right-label" class="right">Date de Fin</label></div>
     <div class="small-7 columns"><?php echo $projet['DateLimiteFinReal']; ?></div>
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
     <div class="small-5 columns"><label for="right-label" class="right">Lancement du projet</label></div>
     <div class="small-7 columns"><?php echo $projet['DatePremierComite']; ?></div>
    </div>
   </div>
  </div>
</div>