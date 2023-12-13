
// code for visible password in login or register page
function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var showPasswordCheckbox = document.getElementById("showPassword");

    passwordInput.type = showPasswordCheckbox.checked ? "text" : "password";
}

// code for alert fix time to hide
setTimeout(function () {
    var errorAlert = document.getElementById('alert');
    if (errorAlert) {
        errorAlert.style.display = 'none';
    }
}, 2000);

