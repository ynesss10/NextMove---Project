// // Register Form Validation and Interactions
// document.addEventListener('DOMContentLoaded', function() {
//   const form = document.getElementById('registerForm');
//   const togglePasswordBtn = document.getElementById('togglePassword');
//   const passwordInput = document.getElementById('password');
//   const confirmPasswordInput = document.getElementById('confirm-password');

//   // Toggle Password Visibility
//   togglePasswordBtn.addEventListener('click', function(e) {
//     e.preventDefault();
//     const type = passwordInput.type === 'password' ? 'text' : 'password';
//     passwordInput.type = type;
    
//     // Update icon appearance
//     togglePasswordBtn.style.opacity = type === 'text' ? '1' : '0.6';
//   });

//   // Form Submission
//   form.addEventListener('submit', function(e) {
//     e.preventDefault();
    
//     // Clear previous error messages
//     clearErrors();
    
//     // Validate all fields
//     const isValid = validateForm();
    
//     if (isValid) {
//       submitForm();
//     }
//   });

//   // Real-time validation
//   form.addEventListener('input', function(e) {
//     const field = e.target;
    
//     if (field.id === 'fullname') {
//       validateFullname();
//     } else if (field.id === 'email') {
//       validateEmail();
//     } else if (field.id === 'password') {
//       validatePassword();
//     } else if (field.id === 'confirm-password') {
//       validateConfirmPassword();
//     }
//   });

//   form.addEventListener('change', function(e) {
//     if (e.target.id === 'terms') {
//       validateTerms();
//     }
//   });
// });

// // Validation Functions
// function validateFullname() {
//   const fullname = document.getElementById('fullname').value.trim();
//   const error = document.getElementById('fullnameError');
  
//   if (fullname.length === 0) {
//     error.textContent = 'Full name is required';
//     return false;
//   } else if (fullname.length < 3) {
//     error.textContent = 'Full name must be at least 3 characters';
//     return false;
//   } else if (!/^[a-zA-Z\s]+$/.test(fullname)) {
//     error.textContent = 'Full name can only contain letters and spaces';
//     return false;
//   } else {
//     error.textContent = '';
//     return true;
//   }
// }

// function validateEmail() {
//   const email = document.getElementById('email').value.trim();
//   const error = document.getElementById('emailError');
//   const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
//   if (email.length === 0) {
//     error.textContent = 'Email is required';
//     return false;
//   } else if (!emailRegex.test(email)) {
//     error.textContent = 'Please enter a valid email address';
//     return false;
//   } else {
//     error.textContent = '';
//     return true;
//   }
// }

// function validatePassword() {
//   const password = document.getElementById('password').value;
//   const error = document.getElementById('passwordError');
  
//   if (password.length === 0) {
//     error.textContent = 'Password is required';
//     return false;
//   } else if (password.length < 8) {
//     error.textContent = 'Password must be at least 8 characters';
//     return false;
//   } else if (!/[A-Z]/.test(password)) {
//     error.textContent = 'Password must contain at least one uppercase letter';
//     return false;
//   } else if (!/[0-9]/.test(password)) {
//     error.textContent = 'Password must contain at least one number';
//     return false;
//   } else {
//     error.textContent = '';
//     return true;
//   }
// }

// function validateConfirmPassword() {
//   const password = document.getElementById('password').value;
//   const confirmPassword = document.getElementById('confirm-password').value;
//   const error = document.getElementById('confirmPasswordError');
  
//   if (confirmPassword.length === 0) {
//     error.textContent = 'Please confirm your password';
//     return false;
//   } else if (password !== confirmPassword) {
//     error.textContent = 'Passwords do not match';
//     return false;
//   } else {
//     error.textContent = '';
//     return true;
//   }
// }

// function validateTerms() {
//   const terms = document.getElementById('terms').checked;
//   const error = document.getElementById('termsError');
  
//   if (!terms) {
//     error.textContent = 'You must agree to the terms';
//     return false;
//   } else {
//     error.textContent = '';
//     return true;
//   }
// }

// function validateForm() {
//   const isFullnameValid = validateFullname();
//   const isEmailValid = validateEmail();
//   const isPasswordValid = validatePassword();
//   const isConfirmPasswordValid = validateConfirmPassword();
//   const isTermsValid = validateTerms();
  
//   return isFullnameValid && isEmailValid && isPasswordValid && isConfirmPasswordValid && isTermsValid;
// }

// function clearErrors() {
//   const errorMessages = document.querySelectorAll('.error-message');
//   errorMessages.forEach(error => {
//     error.textContent = '';
//   });
// }

// function submitForm() {
//   const form = document.getElementById('registerForm');
//   const submitBtn = form.querySelector('.submit-btn');
  
//   // Disable button and show loading state
//   submitBtn.disabled = true;
//   submitBtn.textContent = 'Creating Account...';
  
//   // Prepare form data
//   const formData = new FormData(form);
//   const data = {
//     fullname: formData.get('fullname'),
//     email: formData.get('email'),
//     password: formData.get('password')
//   };
  
//   // Send to server (replace with your actual endpoint)
//   fetch('/api/register', {
//     method: 'POST',
//     headers: {
//       'Content-Type': 'application/json'
//     },
//     body: JSON.stringify(data)
//   })
//   .then(response => response.json())
//   .then(data => {
//     if (data.success) {
//       // Show success message
//       showSuccessMessage();
//       // Redirect after 2 seconds
//       setTimeout(() => {
//         window.location.href = '/login';
//       }, 2000);
//     } else {
//       showErrorAlert(data.message || 'Registration failed. Please try again.');
//       resetSubmitButton();
//     }
//   })
//   .catch(error => {
//     console.error('Error:', error);
//     showErrorAlert('An error occurred. Please try again.');
//     resetSubmitButton();
//   });
// }

// function resetSubmitButton() {
//   const submitBtn = document.querySelector('.submit-btn');
//   submitBtn.disabled = false;
//   submitBtn.textContent = 'Create Account';
// }

// function showSuccessMessage() {
//   const form = document.getElementById('registerForm');
//   const message = document.createElement('div');
//   message.className = 'success-message';
//   message.style.textAlign = 'center';
//   message.style.padding = '15px';
//   message.style.marginBottom = '20px';
//   message.style.backgroundColor = '#dcfce7';
//   message.style.borderRadius = '12px';
//   message.style.color = '#22c55e';
//   message.textContent = '✓ Account created successfully! Redirecting to login...';
  
//   form.insertAdjacentElement('beforebegin', message);
// }

// function showErrorAlert(message) {
//   alert('❌ ' + message);
// }
