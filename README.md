# 📚 BiblioTech

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge\&logo=laravel\&logoColor=white)
![Livewire](https://img.shields.io/badge/Livewire-4E56A6?style=for-the-badge\&logo=laravel\&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00758F?style=for-the-badge\&logo=mysql\&logoColor=white)
![License: MIT](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)
![Build Passing](https://img.shields.io/badge/Build-Passing-brightgreen?style=for-the-badge)
![Made with Love](https://img.shields.io/badge/Made%20with-❤️-red?style=for-the-badge)

---

## 🚀 Aperçu

**BiblioTech** est un système complet de gestion de bibliothèque développé avec **Laravel** et **Livewire**.
Il permet aux bibliothécaires et aux utilisateurs de gérer efficacement les livres, les abonnés et les réservations.
L’application offre une interface moderne et intuitive, facilitant la gestion des emprunts, des retours et des réservations.

---

## ✨ Fonctionnalités

* 📘 **Gestion des livres** : Ajouter, modifier et supprimer des livres.
* 📅 **Système de réservation** : Gérer les réservations et suivre leur état.
* 👥 **Gestion des abonnés** : Enregistrer et suivre les abonnés.
* 📊 **Statistiques** : Consulter les statistiques d’utilisation.
* 🔐 **Authentification** : Connexion sécurisée pour les utilisateurs et bibliothécaires.
* 🌐 **Design responsive** : Adapté à tous les appareils (mobile, tablette, ordinateur).

---

## 🛠️ Stack Technique

* **Langage** : PHP
* **Frameworks** : Laravel, Livewire
* **Outils** : Vite, Laravel Vite Plugin
* **Base de données** : MySQL
* **Frontend** : Blade, composants Livewire
* **Backend** : Laravel

---

## 📦 Installation

### ⚙️ Prérequis

* PHP 8.1 ou supérieur
* MySQL
* Composer
* Node.js et npm

### 🚀 Démarrage rapide

```bash
# Cloner le dépôt
git clone https://github.com/elmakhtar10/BiblioTech

# Accéder au dossier du projet
cd Gestion_Bibliotheque

# Installer les dépendances
composer install
npm install

# Copier le fichier d’environnement
cp .env.example .env

# Générer la clé de l’application
php artisan key:generate

# Lancer les migrations
php artisan migrate

# Démarrer le serveur local
php artisan serve
```

### Utilisation avancée

* Personnaliser les variables dans le fichier `.env`.
* Consulter la documentation API pour des cas d’usage avancés.

---

## 📁 Structure du projet

```
Gestion_Bibliotheque/
├── app/
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   ├── Livewire/
│   ├── Models/
│   └── Providers/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
│   ├── views/
│   └── ...
├── routes/
├── storage/
├── tests/
├── vendor/
├── .env
├── composer.json
├── package.json
├── README.md
└── ...
```

---

## 🔧 Configuration

* Modifier le fichier `.env` pour adapter les paramètres à votre environnement.
* Les fichiers du dossier `config/` contiennent toutes les options de configuration du projet.

---

## 🤝 Contribution

* **Comment contribuer** : Clonez le dépôt, créez une branche et soumettez une pull request.
* **Mise en place** : Suivez les étapes d’installation.
* **Style de code** : Respectez la norme **PSR-12**.
* **Avant de soumettre** : Testez et documentez votre code.

---

## 📝 Licence

Ce projet est sous licence **MIT**.
Consultez le fichier [LICENSE](LICENSE) pour plus d’informations.

---

## 👥 Auteurs & Contributeurs

* **Mainteneur** : Tarma

---

