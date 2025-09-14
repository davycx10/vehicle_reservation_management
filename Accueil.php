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
  <title>ChauffeurGO - Transport Urgent et Sur-Mesure</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/footer.css">
</head>

<body>

  <!-- Section "Bienvenue" -->
  <section id="welcome" class="text-center py-5">
    <div class="container">
      <h1 class="display-4">Bienvenue chez ChauffeurGO</h1>
      <p class="lead">Votre service de transport privé pour tous vos besoins urgents et sur-mesure.</p>
    </div>
  </section>

  <!-- Section "Notre Histoire" -->
  <section id="about" class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2>Notre Histoire</h2>
          <p>ChauffeurGO a vu le jour en 2022, fondé par un groupe d'entrepreneurs passionnés par la mobilité urbaine et la réactivité en matière de transport. L’idée est née d’une frustration commune : dans un monde où l’imprévu est monnaie courante, pourquoi les services de transport privés ne seraient-ils pas aussi rapides que les besoins qui surgissent ?</p>
          <p>Nous nous engageons à répondre à vos besoins de transport de manière rapide, efficace et professionnelle. Disponible 24/7, ChauffeurGO est votre solution pour tous vos déplacements urgents ou de dernière minute.</p>
        </div>
        <div class="col-md-6">
          <img src="images/pinguin_team.png" class="img-fluid rounded" alt="Notre Histoire">
        </div>
      </div>
    </div>
  </section>

  <!-- Section "Nos Services" -->
  <section id="services" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Nos Services</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <img src="images/transport.gif" class="card-img-top" alt="Transport Urgent">
            <div class="card-body">
              <h5 class="card-title">Transport Urgent</h5>
              <p class="card-text">Réservez un taxi rapidement, à toute heure, pour vos besoins urgents. Nous intervenons immédiatement.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="images/service.gif" class="card-img-top" alt="Service Entreprise">
            <div class="card-body">
              <h5 class="card-title">Service Entreprise</h5>
              <p class="card-text">Réservez un chauffeur pour vos déplacements professionnels. Nous vous garantissons ponctualité et confort.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="images/reserv.gif" class="card-img-top" alt="Réservation Last-Minute">
            <div class="card-body">
              <h5 class="card-title">Réservation Last-Minute</h5>
              <p class="card-text">Besoin d'un taxi de dernière minute ? ChauffeurGO est là pour vous, à toute heure de la journée ou de la nuit.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section "Pourquoi Choisir ChauffeurGO" -->
  <section id="whyus" class="bg-primary text-white py-5">
    <div class="container text-center">
      <h2>Pourquoi Choisir ChauffeurGO ?</h2>
      <ul class="list-unstyled">
        <li><strong>Ponctualité</strong> : Nous respectons toujours nos engagements de temps.</li>
        <li><strong>Disponibilité 24/7</strong> : Nous sommes là quand vous avez besoin de nous.</li>
        <li><strong>Chauffeurs Professionnels</strong> : Nos chauffeurs sont formés pour garantir votre confort et votre sécurité.</li>
        <li><strong>Réservation Facile</strong> : Réservez votre taxi en quelques clics grâce à notre plateforme intuitive.</li>
      </ul>
    </div>
  </section>

  <!-- Section "Réservez Maintenant" -->
  <section id="book" class="py-5 text-center">
    <div class="container">
      <h2 class="display-4">Réservez votre chauffeur maintenant</h2>
      <p>Ne perdez plus de temps à chercher un taxi. Réservez en quelques clics et soyez sûr d’arriver à destination en toute sécurité.</p>
      <a href="booking-form.php" class="btn btn-danger btn-lg">Réservez Maintenant</a>
    </div>
  </section>

  <!-- Footer -->


    <?php
        // Inclure le footer
        include('footer.php');
    ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
