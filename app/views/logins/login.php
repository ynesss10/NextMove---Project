<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login - Next Move</title>
  <link rel="stylesheet" href="/css/login.css" />
</head>
<body>
  <?php $errorMessage = $errorMessage ?? ''; $email = $email ?? ''; ?>
  <div class="register-container">
    <div class="register-card">
      <div class="card-header">
        <h1>Welcome Back</h1>
        <p>Login to continue on your career journey</p>
      </div>

      <form id="loginForm" class="register-form" action="/logins" method="POST">
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" placeholder="you@example.com" value="<?= htmlspecialchars($email) ?>" required>
          <span class="error-message" id="emailError"></span>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <div class="password-wrapper">
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <button type="button" class="toggle-password" id="togglePassword">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
              </svg>
            </button>
          </div>
          <span class="error-message" id="passwordError"></span>
        </div>

        <?php if (!empty($errorMessage)): ?>
          <div id="formError" class="error-message" style="text-align: center; display: block; margin-bottom: 1rem;"><?= htmlspecialchars($errorMessage) ?></div>
        <?php else: ?>
          <div id="formError" class="error-message" style="text-align: center; display: none; margin-bottom: 1rem;"></div>
        <?php endif; ?>

        <button type="submit" class="submit-btn">Login</button>
      </form>

      <div class="card-footer">
        <p>Don't have an account? <a href="/registers">Sign Up</a></p>
      </div>
    </div>
  </div>

  <script src="/js/login.js"></script>
</body>
</html>
