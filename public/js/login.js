const loginForm = document.getElementById('loginForm');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const togglePasswordBtn = document.getElementById('togglePassword');
const formErrorEl = document.getElementById('formError');


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


loginForm.addEventListener('submit', (e) => {
  e.preventDefault();
  formErrorEl.textContent = '';
  formErrorEl.style.display = 'none';

  const isEmailValid = validateEmail();
  const isPasswordValid = validatePassword();
  
  if (!isEmailValid || !isPasswordValid) {
    return;
  }

  loginForm.submit();
});
