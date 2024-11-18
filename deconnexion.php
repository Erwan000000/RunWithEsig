<?php
session_start();

// Stocker le message de déconnexion avant de détruire la session
$_SESSION['logout_message'] = "Vous avez été déconnecté avec succès.";

// Détruire toutes les variables de session
$_SESSION = array();

// Effacer le cookie de session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Détruire la session
session_destroy();

// Démarrer une nouvelle session pour stocker le message
session_start();
$_SESSION['logout_message'] = "Vous avez été déconnecté avec succès.";

// Rediriger vers la page d'accueil
header("Location: index.php");
exit();
?>