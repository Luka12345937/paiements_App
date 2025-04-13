<!-- connection.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "systeme_paiement_academique";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}
?>