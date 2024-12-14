// first write variavles for each element want to edit it by using their ids
const form = document.getElementById('form');
const username = document.getElementById('user_name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const phoneNumber = document.getElementById('Phone_Number');
const textarea = document.getElementById('text_area');

// function for submit button
form.addEventListener('submit', (e) => {
    // If validation fails, prevent submission
    if (!validateInputs()) {
        e.preventDefault();
    }
});

// recieve two parameters if is it error, will add error and remove success
const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
};

// recieve two parameters if is it error, will add success and remove error
const setSuccess = (element) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

//remove any addition sapces and checking inputs
const validateInputs = () => {
    // remove any addition sapces
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const phoneNumberValue = phoneNumber.value.trim();
    

    // Validation username
    // if empty (false)
    if (usernameValue === '') {
        setError(username, 'Username is required');
    }
    // checking lenght (false)
     else if (usernameValue.length < 5) {
        setError(username, 'Username must be at least 5 characters');
    } 
    // true
    else {
        setSuccess(username);
    }

    // Validation email
     // if empty (false)
    if (emailValue === '') {
        setError(email, 'Email is required');
    }  
    // true
    else {
        setSuccess(email);
    }

    // Validation password
     // if empty (false)
    if (passwordValue === '') {
        setError(password, 'Password is required');
    }
    // checking lenght (false)
    else if (passwordValue.length < 8) {
        setError(password, 'Password must be at least 8 characters');
    } 
    // true
    else {
        setSuccess(password);
    }

    // Validation phone number
     // if empty (false)
    if (phoneNumberValue === '') {
        setError(phoneNumber, 'Phone number is required');
    } 
    // checking lenght (false)
    else if (phoneNumberValue.length < 9) {
        setError(phoneNumber, 'Phone number must be at least 9 digits');
    }
    // true
    else {
        setSuccess(phoneNumber);
    }   
};



