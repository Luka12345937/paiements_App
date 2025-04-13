<!-- inscription_action.php -->
<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $promotion = $_POST['promotion'];
    $filiere = $_POST['filiere'];

    $sql = "INSERT INTO etudiants (nom, email, mot_de_passe, promotion, filiere) VALUES ('$nom', '$email', '$mot_de_passe', '$promotion', '$filiere')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: connexion.php");
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>