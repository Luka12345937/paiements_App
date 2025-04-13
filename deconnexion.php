<?php
session_start();

// Détruire toutes les sessions
$_SESSION = array(); // Vider la session
session_destroy(); // Détruire complètement la session

// Rediriger vers la page de connexion
header("Location: connexion.php");
exit();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .ui.container {
            text-align: center;
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        .ui.header {
            margin-bottom: 20px;
            color: #333;
        }
        .ui.message {
            margin: 20px 0;
            padding: 15px;
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
            background-color: #d9534f; /* Red on hover */
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="ui container">
        <h2 class="ui header">Déconnexion Réussie</h2>
        <div class="ui message">
            <p>Vous avez été déconnecté avec succès. Vous pouvez maintenant vous reconnecter.</p>
        </div>
        <a href="connexion.php" class="ui red button">Se connecter</a>
        <a href="index.php" class="ui secondary button">Retour à l'accueil</a>
    </div>
</body>
</html>