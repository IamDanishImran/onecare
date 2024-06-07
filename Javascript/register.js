// Target form element
const form = document.querySelector('form');

// Target error message container
const errorText = document.getElementById('errorText');

// Function to display error message
function showError(message) {
  errorText.textContent = message;
  errorText.style.display = 'block'; // Make error message visible
}

// Function to hide error message
function hideError() {
  errorText.textContent = '';
  errorText.style.display = 'none'; // Hide error message
}

// Add event listener to form submission
form.addEventListener('submit', (event) => {
  event.preventDefault(); // Prevent default form submission behavior

  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;

  // Basic form validation (you can enhance this further)
  if (username.trim() === '') {
    showError('Please enter your username.');
    return;
  }

  if (password.trim() === '') {
    showError('Please enter your password.');
    return;
  }

  // Send data using AJAX (consider using a library like Fetch API)
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'login.php'); // Replace with your actual PHP script for login
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function () {
    if (xhr.status === 200) {
      // Handle successful login response from PHP script (redirect, display success message, etc.)
      console.log('Login successful!');
      // Replace with your desired action after successful login
      window.location.href = 'dashboard.html'; // Redirect to dashboard page (example)
    } else {
      showError('Invalid username or password.');
    }
  };

  const data = `username=${username}&password=${password}`;
  xhr.send(data);

  // Clear form fields after submission (optional)
  form.reset();
});
