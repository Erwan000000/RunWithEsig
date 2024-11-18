<!doctype html>
<html>
  <head><link rel="stylesheet" href="connecte.css">
    <meta charset="utf-8">
  </head>

  <body> 
    <?php
            
            $titre = "Accueil";

            include('header.inc.php');

            include('menuconnecte.php');

            include('message.inc.php');

            session_start();

            //pour que le message d'inscription s'affiche sur la page index.php

            if (isset($_SESSION['connexion_reussie']) && $_SESSION['connexion_reussie'] === true) {
              echo '<div class="alert alert-success" role="alert">
                      Connexion réussie ! Bienvenue sur RunWithESIG !
                    </div>';
              unset($_SESSION['connexion_reussie']); // Supprime la variable de session après l'affichage
              
          }
          
            ?>
            

            <h1 id="titre">Bienvenu cher Sportifs!</h1>

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
</div>



<h2 id="Entrainement">Entrainements Proposés</h2>

<div class="card mb-3">
  <img src="randonnée.jpg" class="card-img-top" alt="...">
  <div class="card-body">

  <div class="card-body" style="border: 5px solid #ddd; border-radius: 10px; padding: 20px; background-color: #f9f9f9; border-radius : 20px;">

    <h5 class="card-title">Description:</h5>
<div class="card-text">
    <p><strong>Évasion Naturelle - Randonnée Forêt et Détente</strong></p>
    <p>Préparez-vous à un voyage au cœur de la nature où chaque pas vous emmènera plus loin dans la tranquillité et l'aventure ! Cette randonnée en forêt est une immersion totale dans un environnement verdoyant, loin des écrans et du stress du quotidien. Idéale pour se ressourcer, cette sortie vous permettra de profiter des charmes d'une forêt ancienne, avec ses arbres majestueux et ses ruisseaux chantants. Au fil du parcours, nous prendrons des pauses pour admirer des panoramas uniques, respirer l'air pur et échanger nos impressions. C'est aussi une excellente occasion de rencontrer des personnes partageant votre amour de la nature et du dépassement de soi.</p>

    <p>Cette randonnée est accessible à tous les niveaux et vous invite à écouter les sons de la forêt, à observer la faune discrète qui habite ce lieu, et à vous reconnecter avec les éléments naturels. Le trajet inclura des passages tantôt faciles, tantôt un peu plus exigeants, mais toujours adaptés au groupe. À la fin de la marche, nous prendrons un moment de relaxation, parfait pour savourer un encas et partager nos ressentis sur cette expérience revitalisante.</p>

    <p><strong>Catégorie :</strong> Randonnée Pédestre en Milieu Forestier</p>
    <p><strong>Date et Horaire :</strong> Dimanche 24 novembre 2024, départ à 08:30. Prévoir un retour vers 16:00.</p>
    <p><strong>Parcours :</strong> Le parcours total est d'environ 12 kilomètres, avec une difficulté modérée. Nous ferons plusieurs arrêts pour admirer les points de vue et pour se reposer. Une carte du parcours est disponible en fichier image pour guider les participants et permettre une navigation sécurisée.</p>

    <p><strong>Équipement Recommandé :</strong></p>
    <ul>
        <li>Chaussures de randonnée confortables</li>
        <li>Bouteille d’eau (minimum 1,5 L)</li>
        <li>Collation énergétique</li>
        <li>Coupe-vent ou veste imperméable</li>
        <li>Appareil photo ou smartphone pour capturer les paysages (facultatif)</li>
    </ul>

    <p><strong>Nombre maximum de participants :</strong> 20 (afin de favoriser une ambiance conviviale et permettre une meilleure interaction entre les participants et l'encadrant)</p>

    <p><strong>Informations Supplémentaires :</strong></p>
    <p>Pour garantir la sécurité de chacun, un encadrant expérimenté sera présent tout au long du parcours. Cette activité est idéale pour tous ceux qui souhaitent se dépasser à leur rythme, explorer de nouveaux horizons et repartir avec un esprit léger et apaisé. Que vous soyez passionné de marche ou simple amoureux de la nature, cette journée sera une véritable bouffée d’oxygène.</p>

    <p><strong>Bonus :</strong> Détails sur les Points de Vue et Faune Locale</p>
    <p>Au fil de la randonnée, vous aurez l'opportunité de découvrir quelques points d’observation connus pour leur beauté. Nous pourrons apercevoir certaines espèces animales si la chance est de notre côté, comme des écureuils, des oiseaux rares, et même des cerfs en fonction de la saison.</p>
  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
  </div>
</div>


<div class="card mb-3">
  <img src="Endurance.webp" class="card-img-top" alt="...">
  <div class="card-body">

  <div class="card-body" style="border: 5px solid #ddd; border-radius: 10px; padding: 20px; background-color: #f9f9f9; border-radius : 20px;">
    <h5 class="card-title">Description:</h5>

    <div class="card-text">
    <p><strong>Endurance et Vitalité - Entraînement sur la Plage</strong></p>
    
    <p>Rejoignez-nous pour un entraînement intense et revigorant sur le sable fin de la plage ! Cet exercice d'endurance en plein air vous permettra de travailler votre forme physique tout en profitant de l'air marin. Le cadre naturel et apaisant de la mer vous aidera à vous déconnecter du quotidien et à vous concentrer sur vos objectifs. Idéal pour renforcer le cardio, améliorer l'endurance musculaire, et brûler des calories, cet entraînement est conçu pour tous les niveaux, avec des exercices adaptés à chacun.</p>
    
    <p><strong>Catégorie :</strong> Entraînement d’Endurance en Plein Air</p>
    <p><strong>Date et Horaire :</strong> Samedi 30 novembre 2024, début à 09:00</p>
    
    <p><strong>Parcours :</strong> Le circuit inclut des exercices de course sur sable, des montées de dune, et des exercices fonctionnels utilisant le poids du corps. Une carte de la zone d’entraînement sera fournie sous forme de fichier image pour garantir une navigation sécurisée.</p>
    
    <p><strong>Équipement Recommandé :</strong></p>
    <ul>
        <li>Chaussures adaptées au sable ou pieds nus (selon préférence)</li>
        <li>Bouteille d’eau (minimum 1 L)</li>
        <li>Vêtements de sport légers</li>
        <li>Crème solaire et casquette pour se protéger du soleil</li>
        <li>Serviette et vêtements de rechange</li>
    </ul>
    
    <p><strong>Nombre maximum de participants :</strong> 15 (pour un encadrement personnalisé et une meilleure dynamique de groupe)</p>

    <p><strong>Informations Supplémentaires :</strong></p>
    <p>Un coach expérimenté en entraînement de plein air encadrera cette session et vous guidera à chaque étape pour atteindre vos objectifs. Cette séance est l’occasion de vous dépasser dans un cadre naturel inspirant, tout en profitant des bienfaits de l’air marin et de la beauté de la plage.</p>
    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
  </div>
</div>

<div class="card mb-3">
  <img src="Sprint.jpg" class="card-img-top" alt="...">

  <div class="card-body" style="border: 5px solid #ddd; border-radius: 10px; padding: 20px; background-color: #f9f9f9; border-radius : 20px;">
    <h5 class="card-title" style="font-size: 1.5em; font-weight: bold; color: #333;">Description:</h5>
    
    <div class="card-text">
    <p><strong>Puissance et Vitesse - Entraînement de Sprint</strong></p>
    
    <p>Préparez-vous à tester vos limites et à développer votre vitesse avec un entraînement de sprint intense ! Cette séance, conçue pour améliorer votre explosivité et votre capacité d'accélération, se déroule sur un terrain dégagé idéal pour le sprint. Vous apprendrez les techniques de départ et de course pour maximiser vos performances tout en renforçant votre endurance et votre agilité. Un excellent exercice pour brûler des calories rapidement et travailler tout le corps !</p>
    
    <p><strong>Catégorie :</strong> Entraînement de Sprint et Explosivité</p>
    <p><strong>Date et Horaire :</strong> Mercredi 27 novembre 2024, début à 18:00</p>
    
    <p><strong>Parcours :</strong> Le parcours est divisé en plusieurs segments pour des sprints de 30, 50 et 100 mètres, avec des pauses de récupération entre chaque série. Une carte d’entraînement est fournie en fichier image pour visualiser les segments et zones de repos.</p>
    
    <p><strong>Équipement Recommandé :</strong></p>
    <ul>
        <li>Chaussures de course adaptées</li>
        <li>Vêtements de sport légers et respirants</li>
        <li>Bouteille d’eau (minimum 1 L)</li>
        <li>Montre ou chronomètre pour suivre vos temps de sprint</li>
        <li>Serviette et vêtements de rechange</li>
    </ul>
    
    <p><strong>Nombre maximum de participants :</strong> 10 (pour garantir un suivi personnalisé et de la sécurité lors des sprints)</p>

    <p><strong>Informations Supplémentaires :</strong></p>
    <p>Chaque participant sera guidé par un coach spécialisé en entraînement de sprint et explosivité. Cette session est idéale pour les athlètes ou amateurs souhaitant améliorer leur vitesse et leur technique de course, tout en profitant d'une atmosphère dynamique et motivante.</p>
</div>

    <p class="card-text" style="font-size: 0.9em; color: #999;">
        <small class="text-body-secondary">Last updated 3 mins ago</small>
    </p>
</div>


</div>

<div class="card mb-3">
  <img src="Marche.jpg" class="card-img-top" alt="...">
  <div class="card-body">

  <div class="card-body" style="border: 5px solid #ddd; border-radius: 10px; padding: 20px; background-color: #f9f9f9; border-radius : 20px;">
    <h5 class="card-title">Description:</h5>
    <div class="card-text">
    <p><strong>Endurance et Technique - Entraînement de Marche Athlétique</strong></p>
    
    <p>Venez découvrir ou perfectionner l’art de la marche athlétique, une discipline qui combine rapidité, endurance et technique ! Cet entraînement est idéal pour améliorer votre forme cardiovasculaire tout en renforçant vos muscles. Adaptée à tous les niveaux, cette séance vous permettra de travailler votre posture, votre foulée et votre endurance, dans un cadre agréable et dynamique. Chaque participant bénéficiera de conseils techniques pour progresser efficacement et sans risque de blessure.</p>
    
    <p><strong>Catégorie :</strong> Entraînement de Marche Athlétique</p>
    <p><strong>Date et Horaire :</strong> Lundi 25 novembre 2024, début à 17:30</p>
    
    <p><strong>Parcours :</strong> Un circuit de 5 km en boucle, comprenant des segments chronométrés pour évaluer la progression de chaque participant. Une carte du parcours est fournie en fichier image pour faciliter l’orientation et la gestion des pauses.</p>
    
    <p><strong>Équipement Recommandé :</strong></p>
    <ul>
        <li>Chaussures de marche légères et stables</li>
        <li>Vêtements respirants et confortables</li>
        <li>Bouteille d’eau (minimum 1 L)</li>
        <li>Montre ou application de suivi pour mesurer la distance et le rythme</li>
        <li>Serviette et vêtements de rechange</li>
    </ul>
    
    <p><strong>Nombre maximum de participants :</strong> 12 (pour permettre un encadrement individualisé et des conseils techniques pour chacun)</p>

    <p><strong>Informations Supplémentaires :</strong></p>
    <p>Un coach expérimenté en marche athlétique encadrera cette session, en se concentrant sur la technique et l’amélioration de la vitesse. Que vous soyez débutant ou pratiquant avancé, cette séance est conçue pour améliorer vos compétences en marche athlétique et vous apporter un entraînement stimulant et accessible à tous.</p>

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