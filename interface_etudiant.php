<!-- interface_etudiant.php -->
<?php
include 'connection.php';

$id = $_GET['id'];

$sql = "SELECT * FROM etudiants WHERE id = $id";
$result = mysqli_query($conn, $sql);
$etudiant = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Interface Étudiant</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</head>
<body>
    <div class="ui container">
        <h2 class="ui header">Bienvenue, <?php echo $etudiant['nom']; ?>!</h2>
        <div class="ui buttons">
            <a href="paiement.php?id=<?php echo $etudiant['id']; ?>" class="ui button">Paiement</a>
            <div class="or"></div>
            <a href="verification_paiement.php?id=<?php echo $etudiant['id']; ?>" class="ui positive button">Vérification de Paiement</a>
        </div>
    </div>
</body>
</html>