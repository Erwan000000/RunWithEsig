<?php
// Définir le fuseau horaire
date_default_timezone_set('Europe/Paris');

// Activer l'affichage des erreurs PHP pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Démarrer la session si elle n'est pas déjà démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: connexion.php");
    exit();
}

// Récupère l'email de l'utilisateur pour le message d'accueil
$email = $_SESSION['email'];

// Connexion à la base de données
require_once 'param.inc.php';

// Requête pour récupérer les entraînements disponibles
$query = "SELECT id_entrainement, titre, date, difficulte, nbDeParticipants, horaire, parcour, categorie FROM entrainement";
$result = mysqli_query($conn, $query);

// Vérifie si des entraînements ont été trouvés
$entrainements = [];
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Récupère les données dans un tableau
        while ($row = mysqli_fetch_assoc($result)) {
            $entrainements[] = $row;
        }
    } else {
        echo "Aucun entraînement disponible.";
    }
} else {
    echo "Erreur dans la requête : " . mysqli_error($conn);
}

// Requête pour récupérer les entraînements auxquels l'utilisateur est inscrit
$query_inscrits = "SELECT e.id_entrainement, e.titre, e.date 
                   FROM entrainement e 
                   INNER JOIN participant p ON e.id_entrainement = p.id_entrainement 
                   WHERE p.email = '$email'";
$result_inscrits = mysqli_query($conn, $query_inscrits);

$entrainements_inscrits = [];
if ($result_inscrits && mysqli_num_rows($result_inscrits) > 0) {
    while ($row = mysqli_fetch_assoc($result_inscrits)) {
        $entrainements_inscrits[] = $row;
    }
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="inscription.css">
    <title>Entraînements</title>
</head>
<body>
<?php
    include('header.inc.php');
    include('menuMembre.php');
?>

<h2>Entraînements disponibles</h2>
<?php if (!empty($entrainements)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Difficulté</th>
                <th>Participants</th>
                <th>Parcour</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entrainements as $entrainement): ?>
                <tr>
                    <td><?php echo htmlspecialchars($entrainement['titre']); ?></td>
                    <td><?php echo htmlspecialchars($entrainement['date']); ?></td>
                    <td><?php echo htmlspecialchars($entrainement['horaire']); ?></td>
                    <td><?php echo htmlspecialchars($entrainement['difficulte']); ?></td>
                    <td><?php echo htmlspecialchars($entrainement['nbDeParticipants']); ?></td>
                    <td><?php echo htmlspecialchars($entrainement['parcour']); ?></td>
                    <td><?php echo htmlspecialchars($entrainement['categorie']); ?></td>
                    <td>
                        <?php if (in_array($entrainement['id_entrainement'], array_column($entrainements_inscrits, 'id_entrainement'))): ?>
                            <form method="post" action="inscriptionEntrainement.php" style="display: inline;">
                                <input type="hidden" name="id_entrainement" value="<?php echo $entrainement['id_entrainement']; ?>">
                                <button type="submit" name="action" value="desinscrire" class="btn btn-danger">Se désinscrire</button>
                            </form>
                        <?php else: ?>
                            <form method="post" action="inscriptionEntrainement.php" style="display: inline;">
                                <input type="hidden" name="id_entrainement" value="<?php echo $entrainement['id_entrainement']; ?>">
                                <button type="submit" name="action" value="inscrire" class="btn btn-success">S'inscrire</button>

                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button class="btn btn-secondary" onclick="history.back()">Retour</button>
<?php else: ?>
    <p>Aucun entraînement disponible.</p>
<?php endif; ?>

