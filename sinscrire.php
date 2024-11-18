<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription à un entraînement</title>
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers ton fichier CSS -->
</head>
<body>
    <h1>Inscription à un entraînement</h1>
    <form method="POST" action="inscription_entrainement.php">
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="id_entrainement">ID de l'entraînement :</label>
            <input type="number" id="id_entrainement" name="id_entrainement" required>
        </div>
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
<?php
require('param.inc.php'); // Connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $id_entrainement = $_POST['id_entrainement'];

    // Vérifier si l'utilisateur est déjà inscrit à cet entraînement
    $stmt = $conn->prepare("SELECT * FROM inscriptionentrainement WHERE email = ? AND id_entrainement = ?");
    $stmt->bind_param("si", $email, $id_entrainement);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Vous êtes déjà inscrit à cet entraînement.";
    } else {
        // Insérer les données dans la table inscriptionentrainement
        $stmt = $conn->prepare("INSERT INTO inscriptionentrainement (email, id_entrainement) VALUES (?, ?)");
        $stmt->bind_param("si", $email, $id_entrainement);

        if ($stmt->execute()) {
            echo "Inscription réussie !";
        } else {
            echo "Erreur lors de l'inscription : " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>
<?php
require('param.inc.php'); // Connexion à la base de données

$sql = "SELECT i.email, i.id_entrainement, e.titre FROM inscriptionentrainement i JOIN entrainement e ON i.id_entrainement = e.id_entrainement";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Email</th>
                <th>ID Entraînement</th>
                <th>Titre Entraînement</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['email'] . "</td>
                <td>" . $row['id_entrainement'] . "</td>
                <td>" . $row['titre'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Aucune inscription trouvée.";
}

$conn->close();
?>
