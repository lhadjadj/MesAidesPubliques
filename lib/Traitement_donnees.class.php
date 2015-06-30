<?php
require_once(__DIR__ . "/Curl.php");

use \Curl\Curl;

function isValidJson($strJson)
{
    json_decode($strJson);
    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            return true;
        case JSON_ERROR_DEPTH:
            $TypeAlerte = "alert radius";
            $Message = "Profondeur maximale atteinte.";
            break;
        case JSON_ERROR_STATE_MISMATCH:
            $TypeAlerte = "alert radius";
            $Message = "Inadéquation des modes ou underflow.";
            break;
        case JSON_ERROR_CTRL_CHAR:
            $TypeAlerte = "alert radius";
            $Message = "Erreur lors du contrôle des caractères.";
            break;
        case JSON_ERROR_SYNTAX:
            $TypeAlerte = "alert radius";
            $Message = "Erreur de syntaxe - JSON malformé.";
            break;
        case JSON_ERROR_UTF8:
            $TypeAlerte = "alert radius";
            $Message = "Caractères UTF-8 malformés, probablement une erreur d'encodage.";
            break;
        default:
            $TypeAlerte = "alert radius";
            $Message = "Erreur inconnue.";
            break;
    }
    return array('TypeAlerte' => "$TypeAlerte", 'Message' => "$Message");
}

function GetData($url,$dataset, $query, $facet, $proxy)
{

//Instanciation de la fonction + paramétres
    $curl = new Curl();
    $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
    $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
    $curl->setOpt(CURLOPT_PROXY, $proxy);
    $curl->get($url . $dataset . $query . $facet . $apikey);

    $curl->close();

    if ($curl->error) {
        $erreur = "Erreur: . $curl->error_code . :  . $curl->error_message";
        return $erreur;
    } else {
        if (isValidJson($curl->raw_response)) {
            $parsed_json = json_decode($curl->raw_response, true);
            return $parsed_json;
        }
    }
}

