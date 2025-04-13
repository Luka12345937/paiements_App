<?php
session_start();
if (!isset($_SESSION['etudiant_id'])) {
    header("Location: connexion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement à l'Université</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <style>
        body {
            background-color: #87CEEB; /* Bleu ciel */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .ui.container {
            margin-top: 50px;
            text-align: center;
            max-width: 600px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        .ui.header {
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }
        .ui.message {
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            background-color: #e7f3fe;
            color: #31708f;
            border-left: 5px solid #31708f;
        }
        .ui.button {
            font-size: 1.2em;
            padding: 15px 30px;
            margin: 10px 5px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .ui.button:hover {
            background-color: #45a049; /* Vert foncé au survol */
            transform: translateY(-2px);
        }
        .logo {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="ui container">
        <img src="y.Jpeg" alt="" class="" style="max-width: 150px;">
        <h2 class="ui header">Paiement à l'Université</h2>
        <div class="ui message">
            <p>Pour effectuer votre paiement directement à l'université, veuillez vous rendre au service de comptabilité avec votre numéro d'étudiant. Un reçu vous sera fourni après validation de votre paiement.</p>
        </div>
        <div>
            <a href="tableau_de_bord.php" class="ui secondary button">Retour au Tableau de Bord</a>
            <a href="deconnexion.php" class="ui red button">Déconnexion</a>
        </div>
    </div>
</body>
</html>
