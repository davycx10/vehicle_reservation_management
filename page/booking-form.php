<?php
require_once __DIR__ . '/../include/base.php';
session_start();

// Inclure le layout global
include(__DIR__ . '/../include/layout.php');

?>


<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réservation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/header.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/footer.css">
</head>

<body>

  <div class="container mt-5">
    <h2>Réserver un trajet</h2>
    <form action="<?= BASE_URL ?>/controller/reservation.php" method="POST">

      <!-- Infos du client -->
      <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
      </div>

      <div class="mb-3">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" required>
      </div>
      
      <div class="mb-3">
        <label for="telephone" class="form-label">Téléphone</label>
        <input type="text" class="form-control" id="telephone" name="telephone" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <!-- Date et heure du trajet -->
      <div class="mb-3">
        <label for="datetime" class="form-label">Date et heure du trajet</label>
        <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
      </div>

      <div class="mb-3">
        <label for="lieu_depart" class="form-label"> Lieu de départ</label>
        <input type="text" class="form-control" id="lieu_depart" name="lieu_depart" required>
      </div>
      
      <div class="mb-3">
        <label for="lieu_arrive" class="form-label"> Lieu d'arrivé</label>
        <input type="text" class="form-control" id="arrive" name="lieu_arrive" required>
      </div>

<div class="mb-3">
  <label for="chauffeur" class="form-label">Choix du chauffeur</label>
  <select class="form-select" id="chauffeur" name="id_chauffeur">
    <option value="">Pas de préférence</option>

<?php
require_once __DIR__ . '/../include/base.php';

$result = mysqli_query($conn, "SELECT id_chauffeur, nom FROM chauffeur ORDER BY nom");

if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . htmlspecialchars($row['id_chauffeur']) . '">' . htmlspecialchars($row['nom']) . '</option>';
  }
} else {
  echo '<option disabled>Erreur : ' . htmlspecialchars(mysqli_error($conn)) . '</option>';
}
?>
  </select>
</div>

      <!-- Options supplémentaires -->
<div class="mb-3">
  <label for="options" class="form-label">Options supplémentaires</label>
  <div class="form-check">

    <?php
      require_once __DIR__ . '/../include/base.php';
   

    // Récupérer toutes les options
    $result = mysqli_query($conn, "SELECT id_option, nom FROM options");

    if ($result) {
      // Afficher chaque option comme une case à cocher
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="form-check">';
        echo '<input class="form-check-input" type="checkbox" value="' . htmlspecialchars($row['id_option']) . '" id="option' . $row['id_option'] . '" name="options[]">';
        echo '<label class="form-check-label" for="option' . $row['id_option'] . '">' . htmlspecialchars($row['nom']) . '</label>';
        echo '</div>';
      }
    } else {
      echo '<div class="form-check">Erreur : ' . htmlspecialchars(mysqli_error($conn)) . '</div>';
    }
    ?>
  </div>
</div>


      <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
  </div>


    <!-- Footer -->


    <?php
        // Inclure le footer
       include(__DIR__ . '/../include/footer.php');
    ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
