<?php
// Tu peux inclure d'autres éléments généraux comme le header ici.
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($title) ? $title : "Mon Site"; ?></title>
  
  <!-- Lien vers Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Lien vers ton fichier CSS personnalisé -->
  <link rel="stylesheet" href="css/header.css">
</head>
<body>

  <!-- Inclure le header (Navbar) sur chaque page -->
  <?php include('header.php'); ?>

  <!-- Contenu principal de la page -->
  <!-- <div class="container">
    <?php echo isset($content) ? $content : ""; ?>
  </div> -->

  <!-- Lien vers Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
