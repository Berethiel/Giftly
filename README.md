### Giftly

## Installation

```bash
# placez vous dans votre projet
cd Giftly

# Installer les dépendances composer
composer update

# Installer les dépendances npm
npm install

# Créer une base de données MySQL que vous appelerez Giftly
# Si vous choisissez d'appeler votre base de données autrement, pensez à modifier le .env en conséquense

# Créer votre propre fichier .env à partir du .env.example

# Configurez la connection à votre base de données dans votre .env
DB_CONNECTION=mysql
DB_DATABASE=giftly
DB_USERNAME=root
DB_PASSWORD=

# Lancez la migration pour la création des tables dans votre base de données
php artisan migrate
```

## Lancement du site

```bash
# Lancez le serveur Laravel
php artisan serve

#Lancez npm
npm run watch

# Ouvrez le projet à l'adresse indiquée dans le terminal Laravel (http://127.0.0.1:8000)
```
