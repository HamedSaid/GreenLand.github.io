document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form');
    const username = document.getElementById('user_name');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const phoneNumber = document.getElementById('Phone_Number');
    const textarea = document.getElementById('text_area');

    // Function for submit button
    form.addEventListener('submit', (e) => {
        // If validation fails, prevent form submission
        if (!validateInputs()) {
            e.preventDefault();
        }
    });

    // Show error messages for invalid input
    const setError = (element, message) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');
        errorDisplay.innerText = message;
        inputControl.classList.add('error');
        inputControl.classList.remove('success');
    };

    // Remove error messages and mark input as valid
    const setSuccess = (element) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');
        errorDisplay.innerText = '';
        inputControl.classList.add('success');
        inputControl.classList.remove('error');
    };

    // Validate inputs
    const validateInputs = () => {
        let isValid = true;

        // Trim input values
        const usernameValue = username.value.trim();
        const emailValue = email.value.trim();
        const passwordValue = password.value.trim();
        const phoneNumberValue = phoneNumber.value.trim();

        // Validation for username
        if (usernameValue === '') {
            setError(username, 'Username is required');
            isValid = false;
        } else if (usernameValue.length < 5) {
            setError(username, 'Username must be at least 5 characters');
            isValid = false;
        } else {
            setSuccess(username);
        }

        // Validation for email
      // Function to validate the email format (if needed)
        function isValidEmail(email) {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }

        // Validation logic for email input
        if (emailValue.trim() === '') {
            setError(email, 'Email is required');
            isValid = false;
        } else if (!isValidEmail(emailValue)) {
            setError(email, 'Invalid email format');
            isValid = false;
        } else {
            setSuccess(email);
        }


        // Validation for password
        if (passwordValue === '') {
            setError(password, 'Password is required');
            isValid = false;
        } else if (passwordValue.length < 8) {
            setError(password, 'Password must be at least 8 characters');
            isValid = false;
        } else {
            setSuccess(password);
        }

        // Validation for phone number
        if (phoneNumberValue === '') {
            setError(phoneNumber, 'Phone number is required');
            isValid = false;
        } else if (phoneNumberValue.length < 9) {
            setError(phoneNumber, 'Phone number must be at least 9 digits');
            isValid = false;
        } else {
            setSuccess(phoneNumber);
        }

        return isValid;
    };
});
