document.addEventListener('DOMContentLoaded', function () {

//// Register section /////

    const registerForm = document.getElementById('registerForm');

    registerForm.addEventListener('submit', function (event) {
        event.preventDefault();
        if (validateForm()) {
            // If front-end validation passes, make AJAX request
            sendAjaxRequest();
        }
    });

    function validateForm() {
        const usernameInput = document.querySelector('input[name="username"]');
        const emailInput = document.querySelector('input[name="email"]');
        const passwordInput = document.querySelector('input[name="password"]');
        const emailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

        // Reset previous error messages
        document.getElementById('err_message').innerText = '';

        const errors = {};

        // Validate username
        if (usernameInput.value.trim() === '') {
            errors.username = 'Username is required.';
        } else if (!/^[a-zA-Z0-9]{3,}$/.test(usernameInput.value)) {
            errors.username = 'Invalid username. Username should be at least 3 characters long.';
        }

        // Validate email format
        if (emailInput.value.trim() === '') {
            errors.email = 'Email is required.';
        } else if (!emailRegex.test(emailInput.value)) {
            errors.email = 'Invalid email. Please use a valid Gmail address.';
        }

        // Validate password
        if (passwordInput.value.trim() === '') {
            errors.password = 'Password is required.';
        } else if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.test(passwordInput.value)) {
            errors.password = 'Invalid password. Password should have at least 8 characters, including one uppercase letter, one lowercase letter, and one number.';
        }

        // Display error messages
        if (errors.username) {
            document.getElementById('err_message').innerText = errors.username;
            return false;
        }

        if (errors.email) {
            document.getElementById('err_message').innerText = errors.email;
            return false;
        }

        if (errors.password) {
            document.getElementById('err_message').innerText = errors.password;
            return false;
        }

        return true; // Return true if no errors, false otherwise
    }



    function sendAjaxRequest() {
        const usernameInput = document.querySelector('input[name="username"]');
        const emailInput = document.querySelector('input[name="email"]');
        const passwordInput = document.querySelector('input[name="password"]');

        const dataToSend = {
            username: usernameInput.value,
            email: emailInput.value,
            password: passwordInput.value
        };

        fetch('index.php?page=register', {
            method: 'POST',
            body: JSON.stringify(dataToSend),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = 'index.php?page=login';
                } else if (data.errors.userExist_err !== false) {
                    document.getElementById('err_message').innerText += data.errors.userExist_err;
                } else if (data.errors.password_err !== false) {
                    document.getElementById('err_message').innerText += data.errors.password_err;
                } else if (data.errors.email_err !== false) {
                    document.getElementById('err_message').innerText += data.errors.email_err;
                } else if (data.errors.username_err !== false) {
                    document.getElementById('err_message').innerText += data.errors.username_err;
                }
            })
            .catch(error => console.error('Error:', error));
    }
});
