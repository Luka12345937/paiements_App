<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page de connexion au système de paiement académique">
    <title>Connexion Étudiant - Système de Paiement Académique</title>
    
    <!-- Préchargement des ressources -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" as="style">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    
    <!-- Chargement asynchrone de Semantic UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"></noscript>
    
    <!-- Optimisation des polices -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- CSS critique inline -->
    <style>
        :root {
            --primary-color: #1e88e5;
            --secondary-color: #43a047;
            --background-color: #e3f2fd;
            --text-color: #2c3e50;
            --error-color: #e53935;
        }
        
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Roboto', system-ui, -apple-system, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
        }
        
        .ui.container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100%;
            padding: 2rem;
        }
        
        .login-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }
        
        .ui.header {
            text-align: center;
            color: var(--text-color);
            margin-bottom: 2rem;
            font-weight: 500;
        }
        
        .field {
            margin-bottom: 1.5rem;
        }
        
        label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
        }
        
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(30, 136, 229, 0.2);
        }
        
        .ui.button {
            width: 100%;
            padding: 1rem;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 8px !important;
            transition: all 0.3s ease;
            margin-top: 1rem !important;
        }
        
        .ui.primary.button {
            background-color: var(--primary-color);
        }
        
        .ui.primary.button:hover {
            background-color: #1565c0;
            transform: translateY(-2px);
        }
        
        .ui.secondary.button {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .ui.secondary.button:hover {
            background-color: #2e7d32;
            transform: translateY(-2px);
        }
        
        .forgot-password {
            text-align: right;
            margin-top: 0.5rem;
        }
        
        .forgot-password a {
            color: #666;
            font-size: 0.9rem;
            text-decoration: none;
        }
        
        .forgot-password a:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 0.9rem;
            margin-top: 0.5rem;
            display: none;
        }
        
        @media (max-width: 480px) {
            .login-card {
                padding: 1.5rem;
            }
            
            .ui.container {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="ui container">
        <div class="login-card">
            <h2 class="ui header">Connexion Étudiant</h2>
            <form action="connexion_action.php" method="POST" class="ui form" id="loginForm" novalidate>
                <div class="field">
                    <label for="email">Adresse Email</label>
                    <input type="email" id="email" name="email" placeholder="votre@email.com" required
                           aria-describedby="emailError">
                    <div id="emailError" class="error-message" role="alert"></div>
                </div>
                <div class="field">
                    <label for="mot_de_passe">Mot de passe</label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="••••••••" required
                           aria-describedby="passwordError">
                    <div id="passwordError" class="error-message" role="alert"></div>
                    <div class="forgot-password">
                        <a href="mot_de_passe_oublie.php">Mot de passe oublié ?</a>
                    </div>
                </div>
                <button class="ui primary button" type="submit">Se connecter</button>
                <a href="inscription.php" class="ui secondary button">Créer un compte</a>
            </form>
        </div>
    </div>

    <!-- Validation du formulaire en JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('mot_de_passe');
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');

            form.addEventListener('submit', function(event) {
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
                
                // Validation du mot de passe
                if (!passwordInput.value || passwordInput.value.length < 6) {
                    passwordError.textContent = 'Le mot de passe doit contenir au moins 6 caractères';
                    passwordError.style.display = 'block';
                    passwordInput.setAttribute('aria-invalid', 'true');
                    isValid = false;
                } else {
                    passwordError.style.display = 'none';
                    passwordInput.setAttribute('aria-invalid', 'false');
                }
                
                if (!isValid) {
                    event.preventDefault();
                }
            });

            // Animation au chargement
            setTimeout(() => {
                document.querySelector('.login-card').style.opacity = '1';
                document.querySelector('.login-card').style.transform = 'translateY(0)';
            }, 50);
        });
    </script>
</body>
</html>