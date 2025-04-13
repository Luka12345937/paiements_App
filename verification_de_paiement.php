<?php
session_start();
if (!isset($_SESSION['etudiant_id'])) {
    header("Location: connexion.php");
    exit();
}

// Database connection
$host = 'localhost';
$db = 'systeme_paiement_academique';
$user = 'your_username';
$pass = 'your_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch payments for the logged-in student
$etudiant_id = $_SESSION['etudiant_id'];
$stmt = $pdo->prepare("SELECT p.id, p.montant, p.methode_paiement, p.date_paiement, v.status, v.commentaire 
                        FROM paiements p 
                        LEFT JOIN verification_paiements v ON p.id = v.paiement_id 
                        WHERE p.etudiant_id = :etudiant_id");
$stmt->execute(['etudiant_id' => $etudiant_id]);
$payments = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification de Paiement</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }
        .ui.container {
            margin-top: 50px;
            text-align: center;
            max-width: 800px;
        }
        .ui.header {
            margin-bottom: 30px;
            color: #4a4a4a;
        }
        .ui.table {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .ui.button {
            margin-top: 20px;
            background-color: #007bff;
            color: white;
        }
        .ui.message {
            margin-top: 20px;
            background-color: #e7f3fe;
            color: #31708f;
            border-radius: 8px;
        }
        footer {
            margin-top: 40px;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="ui container">
        <h2 class="ui header">Vérification de Paiement</h2>
        
        <?php if ($payments): ?>
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Montant</th>
                        <th>Méthode de Paiement</th>
                        <th>Date de Paiement</th>
                        <th>Status</th>
                        <th>Commentaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($payments as $payment): ?>
                        <tr>
                            <td><?= htmlspecialchars($payment['id']) ?></td>
                            <td><?= htmlspecialchars($payment['montant']) ?> FCFA</td>
                            <td><?= htmlspecialchars($payment['methode_paiement']) ?></td>
                            <td><?= htmlspecialchars($payment['date_paiement']) ?></td>
                            <td><?= htmlspecialchars($payment['status'] ?? 'Non vérifié') ?></td>
                            <td><?= htmlspecialchars($payment['commentaire'] ?? 'Aucun commentaire') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="ui message">
                <p>Aucun paiement trouvé.</p>
            </div>
        <?php endif; ?>

        <a href="tableau_de_bord.php" class="ui button">Retour au Tableau de Bord</a>
    </div>
    <footer>
        <p>&copy; <?= date('Y') ?> Système de Paiement Académique. Tous droits réservés.</p>
    </footer>
</body>
</html>