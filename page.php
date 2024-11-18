<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="page.css" rel="stylesheet">
    <title>Membre Asos</title>
</head>


<style>
    .carousel-image {
        height: 400px;
        object-fit: cover; /* Pour que l'image s'ajuste sans déformation */
    }
</style>
<?php
include('menuMembre.php');
?>

<?php
session_start();
$titre = "Membre Asos";
include('header.inc.php');


if (isset($_SESSION['connexion_reussie']) && $_SESSION['connexion_reussie'] === true) {
    echo '<div class="alert alert-success" role="alert">
            Connexion réussie ! Bienvenue sur RunWithESIG !
          </div>';
    unset($_SESSION['connexion_reussie']); // Supprime la variable de session après l'affichage
}
?>

<?php
if (isset($_SESSION['message'])) { 
    echo $_SESSION['message'];
    unset($_SESSION['message']); // Supprime la variable de session après l'affichage
}
?>
<?php
if (isset($_SESSION['message'])) { 
    echo $_SESSION['message'];
    unset($_SESSION['message']); // Supprime la variable de session après l'affichage
}
?>



<!-- Contenu de la page -->
<div class="container mt-4">
    <?php
    // Vérifiez la section actuelle
    if (isset($_GET['section'])) {
        switch ($_GET['section']) {
            


            case 'consulter':
                echo '<h2>Consulter les Entrainements</h2>';
                // Ajoutez ici le code pour consulter les entraînements
                break;

            case 'promouvoir':
                echo '<h2>Promouvoir un inscrit</h2>';
                // Ajoutez ici le code pour promouvoir un insclrit
                break;

            case 'annuler':
                echo '<h2>Annuler un Entrainement</h2>';
                // Ajoutez ici le code pour annuler un entraînement
                break;

            default:
                echo '<h2>Bienvenue sur la page des entrainements</h2>';
                break;
        }
    } else {
        echo '<h2 class="acceuil">#Membre de RunWithESIG#</h2>';
        // Contenu par défaut si aucune section n'est sélectionnée
    }
    ?>
</div>

<!-- Affichage du carrousel uniquement si aucune section n'est sélectionnée -->
<?php if (!isset($_GET['section'])): ?>
    <!-- Carrousel code here -->
<?php endif; ?>


<?php include('footer.inc.php'); ?>
</html>
