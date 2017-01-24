#Projet RIA2

Par Alain Pichonnat

##Prérequis
- Avoir composer
- php
- un serveur mysql

## Installation
1. Cloné le projet depuis dit à cette adresse : https://github.com/apichonnat/Project_RIA2.git

2. lancer la command suivante dans le dossier du projet:
```
composer update

composer install
```
3. Vous devez regenerer une clé pour l'application (pour laravel)
```
php artisan key:generate
```
4. Modifier le fichier [.env.example] en [.env] et modifier ces lignes:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=driver
DB_USERNAME=root
DB_PASSWORD=
```
5. Puis une fois cela fait créé une base de donnée sur votre serveur mysql du nom de "drivers", puis vous pouvez lancer la commande suivante:
```
php artisan migrate 
```

6. Puis pour être sur que tout est juste du coter de la base de donnée entré la commande suivante:
```
php artisan migrate:refresh --seed
```

7. Si vous ne possedez pas de serveur web il vous suffie d'entrer cette commande :
```
php artisan serve
```
8. Aller dans la base de donnée dans la table user et entré votre numero de téléphone dans l'utilisateur qui porte votre nom sous se format (798885522)

rendez-vous sur localhost:8000

## Documentation
### Introduction
Ce projet à été concu pour pouvoir gérer les tournées d'un chauffeur en mettant plusieur addresse
le logiciel calcule automatiquement le trajet le plus cour et l'envoie au chauffeur automatiquement par sms.

### Les APIs
1. Auth0.

j'utilise cette api pour authentifier les personnes qui utilise cette api
Cette API me permet de faire un systeme de connexion simple sans avoir besoin de gerer tout le système en back end

2. GoogleMatrix et GeoCode

GeoCode n'est en soit pas nécessaire mais j'ai prefer utiliser ceci pour transformer mes addresses en coordonnée
puis apres je calcule toutes les distance entres les clients.

3. smsApi

cette api permet simplement d'envoyer un sms via l'application, se qui me permet d'envoyer le message au chauffeur
séléctionner, la tournée qu'il doit faire.

### Utilisation

L'utilisation est simple , quand vous lancé l'application vous vous retrouvé sur un système de connexion, libre à vous de choisire se qui vous plait.
puis une fois connecté, vous acceder a la page principal du programme
entré
1. Séléctionné le nom du chauffeur(scelui qui va recevoir le sms)
2. séléctionné le lieu de départ puis les clients,
vous n'etes pas obliger de metre tout les clients
3. cliquer sur le bouton "confirmer la tournée"
4. Selon le nombre de client le programme peut prendre plus ou moin de temps pour faire le calcule
normalement au maximum 5 sec.

5. l'affichage dans l'ordre des clients avec leur addresse se fait sur la page principal, en plus un sms est envoiyer
au chauffeur avec les noms des clients dans l'ordre également

###Erreur

Si des erreur viennt à apparaitre, elle ne seront pas
visible étant donnée que le système à été code en ajax, mais dans la console elles seront visible