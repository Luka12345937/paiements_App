<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement via Mobile Money</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <style>
        body {
            background-color: #87CEEB; /* Bleu ciel */
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
            margin-bottom: 30px;
            font-weight: bold;
            color: #333;
        }
        .ui.button {
            font-size: 1.2em;
            padding: 15px;
            margin-top: 10px;
            background-color: #4CAF50; /* Vert */
            color: white;
        }
        .logo {
            margin-bottom: 20px;
            max-width: 150px;
        }
        .ui.dropdown {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="ui container">
        <img src="y.Jpeg" alt="" class="">
        <h2 class="ui header">Paiement via Mobile Money</h2>
        <form action="paiement_action.php" method="POST" class="ui form" id="payment-form">
            <div class="field">
                <label>Méthode de Paiement</label>
                <select name="methode_paiement" class="ui dropdown" required>
                    <option value="" disabled selected>Choisir une méthode</option>
                    <option value="ORANGE MONEY">ORANGE MONEY</option>
                    <option value="AIRTEL MONEY">AIRTEL MONEY</option>
                    <option value="M-PESA">M-PESA</option>
                </select>
            </div>
            <div class="field">
                <label>Numéro de Téléphone</label>
                <input type="tel" name="numero_telephone" required placeholder="Entrez votre numéro">
            </div>
            <div class="field">
                <label>Montant</label>
                <input type="number" name="montant" required min="1" step="any" placeholder="Entrez le montant">
            </div>
            <button class="ui primary button" type="submit">Payer</button>
        </form>
        <div>
            <a href="index.html" class="ui button">Retour à l'accueil</a>
        </div>
    </div>

    <script>
        document.getElementById('payment-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Empêche le chargement de la page

            const montant = document.querySelector('input[name="montant"]').value;
            const methodePaiement = document.querySelector('select[name="methode_paiement"]').value;
            const numeroTelephone = document.querySelector('input[name="numero_telephone"]').value;

            // Envoyer les données au serveur (par exemple, via AJAX)
            fetch('paiement_action.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    montant: montant,
                    methode_paiement: methodePaiement,
                    numero_telephone: numeroTelephone
                })
            })
            .then(response => {
                if (response.ok) {
                    // Rediriger l'utilisateur vers index.html
                    window.location.href = 'index.html';
                } else {
                    // Afficher un message d'erreur
                    alert('Une erreur est survenue lors du paiement. Veuillez réessayer.');
                }
            })
            .catch(error => {
                // Afficher un message d'erreur
                alert('Une erreur est survenue lors du paiement. Veuillez réessayer.');
                console.error(error);
            });
        });
    </script>
</body>
</html>