function TraitementsDonneesPO()
{
    //On vérifie que les données sont bien passées, attention avec les certificats auto-signés qui ne fonctionnent pas correctement avec NTLM
    $siret = (isset($_POST['siret']) && isset($_POST['email']))?$_POST['siret']:"23350001600040";

    // récupération des parametres de connexion - n° siret valide : 23350001600040, 38073485500014
    require_once(str_replace('lib', '/conf/', __DIR__) . "parametres.php");

    $query = "&q=$siret";
    $attention=false;
    
    // Appel de la fonction de récupération des données
    $parsed_json = GetData($url, $dataset['1'], $query, $facet, $proxy);

    if (is_string($parsed_json)) {
       //Après le Hackathon, l'accès au fournisseur de données n'est plus possible, on utilise la base locale
        $hackathon=preg_match("/401/i", $parsed_json);
        switch ($hackathon) {
            case 1:
                // on ne peux plus se connecter àla base OpenDataSoft, donc on va utiliser une base locale (fichier json)
                // le fichier est correct, pas besoin de le vérifier.
                $attention=true;
                break;
            default :
                return array('TypeAlerte' => "alert radius", 'Message' => $parsed_json);
                            }
    }
    $NombreDossier = count($parsed_json['records']);
    if ($NombreDossier == 0) {return array('TypeAlerte' => "warning radius", 'Message' => "Aucun dossier trouvé.");}

    // Un seul Siret par entreprise
    //Premier bloc - identification de l'entreprise
    $NumSiret = $parsed_json["records"][0]["fields"]["numsiret"];
    $RaisonSocial = $parsed_json["records"][0]["fields"]["rsocmo"];
    $NatureActivité = $parsed_json["records"][0]["fields"]["libnaturemo"];
    $CodeActivité = $parsed_json["records"][0]["fields"]["libcodenafmo"];
    $AdresseRue = $parsed_json["records"][0]["fields"]["ruemo"];
    $AdresseCodePostale = $parsed_json["records"][0]["fields"]["codepostalmo"];
    $AdresseVille = $parsed_json["records"][0]["fields"]["villeresidmo"];
    $AdresseCodeInsee = $parsed_json["records"][0]["fields"]["codeinseecommunemo"];
    $AdresseGeoLat = $parsed_json["records"][0]["fields"]["geeoinseemo"][0];
    $AdresseGeoLong = $parsed_json["records"][0]["fields"]["geeoinseemo"][1];

    // Initialisation de la connexion
    $m = new MongoClient();
    // sélection de la base de données
    $db = $m->entreprise;

    // Sélectionne de la collection Identité de l'entreprise
    $collectionIdentite = $db->identite;
    $collectionProjet = $db->projet;
    // Enregistrement des données dans la collection
    $entreprise = array(
            'NumeroSiret' => $NumSiret,
            'RaisonSocial' => $RaisonSocial,
            'NatureActivité' => $NatureActivité,
            'CodeActivité' => $CodeActivité,
            'AdresseRue' => $AdresseRue,
            'AdresseCodePostale' => $AdresseCodePostale,
            'AdresseVille' => $AdresseVille,
            'AdresseCodeInsee' => $AdresseCodeInsee,
            'AdresseGeoLat' => $AdresseGeoLat,
            'AdresseGeoLong' => $AdresseGeoLong
            );

    //Recherche si l'entreprise exsite déjà en base
    $getIdentite = $collectionIdentite->findOne(array("NumeroSiret" => $NumSiret));

    if (!is_array($getIdentite)) {
            try {
                $collectionIdentite->insert($entreprise, array("w" => 1, "j" => true));
            } catch (MongoCursorException $e) {
                return array('TypeAlerte' => "alert radius", 'Message' => $e->getMessage());
            }
        }

    // Boucle de récupération des données
    foreach ($parsed_json["records"] as $proj) {
      //Deuxième bloc - identification du projet
       $data = $proj["fields"];
       $ProjetRegion = isset($data['localibreg']) ? $data['localibreg'] : '';
       $ProjetCodeRegion = isset($data['locacodreg']) ? $data['locacodreg'] : '';
       $ProjetDepartement = isset($data['localibdept']) ? $data['localibdept'] : '';
       $ProjetCodedepartement = isset($data['locacoddept']) ? $data['locacoddept'] : '';
       $ProjetArrondissement = isset($data['localibardt']) ? $data['localibardt'] : '';
       $ProjetCodeArrondissement = isset($data['locacodardt']) ? $data['locacodardt'] : '';
       $ProjetCommune = isset($data['localibcommune']) ? $data['localibcommune'] : '';
       $ProjetCodeCommune = isset($data['locacodcommune']) ? $data['locacodcommune'] : '';
       $ProjetCanton = isset($data['localibcanton']) ? $data['localibcanton'] : '';
       $ProjetCodeCanton = isset($data['locacodcanton']) ? $data['locacodcanton'] : '';
       $ProjetGeoLong = $proj["geometry"]["coordinates"][0];
       $ProjetGeoLat = $proj["geometry"]["coordinates"][1];

       //Troisième bloc - identification du projet
        $PO = isset($data['libellefonds']) ? $data['libellefonds'] : '';
        $Dossier = isset($data['codedossier']) ? $data['codedossier'] : '';
        $Projet = isset($data['libdossier']) ? $data['libdossier'] : '';

        //Quatrième bloc - status d'avancement du projet
        $EtatStatus = isset($data['libstatus']) ? $data['libstatus'] : '';
        $EtatDossierPaye = isset($data['indicpayedossier']) ? $data['indicpayedossier'] : '';
        $EtatDossierSolde = isset($data['indicsoldesossier']) ? $data['indicsoldesossier'] : '';
        $DateDepotDossier = isset($data['dtdepotdoss']) ? $data['dtdepotdoss'] : '';
        $DateLimiteDebutReal = isset($data['dtlimdebutrealphy']) ? $data['dtlimdebutrealphy'] : '';
        $DateLimiteFinReal = isset($data['dtlimfinrealphy']) ? $data['dtlimfinrealphy'] : '';
        $DatePremierComite = isset($data['dtpremiercomite']) ? $data['dtpremiercomite'] : '';

        //Cinquieme bloc - Montnantw financier
        $MontantGlobal = isset($data['mntcoutglobprojet']) ? $data['mntcoutglobprojet'] : '';
        $DepenseEligibleProgramme = isset($data['derpfvctoteligprogmt']) ? $data['derpfvctoteligprogmt'] : '';
        $DepenseTotalProgrammeUE = isset($data['derpfvtotproguemt']) ? $data['derpfvtotproguemt'] : '';
        $DepenseTotalProgrammeEtat = isset($data['derpfvtotprogetatmt']) ? $data['derpfvtotprogetatmt'] : '';
        $DepenseTotalProgrammeRegion = isset($data['derpfvtotprogregionmt']) ? $data['derpfvtotprogregionmt'] : '';
        $DepenseTotalProgrammeDepartement = isset($data['derpfvtotprogdeptmt']) ? $data['derpfvtotprogdeptmt'] : '';
        $DepenseTotalProgrammeAutrePublic = isset($data['derpfvtotprogapmt']) ? $data['derpfvtotprogapmt'] : '';
        $DepenseTotalProgrammeCperEtat = isset($data['derpfvtotprogetatcper']) ? $data['derpfvtotprogetatcper'] : '';
        $DepenseTotalProgrammeCperRegion = isset($data['derpfvtotprogregioncper']) ? $data['derpfvtotprogregioncper'] : '';
        $PaiementTotalUE = isset($data['totpayeuemt']) ? $data['totpayeuemt'] : '';
        $PaiementTotalEtat = isset($data['totpayeetatmt']) ? $data['totpayeetatmt'] : '';
        $PaiementTotalRegion = isset($data['totpayeregionmt']) ? $data['totpayeregionmt'] : '';
        $PaiementTotalDepartement = isset($data['totpayedeptmt']) ? $data['totpayedeptmt'] : '';
        $PaiementTotalAutrePublic = isset($data['totpayeapmt']) ? $data['totpayeapmt'] : '';
        $PaiementTotalPrive = isset($data['totpayeprivmt']) ? $data['totpayeprivmt'] : '';
        $PaiementTotal = isset($data['totpayemomt']) ? $data['totpayemomt'] : '';
        $PaiementTotalValideAC = isset($data['totaldepretvalidac']) ? $data['totaldepretvalidac'] : '';

        //on défini la liste des données de la collection Projet
        $projet = array(
                'NumeroSiret' => $NumSiret,
                'ProjetRegion' => $ProjetRegion,
                'ProjetCodeRegion' => $ProjetCodeRegion,
                'ProjetDepartement' => $ProjetDepartement,
                'ProjetCodedepartement' => $ProjetCodedepartement,
                'ProjetArrondissement' => $ProjetArrondissement,
                'ProjetCodeArrondissement' => $ProjetCodeArrondissement,
                'ProjetCommune' => $ProjetCommune,
                'ProjetCodeCommune' => $ProjetCodeCommune,
                'ProjetCanton' => $ProjetCanton,
                'ProjetCodeCanton' => $ProjetCodeCanton,
                'ProjetGeoLong' => $ProjetGeoLong,
                'ProjetGeoLat' => $ProjetGeoLat,
                'PO' => $PO,
                'Dossier' => $Dossier,
                'Projet' => $Projet,
                'EtatStatus' => $EtatStatus,
                'EtatDossierPaye' => $EtatDossierPaye,
                'EtatDossierSolde' => $EtatDossierSolde,
                'DateDepotDossier' => $DateDepotDossier,
                'DateLimiteDebutReal' => $DateLimiteDebutReal,
                'DateLimiteFinReal' => $DateLimiteFinReal,
                'DatePremierComite' => $DatePremierComite,
                'MontantGlobal' => $MontantGlobal,
                'DepenseEligibleProgramme' => $DepenseEligibleProgramme,
                'DepenseTotalProgrammeUE' => $DepenseTotalProgrammeUE,
                'DepenseTotalProgrammeEtat' => $DepenseTotalProgrammeEtat,
                'DepenseTotalProgrammeRegion' => $DepenseTotalProgrammeRegion,
                'DepenseTotalProgrammeDepartement' => $DepenseTotalProgrammeDepartement,
                'DepenseTotalProgrammeAutrePublic' => $DepenseTotalProgrammeAutrePublic,
                'DepenseTotalProgrammeCperEtat' => $DepenseTotalProgrammeCperEtat,
                'DepenseTotalProgrammeCperRegion' => $DepenseTotalProgrammeCperRegion,
                'PaiementTotalUE' => $PaiementTotalUE,
                'PaiementTotalEtat' => $PaiementTotalEtat,
                'PaiementTotalRegion' => $PaiementTotalRegion,
                'PaiementTotalDepartement' => $PaiementTotalDepartement,
                'PaiementTotalAutrePublic' => $PaiementTotalAutrePublic,
                'PaiementTotalPrive' => $PaiementTotalPrive,
                'PaiementTotal' => $PaiementTotal,
                'PaiementTotalValideAC' => $PaiementTotalValideAC
            );

            //on fait une recherche dans la base locale, si le numero de siret n'existe pas alors on enregistre toutes les données
            $getProjet = $collectionProjet->findOne(array('NumeroSiret' => $NumSiret, 'Dossier' => $Dossier));

            if (!is_array($getProjet)) {
                try {
                    $collectionProjet->insert($projet, array("w" => 1, "j" => true));
                } catch (MongoCursorException $e) {
                    return array('TypeAlerte' => "alert radius", 'Message' => $e->getMessage());
                }
                                        }
        }

        // Les données ont été entregistré dans la base mongoDB. on rend la main à la vue
        // Je tests si on est sur la base locale ou pas et je renvoie un message à la page pour afficher les bons messages 
        if ($attention) {
            return array('TypeAlerte' => "success radius", 'Message' => "Les informations de votre entreprise ont été retrouvées.", 'Locale' => 1);
        }
        else 
        {
            return array('TypeAlerte' => "success radius", 'Message' => "Les informations de votre entreprise ont été retrouvées.", 'Locale' => 0);
        }
}

function EntrepriseIdentite($NumeroSiret)
{
    // Initialisation de la connexion
    $m = new MongoClient();
    return  $m->entreprise->identite->findOne(array("NumeroSiret" => $NumeroSiret));
}

function EntrepriseProjet($NumeroSiret)
{
    // Initialisation de la connexion
    $m = new MongoClient();
    return $m->entreprise->projet->find(array("NumeroSiret" => $NumeroSiret, "EtatDossierPaye" => "O" ));
}

function EntrepriseStatistique($NumeroSiret)
{
// todo
$m = new MongoClient();
return $m->entreprise->projet->find(array("NumeroSiret" => $NumeroSiret, "EtatDossierPaye" => "O", "EtatDossiersolde" => "O"));
}

function EntrepriseHistorique($NumeroSiret)
{
    $m = new MongoClient();
    return $m->entreprise->projet->find(array("NumeroSiret" => $NumeroSiret, "EtatDossierPaye" => "O", "EtatDossiersolde" => "O"));
}