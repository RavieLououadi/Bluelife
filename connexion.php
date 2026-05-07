<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "base_données";

$link = mysqli_connect($host, $user, $password, $database);

if (!$link) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

$mail = $_POST["mail"];
$motdepasse = $_POST["motdepasse"];

// Vérifier si l'utilisateur existe
$sql = "SELECT * FROM inscription WHERE mail = '$mail' AND motdepasse = '$motdepasse'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) == 1) {
    // Connexion réussie
    header("Location: monespace.html");
    exit;
} else {
    // Connexion échouée
    echo "Identifiants incorrecte ou innexistant. <a href='seconnecter.html'>Réessayer</a> et cliquer sur <a href='inscription.html'>s'inscrire</a>";
    exit;
}

mysqli_close($link);
?>
