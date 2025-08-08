if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/service-worker.js')
        .then(() => console.log('Service Worker registered.'))
        .catch((error) => console.log('Service Worker registration failed:', error));
}

const linkDropDown = document.querySelector('.linkDropDown');
const dropedLinks = document.querySelector('.dropedLinks');
const contents = document.querySelector('.contents');
const asideBar = document.querySelector('.asideBar');
const topHeaderContents = document.querySelector('.top-header-contents');
const toggleAsidebar = document.querySelector('.toggleAsidebar');
const asideBarBacDrop = document.querySelector('.asideBarBacDrop');
const closeAsidebarBtn = document.querySelector('.closeAsidebarBtn');
const closeAside = document.querySelector('.closeAside');

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

// Add event listener to toggle the aside and save the state
safeAddEventListener(closeAside, 'click', () => {
    if (contents && asideBar && topHeaderContents) {
        const isActive = contents.classList.toggle('active');
        asideBar.classList.toggle('active');
        topHeaderContents.classList.toggle('active');

        // Save the new state in localStorage
        localStorage.setItem('asideClosed', isActive);
    }
});

// Check localStorage for saved state
const isAsideClosed = localStorage.getItem('asideClosed') === 'true';

// Apply initial state based on localStorage
if (isAsideClosed) {
    contents.classList.add('active');
    asideBar.classList.add('active');
    topHeaderContents.classList.add('active');
}

safeAddEventListener(linkDropDown, 'click', () => {
    if (dropedLinks && linkDropDown) {
        dropedLinks.classList.toggle('showDropedLinks');
        linkDropDown.classList.toggle('rotateIcon');
        linkDropDown.classList.toggle('active');
    }
});

safeAddEventListener(toggleAsidebar, 'click', () => {
    if (asideBar && contents && topHeaderContents && asideBarBacDrop) {
        asideBar.classList.add('showAsidebar');
        contents.classList.remove('active');
        asideBar.classList.remove('active');
        topHeaderContents.classList.remove('active');
        asideBarBacDrop.classList.add('active');
    }
});

safeAddEventListener(closeAsidebarBtn, 'click', () => {
    if (asideBar && asideBarBacDrop) {
        asideBar.classList.remove('showAsidebar');
        asideBarBacDrop.classList.remove('active');
    }
});

safeSetOnclick(asideBarBacDrop, () => {
    if (asideBar && asideBarBacDrop) {
        asideBar.classList.remove('showAsidebar');
        asideBarBacDrop.classList.remove('active');
    }
});

if (linkDropDown && linkDropDown.classList.contains('active')) {
    if (dropedLinks) dropedLinks.classList.add('showDropedLinks');
} else {
    if (dropedLinks) dropedLinks.classList.remove('showDropedLinks');
}


let lastScrollTop = 0; // Store the last scroll position
const navbar = document.querySelector('.top-header-contents');

safeAddEventListener(window, 'scroll', () => {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
    const switcherWrapper = document.querySelector('.gt_switcher_wrapper');

    // Check if we are scrolling down
    if (currentScroll > lastScrollTop) {
        // Scrolling down, hide the navbar
        if (navbar) navbar.classList.add('hidden');
        if (switcherWrapper) switcherWrapper.classList.add('active');
    } else {
        // Scrolling up, show the navbar
        if (navbar) navbar.classList.remove('hidden');
        if (switcherWrapper) switcherWrapper.classList.remove('active');
    }

    // Update the last scroll position
    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
});

// const modalWarning = document.querySelector('.modal-warning');
// const backDropM = document.querySelector('.backDropM');

// backDropM.onclick = () => {
//     modalWarning.classList.add('deactivate');
//     backDropM.classList.add('deactivate');
// }

const searchInputHeader = document.getElementById("searchInputHeader");
const submitItemBtn = document.getElementById("submitItemBtn");
const suggestionsBox = document.getElementById("suggestionsBox");
const suggestionItems = Array.from(document.querySelectorAll(".suggestion-item"));
const selectedValueInput = document.getElementById("selectedValue");
const toggleSearchInputHeader = document.getElementById("toggleSearchInputHeader");
const calendarCont = document.getElementById("calendarCont");
const selectOption = document.querySelector(".selectOption");
const formSuggestionsField = document.querySelector(".form-suggestions-field");
const loader = document.getElementById("loader"); // Reference to the loader element


// Hide suggestions when clicking outside
document.addEventListener("click", (e) => {
    if (!e.target.closest(".position-relative")) {
        suggestionsBox.style.display = "none";
    }
});


// Form handling for displaying
document.addEventListener('DOMContentLoaded', function () {
    const coverContent = document.querySelector('.cover-content');
    const coverLoader = document.getElementById('cover-loader');
    coverContent.style.display = 'block';
    coverLoader.style.display = 'flex';

    setTimeout(() => {
        coverContent.classList.add('active');
        // coverContent.style.display = 'none';
        coverLoader.style.display = 'none';
    }, 700);

});


// Function to trigger Toastr notification
function showToastrNotification(toastId, toastColor, message) {
    // Validate the toastColor to make sure it's a valid Toastr type
    const validColors = ['success', 'error', 'warning', 'info'];

    if (validColors.includes(toastColor)) {
        // Display Toastr notification based on the provided color and message
        toastr[toastColor](message, toastId, {
            closeButton: true,
            progressBar: true,
            timeOut: 5000,
            positionClass: "toast-top-right"
        });
    } else {
        console.log("Invalid toast color: " + toastColor);
    }
}
