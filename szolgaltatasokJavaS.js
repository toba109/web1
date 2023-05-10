const menuToggle = document.querySelector('.toggle')
const bemutato = document.querySelector('.bemutato')

menuToggle.addEventListener('click', () => {
    menuToggle.classList.toggle('active')
    bemutato.classList.toggle('active')
})