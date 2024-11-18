<?php
// Démarrer la session
session_start();

// Activer l'affichage des erreurs pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    header("Location: connexion.php");
    exit();
}

// Connexion à la base de données
require_once 'param.inc.php';

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Récupérer les données POST
$email = $_SESSION['email'];
$id_entrainement = isset($_POST['id_entrainement']) ? intval($_POST['id_entrainement']) : 0;
$action = isset($_POST['action']) ? $_POST['action'] : '';

// Afficher les données reçues pour le débogage
echo "Email: " . $email . "<br>";
echo "ID Entrainement: " . $id_entrainement . "<br>";
echo "Action: " . $action . "<br>";

if ($id_entrainement > 0 && !empty($action)) {
    if ($action === "inscrire") {
        // Vérifier si l'entrainement existe
        $check_sql = "SELECT COUNT(*) FROM entrainement WHERE id_entrainement = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("i", $id_entrainement);
        $check_stmt->execute();
        $check_stmt->bind_result($count);
        $check_stmt->fetch();
        $check_stmt->close();

        if ($count == 0) {
            $_SESSION['message'] = "<div class='alert alert-danger'>L'entrainement spécifié n'existe pas.</div>";
        } else {
            // Vérifier si l'utilisateur n'est pas déjà inscrit
            $check_inscription_sql = "SELECT COUNT(*) FROM participant WHERE email = ? AND id_entrainement = ?";
            $check_inscription_stmt = $conn->prepare($check_inscription_sql);
            $check_inscription_stmt->bind_param("si", $email, $id_entrainement);
            $check_inscription_stmt->execute();
            $check_inscription_stmt->bind_result($inscription_count);
            $check_inscription_stmt->fetch();
            $check_inscription_stmt->close();

            if ($inscription_count > 0) {
                $_SESSION['message'] = "<div class='alert alert-warning'>Vous êtes déjà inscrit à cet entrainement.</div>";
            } else {
                // Inscrire l'utilisateur à l'entraînement
                $sql = "INSERT INTO participant (email, id_entrainement) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                if ($stmt === false) {
                    die("Erreur lors de la préparation de la requête : " . $conn->error);
                }
                $stmt->bind_param("si", $email, $id_entrainement);

                if ($stmt->execute()) {
                    $_SESSION['message'] = "<div class='alert alert-success'>Inscription réussie.</div>";
                } else {
                    error_log("Erreur SQL : " . $stmt->error);
                    $_SESSION['message'] = "<div class='alert alert-danger'>Erreur lors de l'inscription : " . $stmt->error . "</div>";
                }
                $stmt->close();
            }
        }
    } elseif ($action === "desinscrire") {
        // Désinscrire l'utilisateur de l'entraînement
        $sql = "DELETE FROM participant WHERE email = ? AND id_entrainement = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Erreur lors de la préparation de la requête : " . $conn->error);
        }
        $stmt->bind_param("si", $email, $id_entrainement);

        if ($stmt->execute()) {
            $_SESSION['message'] = "<div class='alert alert-success'>Désinscription réussie.</div>";
        } else {
            error_log("Erreur SQL : " . $stmt->error);
            $_SESSION['message'] = "<div class='alert alert-danger'>Erreur lors de la désinscription : " . $stmt->error . "</div>";
        }
        $stmt->close();
    }
}


$conn->close();
header("Location: connecte.php");
exit();