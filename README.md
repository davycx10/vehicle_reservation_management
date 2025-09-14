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

Un système d’affichage des véhicules disponibles

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


-Véhicule


         id

         marque

         modèle

         type (berline, van, etc.)

         chauffeur (nom ou id chauffeur)

         disponibilité (booléen ou créneau horaire)


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

CREATE TABLE vehicule (
    id INT PRIMARY KEY AUTO_INCREMENT,
    marque VARCHAR(100),
    modele VARCHAR(100),
    type VARCHAR(50),
    chauffeur VARCHAR(100),
    disponible BOOLEAN DEFAULT TRUE
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