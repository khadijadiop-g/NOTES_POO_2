<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Connexion - École Primaire Al Amal</title>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    background: linear-gradient(135deg, #f0fdf4 0%, #f5f6f8 100%);
    color: #1a1a2e;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }

  /* ===== TOP NAVBAR ===== */
  .navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff;
    padding: 12px 32px;
    border-bottom: 1px solid #e8e8ec;
  }

  .navbar-brand {
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 1.5px;
    color: #4a5568;
    text-transform: uppercase;
  }

  .navbar-right {
    display: flex;
    align-items: center;
    gap: 16px;
  }

  .year-badge {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    font-weight: 600;
    color: #2d3748;
    background: #f0fdf4;
    padding: 6px 14px;
    border-radius: 20px;
    border: 1px solid #bbf7d0;
  }

  .year-badge .dot {
    width: 8px;
    height: 8px;
    background: #22c55e;
    border-radius: 50%;
  }

  /* ===== LOGIN CONTAINER ===== */
  .login-container {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
  }

  .login-card {
    background: #fff;
    border: 1px solid #e8e8ec;
    border-radius: 16px;
    padding: 48px;
    width: 100%;
    max-width: 440px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
  }

  .login-header {
    text-align: center;
    margin-bottom: 32px;
  }

  .login-logo {
    width: 72px;
    height: 72px;
    background: linear-gradient(135deg, #166534 0%, #16a34a 100%);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    box-shadow: 0 4px 12px rgba(22, 101, 52, 0.2);
  }

  .login-logo svg {
    width: 40px;
    height: 40px;
    color: #fff;
  }

  .login-title {
    font-size: 28px;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 8px;
  }

  .login-subtitle {
    font-size: 15px;
    color: #64748b;
  }

  /* ===== FORM ELEMENTS ===== */
  .form-group {
    margin-bottom: 20px;
  }

  .form-label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #334155;
    margin-bottom: 8px;
  }

  .form-label .required {
    color: #dc2626;
    margin-left: 2px;
  }

  .input-wrapper {
    position: relative;
  }

  .input-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    color: #94a3b8;
    pointer-events: none;
  }

  .form-input {
    width: 100%;
    padding: 14px 16px 14px 46px;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    font-size: 15px;
    background: #fff;
    color: #1e293b;
    outline: none;
    transition: all 0.2s;
  }

  .form-input::placeholder {
    color: #94a3b8;
  }

  .form-input:focus {
    border-color: #16a34a;
    box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1);
  }

  .form-input:hover:not(:focus) {
    border-color: #cbd5e1;
  }

  .password-toggle {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #94a3b8;
    cursor: pointer;
    padding: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .password-toggle:hover {
    color: #64748b;
  }

  .password-toggle svg {
    width: 20px;
    height: 20px;
  }

  /* ===== CHECKBOX ===== */
  .checkbox-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 24px;
  }

  .checkbox-input {
    width: 18px;
    height: 18px;
    border: 2px solid #cbd5e1;
    border-radius: 5px;
    cursor: pointer;
    accent-color: #166534;
  }

  .checkbox-label {
    font-size: 14px;
    color: #475569;
    cursor: pointer;
    user-select: none;
  }

  .forgot-password {
    margin-left: auto;
    font-size: 14px;
    color: #16a34a;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.2s;
  }

  .forgot-password:hover {
    color: #14532d;
    text-decoration: underline;
  }

  /* ===== BUTTON ===== */
  .btn-login {
    width: 100%;
    padding: 16px 24px;
    background: linear-gradient(135deg, #166534 0%, #16a34a 100%);
    color: #fff;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s;
    box-shadow: 0 4px 12px rgba(22, 101, 52, 0.3);
  }

  .btn-login:hover {
    background: linear-gradient(135deg, #14532d 0%, #15803d 100%);
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(22, 101, 52, 0.4);
  }

  .btn-login:active {
    transform: translateY(0);
  }

  /* ===== DIVIDER ===== */
  .divider {
    display: flex;
    align-items: center;
    margin: 28px 0;
    color: #94a3b8;
    font-size: 13px;
  }

  .divider::before,
  .divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: #e2e8f0;
  }

  .divider span {
    padding: 0 16px;
  }

  /* ===== HELP SECTION ===== */
  .help-section {
    text-align: center;
    margin-top: 24px;
    padding-top: 24px;
    border-top: 1px solid #f1f5f9;
  }

  .help-text {
    font-size: 14px;
    color: #64748b;
    margin-bottom: 12px;
  }

  .help-link {
    color: #16a34a;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.2s;
  }

  .help-link:hover {
    color: #14532d;
    text-decoration: underline;
  }

  /* ===== FOOTER ===== */
  .login-footer {
    text-align: center;
    padding: 20px;
    color: #94a3b8;
    font-size: 13px;
  }

  .login-footer a {
    color: #64748b;
    text-decoration: none;
    margin: 0 8px;
    transition: color 0.2s;
  }

  .login-footer a:hover {
    color: #16a34a;
  }

  /* ===== RESPONSIVE ===== */
  @media (max-width: 640px) {
    .login-card {
      padding: 32px 24px;
    }

    .login-title {
      font-size: 24px;
    }

    .navbar {
      padding: 12px 16px;
    }
  }
</style>
</head>
<body>



<!-- LOGIN CONTAINER -->
<div class="login-container">
  <div class="login-card">
    <!-- Header -->
    <div class="login-header">
      <div class="login-logo">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
          <path d="M6 12v5c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2v-5"/>
          <path d="M12 22v-3"/>
        </svg>
      </div>
      <h1 class="login-title">Connexion</h1>
      <p class="login-subtitle">Accédez à votre espace de gestion scolaire</p>
    </div>

    <!-- Form -->
    <form action="http://localhost:8000/" method="POST">
      <div class="form-group">
        <label class="form-label">
          Adresse email
          <span class="required">*</span>
        </label>
        <div class="input-wrapper">
          <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
            <polyline points="22,6 12,13 2,6"/>
          </svg>
          <input name="email" type="email" class="form-input" placeholder="nom@exemple.com" required>
        </div>
      </div>

      <div class="form-group">
        <label class="form-label">
          Mot de passe
          <span class="required">*</span>
        </label>
        <div class="input-wrapper">
          <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
          </svg>
          <input  name="password" type="password" class="form-input" placeholder="••••••••" required>
          <button type="button" class="password-toggle" title="Afficher le mot de passe">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
              <circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>
      </div>

      <div class="checkbox-wrapper">
        <input type="checkbox" id="remember" class="checkbox-input">
        <label for="remember" class="checkbox-label">Se souvenir de moi</label>
        <a href="#" class="forgot-password">Mot de passe oublié ?</a>
      </div>

      <button type="submit" class="btn-login">
        Se connecter
      </button>

    </form>

    <!-- Divider -->
    <div class="divider">
      <span>ou continuer avec</span>
    </div>

    <!-- Help Section -->
    <div class="help-section">
      <p class="help-text">
        Vous n'avez pas encore de compte ?
        <a href="#" class="help-link">Contacter l'administration</a>
      </p>
      <p class="help-text">
        Besoin d'aide ?
        <a href="#" class="help-link">Support technique</a>
      </p>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="login-footer">
  <a href="#">Confidentialité</a> • 
  <a href="#">Conditions d'utilisation</a> • 
  <a href="#">Contact</a>
</footer>



</body>
</html>