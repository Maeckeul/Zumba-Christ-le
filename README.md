# Projet Zumba Christèle

## Cloner le repo

## Mise en place

- Installation de nos dépendances via Composer `composer install`
- Création de la BDD
- Création du fichier `wp-config.php` à partir du fichier `wp-config-sample.php`
  - Renseigner les informations de connexion à la BDD
  - Renseigner les clé de salage [URL Pratique](https://api.wordpress.org/secret-key/1.1/salt/)
  - Renseigner les constantes: `WP_HOME`, `WP_SITEURL`, `WP_CONTENT_URL` en remplacant `[l_url_de_mon_site]` par notre url (ex: localhost/monprojet)

## Gestion des droits

- Changer les droits des fichiers/dossier de notre projet afin que Apache puisse réaliser des modifications (MAJ etc.).
```bash
sudo chown -R $USER:www-data .
sudo find . -type f -exec chmod 664 {} +
sudo find . -type d -exec chmod 775 {} +
sudo chmod 644 .htaccess
```

## Let's play :tada:

- Se rendre sur l'url locale de notre projet pour terminer l'installation de WordPress
- Penser à changer les permaliens
  - Admin BO > Réglages > Permalinks > Post Name
- Activer la bonne langue sur le BO
  - Admin BO > Réglages > Général > Langue du site


## Ensuite, il faut installer webpack

-
1. Se rendre dans le dossier du theme Zumba-christèle, exécuter  la commande `npm install` qui va installer toute les dépendances Node.js nécessaire au bon fonctionnement de l'application.
2. Exécuter une des commandes ci-dessous.

## Commandes disponibles

- `npm run start` : Démarre le serveur de développement en utilisant [Browsersync](https://www.browsersync.io/)
- `npm run build:dev` : Génère les ressources front sans compression en vue d'une utilisation dans un environnement de développemnt
- `npm run build:prod` : Génère les ressources front avec compression (minify, uglify) en vue d'une utilisation dans un environnement de production
- `npm run clean` : Supprime les fichiers générés par Webpack
- `npm run clean:all` : Supprime les fichiers générés par Webpack ainsi que le répertoire des dépendances installées avec NPM (`node_modules`)

## Prérequis (à ne faire qu'une fois à la première utilisation de Webpack)

1. Installer la dernière version de Node.js avec le package `n` :
    - `sudo npm install -g n`
    - `sudo n lts`
2. Installer les packages `webpack`, `webpack-cli` et `webpack-dev-server` en global
    - `sudo npm install -g webpack webpack-cli webpack-dev-server`




