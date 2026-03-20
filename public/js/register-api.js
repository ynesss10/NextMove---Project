// Register Form Handler with Database Integration
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('registerForm');
  const togglePasswordBtn = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');
  const confirmPasswordInput = document.getElementById('confirm-password');

  if (!form) return; // Exit if form doesn't exist

  // Toggle Password Visibility
  if (togglePasswordBtn) {
    togglePasswordBtn.addEventListener('click', function(e) {
      e.preventDefault();
      const type = passwordInput.type === 'password' ? 'text' : 'password';
      passwordInput.type = type;
      
      // Update icon appearance
      togglePasswordBtn.style.opacity = type === 'text' ? '1' : '0.6';
    });
  }

  // Form Submission
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Clear previous error messages
    clearErrors();
    
    // Validate all fields
    const isValid = validateForm();
    
    if (isValid) {
      submitFormToServer();
    }
  });

  // Real-time validation
  form.addEventListener('input', function(e) {
    const field = e.target;
    
    if (field.id === 'fullname') {
      validateFullname();
    } else if (field.id === 'email') {
      validateEmail();
    } else if (field.id === 'password') {
      validatePassword();
    } else if (field.id === 'confirm-password') {
      validateConfirmPassword();
    }
  });

  form.addEventListener('change', function(e) {
    if (e.target.id === 'terms') {
      validateTerms();
    }
  });
});

// Validation Functions
function validateFullname() {
  const fullname = document.getElementById('fullname').value.trim();
  const error = document.getElementById('fullnameError');
  
  if (fullname.length < 3) {
    error.textContent = 'Name must be at least 3 characters';
    return false;
  }
  
  error.textContent = '';
  return true;
}

function validateEmail() {
  const email = document.getElementById('email').value.trim();
  const error = document.getElementById('emailError');
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
  if (!emailRegex.test(email)) {
    error.textContent = 'Please enter a valid email address';
    return false;
  }
  
  error.textContent = '';
  return true;
}

function validatePassword() {
  const password = document.getElementById('password').value;
  const error = document.getElementById('passwordError');
  
  if (password.length < 8) {
    error.textContent = 'Password must be at least 8 characters';
    return false;
  }
  
  error.textContent = '';
  return true;
}

function validateConfirmPassword() {
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirm-password').value;
  const error = document.getElementById('confirmPasswordError');
  
  if (password !== confirmPassword) {
    error.textContent = 'Passwords do not match';
    return false;
  }
  
  error.textContent = '';
  return true;
}

function validateTerms() {
  const terms = document.getElementById('terms').checked;
  const error = document.getElementById('termsError');
  
  if (!terms) {
    error.textContent = 'You must agree to the terms and conditions';
    return false;
  }
  
  error.textContent = '';
  return true;
}

function validateForm() {
  return (
    validateFullname() &&
    validateEmail() &&
    validatePassword() &&
    validateConfirmPassword() &&
    validateTerms()
  );
}

function clearErrors() {
  document.querySelectorAll('.error-message').forEach(el => {
    el.textContent = '';
  });
}

// Submit form to server
function submitFormToServer() {
  const fullname = document.getElementById('fullname').value.trim();
  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirm-password').value;

  const data = {
    fullname: fullname,
    email: email,
    password: password,
    confirmPassword: confirmPassword
  };

  fetch('/api/register', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
  .then(response => {
    if (!response.ok) {
      return response.json().then(data => Promise.reject(data));
    }
    return response.json();
  })
  .then(data => {
    if (data.status) {
      // Success
      alert('Account created successfully! Redirecting to login...');
      window.location.href = '/logins';
    }
  })
  .catch(error => {
    console.error('Error:', error);
    alert(error.message || 'An error occurred during registration');
  });
}
