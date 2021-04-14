let screen = document.querySelector('.black-screen')
let regform = document.querySelector('.reg-form')
let closebut = document.querySelector('.close-but')

screen.style.display = "flex";
regform.classList.add('none')

closebut.onclick = function() {
  screen.style.display = "none";
  regform.classList.remove('none')
}