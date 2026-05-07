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

// API Register
const registerForm = document.getElementById('registerForm');
if (registerForm) {
  registerForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const fullname = document.getElementById('fullname').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirm_password = document.getElementById('confirm-password').value;
    const formError = document.getElementById('formError');
    
    const formData = new FormData();
    formData.append('fullname', fullname);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('confirm_password', confirm_password);
    
    try {
      const response = await fetch('/api/register', {
        method: 'POST',
        body: formData
      });
      
      const data = await response.json();
      
      if (data.success) {
        window.location.href = data.redirect;
      } else {
        formError.textContent = data.message;
        formError.style.display = 'block';
      }
    } catch (error) {
      formError.textContent = 'Terjadi kesalahan, coba lagi';
      formError.style.display = 'block';
    }
  });
}
