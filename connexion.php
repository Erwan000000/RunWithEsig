<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="connexion.css" rel="stylesheet">
    <title>Connexion</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        session_start();
        $titre = "Connexion";
        include('header.inc.php');
        include('menu.inc.php');
        require('param.inc.php');

        if (isset($_POST['email']) && isset($_POST['motDePasse'])) { 
            $email = $_POST['email'];
            $mdp = $_POST['motDePasse'];
            $erreur = "";

            // Connexion locale
           /* $nom_serveur = "localhost";
            $utilisateur = "root";
            $mot_de_passe = "root";
            $nom_base_donnée = "datawan";
            $conn = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_base_donnée);
            */
            
            // Paramètres de connexion à la BDD de l'école 
            $host = "localhost";
            $login = "grp_7_6";
            $passwd = "WfFzjWSKr2akHt";
            $dbname = "bdd_7_6";

            // Vérification de la connexion
            if (!$conn) {
                die("Erreur de connexion : " . mysqli_connect_error());
            }

            // Préparation de la requête
            $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($mdp, $user['motDePasse'])) {
                    // Connexion réussie
                    $_SESSION['email'] = $email;
                    $_SESSION['connexion_reussie'] = true;
                    header("Location: connecte.php");
                    exit();
                } else {
                    // Mot de passe incorrect
                    $erreur = "Mot de passe incorrect.";
                }
            } else {
                // Utilisateur non trouvé
                $erreur = "Utilisateur non trouvé.";
            }

            $stmt->close();
            mysqli_close($conn); // Fermer la connexion après utilisation
        }
    ?>

    <h1 id="connexionn" class="text-center">Connexion</h1>

    <div class="container form-container">
        <!-- Formulaire de connexion -->
        <form method="post" action="">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com" value="" required>
            </div>
            <div class="mb-3">
                <label for="inputPassword5" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="inputPassword5" name="motDePasse" aria-describedby="passwordHelpBlock" value="****" required>
                <div id="passwordHelpBlock" class="form-text">
                    Votre mot de passe doit contenir entre 8 et 20 caractères, incluant lettres et chiffres, sans espaces, caractères spéciaux ou émojis.
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="Sign">Se connecter</button>
        </form>

        <!-- Message d'erreur si les identifiants sont incorrects -->
        <?php if (!empty($erreur)) { ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo $erreur; ?>
            </div>
        <?php } ?>
    </div>

    <?php include('footer.inc.php'); ?>
    
    <!-- Bootstrap JS et Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
