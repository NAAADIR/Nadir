<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

nstallation
composer install
cp .env.example .env
php artisan key:generate
Compléter le fichier .env :

DB_USERNAME=
DB_PASSWORD=

### PASSWORDS ###
DEV_PASSWORD=password
STAGING_PASSWORD=your_strong_password
Ajouter dans /storage/app/import un fichier users.json sur le modèle suivant :

[
    {
        "firstname": "User",
        "lastname": "One",
        "email": "user.one@your-project.com"
    },
    {
        "firstname": "User",
        "lastname": "Two",
        "email": "user.two@your-project.com"
    }
]
Pour seeder l’application, 4 fichiers supplémentaires sont nécessaires :

categories.json
legal_form_sector.json
accounting_entry_sector.json
accounting_entry_legal_form.json
Voir dossier import.zip épinglé dans le channel « mergin » sur Slack.

Lancer les commandes :

sail up -d
sail artisan migrate:fresh --seed && sail artisan passport:client --password --no-interaction
Import des utilisateurs Mistercompta
Récupérer le dossier users.zip épinglé dans le channel « mergin » sur Slack et le dézipper dans le dossier storage/app/import.

Sur Postman, faire un GET sur l’url {host}/api/v1/transfer-user. Attendre environ 60 secondes.

Générer la documentation avec Scribe
sail artisan scribe:generate
La documentation est consultable sur (url locale à adapter) : http://localhost/docs/index.html

API
Tester les endpoints
Depuis Postman, importer le fichier public/docs/collection.json. Vérifier que la variable {{baseUrl}} correspond à l’url du projet. Tester les requêtes.

Récupérer un bearer token
POST /oauth/token
grant_type password
client_id # Passport client id
client_secret # Passport client secret
username # User email adress
password # User password
Example avec curl

curl -d grant_type=password -d client_id=93f67dae-7346-438d-956d-41cb62c15dc1 -d client_secret=nWmoEXtxjxVJZ8lGPeRraMcpkKgusJA1b3c2P5YZ -d username=sebastien@subvitamine.com -d password=password http://mergin.test/oauth/token
Rôles et permissions
Les différents rôles de l’application sont :

admin
expert
manager
partner
collaborator
Les différentes permissions de l’application sont :

access console
Users de test
email	roles
olacombe@subvitamine.com	user, admin, expert
john.doe@subvitamine.com	user
jljavelaud@gmail.com	admin, expert
xavier@uston.fr	admin, expert
