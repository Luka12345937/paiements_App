<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Formulaire d'inscription au système de paiement académique">
    <title>Inscription Étudiant | Système Académique</title>
    
    <!-- Préchargement des ressources -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" as="style">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <!-- Chargement asynchrone des CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"></noscript>
    
    <!-- Police Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Inline Critique -->
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-hover: #3a56d4;
            --secondary-color: #3f37c9;
            --background-color: #f8f9fa;
            --text-color: #2b2d42;
            --light-gray: #e9ecef;
            --border-radius: 12px;
            --box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        body {
            font-family: 'Poppins', system-ui, -apple-system, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            line-height: 1.5;
            background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        
        .registration-container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            width: 100%;
            max-width: 520px;
            padding: 2.5rem;
            margin: 1.5rem;
            transition: var(--transition);
        }
        
        .registration-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .registration-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .registration-header h2 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
        }
        
        .registration-header p {
            color: #6b7280;
            font-size: 0.95rem;
        }
        
        .ui.form .field {
            margin-bottom: 1.5rem;
        }
        
        .ui.form label {
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .ui.form input,
        .ui.form select {
            padding: 0.875rem 1rem;
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            width: 100%;
            transition: var(--transition);
            font-family: inherit;
        }
        
        .ui.form input:focus,
        .ui.form select:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }
        
        .ui.button {
            font-weight: 600;
            padding: 0.875rem 1.5rem;
            border-radius: 8px;
            transition: var(--transition);
            font-family: inherit;
        }
        
        .ui.primary.button {
            background-color: var(--primary-color);
        }
        
        .ui.primary.button:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
        }
        
        .ui.secondary.button {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .ui.secondary.button:hover {
            background-color: #3a0ca3;
            transform: translateY(-2px);
        }
        
        .social-login {
            margin-top: 2rem;
            text-align: center;
        }
        
        .social-login p {
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            position: relative;
        }
        
        .social-login p::before,
        .social-login p::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background-color: #e5e7eb;
        }
        
        .social-login p::before {
            left: 0;
        }
        
        .social-login p::after {
            right: 0;
        }
        
        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }
        
        .social-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: white;
            border: 1px solid var(--light-gray);
            color: var(--text-color);
            transition: var(--transition);
        }
        
        .social-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .social-button.apple { color: #000; }
        .social-button.facebook { color: #1877f2; }
        .social-button.google { color: #ea4335; }
        .social-button.instagram { 
            background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
            color: white;
        }
        
        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }
        
        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        .password-strength {
            margin-top: 0.5rem;
            height: 4px;
            background-color: #e5e7eb;
            border-radius: 2px;
            overflow: hidden;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0;
            background-color: #ef4444;
            transition: width 0.3s ease;
        }
        
        @media (max-width: 640px) {
            .registration-container {
                padding: 1.75rem;
                margin: 1rem;
            }
            
            .social-buttons {
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <div class="registration-header">
            <h2>Créer un compte étudiant</h2>
            <p>Remplissez le formulaire pour accéder au système de paiement</p>
        </div>
        
        <form action="inscription_action.php" method="POST" class="ui form" id="registrationForm" novalidate>
            <div class="field">
                <label for="nom">Nom complet</label>
                <input type="text" id="nom" name="nom" placeholder="Votre nom complet" required>
            </div>
            
            <div class="field">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" placeholder="votre@email.com" required>
            </div>
            
            <div class="field">
                <label for="mot_de_passe">Mot de passe</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="••••••••" required minlength="8">
                <div class="password-strength">
                    <div class="password-strength-bar" id="passwordStrength"></div>
                </div>
                <small style="color: #6b7280; font-size: 0.8rem;">Minimum 8 caractères</small>
            </div>
            
            <div class="two fields">
                <div class="field">
                    <label for="promotion">Promotion</label>
                    <select id="promotion" name="promotion" class="ui dropdown" required>
                        <option value="">Sélectionnez...</option>
                        <option value="L1">L1</option>
                        <option value="L2">L2</option>
                        <option value="L3">L3</option>
                    </select>
                </div>
                
                <div class="field">
                    <label for="filiere">Filière</label>
                    <select id="filiere" name="filiere" class="ui dropdown" required>
                        <option value="">Sélectionnez...</option>
                        <option value="BA">BA</option>
                        <option value="LG">LG</option>
                        <option value="CTI">CTI</option>
                        <option value="SPA">SPA</option>
                        <option value="THEOLOGIE">Théologie</option>
                    </select>
                </div>
            </div>
            
            <button class="ui primary button fluid" type="submit">S'inscrire</button>
            
            <div class="login-link">
                Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a>
            </div>
        </form>
        
        <div class="social-login">
            <p>Ou inscrivez-vous avec</p>
            <div class="social-buttons">
                <a href="https://appleid.apple.com/sign-in" class="social-button apple" aria-label="Connexion avec Apple">
                    <i class="apple icon"></i>
                </a>
                <a href="mailto:contact@ecole.com" class="social-button" aria-label="Contact par email">
                    <i class="envelope icon"></i>
                </a>
                <a href="https://www.facebook.com/" class="social-button facebook" aria-label="Connexion avec Facebook">
                    <i class="facebook icon"></i>
                </a>
                <a href="https://accounts.google.com/" class="social-button google" aria-label="Connexion avec Google">
                    <i class="google icon"></i>
                </a>
                <a href="https://www.instagram.com/" class="social-button instagram" aria-label="Connexion avec Instagram">
                    <i class="instagram icon"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- JavaScript optimisé -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registrationForm');
            const passwordInput = document.getElementById('mot_de_passe');
            const passwordStrength = document.getElementById('passwordStrength');
            
            // Animation d'entrée
            setTimeout(() => {
                document.querySelector('.registration-container').style.opacity = '1';
                document.querySelector('.registration-container').style.transform = 'translateY(0)';
            }, 50);
            
            // Vérification de la force du mot de passe
            passwordInput.addEventListener('input', function() {
                const strength = calculatePasswordStrength(this.value);
                updatePasswordStrengthBar(strength);
            });
            
            function calculatePasswordStrength(password) {
                let strength = 0;
                
                // Longueur
                if (password.length > 7) strength += 1;
                if (password.length > 11) strength += 1;
                
                // Complexité
                if (/[A-Z]/.test(password)) strength += 1;
                if (/[0-9]/.test(password)) strength += 1;
                if (/[^A-Za-z0-9]/.test(password)) strength += 1;
                
                return Math.min(strength, 5);
            }
            
            function updatePasswordStrengthBar(strength) {
                const colors = ['#ef4444', '#f97316', '#f59e0b', '#10b981', '#3b82f6'];
                const width = (strength / 5) * 100;
                
                passwordStrength.style.width = `${width}%`;
                passwordStrength.style.backgroundColor = colors[strength - 1] || colors[0];
            }
            
            // Validation du formulaire
            form.addEventListener('submit', function(e) {
                // Validation supplémentaire pourrait être ajoutée ici
            });
        });
    </script>
</body>
</html>