const headerButton = document.querySelector('.main-header__button');
const mainHeader = document.querySelector('.main-header');
const body = document.body;

headerButton.addEventListener('click', () => {
  mainHeader.classList.toggle('active');
  body.classList.toggle('no-scroll');
});