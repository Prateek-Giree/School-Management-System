
function togglePasswordVisibility(passwordInputId) {
    const passwordInput = document.getElementById(passwordInputId);

    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);
}

