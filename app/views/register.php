<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up - Next Move</title>
  <link rel="stylesheet" href="/css/register.css">
</head>
<body>
  <?php $errorMessage = $errorMessage ?? ''; $fullname = $fullname ?? ''; $email = $email ?? ''; ?>
  <div class="register-container">
    <div class="register-card">
      <div class="card-header">
        <h1>Create Account</h1>
        <p>Join Next Move and discover your career path</p>
      </div>

      <form id="registerForm" class="register-form" action="/register" method="POST">
        <div class="form-group">
          <label for="fullname">Full Name</label>
          <input 
            type="text" 
            id="fullname" 
            name="fullname" 
            placeholder="John Doe"
            value="<?= htmlspecialchars($fullname) ?>"
            required
          >
          <span class="error-message" id="fullnameError"></span>
        </div>

        <div class="form-group">
          <label for="email">Email Address</label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            placeholder="you@example.com"
            value="<?= htmlspecialchars($email) ?>"
            required
          >
          <span class="error-message" id="emailError"></span>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <div class="password-wrapper">
            <input 
              type="password" 
              id="password" 
              name="password" 
              placeholder="Min. 8 characters"
              required
            >
            <button type="button" class="toggle-password" id="togglePassword">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
              </svg>
            </button>
          </div>
          <span class="error-message" id="passwordError"></span>
        </div>

        <div class="form-group">
          <label for="confirm-password">Confirm Password</label>
          <div class="password-wrapper">
          <input 
            type="password" 
            id="confirm-password" 
            name="confirm_password" 
            placeholder="Confirm your password"
            required
          >
            <button type="button" class="toggle-password" id="toggleConfirmPassword">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
              </svg>
            </button>
          </div>
          <span class="error-message" id="confirmPasswordError"></span>
        </div>

        <div class="form-group checkbox">
          <input type="checkbox" id="terms" name="terms" required>
          <label for="terms">I agree to the Terms and Conditions</label>
          <span class="error-message" id="termsError"></span>
        </div>

        <?php if (!empty($errorMessage)): ?>
          <div id="formError" class="error-message" style="text-align: center; display: block; margin-bottom: 1rem;"><?= htmlspecialchars($errorMessage) ?></div>
        <?php else: ?>
          <div id="formError" class="error-message" style="text-align: center; display: none; margin-bottom: 1rem;"></div>
        <?php endif; ?>

        <button type="submit" class="submit-btn">Create Account</button>
      </form>

      <div class="card-footer">
        <p>Already have an account? <a href="/login">Sign In</a></p>
      </div>
    </div>
  </div>

  <script src="/js/register.js"></script>
</body>
</html>
