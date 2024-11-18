<?php
require('param.inc.php'); // Connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start(); // Démarrage de la session

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateDeNaissance = isset($_POST['date_naissance']) ? $_POST['date_naissance'] : null;
    $email = $_POST['email'];
    $genre = $_POST['genre'];
    $motDePasse = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT); // Hachage du mot de passe

    $erreur = "";

    if ($conn) {
        // Vérifier si l'email existe déjà
        $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $erreur = "Cet email est déjà utilisé. Veuillez en choisir un autre.";
        } else {
            // Insérer les données dans la table utilisateur
            $stmt = $conn->prepare("INSERT INTO utilisateur (nom, prenom, dateDeNaissance, email, motDePasse, genre) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $nom, $prenom, $dateDeNaissance, $email, $motDePasse, $genre);
                
            if ($stmt->execute()) {
                $_SESSION['email'] = $email;
                $_SESSION['message'] = "<div class='alert alert-primary' role='alert'>
                    Inscription réussie avec succès!
                    </div>";
                header("Location: index.php");
                exit();
            } else {
                $erreur = "Erreur lors de l'enregistrement. Veuillez réessayer.";
            }
        }

        $stmt->close();
    } else {
        $erreur = "Erreur de connexion à la base de données.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="inscription.css">
    <title>Inscription</title>
</head>
<body>
    <?php
    $titre = "Inscription";
    include('header.inc.php');
    include('menu.inc.php');
    ?>
    <h1 class="centrer">Rejoignez RunWithESIG!</h1>
    <form method="POST" action="inscription.php">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom..." required>
                </div>
                <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prénom..." required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="date_naissance" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" id="date_naissance" name="date_naissance" placeholder="Votre date de naissance" required>
                </div>
                <div class="col-md-6">
                    <label for="genre" class="form-label">Genre</label>
                    <select class="form-select" id="genre" name="genre" required>
                        <option selected>Genre...</option>
                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                        <option value="non_binaire">Non binaire</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Votre email..." required>
                </div>
                <div class="col-md-6">
                    <label for="motDePasse" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="motDePasse" name="motDePasse" placeholder="Votre mot de passe..." required>
                </div>
            </div>
            <div class="row my-3">
                <div class="d-grid d-md-block">
                    <button id="deplacer" class="btn btn-outline-primary" type="submit">Inscription</button>
                </div>
            </div>
        </div>
    </form>
    <?php include('footer.inc.php'); ?>
    
    <?php if (!empty($erreur)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $erreur; ?>
        </div>
    <?php } ?>
</body>
</html>
