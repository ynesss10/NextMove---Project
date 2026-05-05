const registerForm = document.getElementById('registerForm');
const fullnameInput = document.getElementById('fullname');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm-password');
const termsInput = document.getElementById('terms');
const togglePasswordBtn = document.getElementById('togglePassword');
const toggleConfirmPasswordBtn = document.getElementById('toggleConfirmPassword');
const formErrorEl = document.getElementById('formError');


togglePasswordBtn.addEventListener('click', (e) => {
  e.preventDefault();
  const type = passwordInput.type === 'password' ? 'text' : 'password';
  passwordInput.type = type;
  togglePasswordBtn.classList.toggle('active');
});

if (toggleConfirmPasswordBtn) {
  toggleConfirmPasswordBtn.addEventListener('click', (e) => {
    e.preventDefault();
    const type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
    confirmPasswordInput.type = type;
    toggleConfirmPasswordBtn.classList.toggle('active');
  });
}


const validateFullname = () => {
  const fullname = fullnameInput.value.trim();
  const errorEl = document.getElementById('fullnameError');
  
  if (!fullname) {
    errorEl.textContent = 'Nama lengkap harus diisi';
    return false;
  }
  
  if (fullname.length < 3) {
    errorEl.textContent = 'Nama minimal 3 karakter';
    return false;
  }
  
  errorEl.textContent = '';
  return true;
};

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

const validateConfirmPassword = () => {
  const password = passwordInput.value;
  const confirmPassword = confirmPasswordInput.value;
  const errorEl = document.getElementById('confirmPasswordError');
  
  if (!confirmPassword) {
    errorEl.textContent = 'Konfirmasi password harus diisi';
    return false;
  }
  
  if (password !== confirmPassword) {
    errorEl.textContent = 'Password tidak cocok';
    return false;
  }
  
  errorEl.textContent = '';
  return true;
};

const validateTerms = () => {
  const errorEl = document.getElementById('termsError');
  
  if (!termsInput.checked) {
    errorEl.textContent = 'Anda harus menyetujui syarat dan ketentuan';
    return false;
  }
  
  errorEl.textContent = '';
  return true;
};


fullnameInput.addEventListener('blur', validateFullname);
emailInput.addEventListener('blur', validateEmail);
passwordInput.addEventListener('blur', validatePassword);
confirmPasswordInput.addEventListener('blur', validateConfirmPassword);
termsInput.addEventListener('change', validateTerms);


registerForm.addEventListener('submit', (e) => {
  e.preventDefault();
  formErrorEl.textContent = '';
  formErrorEl.style.display = 'none';

  const isFullnameValid = validateFullname();
  const isEmailValid = validateEmail();
  const isPasswordValid = validatePassword();
  const isConfirmPasswordValid = validateConfirmPassword();
  const isTermsValid = validateTerms();
  
  if (!isFullnameValid || !isEmailValid || !isPasswordValid || !isConfirmPasswordValid || !isTermsValid) {
    return;
  }

  registerForm.submit();
});
