<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Navbar Bootstrap</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Style pour une barre de navigation compacte et élégante */
    .navbar {
      padding: 0.5rem 1rem;
    }
    .navbar-brand {
      font-weight: bold;
      padding-right: 15px;
    }
    .navbar-nav .nav-item .nav-link {
      padding: 8px 12px; /* Réduction des paddings pour compacter les liens */
      font-size: 0.95rem; /* Légère réduction de la taille de police */
      color: #ffffff;
    }
    .navbar-nav {
      gap: 8px; /* Espacement uniforme entre les liens */
    }
    .navbar-dark .nav-link:hover {
      color: #adb5bd; /* Couleur de survol pour les liens */
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom border-body">
    <div class="container">
      <a class="navbar-brand" href="index.php">#RunWithEsig#</a>
      
      <!-- Bouton pour mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Contenu de la navbar -->
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="ajouter_entrainement.php">Ajouter Entrainement</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="consulterentrainementmembre.php">Consulter Entrainement</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="listeinscrit.php">Liste des Inscrits</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="supprimer_entrainement.php">Annuler un entrainement</a>
          </li>

          <li class="nav-item">
                    <a class="nav-link" href="deconnexion.php">Déconnexion</a>
          </li>
         <!-- mis en commentaire pour faire disparaire connecte du menu
           <li class="nav-item">
            <a class="nav-link" href="connecte.php">connecte</a>
          </li> -->
          
          
         
        </ul>
      </div>
    </div>
  </nav>

  

  <!-- Bootstrap JS et Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
