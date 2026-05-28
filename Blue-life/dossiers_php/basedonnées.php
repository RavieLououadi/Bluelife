<?php

$mail = $_POST['mail'] ?? null;
$mdp = $_POST['mdp'] ?? null;
$nom = $_POST['nom'] ?? null;
$prenom = $_POST['prenom'] ?? null;


//Etablissement de la connexion
$host = "Localhost";
$user = "root";
$password = "";
$database = "base_données";
$link = mysqli_connect($host, $user, $password, $database);

//Test de la connexion
if ($link === false) {
    die("Error : could not ." . mysqli_connect_error());
}

//pour éviter les doublant

$check = "SELECT * FROM inscription WHERE mail = '$mail'";
$result = mysqli_query($link, $check);

if (mysqli_num_rows($result) > 0) {
    echo "Compte déjà existant, <a href='../seconnecter.html'>connectez-vous</a>.";
    exit;
}


//Récupération des données
$name = mysqli_real_escape_string($link, $_REQUEST["name"]);
//$prenom = mysqli_real_escape_string($link, $_REQUEST["zt_prenom"]);
$mail = mysqli_real_escape_string($link, $_REQUEST["mail"]);
$motdepasse = mysqli_real_escape_string($link, $_REQUEST["motdepasse"]);
$confirmer = mysqli_real_escape_string($link, $_REQUEST["confirmer"]);

$check = "SELECT * FROM inscription WHERE mail = '$mail'";
$result = mysqli_query($link, $check);

if (mysqli_num_rows($result) > 0) {
    echo "Compte déjà existant, connectez-vous.";
    exit; 
}

//insertion dans la table
$sql = "INSERT INTO inscription(name, mail, motdepasse, confirmer)
VALUES ('$name', '$mail', '$motdepasse', '$confirmer')";

if (mysqli_query($link, $sql)) {
    header("Location: succes.php");
} else {
    echo "Error: could not be to execute. $sql" .
        $mysqli->connect_error();
}

//Fermer la connexion mysqli_close();
mysqli_close($link);
