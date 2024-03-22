// Limit contact number length to 10
function limitContactLength(input) {
    if (input.value.length > 10) {
        input.value = input.value.slice(0, 10);
    }
}

//----------------------------------------------------------------------------------------------
//Validating teacher and admin records before insertion
//----------------------------------------------------------------------------------------------

function validateForm() {
    var isNameValid = nameValidation();
    var isEmailValid = emailValidation();
    var isAddressValid = addressValidation();
    var isContactValid = contactValidation();
    var isPasswordValid = passwordValidation();
    var isPassMatch = checkPass();

    // Check if all validations pass
    if (isNameValid && isEmailValid && isAddressValid && isContactValid && isPasswordValid && isPassMatch) {
        // All validations passed, allow form submission
        return true;
    } else {
        // At least one validation failed, prevent form submission
        return false;
    }
}

function nameValidation() {
    //for admin and teacher insertion
    var name = document.getElementById("fullname").value;
    var nameErr = document.getElementById("nameErr");
    nameErr.innerHTML = "";
    const nameRegex = /^[a-zA-Z ]{4,}$/;
    if (!nameRegex.test(name)) {
        if (name.length < 4) {
            nameErr.innerHTML = "Name is too short";
        }
        else {
            nameErr.innerHTML = "Invalid name";
        }
        return false;
    }
    return true;
}

function emailValidation() {
    var email = document.getElementById("email").value;
    var emailErr = document.getElementById("emailErr");
    emailErr.innerHTML = "";
    const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!emailRegex.test(email)) {
        emailErr.innerHTML = "Invalid email";
        return false;
    }
    return true;
}

function addressValidation() {
    var address = document.getElementById("address").value;
    var addressErr = document.getElementById("addressErr");
    addressErr.innerHTML = "";
    const addressRegex = /^(?=.*[a-zA-Z])[a-zA-Z0-9\s,'-]{4,}$/;
    if (!addressRegex.test(address)) {
        addressErr.innerHTML = "Invalid address";
        return false;
    }
    return true;
}

function contactValidation() {
    var contact = document.getElementById("contact").value;
    var contactErr = document.getElementById("contactErr");
    contactErr.innerHTML = "";
    const contactRegex = /^(98|97)\d{8}$/;
    if (!contactRegex.test(contact)) {
        contactErr.innerHTML = "Invalid contact no.";
        return false;
    }
    return true;
}

function passwordValidation() {
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*[^A-Za-z0-9]).{8,25}$/;
    //for admin and teacher pages
    var password = document.getElementById("pass").value;
    var passwordErr = document.getElementById("passwordErr");
    passwordErr.innerHTML = "";
    if (password.length < 8) {
        passwordErr.innerHTML = "Password must be at least 8 characters long";
    }
    else if (!passwordRegex.test(password)) {
        passwordErr.innerHTML = "Password must contain at least one letter and one special character";
        return false;
    }
    return true;
}

function checkPass() {
    // for admin and teacher pages 
    var pass = document.getElementById('pass').value;
    var cpass = document.getElementById('cpass').value;
    var cpassErr = document.getElementById('cpassErr');
    cpassErr.innerHTML = "";
    if (pass != cpass) {
        cpassErr.innerHTML = "Password does not match";
        return false;
    }
    return true;
}
//----------------------------------------------------------------------------------------------




//----------------------------------------------------------------------------------------------
//validation password change form
//----------------------------------------------------------------------------------------------

function newPassValidation() {
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*[^A-Za-z0-9]).{8,25}$/;
    var newPass = document.getElementById("newpass").value;
    var newPassErr = document.getElementById("newPassErr");
    newPassErr.innerHTML = "";
    if (newPass.length < 8) {
        newPassErr.innerHTML = "Password must be at least 8 characters long";
    }
    else if (!passwordRegex.test(newPass)) {
        newPassErr.innerHTML = "Password must contain at least one letter and one special character";
        return false;
    }
    return true;
}

function cPassCheck() {
    // for password change form
    var newPass = document.getElementById('newpass').value;
    var cnewPass = document.getElementById('cnewpass').value;
    var cnewPassErr = document.getElementById('cnewPassErr');
    cnewPassErr.innerHTML = "";
    if (newPass != cnewPass) {
        cnewPassErr.innerHTML = "Password does not match";
        return false;
    }
    return true;
}
//----------------------------------------------------------------------------------------------


//----------------------------------------------------------------------------------------------
//Validating teacher and admin records while updating
//----------------------------------------------------------------------------------------------

function updateValidation() {
    isupdateNameValid = nameUpdateValidation();
    isupdateEmailValid = emailUpdateValidation();
    isupdateAddressValid = addressUpdateValidation();
    isupdateContactValid = contactUpdateValidation();
    if (isupdateNameValid && isupdateEmailValid && isupdateAddressValid && isupdateContactValid) {
        return true;
    }
    return false;
}

function nameUpdateValidation() {
    const nameRegex = /^[a-zA-Z ]{4,}$/;
    var nameUp = document.getElementById('updateName').value;
    console.log(nameUp);
    var nameUpdateErr = document.getElementById('nameUpdateErr');
    nameUpdateErr.innerHTML = "";
    if (!nameRegex.test(nameUp)) {
        if (nameUp.length < 4) {
            nameUpdateErr.innerHTML = "Name is too short";
        }
        else {
            nameUpdateErr.innerHTML = "Invalid name";
        }
        return false;
    }
    return true;
}

function emailUpdateValidation() {
    var email = document.getElementById("updateEmail").value;
    var emailUpdateErr = document.getElementById("emailUpdateErr");
    emailUpdateErr.innerHTML = "";
    const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!emailRegex.test(email)) {
        emailUpdateErr.innerHTML = "Invalid email";
        return false;
    }
    return true;
}

function addressUpdateValidation() {
    var address = document.getElementById("updateAddress").value;
    var addressUpdateErr = document.getElementById("addressUpdateErr");
    addressUpdateErr.innerHTML = "";
    const addressRegex = /^(?=.*[a-zA-Z])[a-zA-Z0-9\s,'-]{4,}$/;
    if (!addressRegex.test(address)) {
        addressUpdateErr.innerHTML = "Invalid address";
        return false;
    }
    return true;

}

function contactUpdateValidation() {
    var contact = document.getElementById("updateContact").value;
    var contactUpdateErr = document.getElementById("contactUpdateErr");
    contactUpdateErr.innerHTML = "";
    const contactRegex = /^(98|97)\d{8}$/;
    if (!contactRegex.test(contact)) {
        contactUpdateErr.innerHTML = "Invalid contact no.";
        return false;
    }
    return true;
}

//----------------------------------------------------------------------------------------------


//----------------------------------------------------------------------------------------------
// Validating student records before insertion
//----------------------------------------------------------------------------------------------
