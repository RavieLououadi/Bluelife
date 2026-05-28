<?php

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

//Récupération des données
//$name = mysqli_real_escape_string($link, $_REQUEST["name"]);
//$prenom = mysqli_real_escape_string($link, $_REQUEST["zt_prenom"]);
$mail = mysqli_real_escape_string($link, $_REQUEST["mail"]);
$motdepasse = mysqli_real_escape_string($link, $_REQUEST["motdepasse"]);
//$confirmer = mysqli_real_escape_string($link, $_REQUEST["confirmer"]);

//insertion dans la table
$sql = "SELECT * FROM inscription WHERE mail='$mail' AND motdepasse='$motdepasse'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    header("Location: connexionreussi.php");
    
} else {
    header("location: Blue-life-finale/Blue-life/dossiers_php/monespace.html");
}




//Fermer la connexion mysqli_close();
mysqli_close($link);

?>
