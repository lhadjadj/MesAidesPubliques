<?php

function ImportDonnees()
{
// Cette fonction permet de créer une base de données de type MongoDB --> DataSource et une collection --> Dossiers pour les documents de la base 
// de référence du POR-Bretagne     
// 
// Contournement, 
// l'import type les numerot de Siret en Integer 64 bit, il n'est plus possible de lire la valeur sur un systeme 32 bit, 
// on ajoute alors un S devant le numero de Siret pour le transformer en String
// je sais c'est moche mais on fera mieux dans la v2.0
        
ini_set('max_execution_time', 300);
$chemin=str_replace('lib', 'data/', __DIR__);
$command='mongoimport '
        . '--drop '
        . '--db DataSource '
        . '--collection Dossiers '
        . '--headerline '
        . '--file '
        . $chemin 
        . 'PO_Bretagne.txt '
        . '--type tsv '
        . '--host localhost';

// Initialisation de la connexion
$m = new MongoClient();
$nbdossiers=$m->DataSource->Dossiers->count();
if ($nbdossiers === 0) {
    exec($command);
    $m->DataSource->Dossiers->createIndexarray(array('$**' => "text")); 
    } 
$nbdossiers=$m->DataSource->Dossiers->count();
return $nbdossiers;
}

//Tests
//$tempo=ImportDonnees();
//var_dump($tempo);