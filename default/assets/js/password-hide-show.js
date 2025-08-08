const PasswordField = document.querySelector(".form input[type='password']");
const ToggleButton = document.querySelector(".form .field .viewPassword");

ToggleButton.addEventListener('click', function () {
    // alert('Done!');
    if (PasswordField.type == 'password') {
        PasswordField.type = 'text';
        ToggleButton.classList.add('active');
    } else {
        PasswordField.type = 'password';
        ToggleButton.classList.remove('active');
    }
});