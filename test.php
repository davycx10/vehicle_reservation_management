<div class="mb-3">
  <label for="options" class="form-label">Options supplémentaires</label>
  <div class="form-check">
    <?php
    // Connexion à la base de données
   

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
