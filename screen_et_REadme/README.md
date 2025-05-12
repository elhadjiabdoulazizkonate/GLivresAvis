# 📚 Gestion de Livres et Avis

Ce projet Laravel permet de gérer une liste de livres et de recueillir les avis des utilisateurs. Il a été développé **sans starter kit** avec le moteur de templates **Blade**. L’objectif est d’apprendre le fonctionnement du pattern MVC avec Laravel.

---

## 🧱 Création du projet Laravel

### 1. Créer un nouveau projet Laravel

```bash
composer create-project laravel/laravel gestion-livres-avis
cd gestion-livres-avis
```

> Laravel doit être installé sur votre machine. Sinon, installez-le avec :  
> `composer global require laravel/installer`

---

## 🛠️ Installation

### 2. Installer les dépendances

```bash
composer install
npm install && npm run dev
```

### 3. Configurer l’environnement

```bash
cp .env.example .env
php artisan key:generate
```

Modifier les variables suivantes dans `.env` :

```
DB_DATABASE=livres_db
DB_USERNAME=root
DB_PASSWORD=secret
```

### 4. Lancer les migrations

```bash
php artisan migrate
```

### 5. Démarrer le serveur de développement

```bash
php artisan serve
```

Accéder à l'application sur :  
➡️ `http://localhost:8000`

---

## 🗄️ Description des tables

### 📘 Table : `livres`

| Champ        | Type     | Description                          |
|--------------|----------|--------------------------------------|
| id           | INT      | Clé primaire                         |
| titre        | STRING   | Titre du livre                       |
| auteur       | STRING   | Nom de l’auteur                      |
| description  | TEXT     | Résumé ou contenu du livre           |
| created_at   | TIMESTAMP| Date de création                     |
| updated_at   | TIMESTAMP| Date de mise à jour                  |

---

### 💬 Table : `avis`

| Champ            | Type     | Description                              |
|------------------|----------|------------------------------------------|
| id               | INT      | Clé primaire                             |
| livre_id         | INT      | Clé étrangère vers `livres`              |
| nom_utilisateur  | STRING   | Nom de la personne ayant donné l’avis    |
| commentaire      | TEXT     | Commentaire laissé                       |
| note             | INT      | Note attribuée (sur 5)                   |
| created_at       | TIMESTAMP| Date de création                         |
| updated_at       | TIMESTAMP| Date de mise à jour                      |

**Relation :**
- Un **livre** peut avoir plusieurs **avis**
- Un **avis** appartient à un seul **livre**

---



## 👨‍💻 Auteur

**El Hadji Abdoul Aziz Konate**  
Projet scolaire Laravel — Classe de L2 — 2025

