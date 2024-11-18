<?php
// Définir le fuseau horaire
date_default_timezone_set('Europe/Paris');

// Activer l'affichage des erreurs PHP pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Démarrer la session
session_start();

// Inclure le fichier de connexion à la base de données
require_once 'param.inc.php';

// Fonction pour nettoyer les entrées
function cleanInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Initialisation des variables
$erreur = '';
$success = '';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et nettoyage des données du formulaire
    $titre = isset($_POST['titre']) ? cleanInput($_POST['titre']) : '';
    $date = isset($_POST['dateEntrainement']) ? cleanInput($_POST['dateEntrainement']) : '';
    $difficulte = isset($_POST['difficulte']) ? cleanInput($_POST['difficulte']) : '';
    $nbDeParticipants = isset($_POST['nbDeParticipants']) ? intval($_POST['nbDeParticipants']) : 0;
    $horaire = isset($_POST['heureEntrainement']) ? cleanInput($_POST['heureEntrainement']) : '';
    $parcour = isset($_POST['parcour']) ? cleanInput($_POST['parcour']) : '';
    $categorie = isset($_POST['categorie']) ? cleanInput($_POST['categorie']) : '';

    // Validation des données
    if (empty($titre) || empty($date) || empty($difficulte) || $nbDeParticipants <= 0 || empty($horaire) || empty($parcour) || empty($categorie)) {
        $erreur = "Tous les champs sont obligatoires et doivent être valides.";
    } else {
        // Préparation de la requête d'insertion
        $sql = "INSERT INTO entrainement (titre, date, difficulte, nbDeParticipants, horaire, parcour, categorie) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            $erreur = "Erreur de préparation de la requête : " . $conn->error;
        } else {
            // Conversion de la date au format SQL
            $dateSQL = date('Y-m-d', strtotime($date));

            // Liaison des paramètres et exécution
            $stmt->bind_param("sssisss", $titre, $dateSQL, $difficulte, $nbDeParticipants, $horaire, $parcour, $categorie);
            
            if ($stmt->execute()) {
                $_SESSION['message'] = "<div class='alert alert-primary' role='alert'>
                Entrainement ajoute
                </div>";
                header("Location: page.php");
                exit();
            } else {
                $erreur = "Erreur lors de l'exécution de la requête : " . $stmt->error;
            }

            $stmt->close();
        }
    }
    $valeursPermises = ['Sprint', 'Endurance', 'Marche Athlétique', 'Randonnée'];
    if (!in_array($titre, $valeursPermises)) {
        $erreur = "La valeur du titre n'est pas valide.";
    }
    error_log("Valeur de titre insérée : " . $titre);
    
}

// Fermeture de la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="inscription.css">
    <title>Ajouter Entrainement</title>
</head>
<body>
<?php
    include('header.inc.php');
    include('menuMembre.php');
?>

<h2>Ajouter un Entrainement</h2>

<?php if (!empty($erreur)): ?>
    <p class="text-danger"><?php echo $erreur; ?></p>
<?php endif; ?>

<?php if (isset($_SESSION['message'])): ?>
    <p class="text-success"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
<?php endif; ?>

<form method="post" action="">
    <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <select class="form-select" id="titre" name="titre" required>
            <option value="" disabled selected>Choisissez un type d'entrainement</option>
            <option value="Sprint">Sprint</option>
            <option value="Endurance">Endurance</option>
            <option value="Marche Athlétique">Marche Athlétique</option>
            <option value="Randonnée">Randonnée</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="dateEntrainement" class="form-label">Date de l'Entrainement</label>
        <input type="date" class="form-control" id="dateEntrainement" name="dateEntrainement" required>
    </div>
    <div class="mb-3">
        <label for="difficulte" class="form-label">Difficulté</label>
        <select class="form-select" id="difficulte" name="difficulte" required>
            <option value="" disabled selected>Choisissez un niveau de difficulté</option>
            <option value="Facile">Facile</option>
            <option value="Difficile">Difficile</option>
            <option value="Extreme">Extrême</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="nbDeParticipants" class="form-label">Nombre de participants</label>
        <input type="number" class="form-control" id="nbDeParticipants" name="nbDeParticipants" min="1" required>
    </div>
    <div class="mb-3">
        <label for="heureEntrainement" class="form-label">Heure de l'Entrainement</label>
        <input type="time" class="form-control" id="heureEntrainement" name="heureEntrainement" required>
    </div>
    <div class="mb-3">
        <label for="categorie" class="form-label">Catégorie</label>
        <select class="form-select" id="categorie" name="categorie" required>
            <option value="" disabled selected>Choisissez une catégorie</option>
            <option value="Debutant">Debutant</option>
            <option value="Amateur">Amateur</option>
            <option value="Professionnel">Professionnel</option> <!-- Vérifiez que c'est bien écrit -->
        </select>
    </div>
    <div class="mb-3">
        <label for="parcour" class="form-label">Parcour</label>
        <select class="form-select" id="parcour" name="parcour" required>
            <option value="" disabled selected>Choisissez un type de parcour</option>
            <option value="Montagne">Montagne</option>
            <option value="Route">Route</option>
            <option value="Plage">Plage</option>
            <option value="Stade">Stade</option>
            <option value="Cross-country">Cross-country</option>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Ajouter Entrainement</button>
        <button class="btn btn-secondary" onclick="history.back()">Retour</button>
    </div>
</form>

</body>
</html>
