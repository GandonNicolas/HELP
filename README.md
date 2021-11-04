# HELP
## Commandes à effectuer pour que webpack/bootsrtap fonctionnent:

* composer require symfony/webpack-encore-bundle

* npm i

* npm i sass-loader node-sass --save-dev

* npm i postcss autoprefixer --dev

* npm i bootstrap

* npm run build


## START

* git clone url_projet

* Créer un table psql avec la commande : createdb HELP
 
* copier/coller le fichier .env et le renomer en .env.local
changer la config (ligne 31 habituellement)

* git branch nom_de_ma_branche OU git checkout nom_de_ma_branche
composer install

* symfony serve (pour lancer le server symfony )



## A CHAQUE FOIS QUE L'ON OUVRE LE PROJET

* git pull (récupère les dernières mise à jour)


## INSTALATION CKEditor


* composer require friendsofsymfony/ckeditor-bundle

* npm run php bin/console ckeditor:install --release=full


# Attention verifier si dans "./node_modules/ckeditor4/plugins" on trouve le dossier "codesnippet" si c'est pas le cas il faut l'ajouter 

* npm run dev



pour des aides :  https://symfony.com/bundles/FOSCKEditorBundle/current/usage/ckeditor.html
                  https://symfony.com/bundles/FOSCKEditorBundle/current/installation.html



## A CHAQUE FOIS QUE L'ON VEUX PUSH NOTRE TRAVAIL

* vérifier si l'on travaille bien sûr ça branche !

* git add . (pour tous les fichier que l'on veut envoyer)

* git add mon_fichier (pour spécifier un fichier précis)

* git commit -m "ici_le_nom_du_commit" (le nom du commit doit être explicite !!!)

* git push origin le_nom_de_ma_branche



## CREDITS

Le projet a été créé en colaboration avec :

* [Mayxnnaise](https://github.com/Mayxnnaise)
* [Lucie Rose](https://github.com/LucieRose)
* [Jeanne-Louise](https://github.com/Jeanne-Louise)
* [hicham1000](https://github.com/hicham1000)
* [GandonNicolas](https://github.com/GandonNicolas)

* [Nedeas](https://github.com/Nedeas)
