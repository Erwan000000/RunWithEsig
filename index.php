<!doctype html>
<html>
  <head><link rel="stylesheet" href="index.css">
    <meta charset="utf-8">
  </head>

  <body> 
    <?php
            session_start();
            
            $titre = "Accueil";

            include('header.inc.php');

            include('menu.inc.php');

            include('message.inc.php');

            // Vérifier s'il y a un message de déconnexion
            if (isset($_SESSION['logout_message'])) {
                echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['logout_message']) . '</div>';
                // Supprimer le message après l'avoir affiché
                unset($_SESSION['logout_message']);
            }
  
            //pour que le message d'inscription s'affiche sur la page index.php

            if (isset($_SESSION['connexion_reussie']) && $_SESSION['connexion_reussie'] === true) {
              echo '<div class="alert alert-success" role="alert">
                      Connexion réussie ! Bienvenue sur RunWithESIG !
                    </div>';
              unset($_SESSION['connexion_reussie']); // Supprime la variable de session après l'affichage
          }

            if (isset($_SESSION['inscription_reussie']) && $_SESSION['inscription_reussie'] === true) {
              echo '<div class="alert alert-success" role="alert">
                      Inscription réussie ! Bienvenue sur RunWithESIG !
                    </div>';
              unset($_SESSION['inscription_reussie']); // Supprime la variable de session après l'affichage
          }
          
          
          if (isset($_SESSION['message'])) { 
              echo $_SESSION['message'];
              unset($_SESSION['message']); // Supprime la variable de session après l'affichage
          }





            ?>
            
            <h1 id="titre">#ASOS RunWithESIG#</h1>

            <?php

            include('footer.inc.php');

    ?>
  </body>

  
  <style>
  .carousel-image {
    height: 400px;
    object-fit: cover; /* Pour que l'image s'ajuste sans déformation */
  }
  </style>

<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="r3.png" class="d-block w-100 carousel-image" alt="...">
    </div>
    <div class="carousel-item">
      <img src="r4.jpg" class="d-block w-100 carousel-image" alt="...">
    </div>
    <div class="carousel-item">
      <img src="r7.jpeg" class="d-block w-100 carousel-image" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<h2 id="Entrainement">Entrainements Proposés</h2>

<div class="card mb-3">
  <img src="randonnée.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Description:</h5>
    <p class="card-text">Évadez-vous en pleine nature avec la randonnée, une aventure où chaque pas vous rapproche de la liberté! Prenez le temps de respirer, d'explorer et de vous reconnecter avec l'essentiel, tout en découvrant des paysages époustouflants. Que vous marchiez en forêt, en montagne ou le long de la côte, la randonnée est l'occasion de vous dépasser à votre rythme, loin du stress quotidien. Venez vivre l’expérience, décompressez, et laissez la nature vous revitaliser. Préparez vos chaussures, le chemin vous attend!</p>
    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
  </div>
</div>

<div class="card mb-3">
  <img src="Endurance.webp" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Description:</h5>
    <p class="card-text">Faites de la distance votre alliée avec la course d'endurance, un véritable test de persévérance et de mental d'acier! Kilomètre après kilomètre, trouvez votre rythme, repoussez vos limites, et ressentez la satisfaction unique de franchir chaque palier d'effort. La course d'endurance, c'est bien plus que de la vitesse : c'est un voyage intérieur où le dépassement de soi règne en maître. Que vous visiez un semi-marathon ou un ultra-trail, chaque course est une victoire. Prêt à conquérir la distance? Lacez vos chaussures et partez à la conquête de l'infini!</p>
    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
  </div>
</div>

