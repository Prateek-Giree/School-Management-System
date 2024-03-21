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

    //for password change form
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