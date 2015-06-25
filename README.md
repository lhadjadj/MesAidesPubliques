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
- Jquerry 2.1.4/jquerry.placeholder - jquerry.cookie
- moderniz 2.8.3
- slick 1.5.0

Fournisseur d'identité :
- FranceConnect Entreprise (simuler)

Fournisseur de données :
- L'ASP pour les dossiers FEDER, FSE et FEP 2007-2013 (région Bretagne) et les aides d'Etat,
- FranceAgriMer pour les données des entreprises viticoles,
- Aide Publique Simplifié (APS) pour les données d'identité (Api Entrepise) et de géolocalisation (Api-carto)

Reste à faire : 
- Afficher les statistiques et l'historique des dossiers de l'entreprise
- Simuler l'éligibilité de l'entreprise à la règle du Minimis pour les aides d'Etat
- Recueillir le consentement de l'entreprise pour autoriser la ré-utilisation des données publiques par l'administration
