# vehicle_reservation_management
nom entreprise : ChauffeurGO


Réalisation du projet 
 


✅ Étape 1 : Définir le Contexte du Projet
🎯 Objectif

Permettre à un client de réserver un véhicule avec chauffeur (VTC) via une interface web simple.
Les prestataires (chauffeurs) auront leurs véhicules enregistrés, que les clients pourront réserver selon disponibilité.

✅ Étape 2 : Problématique

Comment améliorer la gestion des réservations VTC en permettant une interface simple pour choisir un véhicule et réserver un chauffeur ?

✅ Étape 3 : État des lieux

Actuellement, les réservations VTC peuvent se faire via téléphone ou email. Pas d’outil centralisé permettant de visualiser en temps réel :

Les véhicules disponibles

Les créneaux horaires

L’historique des réservations

✅ Étape 4 : Solution

Mettre en place une application web MVC avec :

Un formulaire de réservation (client)

Un système d’affichage des chauffeurs disponibles

Une base de données centralisée

Une interface responsive avec Bootstrap

✅ Étape 5 : Conception Technique
📘 MCD (Modèle Conceptuel de Données)

On part sur 2 tables principales (minimum requis) :


-Client

         id

         nom

         prénom

         email

         téléphone



-Réservation


         id

         id_client

         id_vehicule

         date_heure

         statut (en attente, confirmée, annulée)

📗 MPD (Modèle Physique de Données)

CREATE TABLE client (
id INT PRIMARY KEY AUTO_INCREMENT,
nom VARCHAR(100),
prenom VARCHAR(100),
email VARCHAR(100),
telephone VARCHAR(15)
);

CREATE TABLE chauffeur (
id INT PRIMARY KEY AUTO_INCREMENT,
nom VARCHAR(100),
prenom VARCHAR(100),
experience VARCHAR(255)
);

CREATE TABLE vehicule (
id INT PRIMARY KEY AUTO_INCREMENT,
marque VARCHAR(100),
modele VARCHAR(100),
type VARCHAR(50),
id_chaueur INT,
disponible BOOLEAN DEFAULT TRUE,
FOREIGN KEY (id_chaueur) REFERENCES chaueur(id)
);

CREATE TABLE reservation (
id INT PRIMARY KEY AUTO_INCREMENT,
id_client INT,
id_vehicule INT,
date_heure DATETIME,
statut VARCHAR(50) DEFAULT 'en attente',
FOREIGN KEY (id_client) REFERENCES client(id),
FOREIGN KEY (id_vehicule) REFERENCES vehicule(id)
);


Cas d’utilisation (Use Case)

Acteurs : -Client
          -Système

Cas d'utilisation :

                    Créer une réservation

                    Voir les véhicules disponibles

                    Confirmer la réservation

                    Explication :

Boucle PHP : On récupère toutes les options dans la table options et on génère dynamiquement une case à cocher (<input type="checkbox">) pour chaque option disponible.