<div class="card mb-3">
  <img src="Sprint.jpg" class="card-img-top" alt="...">

  <div class="card-body" style="border: 5px solid #ddd; border-radius: 10px; padding: 20px; background-color: #f9f9f9; border-radius : 20px;">
    <h5 class="card-title" style="font-size: 1.5em; font-weight: bold; color: #333;">Description:</h5>
    <p class="card-text" style="font-size: 1.1em; line-height: 1.6; color: #555;">
        Vivez l'adrénaline pure avec le sprint, l'épreuve ultime de vitesse et de puissance ! En quelques secondes, libérez toute votre énergie pour atteindre votre vitesse maximale et franchir la ligne d'arrivée en un éclair. Chaque foulée compte, chaque milliseconde est précieuse. Le sprint, c'est l'explosion d'effort et la maîtrise parfaite du corps, le tout à une vitesse fulgurante. Vous êtes prêt à défier le chronomètre et à ressentir la poussée d'adrénaline ? Faites du sprint votre terrain de jeu et devenez le plus rapide !
    </p>
    <p class="card-text" style="font-size: 0.9em; color: #999;">
        <small class="text-body-secondary">Last updated 3 mins ago</small>
    </p>
</div>


</div>

<div class="card mb-3">
  <img src="Marche.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Description:</h5>
    <p class="card-text">Découvrez la marche athlétique, un sport d'endurance alliant vitesse et technique! Enchaînez les kilomètres avec puissance, tout en respectant l'art du mouvement parfait : toujours un pied en contact avec le sol, pour une performance fluide et élégante. Un défi unique pour votre corps et votre esprit, où chaque pas vous rapproche de la victoire. Relevez le défi de la marche athlétique et franchissez la ligne d'arrivée avec fierté! Prêt à marcher vers vos limites?</p>
    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
  </div>
</div>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer RunWithEsig</title>
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style du pied de page */
        .footer {
            background-color: #b2b2b2;
            color: white;
            padding: 20px 0;
        }
        .footer a {
            color: white;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .footer hr {
            border-top: 1px solid white;
            margin: 15px 0;
        }
        .footer-bottom {
            font-size: 0.8rem;
            padding-top: 10px;
        }
    </style>
</head>
<body>

<!-- Pied de page -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <!-- Section "Notre application" -->
            <div class="col-md-4 text-center text-md-start">
                <h6>Notre application</h6>
                <p>FRANCE <img src="https://upload.wikimedia.org/wikipedia/en/c/c3/Flag_of_France.svg" alt="Drapeau France" width="40"></p>
            </div>
            <!-- Section "Notre Entreprise" -->
            <div class="col-md-4 text-center text-md-start">
                <h6>Notre Entreprise</h6>
                <ul class="list-unstyled">
                    <li><a href="#">Qui sommes-nous?</a></li>
                    <li><a href="#">Nos magasins</a></li>
                    <li><a href="#">Recrutement</a></li>
                    <li><a href="#">Presse et actualité</a></li>
                    <li><a href="#">La vie de nos produits</a></li>
                    <li><a href="#">Engagements durables</a></li>
                    <li><a href="#">Fondation RunWithEsig</a></li>
                    <li><a href="#">Normandie</a></li>
                </ul>
            </div>
            <!-- Section "Besoin d'aide?" -->
            <div class="col-md-4 text-center text-md-start">
                <h6>Besoin d'aide?</h6>
                <ul class="list-unstyled">
                    <li><a href="#">Moyen de paiement</a></li>
                    <li><a href="#">Programme de fidélité</a></li>
                    <li><a href="#">Comment choisir votre entraînement</a></li>
                    <li><a href="#">Tendances sportives</a></li>
                    <li><a href="#">Moyen de paiement</a></li>
                    <li><a href="#">Découvrir la plateforme</a></li>
                </ul>
            </div>
        </div>

        <!-- Ligne de séparation -->
        <hr>

        <!-- Bas de page avec texte et liens -->
        <div class="row footer-bottom text-center">
            <div class="col-12">
                <p>RunWithEsig 2025</p>
                <a href="#">Transparence classement des produits</a> |
                <a href="#">Conditions générales</a> |
                <a href="#">Mentions légales</a> |
                <a href="#">Données personnelles</a>
            </div>
        </div>
    </div>
</footer>

<!-- Script Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</html>