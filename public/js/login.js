const loginForm = document.getElementById('loginForm');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const togglePasswordBtn = document.getElementById('togglePassword');


togglePasswordBtn.addEventListener('click', (e) => {
  e.preventDefault();
  const type = passwordInput.type === 'password' ? 'text' : 'password';
  passwordInput.type = type;
  togglePasswordBtn.classList.toggle('active');
});


const validateEmail = () => {
  const email = emailInput.value.trim();
  const errorEl = document.getElementById('emailError');
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
  if (!email) {
    errorEl.textContent = 'Email harus diisi';
    return false;
  }
  
  if (!emailRegex.test(email)) {
    errorEl.textContent = 'Format email tidak valid';
    return false;
  }
  
  errorEl.textContent = '';
  return true;
};

const validatePassword = () => {
  const password = passwordInput.value;
  const errorEl = document.getElementById('passwordError');
  
  if (!password) {
    errorEl.textContent = 'Password harus diisi';
    return false;
  }
  
  if (password.length < 8) {
    errorEl.textContent = 'Password minimal 8 karakter';
    return false;
  }
  
  errorEl.textContent = '';
  return true;
};


emailInput.addEventListener('blur', validateEmail);
passwordInput.addEventListener('blur', validatePassword);


loginForm.addEventListener('submit', async (e) => {
  e.preventDefault();
  

  const isEmailValid = validateEmail();
  const isPasswordValid = validatePassword();
  
  if (!isEmailValid || !isPasswordValid) {
    return;
  }
  
  // Prepare data
  const formData = {
    email: emailInput.value.trim(),
    password: passwordInput.value
  };
  
  try {
    const response = await fetch('/api/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(formData)
    });
    
    const result = await response.json();
    
    if (response.ok) {
      alert('Login berhasil!');
      window.location.href = '/';
    } else {
      alert(result.message || 'Email atau password salah');
    }
  } catch (error) {
    console.error('Error:', error);
    alert('Terjadi kesalahan jaringan');
  }
});
