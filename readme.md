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
```
3. Puis une fois cela fait, vous pouvez lancer la commande suivante:
```
php artisan migrate 
```

4. Puis pour être sur que tout est juste du coter de la base de donnée entré la commande suivante:
```
php artisan migrate:refresh --seed
```

5. Si vous ne possedez pas de serveur web il vous suffie d'entrer cette commande :
```
php artisan serve
```
rendez-vous sur localhost:8000