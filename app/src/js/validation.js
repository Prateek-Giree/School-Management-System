// Limit contact number length to 10
function limitContactLength(input) {
    if (input.value.length > 10) {
        input.value = input.value.slice(0, 10);
    }
}


// Grey-out future dates in date of birth field
var today = new Date().toISOString().split('T')[0];
document.getElementById("dob").setAttribute("max", today);


//----------------------------------------------------------------------------------------------
//Validating records before insertion
//----------------------------------------------------------------------------------------------

function validateUserInsertionForm() {
    var isNameValid = nameValidation('fullname', 'nameErr');
    var isEmailValid = emailValidation('email', 'emailErr');
    var isAddressValid = addressValidation('address', 'addressErr');
    var isContactValid = contactValidation('contact', 'contactErr');
    var isPasswordValid = passwordValidation('pass', 'passwordErr');
    var isPassMatch = checkPass('cpass', 'pass', 'cpassErr');

    // Check if all validations pass
    if (isNameValid && isEmailValid && isAddressValid && isContactValid && isPasswordValid && isPassMatch) {
        // All validations passed, allow form submission
        return true;
    } else {
        // At least one validation failed, prevent form submission
        return false;
    }
}

function validateStudentForm() {
    var isNameValid = nameValidation('fullname', 'nameErr');
    var isFatherNameValid = nameValidation('father', 'fNameErr');
    var isMotherNameValid = nameValidation('mother', 'mNameErr');
    var isAddressValid = addressValidation('address', 'addressErr');
    var isContactValid = contactValidation('contact', 'contactErr');
    var isDobValid = dobValidation('dob', 'dobErr');

    if (isNameValid && isFatherNameValid && isMotherNameValid && isAddressValid && isContactValid && isDobValid) {
        return true;
    }
    else {
        return false;
    }
}

//----------------------------------------------------------------------------------------------
//Validating records before updating
//----------------------------------------------------------------------------------------------

function validateUserUpdateForm() {
    var isupdateNameValid = nameValidation('updateName', 'nameUpdateErr');
    var isupdateEmailValid = emailValidation('updateEmail', 'emailUpdateErr');
    var isupdateAddressValid = addressValidation('updateAddress', 'addressUpdateErr');
    var isupdateContactValid = contactValidation('updateContact', 'contactUpdateErr');

    if (isupdateNameValid && isupdateEmailValid && isupdateAddressValid && isupdateContactValid) {
        return true;
    }
    else {
        return false;
    }
}


//----------------------------------------------------------------------------------------------
// functions to validate input fields
//----------------------------------------------------------------------------------------------

function nameValidation(inputId, errorId) {
    var name = document.getElementById(inputId).value;
    var errorId = document.getElementById(errorId);
    errorId.innerHTML = "";
    const nameRegex = /^[a-zA-Z ]{4,}$/;
    if (!nameRegex.test(name)) {
        if (name.length < 4) {
            errorId.innerHTML = "Name is too short";
        }
        else {
            errorId.innerHTML = "Invalid name";
        }
        return false;
    }
    return true;
}

function emailValidation(inputId, errorId) {
    var email = document.getElementById(inputId).value;
    var errorId = document.getElementById(errorId);
    errorId.innerHTML = "";
    const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!emailRegex.test(email)) {
        errorId.innerHTML = "Invalid email";
        return false;
    }
    return true;
}

function addressValidation(inputId, errorId) {
    var address = document.getElementById(inputId).value;
    var errorId = document.getElementById(errorId);
    errorId.innerHTML = "";
    const addressRegex = /^(?=.*[a-zA-Z])[a-zA-Z0-9\s,'-]{4,}$/;
    if (!addressRegex.test(address)) {
        errorId.innerHTML = "Invalid address";
        return false;
    }
    return true;
}

function contactValidation(inputId, errorId) {
    var contact = document.getElementById(inputId).value;
    var errorId = document.getElementById(errorId);
    errorId.innerHTML = "";
    const contactRegex = /^(98|97)\d{8}$/;
    if (!contactRegex.test(contact)) {
        errorId.innerHTML = "Invalid contact no.";
        return false;
    }
    return true;
}

function passwordValidation(inputId, errorId) {
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*[^A-Za-z0-9]).{8,25}$/;
    var password = document.getElementById(inputId).value;
    var errorId = document.getElementById(errorId);
    errorId.innerHTML = "";
    if (!passwordRegex.test(password)) {
        if (password.length < 8) {
            errorId.innerHTML = "Password must be at least 8 characters long";
        }
        else {
            errorId.innerHTML = "Password must contain at least one letter and one special character";
        }
        return false;
    }
    return true;
}

function checkPass(inputId1, inputId2, errorId) {
    // for admin and teacher pages 
    var cpass = document.getElementById(inputId1).value;
    var pass = document.getElementById(inputId2).value;
    var errorId = document.getElementById(errorId);
    errorId.innerHTML = "";
    if (pass != cpass) {
        errorId.innerHTML = "Password does not match";
        return false;
    }
    return true;
}


function dobValidation(dateOfBirth, errorId) {
    var dob = document.getElementById(dateOfBirth).value;
    var errorId = document.getElementById(errorId);
    errorId.innerHTML = "";
    dob = new Date(dob);
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();

    // Check if the birthday has occurred this year
    if (today.getMonth() < dob.getMonth() ||
        (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
        age--;
    }
    // Check if the age falls within the specified range
    if (age < 6) {
        errorId.innerHTML = "<b>Invalid!</b> :Age must be greater than 6";
    }
    if (age > 16) {
        errorId.innerHTML = "<b>Invalid!</b> :Age must be less than 16";
    }
}

//----------------------------------------------------------------------------------------------
// Message field validation
//----------------------------------------------------------------------------------------------

function updateWordCount(inputId1, inputId2) {
    var messageTextarea = document.getElementById(inputId1);
    var displayCount = document.getElementById(inputId2);

    var message = messageTextarea.value.trim();
    var words = message.split(/\s+/);

    var wordCount = words.length;
    displayCount.innerHTML = wordCount + "/150";
}


function validateMessage(inputId1, errorId) {
    var messageTextarea = document.getElementById(inputId1);
    var errorElement = document.getElementById(errorId);

    var message = messageTextarea.value.trim();
    var words = message.split(/\s+/);

    var wordCount = words.length;
    errorElement.innerHTML = "";

    if (message === "") {
        errorElement.innerHTML = "Message cannot be empty";
        return false;
    }
    if (wordCount < 25) {
        errorElement.innerHTML = "Must be greater than 25 characters";
        return false;
    }
    if (wordCount > 150) {
        errorElement.innerHTML = "Cannot exceed 150 characters";
        return false;
    }
    return true;
}
