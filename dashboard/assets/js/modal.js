const modalBackDrop = document.querySelector('.modal-backDrop');
const modalC = document.querySelector('.modalC');
const showModal = document.querySelector('.showModal');
const closeModalBtn = document.querySelector('.closeModalBtn');

showModal.addEventListener('click', () => {
    modalBackDrop.classList.add('active');
    modalC.classList.add('active');
});

modalBackDrop.onclick = () => {
    modalBackDrop.classList.remove('active');
    modalC.classList.remove('active');
};

closeModalBtn.onclick = () => {
    modalBackDrop.classList.remove('active');
    modalC.classList.remove('active');
};
