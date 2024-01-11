document.addEventListener('DOMContentLoaded', function () {

//// Login section ////

    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', function (event) {
        event.preventDefault();
        if (validateLoginForm()) {
            // If front-end validation passes, make AJAX request for login
            sendLoginAjaxRequest();
        }
    });

    function validateLoginForm() {
        const emailInput = document.querySelector('input[name="loginEmail"]');
        const passwordInput = document.querySelector('input[name="loginPassword"]');
        const emailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

        // Reset previous error messages
        document.getElementById('loginErrMessage').innerText = '';

        const errors = {};

        // Validate email format
        if (emailInput.value.trim() === '') {
            errors.email = 'Email is required.';
        } else if (!emailRegex.test(emailInput.value)) {
            errors.email = 'Invalid email. Please use a valid Gmail address.';
        }

        // Validate password
        if (passwordInput.value.trim() === '') {
            errors.password = 'Password is required.';
        }

        // Display error messages
        if (errors.email) {
            document.getElementById('loginErrMessage').innerText = errors.email;
            return false;
        }

        if (errors.password) {
            document.getElementById('loginErrMessage').innerText = errors.password;
            return false;
        }


        return true; // Return true if no errors, false otherwise
    }

    function sendLoginAjaxRequest() {
        const emailInput = document.querySelector('input[name="loginEmail"]');
        const passwordInput = document.querySelector('input[name="loginPassword"]');

        const dataToSend = {
            email: emailInput.value,
            password: passwordInput.value
        };

        fetch('index.php?page=login', {
            method: 'POST',
            body: JSON.stringify(dataToSend),
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.success) {
                    // Redirect or handle successful login
                    window.location.href = 'index.php';
                } else {
                    // Handle login failure, display appropriate error message
                    document.getElementById('loginErrMessage').innerText = data.message;
                }
            })
            .catch(error => console.error('Error:', error));
    }
});