name="options[]" : Cela permet de récupérer toutes les options sélectionnées sous forme de tableau (par exemple $_POST['options'] = [1, 2] si l'utilisateur a choisi "Bagages" et "Animaux").

Valeur de l'option (value) : La valeur de chaque case à cocher est l'id_option de la table options, ce qui permet de savoir exactement quelle option a été choisie.

4. Récupérer et insérer les options sélectionnées dans reservation.php

Dans ton fichier reservation.php, il faut récupérer les options sélectionnées et les insérer dans la table de liaison reservation_options.

Insertion de la réservation : La réservation est d'abord insérée dans la table reservation.

Récupérer l'ID de la réservation : Après avoir inséré la réservation, on récupère l'ID de la réservation nouvellement insérée grâce à mysqli_insert_id($conn).

Insertion des options dans reservation_options : Pour chaque option sélectionnée (les IDs récupérés via $_POST['options']), on insère une ligne dans la table reservation_options, qui fait le lien entre la réservation et l'option.




---

# 📘 Documentation – Structure et bonnes pratiques du projet `vehicle_reservation_management`

---

## ⚙️ Inclusion des fichiers PHP

Toujours utiliser `__DIR__` pour référencer des chemins de manière fiable, quel que soit l’emplacement du fichier appelant :

```php
require_once(__DIR__ . '/../include/base.php');
```

---

## 🌐 Chemins des ressources (CSS, JS, images)

### Définition de la constante `BASE_URL`

Définir cette constante dans `include/base.php` pour centraliser la racine du projet dans les chemins publics :

```php
define('BASE_URL', '/vehicle_reservation_management');
```

### Utilisation recommandée dans les fichiers `.php`

* **CSS** :

```php
<link rel="stylesheet" href="<?= BASE_URL ?>/css/header.css">
```

* **Images** :

```php
<img src="<?= BASE_URL ?>/images/.png" alt="">
```

* **JavaScript** :

```php
<script src="<?= BASE_URL ?>/js/app.js"></script>  (si on avait du js personnaliser)
```

* **Formulaires** :

```php
<form action="<?= BASE_URL ?>/controller/reservation.php" method="POST">
```

---

## 📥 Organisation des fichiers PHP

| Dossier      | Contenu                                                                                                                              |
| ------------ | ------------------------------------------------------------------------------------------------------------------------------------ |
| `/include/`  | Fichiers partagés entre plusieurs pages (base de données, layout HTML, pied de page, fonctions utilitaires, etc.)                    |
| `/page/`     | Pages visibles dans le navigateur, accessibles via l’URL. Contiennent la logique d'affichage.                                        |
| `/controller/` | Scripts appelés lors de soumissions de formulaires ou d’actions utilisateur (POST/GET). Ne doivent généralement pas générer de HTML. |
`/CSS/` Scripts CSS
`/images/` images uiliser
---

## ✅ Exemple de page bien structurée : `booking-form.php`

```php
<?php
require_once(__DIR__ . '/../include/base.php');
require_once(__DIR__ . '/../include/layout.php');
?>

<div class="container mt-5">
  <h2>Réserver un trajet</h2>
  <form action="<?= BASE_URL ?>/controller/reservation.php" method="POST">
    <!-- Champs du formulaire -->
    <button type="submit" class="btn btn-primary">Réserver</button>
  </form>
</div>

<?php include(__DIR__ . '/../include/footer.php'); ?>
```

---

## 📦 Intégration de Bootstrap

Inclure Bootstrap CSS et JS depuis le CDN dans le layout ou directement dans les pages :

```html
<!-- Dans le <head> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Avant la fermeture du <body> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
```

---

## ⚠️ Précautions courantes

| Cas fréquent                                     | Solution recommandée                                                     |
| ------------------------------------------------ | ------------------------------------------------------------------------ |
| Chemins relatifs qui cassent (CSS, images, etc.) | Utiliser `BASE_URL` ou `asset()` pour générer des chemins absolus        |
| Fichier déplacé mais non mis à jour              | Vérifier que les `include` et `form action` pointent vers le bon fichier |
| Formulaires sans traitement visible              | S'assurer que le fichier ciblé par `action="..."` existe bien            |
| Styles Bootstrap absents                         | Vérifier que le **CDN CSS Bootstrap** est bien chargé dans le `<head>`   |

---

## 🧪 Débogage utile

* Utiliser l’outil **Inspecter > Réseau (Network)** du navigateur pour vérifier si :

  * Les fichiers CSS/JS/images sont bien chargés
  * Le formulaire est bien envoyé au bon endpoint
* Vérifier les erreurs PHP dans `/var/log/apache2/error.log` :

```bash
sudo tail -n 20 /var/log/apache2/error.log
```

---

## ✅ Résultat attendu

Une application PHP structurée, modulaire, lisible, avec des chemins stables pour les ressources, des includes fiables, et une séparation claire entre affichage (`/page/`) et logique (`/controller/`).

---

