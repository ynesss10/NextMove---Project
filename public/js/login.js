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

// API Login
const loginForm = document.getElementById('loginForm');
if (loginForm) {
  loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const formError = document.getElementById('formError');
    
    const formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);
    
    try {
      const response = await fetch('/api/login', {
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
