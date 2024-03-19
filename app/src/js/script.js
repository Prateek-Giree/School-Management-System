
document.addEventListener("DOMContentLoaded", function () {
    function togglePasswordVisibility(toggleElementId, passwordInputId) {
        const togglePassword = document.getElementById(toggleElementId);
        const passwordInput = document.getElementById(passwordInputId);

        togglePassword.addEventListener("click", function () {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);
        });
    }

    // Toggle password visibility for password field
    togglePasswordVisibility("togglePassword", "pass");

    // Toggle password visibility for confirm password field
    togglePasswordVisibility("ctogglePassword", "cpass");

    // Toggle password visibility for old password field
    togglePasswordVisibility("toggleOldPass", "oldpass");

    // Toggle password visibility for new password field
    togglePasswordVisibility("toggleNewPass", "newpass");

    // Toggle password visibility for confirm new password field
    togglePasswordVisibility("toggleCNewPass", "cnewpass");
});
