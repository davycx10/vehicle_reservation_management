<?php

// Connexion à MySQL (adapté pour phpMyAdmin en local : root sans mot de passe)

require_once("base.php");
session_start();

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$date_heure = $_POST['datetime'];
$id_chauffeur = $_POST['chauffeur'];

// Étape 1 : insérer le client (ou vérifier s'il existe déjà)
$sql_client = "INSERT INTO client (nom, prenom, telephone, email) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql_client);
$stmt->bind_param("ssss", $nom, $prenom, $telephone, $email);
$stmt->execute();

// Récupérer l'id du client inséré
$id_client = $stmt->insert_id;

// Étape 2 : insérer la réservation
$sql_reservation = "INSERT INTO reservation (id_client, id_chauffeur, date_heure, status) VALUES (?,?,?,?)";
$stmt2 = $conn->prepare($sql_reservation);
$status = "réservé";
$stmt2->bind_param("iiss", $id_client, $id_chauffeur, $date_heure, $status);

if ($stmt2->execute()) {
    echo "<h3>✅ Réservation enregistrée avec succès !</h3>";
} else {
    echo "Erreur: " . $stmt2->error;
}

$conn->close();
?>
