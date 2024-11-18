// Effectuer la requête SQL pour récupérer les utilisateurs inscrits
$sql = "
    SELECT p.email, e.titre, p.id_entrainement
    FROM participant p
    JOIN entrainement e ON p.id_entrainement = e.id
    ORDER BY e.titre ASC";
$result = $conn->query($sql);

// Afficher le formulaire et la table
echo '<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs inscrits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Liste des utilisateurs inscrits aux entraînements</h2>';

// Vérifier si la requête a retourné des résultats
if ($result && $result->num_rows > 0) {
    echo '<table class="table table-bordered">
            <thead>
                <tr>
                    <th>Utilisateur (Email)</th>
                    <th>Entraînement</th>
                </tr>
            </thead>
            <tbody>';
    
    // Afficher chaque ligne de résultat
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td>" . htmlspecialchars($row['titre']) . "</td>
              </tr>";
    }
    echo '  </tbody>
          </table>';
} else {
    // Aucun utilisateur inscrit ou problème de requête
    echo '<div class="alert alert-warning" role="alert">
            Aucune inscription trouvée.
          </div>';
}

echo '  </div>
</body>
</html>';

$conn->close();
