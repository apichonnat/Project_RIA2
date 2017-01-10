#Projet RIA2

Par Alain Pichonnat

##Prérequis
- Avoir composer
- php
- un serveur mysql

## Installation
1.Cloné le projet depuis dit à cette adresse : https://github.com/apichonnat/Project_RIA2.git

2.lancer la command suivante dans le dossier du projet:
```
composer update

composer install
```
3.Vous devez regenerer une clé pour l'application (pour laravel)
```
php artisan key:generate
```
4.Modifier le fichier [.env.example] en [.env] et modifier ces lignes:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=driver
DB_USERNAME=root
DB_PASSWORD=
```
5.Puis une fois cela fait créé une base de donnée sur votre serveur mysql du nom de "drivers", puis vous pouvez lancer la commande suivante:
```
php artisan migrate 
```

6.Puis pour être sur que tout est juste du coter de la base de donnée entré la commande suivante:
```
php artisan migrate:refresh --seed
```

7.Si vous ne possedez pas de serveur web il vous suffie d'entrer cette commande :
```
php artisan serve
```
rendez-vous sur localhost:8000