const form = document.querySelector('.form');
const loginBtn = document.querySelector('.loginBtn');
const errorText = document.querySelector('.error-msg');
const subError = document.querySelector('.sub-error');


form.onsubmit = (e) => {
    e.preventDefault();
}


loginBtn.onclick = () => {
    let xhr = new XMLHttpRequest(); // create new XML object
    xhr.open("POST", "php/login.php", true);

    xhr.onload = () => { // once AJAX loaded
        if (xhr.readyState == 4 && xhr.status == 200) {
            let response = JSON.parse(xhr.responseText); // Parse the JSON response
            if (response.status != 'locked') {
                errorText.textContent = response.status;
            }

            function myFunction(x) {
                if (x.matches) { // If media query matches
                    if (response.status === 'success') {
                        location.href = 'php/validate.php';
                    } else if (response.status === 'locked') {
                        alert(`Your account is locked. Try again in ${Math.floor(response.time_remaining / 60)}:${response.time_remaining % 60}`);
                    } else {
                        alert(response.message || 'An error occurred');
                    }
                } else {
                    if (response.status === 'success') {
                        location.href = 'php/validate.php';
                    } else if (response.status === 'locked') {
                        errorText.style.display = 'none';
                        subError.style.display = 'block';
                        startCountdown(response.time_remaining); // Start countdown timer
                    } else {
                        errorText.textContent = response.message || response.status;
                        errorText.style.display = 'block';
                    }
                }
            }

            var x = window.matchMedia("(max-width: 400px)");
            myFunction(x); // Call listener function at run time
            x.addListener(myFunction); // Attach listener function on state changes
        }
    };

    let formData = new FormData(form);
    xhr.send(formData);
};

// Countdown Timer Function
function startCountdown(timeRemaining) {
    const interval = setInterval(() => {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;

        // Display countdown in the subError box
        subError.innerHTML = `Your account is locked. Please! Try again in ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

        timeRemaining--;

        // Stop the countdown when timeRemaining reaches zero
        if (timeRemaining < 0) {
            clearInterval(interval);
            subError.innerHTML = 'You can now try logging in again.';

            setTimeout(() => {
                window.location.reload();
            }, 1000);
        }
    }, 1000); // Update every second
}
