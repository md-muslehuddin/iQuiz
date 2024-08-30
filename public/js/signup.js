var submitBtn = document.getElementById("submitBtn");
var flag = false;
submitBtn.disabled = true;


// Function to check if the input is a valid name
function isValidName(input) {
    var namePattern = /^[A-Za-z\s]+$/;
    return namePattern.test(input);
}

var nameInput = document.getElementById("name");
var validationName = document.getElementById("validationName");

nameInput.addEventListener("blur", function () {
    var userInput = nameInput.value.trim();
    if (isValidName(userInput)) {
        flag = true;
        validationName.textContent = "";
    } else {
        flag = false;
        validationName.textContent = "Invalid name. Please enter a valid name.";
        validationName.style.color = "red";
    }
    hideAlert();
});

// Function to set the 'min' and 'max' attributes of the date input
function setMinMaxDate() {
    var currentDate = new Date();
    var minDate = new Date(currentDate);
    minDate.setFullYear(currentDate.getFullYear() - 99);
    var maxDate = new Date(currentDate);
    maxDate.setFullYear(currentDate.getFullYear());

    var dob = document.getElementById("dob");
    dob.min = minDate.toISOString().split("T")[0];
    dob.max = maxDate.toISOString().split("T")[0];
}

// Function to check if the input is a valid date of birth
function isValidDOB(dob) {
    var dobDate = new Date(dob);
    var currentYear = new Date().getFullYear();
    var minYear = currentYear - 99;
    return (
        !isNaN(dobDate.getTime()) &&
        dobDate.getFullYear() >= minYear &&
        dobDate.getFullYear() <= currentYear
    );
}

var dob = document.getElementById("dob");
var validationDOB = document.getElementById("validationDOB");
setMinMaxDate();
dob.addEventListener("blur", function () {
    var userInput = dob.value;
    if (!isValidDOB(userInput)) {
        flag = false;
        validationDOB.textContent = "Invalid date of birth. Please enter a valid date.";
        validationDOB.style.color = "red";
    } else {
        flag = true;
        validationDOB.textContent = "";
    }
    hideAlert();
});


// Function to check if the input is a valid contact number
function isValidContactNumber(contactNumber) {
    var contactPattern = /^\d{10}$/;
    return contactPattern.test(contactNumber);
}

var contact = document.getElementById("contact");
var validationContact = document.getElementById("validationContact");
contact.addEventListener("blur", function () {
    var userInput = contact.value.trim();
    if (isValidContactNumber(userInput)) {
        flag = true;
        validationContact.textContent = "";
    } else {
        flag = false;
        validationContact.textContent = "Invalid contact number. Please enter a 10-digit number.";
        validationContact.style.color = "red";
    }
    hideAlert();
});

// Function to check if the input is a valid username (email)
function isValidUsername(username) {
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(username);
}

var username = document.getElementById("username");
var validationUsername = document.getElementById("validationUsername");
// var submitBtn = document.getElementById("submitBtn");

// Initially, disable the submit button
// submitBtn.disabled = true;

username.addEventListener("blur", function () {
    var userInput = username.value.trim();
    if (isValidUsername(userInput)) {
        flag = true;
        validationUsername.textContent = "";
        // Check username availability using AJAX
        checkvalidationUsername(userInput);
    } else {
        flag = false;
        validationUsername.textContent = "Invalid username. Please enter a valid email address.";
        validationUsername.style.color = "red";
        // Disable the submit button if the username is invalid
        // submitBtn.disabled = true;
    }
    hideAlert();
});

function checkvalidationUsername(username) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response === "available") {
                // validationUsername.textContent = "Username is available.";
                // validationUsername.style.color = "green";
                // Enable the submit button if the username is available
                flag = true;
                // submitBtn.disabled = false;
            } else if (response === "exists") {
                flag = false;
                validationUsername.textContent = "Username already exists.";
                validationUsername.style.color = "red";
                // Disable the submit button if the username already exists
                // submitBtn.disabled = true;
            } else {
                flag = false;
                validationUsername.textContent = "Error checking username availability.";
                validationUsername.style.color = "red";
                // Disable the submit button if there's an error
                // submitBtn.disabled = true;
            }
        }
    };

    xhr.open("GET", "check_username.php?username=" + username, true);
    xhr.send();
}

// Function to validate password requirements

