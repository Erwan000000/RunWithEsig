<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="autre.css" rel="stylesheet">
    <title>Connexion Membre</title>
</head>
<body>
<?php
  session_start();
  $titre = "Connexion Membre";

  include('header.inc.php');
  include('menu.inc.php');
  if (isset($_POST['email']) && isset($_POST['motdepasse'])) { 
    $email = $_POST['email'];
    $mdp = $_POST['motdepasse'];
    $erreur = "";

    // Paramètres de connexion à la BDD de l'école 
    $host = "localhost";
    $login = "grp_7_6";
    $passwd = "WfFzjWSKr2akHt";
    $dbname = "bdd_7_6";
    $conn = mysqli_connect($host, $login, $passwd, $dbname);

    // Vérification de la connexion
    if (!$conn) {
        die("Erreur de connexion : " . mysqli_connect_error());
    }

    if ($conn) {
        $stmt = $conn->prepare("SELECT * FROM membre WHERE email = ? AND motdepasse = ?");
        $stmt->bind_param("ss", $email, $mdp);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $_SESSION['message'] = "<div class='alert alert-primary' role='alert'>
                Vous etes bien connecté ADMIN!
                </div>";
            
            $_SESSION['email'] = $email;
            header("Location: page.php");
            exit();
        } else {
            $erreur = "Veuillez réessayer, identifiants incorrects";
        }
        
        $stmt->close();
    } else {
        $erreur = "Erreur de connexion à la base de données.";
    }
}
?>


<h1 class="connexionmembre">Connexion Membre</h1>

<div class="container form-container">
    <form method="post" action="">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com" value="" required>
        </div>
        <div class="mb-3">
            <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword5" name="motdepasse" aria-describedby="passwordHelpBlock" value="****" required>
            <div id="passwordHelpBlock" class="form-text">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100" name="Sign">Sign in</button>
    </form>

    <?php if (!empty($erreur)) { echo "<p class='error'>$erreur</p>"; } ?>
</div>

<?php include('footer.inc.php'); ?>

<!-- Bootstrap JS et Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
