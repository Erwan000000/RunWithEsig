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

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    header("Location: connexion.php");
    exit();
}

// Connexion à la base de données
require_once 'param.inc.php';

// Vérifiez la connexion à la base de données
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Traitement de la suppression si un formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimer'])) {
    $id_a_supprimer = intval($_POST['id_entrainement']);
    
    // Préparez la requête de suppression
    $query_delete = "DELETE FROM entrainement WHERE id_entrainement = ?";
    $stmt = mysqli_prepare($conn, $query_delete);
    mysqli_stmt_bind_param($stmt, "i", $id_a_supprimer);
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['message'] = "L'entraînement a été supprimé avec succès.";
    } else {
        $_SESSION['message'] = "Erreur lors de la suppression de l'entraînement : " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt);
    
    // Rediriger pour éviter la resoumission du formulaire
    header("Location: supprimer_entrainement.php");
    exit();
}

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

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="inscription.css">
    <title>Gestion des Entraînements</title>
</head>
<body>
<?php
    include('header.inc.php');
    include('menuMembre.php');
?>

<h2>Gestion des Entraînements</h2>

<?php
// Afficher le message de confirmation ou d'erreur s'il existe
if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']);
}
?>

<?php if (!empty($entrainements)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Difficulté</th>
                <th>Participants</th>
                <th>Parcours</th>
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
                        <form method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet entraînement ?');">
                            <input type="hidden" name="id_entrainement" value="<?php echo $entrainement['id_entrainement']; ?>">
                            <button type="submit" name="supprimer" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun entraînement disponible.</p>
<?php endif; ?>

<button class="btn btn-secondary" onclick="history.back()">Retour</button>

</body>
</html>