function validatePassword() {
    const password = document.getElementById("password").value;
    const passwordRequirements = document.getElementById("passwordRequirements");
    const validationPassword = document.getElementById("validationPassword");
    const lengthRegex = /.{8,}/;
    const digitRegex = /\d/;
    const lowercaseRegex = /[a-z]/;
    const uppercaseRegex = /[A-Z]/;
    const specialCharRegex = /[@#$%^&+=!]/;
    const isLengthValid = lengthRegex.test(password);
    const isDigitValid = digitRegex.test(password);
    const isLowercaseValid = lowercaseRegex.test(password);
    const isUppercaseValid = uppercaseRegex.test(password);
    const isSpecialCharValid = specialCharRegex.test(password);
    const isValid =
        isLengthValid &&
        isDigitValid &&
        isLowercaseValid &&
        isUppercaseValid &&
        isSpecialCharValid;

    if (!password) {
        // User didn't enter anything
        flag = false;
        validationPassword.style.color = "red";
        validationPassword.textContent = "Invalid password. Please enter a valid password.";
    } else if (isValid) {
        // Password is valid
        flag = true;
        passwordRequirements.style.display = "none";
        validationPassword.textContent = "";
    } else {
        // Password is invalid
        flag = false;
        passwordRequirements.style.display = "block";
        validationPassword.style.color = "red";
        validationPassword.textContent = "Password does not meet the requirements.";
    }
}

// Function to hide validation messages on blur
function hideValidationMessages() {
    const validationPassword = document.getElementById("validationPassword");
    const passwordRequirements = document.getElementById("passwordRequirements");
    validationPassword.textContent = "";
    passwordRequirements.style.display = "none";
}

// Add event listener for keyup on the password field
document.getElementById("password").addEventListener("keyup", validatePassword);

// Add event listener for blur on the password field
document.getElementById("password").addEventListener("blur", hideValidationMessages);
// 77777777777777777
// Function to validate password confirmation
function validatePasswordConfirmation() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confpassword").value;
    const validationMatchPassword = document.getElementById("validationMatchPassword");

    if (password === confirmPassword) {
        flag = true;
        validationMatchPassword.style.color = "green";
        validationMatchPassword.textContent = "Password Match";
    } else {
        flag = false;
        validationMatchPassword.style.color = "red";
        validationMatchPassword.textContent = "Password not Match";
    }
}

// Add event listener for input on the confirmation password field
document.getElementById("confpassword").addEventListener("input", validatePasswordConfirmation);
// 8888888

let passwordsChanged = false; // Variable to track if passwords have changed

// Function to validate password confirmation
function validatePasswordConfirmation() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confpassword").value;
    const validationMatchPassword = document.getElementById("validationMatchPassword");

    if (passwordsChanged && confirmPassword !== "") {
        // Check password match only if the passwords have changed and confpassword is not empty
        if (password === confirmPassword) {
            flag = true;
            validationMatchPassword.style.color = "green";
            validationMatchPassword.textContent = "Password Match";
            // Hide the message after 3 seconds
            setTimeout(function () {
                validationMatchPassword.textContent = "";
            }, 3000);
        } else {
            flag = false;
            validationMatchPassword.style.color = "red";
            validationMatchPassword.textContent = "Password not Match";
        }
    } else {
        // No change in passwords or confpassword is empty, hide the message
        validationMatchPassword.textContent = "";
    }
}

// Add event listeners for input on both password fields
document.getElementById("password").addEventListener("input", function () {
    passwordsChanged = true; // Set the flag to indicate passwords have changed
    validatePasswordConfirmation();
});

document.getElementById("confpassword").addEventListener("input", function () {
    passwordsChanged = true; // Set the flag to indicate passwords have changed
    validatePasswordConfirmation();
});


// Add event listeners for password input fields
document.getElementById("password").addEventListener("input", validatePassword);
document.getElementById("confpassword").addEventListener("input", validatePasswordConfirmation);

// Function to hide validation messages after 3 seconds
function hideAlert() {
    setTimeout(function () {
        hideValidationMessage("validationName");
        hideValidationMessage("validationDOB");
        hideValidationMessage("validationFRName");
        hideValidationMessage("validationContact");
        hideValidationMessage("validationUsername");
    }, 3000);
}

function hideValidationMessage(elementId) {
    var element = document.getElementById(elementId);
    if (element) {
        element.textContent = "";
    }
}

function checkAllFunction() {

    if (flag) {
        enableSubmitButton();
    } else {
        disableSubmitButton();
    }
}


function enableSubmitButton() {
    submitBtn.disabled = false;
    submitBtn.style.backgroundColor = "#ff9900";
    submitBtn.style.color = "#fff";
    submitBtn.style.cursor = "pointer";
}
function disableSubmitButton() {
    submitBtn.disabled = true;
    submitBtn.style.backgroundColor = "#ccc";
    submitBtn.style.color = "#999";
    submitBtn.style.cursor = "not-allowed";
}
// function hover_colorSubmitButton() {
//     onmouseover = "this.style.background = 'linear-gradient(to bottom, #ff6600, #ff3300)'; this.style.color = 'white';"
//     onmouseout = "this.style.background = 'none'; this.style.color = 'inherit';"
// }