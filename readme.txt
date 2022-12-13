1) Créer un dossier
2) Initialiser git
3) Cloner le repository GitHub 
	+ $ git clone https://github.com/Mickael861/bilemo.git
4) Installer composer
	+ Composer Install
5) Création du .env.local provenant du .env
6) Modifier le .env.local pour modifier l'URL de la base de données
7) Création de la base de données
	+ php bin/console doctrine:database:create
8) Mise a jours des tables
	+  php bin/console doctrine:schema:update --force
9) Lancer les fixtures
	+  php bin/console doctrine:fixture:load
10) Créer la clé private JWT
	+ Créer un dossier JWT dans le dossier config
	+ Allez dans le dossier config/jwt (cd)
		+ Lancer la commande :
			- openssl genrsa -out private.pem 2048
			- openssl rsa -in private.pem -pubout > public.pem