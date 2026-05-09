// Toggle password visibility
const togglePasswordBtn = document.getElementById('togglePassword');
if (togglePasswordBtn) {
  togglePasswordBtn.addEventListener('click', (e) => {
    e.preventDefault();
    const passwordInput = document.getElementById('password');
    const type = passwordInput.type === 'password' ? 'text' : 'password';
    passwordInput.type = type;
    togglePasswordBtn.classList.toggle('active');
  });
}

// Toggle confirm password visibility
const toggleConfirmPasswordBtn = document.getElementById('toggleConfirmPassword');
if (toggleConfirmPasswordBtn) {
  toggleConfirmPasswordBtn.addEventListener('click', (e) => {
    e.preventDefault();
    const confirmPasswordInput = document.getElementById('confirm-password');
    const type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
    confirmPasswordInput.type = type;
    toggleConfirmPasswordBtn.classList.toggle('active');
  });
}

