<?php
require_once("base.php");
session_start();

// Inclure le layout global
include('layout.php');

?>


<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réserver un trajet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <div class="container mt-5">
    <h2>Réserver un trajet</h2>
    <form action="reservation.php" method="POST">

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
require_once("base.php");

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
        <label class="form-label">Options supplémentaires</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="bagages" id="bagages">
          <label class="form-check-label" for="bagages">Bagages</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="animaux" id="animaux">
          <label class="form-check-label" for="animaux">Animaux</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="siege_enfant" id="siege_enfant">
          <label class="form-check-label" for="siege_enfant">Siège enfant</label>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
