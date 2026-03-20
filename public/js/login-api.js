document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('loginForm');
  const togglePasswordBtn = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');

  if (!form) return; 


  if (togglePasswordBtn) {
    togglePasswordBtn.addEventListener('click', function(e) {
      e.preventDefault();
      const type = passwordInput.type === 'password' ? 'text' : 'password';
      passwordInput.type = type;
      
  
      togglePasswordBtn.style.opacity = type === 'text' ? '1' : '0.6';
    });
  }


  form.addEventListener('submit', function(e) {
    e.preventDefault();
    
 
    clearErrors();
    

    const isValid = validateForm();
    
    if (isValid) {
      submitFormToServer();
    }
  });


  form.addEventListener('input', function(e) {
    const field = e.target;
    
    if (field.id === 'email') {
      validateEmail();
    } else if (field.id === 'password') {
      validatePassword();
    }
  });
});

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
  
  if (password.length < 1) {
    error.textContent = 'Password is required';
    return false;
  }
  
  error.textContent = '';
  return true;
}

function validateForm() {
  return (
    validateEmail() &&
    validatePassword()
  );
}

function clearErrors() {
  document.querySelectorAll('.error-message').forEach(el => {
    el.textContent = '';
  });
}


function submitFormToServer() {
  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value;

  const data = {
    email: email,
    password: password
  };

  fetch('/api/login', {
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
      alert('Login successful! Redirecting...');
      window.location.href = '/';
    }
  })
  .catch(error => {
    console.error('Error:', error);
    // Show error in the appropriate field
    if (error.message.includes('Email')) {
      document.getElementById('emailError').textContent = error.message;
    } else if (error.message.includes('Password')) {
      document.getElementById('passwordError').textContent = error.message;
    } else {
      alert(error.message || 'An error occurred during login');
    }
  });
}
