#-----HELP
Commande a effectuer pour que webpack/bootstap fonctionne 

composer require symfony/webpack-encore-bundle

npm i

npm i sass-loader node-sass --save-dev

npm i postcss autoprefixer --dev

npm i bootstrap

npm run build


#-----START

git clone url_projet
Créer un table psql avec la commande : createdb HELP 
copier/coller le fichier .env et le renomer en .env.local
changer la config (ligne 31 habituellement)
git branch nom_de_ma_branche OU git checkout nom_de_ma_branche
composer install
symfony serve (pour lancer le server symfony )

#-----INSTALATION CKEditor


https://symfony.com/bundles/FOSCKEditorBundle/current/installation.html

$ php bin/console ckeditor:install
$ php bin/console ckeditor:install --release=full

pour des aides : https://symfony.com/bundles/FOSCKEditorBundle/current/usage/ckeditor.html
$ php bin/console ckeditor:install --help

#-----A CHAQUE FOIS QUE L'ON OUVRE LE PROJET

git pull (récupère les dernières mise à jour)
vérifier si l'on travaille bien sûr ça branche !




#-----A CHAQUE FOIS QUE L'ON VEUX PUSH NOTRE TRAVAIL


git add . (pour tous les fichier que l'on veut envoyer)
git add mon_fichier (pour spécifier un fichier précis)
git commit -m "ici_le_nom_du_commit" (le nom du commit doit être explicite !!!)
git push origin le_nom_de_ma_branche



#-----CREDITS

Le projet est créer en colaboration avec :
https://github.com/Mayxnnaise
https://github.com/LucieRose
https://github.com/Jeanne-Louise
https://github.com/hicham1000
https://github.com/GandonNicolas/

https://github.com/Nedeas
