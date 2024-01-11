document.addEventListener('DOMContentLoaded', function () {
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
        usernameInput.classList.remove('border-red-500');
        emailInput.classList.remove('border-red-500');
        passwordInput.classList.remove('border-red-500');

        const errors = {};

        // Validate username
        if (usernameInput.value.trim() === '') {
            errors.username = 'Username is required.';
            usernameInput.classList.add('border-red-500');
        } else if (!/^[a-zA-Z0-9]{3,}$/.test(usernameInput.value)) {
            errors.username = 'Invalid username. Username should be at least 3 characters long.';
        }

        // Validate email format
        if (emailInput.value.trim() === '') {
            errors.email = 'Email is required.';
            emailInput.classList.add('border-red-500');
        } else if (!emailRegex.test(emailInput.value)) {
            errors.email = 'Invalid email. Please use a valid Gmail address.';
        }

        // Validate password
        if (passwordInput.value.trim() === '') {
            errors.password = 'Password is required.';
            passwordInput.classList.add('border-red-500');
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
                console.log(data);
                if ( data) {
                    window.location.href = 'index.php?page=login';
                } else {
                    document.getElementById('err_message').innerText = data;
                    console.log(data.errors);
                }
            })
            .catch(error => console.error('Error:', error));
    }
});
