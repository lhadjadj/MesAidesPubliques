# MesAidesPubliques
Application de suivi des aides publiques et de simulation de la règle du Minimis (Projet du Hackathon du 18/06/2015)

Dans le cadre du Hackathon FranceConnect des 18 et 19 juin 2015, l'ASP a présenté avec le concourt de l'équipe "Dites-le nous une fois", deux réalisations du projet "Minimis, mais fait le maximum".

La première version a été développée en Ruby/Grails - Bootstrap, la seconde en Html5/Php - Zurb Foundation.

La version 1.0 présenté le 19/06/2015 avait pour objectif  de :
 - Permettre à une entreprise, à l'aide de ses identifiants FranceConnect, de pouvoir consulter l'ensemble des  informations liées aux demandes d'aides (EU, Etat, Région,...),
 - Simuler la règle du Minimis et de connaître le statut d'éligibilité de l'entreprise.
- Permettre à l’entreprise de consentir à autoriser l’administration à utiliser ces informations dans le cadre d’une nouvelle démarche.

Configuration de la plateforme de développement :
- Debian 8.0
- nginx 1.6.2.5
- PHP 5.6.9
- PHP-Mongo Driver 1.6.10
- mongoDB 2.4.10
 
Technologies
- HTML 5/CSS 3
- Zurb Foundation 5.5.2
- Jquery 2.1.4/jquery.placeholder - jquery.cookie
- Moderniz 2.8.3
- slick 1.5.0
- ChartJS 1.0.2

Fournisseur d'identité :
- FranceConnect Entreprise (simulé)

Fournisseur de données :
- L'ASP pour les dossiers FEDER, FSE et FEP 2007-2013 (région Bretagne) et les aides d'Etat,
- FranceAgriMer pour les données des entreprises viticoles,
- Aide Publique Simplifié (APS) pour les données d'identité (Api Entrepise) et de géolocalisation (Api-carto)


Configuration :
- Jeu de données dans /data
	- un jeu de données au format json limité à 3 dossiers au format OpenDataSoft 
	- un jeu de données au format TSV pour l'import automatique vers MongoDB, le fichier doit être au format UTF8. Un champs "fin" permet de neutralisé le caractère de fin de ligne sur le dernier champs
	- un chammps Mois et Année a été ajouté pour contourner le problème de l'import TSV ou les champs de type Date ne sont pas reconnus et sont typé en String, ce qui ne permet plus de faire de trie
- Paramétrage  dans /conf
	- un fichier de paramétrage est utilisé pour stocker le numéro de version et les paarmétres de connexions à OpenDataSoft, APS et GoogleMap API


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Version 1.3.0 - 17 juillet 2015
Evolutions :
- Remplacement de la librairie Pizza par ChartJs
- Refonte du bloc statistiques (ajout d'un accordéon et de tabulation pour les graphiques)
- Mise à jour de la page Simuler

Corrections :
- Modification du jeux de données pour faciliter les requetes de type Aggregate sur MongoDB suite à l'import des données, 
	- Ajout d'une colonne Mois et Année pour les Champs DatePremierComite, DateDebutReal et DateFinReal


Version 1.2.1 - 09 juillet 2015

Evolutions :
- Ajout d'un bouton pour signaler que "mes informations ne sont pas correctes" dans la section Mon entreprise de la page consulter.
- Amélioration de l'ergonomie (CSS).
- Ajout du nombre de dossier abandonnée dans la section historisation.
- Prise en compte du statut du dossier dans le visuel (pastille rouge, orange et verte).
- Mise à jour du guide, ajout de la page Consulter.
- Ajout de page de Tests pour les requêtes MonGoDB et les Polices

Corrections :
- Transformation du champ : 00/01/1900 en date (01/01/1900)
- Ré-écriture des requêtes MongoDB avec prise en compte des bons Cursor.
- Amélioration de la qualité du code et corrections diverses

Version 1.2.0 - 08 juillet 2010

Evolutions :
- Ajout de la fonction guides, utilisation de la fonction JoyRide
- Ajout de la page Déclarer
- Ajout de la page 404 et 504 personalisée. Utilisation de la librairie SuperSizedMe

Corrections :
- Amélioration de la qualité du code et corrections diverses

Version 1.1.0 - 03 juillet 2015

Evolutions :
- Refonte de la page consulter (
	- Amélioration de la lisibilité du bloc "Dossiers en cours",
	- réécriture des blocs "historique" et "statitisque", 
	- ajout du module Pizza pour l'affichage de graphiques dynamiques responsives,
	- Ajout de l'Api GoogleMaps pour l'affichage d'une carte et pour le service de géocodage quand APS n'est pas disponible

Corrections :
- Revu et correction des requêtes MongoDB pour l'affichage des données encours et historique
	- Les dossiers encours sont des dossiers programmés dont les status sont à N/N ou O/N
	- L'historique remonte tout les dossiers
- Amélioration de la qualité du code et corrections diverses

Version 1.0.3 - 02 juillet 2015
- Correction d'une anomalie sur le chemin relatif au chargement de la librairie ToolTips.js
- Amélioraion de la prise en charge d'une base locale quand l'API APS/OpendataSoft n'est pas disponible

Version 1.0.2 - 30 juin 2015
- Ajout d'une fonction pour importer la base en local en l'absence de connexion au fournisseur de données.
- Tests si le fournisseur de données est en ligne, sinon on utilise la base de données locale.

Version 1.0.1 - 30 juin 2015
- Changement de la couleurs des logos du footer (bleu)
- Ajout des logos Humans.txt et Créative Common 4.0
- Ajout des Tooltips (bouton France Connect + logo CC)
- Ajout dans le formulaire de connexion du consentement de l'utilisateur pour la réutilisation des données publiques 

Version 1.0 - 18/19 juin 2015

Application Mes Aides Publiques (Minimis) réalisée lors du Hackathon du 18 & 19 juin 2015.
- Connection FC au fournisseur de données (openDataSoft)
- gestion d'un cache local sur une base MongoDB
- Affichage des données de l'entreprise (APS)
- Affichage des dossiers courants de l'entreprise

Reste à faire :
- Ajouter les statistiques et l'historique
- calculer l'éligibilité à la règle du Minimis
- Recueillir le consentement de l'entreprise pour diffuser réutiliser
l'information lors d'une autre démarche.