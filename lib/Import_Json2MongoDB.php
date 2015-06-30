<?php

function ImportDoonnees()
{
// Cette fonction permet de créer une base de données de type MongoDB --> DataSource et une collection --> Dossiers pour les documents de la base 
// de référence du POR-Bretagne     
    
ini_set('max_execution_time', 300);
$chemin=str_replace('lib', 'data/', __DIR__);
$command='mongoimport '
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
if (isset($nbdossiers) === 0) {exec($command);} 
}

//Tests
ImportDoonnees();
