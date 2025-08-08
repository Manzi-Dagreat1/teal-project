const slashOpen = document.querySelector('.slashOpen');
const slashClose = document.querySelector('.slashClose');
const modalNotify = document.querySelector('.modal-notify');
const defaultBackDrop = document.querySelector('.default-back-drop');

// Helper function to safely add event listeners
function safeAddEventListener(element, event, handler) {
    if (element) {
        element.addEventListener(event, handler);
    }
}

// Helper function to safely set onclick
function safeSetOnclick(element, handler) {
    if (element) {
        element.onclick = handler;
    }
}

safeSetOnclick(slashOpen, () => {
    if (modalNotify && defaultBackDrop) {
        modalNotify.classList.remove('deactivate');
        defaultBackDrop.classList.remove('deactivate');
    }
});

safeSetOnclick(slashClose, () => {
    if (modalNotify && defaultBackDrop) {
        modalNotify.classList.add('deactivate');
        defaultBackDrop.classList.add('deactivate');
    }
});

// Click & Copy - Paste/Fill in the input
const option = document.querySelectorAll('#OptOpt');
const inputOptOne = document.querySelector('#inputOptOne');

if (inputOptOne) {
    option.forEach(el => {
        if (el) {
            safeAddEventListener(el, 'click', () => {
                inputOptOne.value = el.value;
            });
        }
    });
}

// Click & Copy - Paste/Fill in the input
const optionTwo = document.querySelectorAll('#OptOptSec');
const inputOptTwo = document.querySelector('#inputOptTwo');

if (inputOptTwo) {
    optionTwo.forEach(elTwo => {
        if (elTwo) {
            safeAddEventListener(elTwo, 'click', () => {
                inputOptTwo.value = elTwo.value;
            });
        }
    });
}
