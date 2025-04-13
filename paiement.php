<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Options de Paiement</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #87CEEB; /* Bleu ciel */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .ui.card {
            width: 100%;
            max-width: 600px;
            margin: 20px 0;
        }
        .payment-container {
            text-align: center;
            width: 100%;
            padding: 20px;
        }
        .payment-header {
            margin-bottom: 30px;
            font-weight: bold;
            font-size: 2rem;
            color: #333;
        }
        .ui.button {
            font-size: 1.2em;
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .ui.button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 1.2rem;
            padding: 10px 15px;
            border-radius: 6px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .back-button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <a href="index.html" class="back-button">
        <i class="arrow left icon"></i>
        Retour à l'accueil
    </a>
    <div class="ui container payment-container">
        <img src="y.Jpeg" alt="" class="">
        <h2 class="ui header payment-header">Options de Paiement</h2>

        <div class="ui two column stackable grid">
            <div class="column">
                <div class="ui card">
                    <div class="content">
                        <div class="header">Paiement via Mobile Money</div>
                        <div class="description">
                            Utilisez un service de mobile money pour régler vos frais académiques.
                        </div>
                    </div>
                    <div class="extra content">
                        <a href="paiement_mobile.php" class="ui primary button fluid">Choisir Mobile Money</a>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="ui card">
                    <div class="content">
                        <div class="header">Paiement à l'Université</div>
                        <div class="description">
                            Effectuez votre paiement directement à l'université.
                        </div>
                    </div>
                    <div class="extra content">
                        <a href="paiement_universite.php" class="ui secondary button fluid">Payer à l'Université</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
