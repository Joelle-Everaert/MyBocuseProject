// AJOUT RECETTE
let button = document.querySelector(".addEventButton");
let form = document.querySelector(".form-popup");
console.log('button:', button)

button.addEventListener("click", function(e) {
    form.style.display = "block";
})

let recipeSubmitBtn = document.querySelector('.btn');

recipeSubmitBtn.addEventListener('click', function(e) {
    form.style.display = "none";
});