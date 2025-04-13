<!-- connexion_action.php -->
<?php
include 'connection.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $sql = "SELECT * FROM etudiants WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $etudiant = mysqli_fetch_assoc($result);

    if ($etudiant && password_verify($mot_de_passe, $etudiant['mot_de_passe'])) {
        $_SESSION['etudiant_id'] = $etudiant['id'];
        header("Location: tableau_de_bord.php");
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}

mysqli_close($conn);
?>