// Récupérer le nom
let surname = localStorage.getItem('surname'),
    firstname = localStorage.getItem('firstname');

//Récupération de la date
let dateLogIn = new Date(localStorage.getItem('dateLogIn'));
let currentDate = new Date(),
    currentDay = currentDate.getDate(),
    currentMonth = currentDate.getMonth()+1,
    currentYear = currentDate.getFullYear();

// affichage de la date du jour
if (currentDay<10) {currentDay="0"+currentDay}
if (currentMonth<10) {currentMonth="0"+currentMonth}
document.getElementById("date").innerHTML = currentDay+"/"+currentMonth+"/"+currentYear;
document.getElementById("modalDate").innerHTML = currentDay+"/"+currentMonth+"/"+currentYear;

// menu burger + overlay ------------------------------
let burgerOpn = document.getElementById("burgerOpn"),
    overlay = document.getElementById("overlay"),
    burgerModal = document.getElementById("burgerModal")
    burgerClo = document.getElementById("burgerClo")
;

burgerOpn.addEventListener("click", function burgerMenu() {
    overlay.classList.toggle("show");
    burgerModal.classList.toggle("show");
}, false);

burgerClo.addEventListener("click", function burgerMenu() {
    overlay.classList.toggle("show");
    burgerModal.classList.toggle("show");
}, false);

overlay.addEventListener("click", function burgerMenu() {
    overlay.classList.toggle("show");
    burgerModal.classList.toggle("show");
}, false);