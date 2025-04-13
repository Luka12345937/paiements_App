<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Réinitialisation de mot de passe pour le système de paiement académique">
    <title>Réinitialisation de mot de passe | Système Académique</title>
    
    <!-- Préchargement des ressources -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" as="style">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    
    <!-- Chargement asynchrone des CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"></noscript>
    
    <!-- Police Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Inline Critique -->
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #4f46e5;
            --success-color: #10b981;
            --error-color: #ef4444;
            --text-color: #1f2937;
            --light-bg: #f3f4f6;
        }
        
        body {
            font-family: 'Open Sans', system-ui, -apple-system, sans-serif;
            background-color: var(--light-bg);
            color: var(--text-color);
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            line-height: 1.5;
        }
        
        .password-reset-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 480px;
            padding: 2.5rem;
            margin: 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .password-reset-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }
        
        .reset-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .reset-header h2 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .reset-header p {
            color: #6b7280;
            font-size: 0.95rem;
        }
        
        .ui.form .field {
            margin-bottom: 1.25rem;
        }
        
        .ui.form label {
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .ui.form input {
            padding: 0.875rem 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            width: 100%;
            transition: all 0.2s ease;
        }
        
        .ui.form input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        
        .ui.button {
            font-weight: 600;
            padding: 0.875rem 1.5rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        
        .ui.primary.button {
            background-color: var(--primary-color);
        }
        
        .ui.primary.button:hover {
            background-color: #1d4ed8;
            transform: translateY(-2px);
        }
        
        .back-to-login {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }
        
        .back-to-login a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-to-login a:hover {
            text-decoration: underline;
        }
        
        .status-message {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: none;
        }
        
        .status-message.success {
            background-color: #ecfdf5;
            color: var(--success-color);
            display: block;
        }
        
        .status-message.error {
            background-color: #fef2f2;
            color: var(--error-color);
            display: block;
        }
        
        @media (max-width: 480px) {
            .password-reset-container {
                padding: 1.75rem;
            }
            
            .reset-header h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="password-reset-container">
        <div class="reset-header">
            <h2>Réinitialiser votre mot de passe</h2>
            <p>Entrez votre adresse email pour recevoir un lien de réinitialisation</p>
        </div>
        
        <!-- Message de statut (affiché dynamiquement après soumission) -->
        <div id="statusMessage" class="status-message">
            <i class="icon"></i>
            <span id="statusText"></span>
        </div>
        
        <form class="ui form" id="resetForm" novalidate>
            <div class="field">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" placeholder="votre@email.com" required
                       aria-describedby="emailError">
                <div id="emailError" class="ui pointing red basic label" style="display:none;"></div>
            </div>
            
            <button class="ui primary button fluid" type="submit">
                Envoyer le lien de réinitialisation
            </button>
            
            <div class="back-to-login">
                <a href="connexion.php"><i class="arrow left icon"></i> Retour à la connexion</a>
            </div>
        </form>
    </div>

    <!-- JavaScript optimisé -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('resetForm');
            const emailInput = document.getElementById('email');
            const emailError = document.getElementById('emailError');
            const statusMessage = document.getElementById('statusMessage');
            const statusText = document.getElementById('statusText');
            
            // Animation d'entrée
            setTimeout(() => {
                document.querySelector('.password-reset-container').style.opacity = '1';
                document.querySelector('.password-reset-container').style.transform = 'translateY(0)';
            }, 50);
            
            // Validation du formulaire
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                let isValid = true;
                
                // Validation de l'email
                if (!emailInput.value || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
                    emailError.textContent = 'Veuillez entrer une adresse email valide';
                    emailError.style.display = 'block';
                    emailInput.setAttribute('aria-invalid', 'true');
                    isValid = false;
                } else {
                    emailError.style.display = 'none';
                    emailInput.setAttribute('aria-invalid', 'false');
                }
                
                if (isValid) {
                    // Simulation d'envoi (à remplacer par un appel AJAX réel)
                    simulatePasswordResetRequest();
                }
            });
            
            function simulatePasswordResetRequest() {
                // Afficher le statut de chargement
                statusMessage.className = 'status-message';
                statusMessage.innerHTML = '<i class="notched circle loading icon"></i> Envoi en cours...';
                statusMessage.style.display = 'block';
                
                // Simuler un délai réseau
                setTimeout(() => {
                    // En production, remplacer par un véritable appel AJAX
                    statusMessage.className = 'status-message success';
                    statusText.textContent = 'Un email avec les instructions de réinitialisation a été envoyé à votre adresse.';
                    
                    // Réinitialiser le formulaire
                    form.reset();
                    
                    // Cacher le message après 5 secondes
                    setTimeout(() => {
                        statusMessage.style.display = 'none';
                    }, 5000);
                }, 1500);
            }
        });
    </script>
</body>
</html>