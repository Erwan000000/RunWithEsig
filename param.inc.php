<?php
  // Paramètres de connexion à la BDD 
  
  //Parametres quand je suis sur le localhost
 /* 
  $host = "localhost";
  $login = "root";
  $passwd = "root";
  $dbname = "datawan";*/

  // Paramètres de connexion à la BDD de l'école 
  $host = "localhost";
  $login = "grp_7_6";
  $passwd = "WfFzjWSKr2akHt";
  $dbname = "bdd_7_6";

  // Connexion à la base de données
  $conn = mysqli_connect($host, $login, $passwd, $dbname);

  if (!$conn) {
      die("Erreur de connexion : " . mysqli_connect_error());
  }

?>


