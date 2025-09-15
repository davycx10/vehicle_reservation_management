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
  <title>Nos Chauffeurs | ChauffeurGO</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/header.css">
</head>

<body>

  <!-- Header -->
  <section id="chauffeurs" class="text-center py-5">
    <div class="container">
      <h1 class="display-4">Rencontrez nos chauffeurs</h1>
      <p class="lead">Nos chauffeurs expérimentés sont là pour vous offrir un service de transport de qualité, en toute sécurité et avec le sourire.</p>
    </div>
  </section>

  <!-- Section des Chauffeurs -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <!-- Chauffeur Jean Dupont -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="<?= BASE_URL ?>/images/hel.gif" class="card-img-top" alt="Jean Dupont">
            <div class="card-body">
              <h5 class="card-title">Jean Dupont</h5>
              <h6 class="card-subtitle mb-2 text-muted">Âge : 35 ans</h6>
              <p class="card-text">Jean est chauffeur chez ChauffeurGO depuis la création de l'entreprise. Passionné par la conduite, il aime offrir un service rapide et impeccable. Il conduit une voiture de luxe Audi A6, parfaite pour les trajets d'affaires comme pour les déplacements personnels. Jean est reconnu pour sa ponctualité et son sens du service.</p>
              <ul>
                <li><strong>Véhicule :</strong> Audi A6</li>
                <li><strong>Langues parlées :</strong> Français, Anglais</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Chauffeur Marie Martin -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="<?= BASE_URL ?>/images/marie.gif" class="card-img-top" alt="Marie Martin">
            <div class="card-body">
              <h5 class="card-title">Marie Martin</h5>
              <h6 class="card-subtitle mb-2 text-muted">Âge : 28 ans</h6>
              <p class="card-text">Marie est une conductrice dynamique et passionnée par les voyages. Elle adore explorer de nouvelles routes et faire découvrir les meilleures destinations à ses passagers. Elle conduit une Tesla Model 3, un véhicule écologique qui allie confort et technologie. Marie aime rendre chaque trajet agréable et sans stress.</p>
              <ul>
                <li><strong>Véhicule :</strong> Tesla Model 3</li>
                <li><strong>Langues parlées :</strong> Français, Espagnol</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Chauffeur Ahmed Benali -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="<?= BASE_URL ?>/images/vege.png" class="card-img-top" alt="Ahmed Benali">
            <div class="card-body">
              <h5 class="card-title">Ahmed Benali</h5>
              <h6 class="card-subtitle mb-2 text-muted">Âge : 42 ans</h6>
              <p class="card-text">Ahmed est chauffeur chez ChauffeurGO depuis la création de l'entreprise. Avec son expérience, il connaît parfaitement la ville et peut naviguer rapidement dans les zones les plus congestionnées. Il est à l'aise avec tous types de clients et sait offrir un service sur-mesure. Ahmed conduit un Mercedes Classe E, un modèle haut de gamme offrant confort et sécurité.</p>
              <ul>
                <li><strong>Véhicule :</strong> Mercedes Classe E</li>
                <li><strong>Langues parlées :</strong> Français, Arabe</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Chauffeur Sophie Leroy -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="<?= BASE_URL ?>/images/sophie.gif" class="card-img-top" alt="Sophie Leroy">
            <div class="card-body">
              <h5 class="card-title">Sophie Leroy</h5>
              <h6 class="card-subtitle mb-2 text-muted">Âge : 30 ans</h6>
              <p class="card-text">Sophie est une chauffesse passionnée par le service client. Elle a un véritable don pour rendre les trajets agréables grâce à ses discussions intéressantes et à son sourire. Sophie conduit un SUV Volvo XC60, idéal pour les trajets en famille ou pour les clients qui souhaitent un peu plus d’espace.</p>
              <ul>
                <li><strong>Véhicule :</strong> Volvo XC60</li>
                <li><strong>Langues parlées :</strong> Français, Allemand</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Chauffeur Karim Zidane -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="<?= BASE_URL ?>/images/zidane.png" class="card-img-top" alt="Karim Zidane">
            <div class="card-body">
              <h5 class="card-title">Karim Zidane</h5>
              <h6 class="card-subtitle mb-2 text-muted">Âge : 38 ans</h6>
              <p class="card-text">Karim est un chauffeur très apprécié pour son professionnalisme et son écoute. Il prend à cœur de répondre à chaque demande de ses passagers. Karim conduit une BMW Série 5, un modèle élégant et performant qui garantit un confort optimal pour les longs trajets. Il est toujours prêt à offrir des services supplémentaires pour rendre votre expérience unique.</p>
              <ul>
                <li><strong>Véhicule :</strong> BMW Série 5</li>
                <li><strong>Langues parlées :</strong> Français, Arabe, Anglais</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->


    <?php
        // Inclure le footer
        include(__DIR__ . '/../include/footer.php');
    ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
