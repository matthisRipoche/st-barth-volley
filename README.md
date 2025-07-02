# St-Barth Volley

Site web officiel du St-Barth Volley

## 🚀 Technologies utilisées

- Laravel 10
- PHP 8.2+
- MySQL 8.0+
- Tailwind CSS
- Alpine.js

## 📋 Fonctionnalités principales

### Backend (BO)
- Gestion des articles
- Gestion des médias
- Gestion des pages
- Gestion des menus
- Gestion des paramètres
- Gestion des blocs

### Frontend
- Pages dynamiques
- Système de médias
- Navigation personnalisable
- Thème responsive

## 🛠️ Installation

1. Cloner le dépôt
```bash
git clone https://github.com/matthisRipoche/st-barth-volley.git
```

2. Installer les dépendances PHP
```bash
cd st-barth-volley
composer install
```

3. Installer les dépendances JavaScript
```bash
npm install
```

4. Copier le fichier .env
```bash
cp .env.example .env
```

5. Générer la clé d'application
```bash
php artisan key:generate
```

6. Créer la base de données et exécuter les migrations
```bash
php artisan migrate
```

7. Compiler les assets
```bash
npm run build
```

8. Démarrer le serveur de développement
```bash
php artisan serve
```

## 📝 Configuration

### Base de données
Modifier le fichier `.env` avec vos informations de connexion à la base de données :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stbarth_volley
DB_USERNAME=root
DB_PASSWORD=
```

### Variables d'environnement
```
APP_NAME=St-Barth Volley
APP_ENV=local
APP_KEY=your_app_key
APP_DEBUG=true
APP_URL=http://localhost

# Cache
CACHE_DRIVER=file

# Session
SESSION_DRIVER=file

# Filesystem
FILESYSTEM_DISK=local
```

## 🛠️ Structure du projet

```
app/
├── Controllers/
│   ├── BO/                 # Contrôleurs du back-office
│   └── Front/              # Contrôleurs du front-office
├── Models/                # Modèles Eloquent
├── Views/                # Vues Blade
└── Http/                 # Routes et middleware

resources/
├── css/                  # Styles CSS
├── js/                   # Scripts JavaScript
└── views/               # Vues front-end

storage/
└── app/public/          # Stockage des médias
```

## 🚀 Déploiement

1. Mettre à jour les permissions
```bash
chmod -R 755 storage bootstrap/cache
```

2. Compiler les assets
```bash
npm run build
```

3. Mettre à jour les routes
```bash
php artisan route:cache
```

4. Mettre à jour les configurations
```bash
php artisan config:cache
```

## 📝 Documentation

- [Documentation Laravel](https://laravel.com/docs)
- [Documentation Tailwind CSS](https://tailwindcss.com/docs)
- [Documentation Alpine.js](https://alpinejs.dev)

## 🤝 Contribuer

Pour contribuer au projet :

1. Fork le projet
2. Créez votre branche (`git checkout -b feature/AmazingFeature`)
3. Commit vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Push à la branche (`git push origin feature/AmazingFeature`)
5. Ouvrez une Pull Request

## 📝 Licence

Ce projet est sous licence MIT - voir le fichier [LICENSE](LICENSE) pour plus de détails.