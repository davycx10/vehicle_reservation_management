<?php
// Récupérer les options sélectionnées
$options = isset($_POST['options']) ? $_POST['options'] : [];

// Récupérer les autres informations du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$datetime = $_POST['datetime'];
$id_chauffeur = $_POST['id_chauffeur'];
$lieu_depart = $_POST['lieu_depart'];
$lieu_arrive = $_POST['lieu_arrive'];

// Insérer la réservation dans la table `reservation`
$query = "INSERT INTO reservation (id_client, id_chauffeur, date_heure, lieu_depart, lieu_arrive, status)
          VALUES (?, ?, ?, ?, ?, 'réservé')";

$stmt = mysqli_prepare($conn, $query);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'iisss', $id_client, $id_chauffeur, $datetime, $lieu_depart, $lieu_arrive);
    if (mysqli_stmt_execute($stmt)) {
        // Récupérer l'ID de la réservation insérée
        $id_reservation = mysqli_insert_id($conn);

        // Insérer les options sélectionnées dans `reservation_options`
        foreach ($options as $id_option) {
            $query_option = "INSERT INTO reservation_options (id_reservation, id_option) VALUES (?, ?)";
            $stmt_option = mysqli_prepare($conn, $query_option);
            if ($stmt_option) {
                mysqli_stmt_bind_param($stmt_option, 'ii', $id_reservation, $id_option);
                mysqli_stmt_execute($stmt_option);
                mysqli_stmt_close($stmt_option);
            }
        }
        echo "Réservation réussie !";
    } else {
        echo "Erreur lors de la réservation : " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Erreur : " . mysqli_error($conn);
}

// Fermeture de la connexion
mysqli_close($conn);
?>

