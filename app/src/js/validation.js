function validate() {
    /*------------------Email Validation--------------*/
    let email = document.getElementById("email").value;
    let emailRegex = new RegExp("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$");
    if (!emailRegex.test(email)) {
        document.getElementById("validate").innerHTML = "Invalid Email";
        setTimeout(function () { document.getElementById("validate").innerHTML = ""; }, 3000);
        // alert('Invalid email');
        return false;
    }

    /*-----------------------------------------------*/

    
    /*------------------Name Validation--------------*/

    var name = document.getElementById('name').value;
    // Check if the name is not empty
    if (name.trim() === '') {
        document.getElementById("validate").innerHTML = "Name cannot be empty";
        setTimeout(function () { document.getElementById("validate").innerHTML = ""; }, 3000);
        // alert('Name cannot be empty');
        return false;
    }
    // Check if the name contains at least 4 letters
    if (name.length < 5) {
        document.getElementById("validate").innerHTML = "Name should contain at least 4 letters";
        setTimeout(function () { document.getElementById("validate").innerHTML = ""; }, 3000);
        // alert('Name should contain at least 4 letters');
        return false;
    }
    // Check if the name contains any numbers
    if (/\d/.test(name)) {
        document.getElementById("validate").innerHTML = "Name should only contain letters";
        setTimeout(function () { document.getElementById("validate").innerHTML = ""; }, 3000);
        // alert('Name should not contain numbers');
        return false;
    }
    /*-----------------------------------------------*/
    var message = document.getElementById('message').value;
    // Check if the name is not empty
    if (message.trim() === '') {
        document.getElementById("validate").innerHTML = "Message cannot be empty";
        setTimeout(function () { document.getElementById("validate").innerHTML = ""; }, 3000);
        // alert('Name cannot be empty');
        return false;
    }
    return true
}