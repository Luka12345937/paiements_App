<?php
session_start();

// Vérification si l'étudiant est connecté
if (!isset($_SESSION['etudiant_id'])) {
    header("Location: connexion.php");
    exit();
}

// Inclusion de la connexion à la base de données
include 'connection.php';

// Sécurisation de l'ID étudiant
$id = intval($_SESSION['etudiant_id']);

// Récupération des informations de l'étudiant
$sql = "SELECT * FROM etudiants WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$etudiant = $result->fetch_assoc();
$stmt->close();
$conn->close();

if (!$etudiant) {
    // Gérer le cas où l'étudiant n'est pas trouvé (facultatif)
    header("Location: deconnexion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <style>
        body {
            background-color: #f9f9f9;
        }
        .ui.card {
            width: 100%;
            margin: 20px 0;
        }
        .dashboard-container {
            margin-top: 50px;
            text-align: center;
        }
        .dashboard-header {
            margin-bottom: 30px;
            font-weight: bold;
        }
        .ui.button {
            font-size: 1.2em;
            padding: 15px;
        }
        .logo {
            margin-bottom: 20px;
            max-width: 150px;
        }
    </style>
</head>
<body>
    <div class="ui container dashboard-container">
        <img src="y.Jpeg" alt="" class="">
        <h2 class="ui header dashboard-header">Bienvenue, <?php echo htmlspecialchars($etudiant['nom'], ENT_QUOTES, 'UTF-8'); ?>!</h2>

        <div class="ui two column stackable grid">
            <div class="column">
                <div class="ui card">
                    <div class="content">
                        <div class="header">Paiement</div>
                        <div class="description">
                            Accédez à la section paiement pour régler vos frais académiques.
                        </div>
                    </div>
                    <div class="extra content">
                        <a href="paiement.php" class="ui primary button fluid">Accéder à la section Paiement</a>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="ui card">
                    <div class="content">
                        <div class="header">Vérification de Paiement</div>
                        <div class="description">
                            Vérifiez l'état de vos paiements effectués.
                        </div>
                    </div>
                    <div class="extra content">
                        <a href="verification_de_paiement.php" class="ui primary button fluid">Accéder à la Vérification de Paiement</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
