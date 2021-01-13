const date = new Date();

// permet de faire un envoi a chaque fois qu'on clique sur les fleche pour voir les mois
const renderCalendar = () => {
date.setDate(1);

//Creation constante jourMois equivalent aux jours du calendrier
const jourMois = document.querySelector(".jours");

//const qui permet de savoir quel est le dernier jour du mois actuel
const dernierJour = new Date(
    date.getFullYear(),
    date.getMonth() + 1,0
    ).getDate(); 

 console.log(dernierJour); 

//faire en sorte que l'on recupere le dernier jour du mois précédents
  const prevdernierJour = new Date(
    date.getFullYear(),
    date.getMonth(),
    0
  ).getDate();

  console.log(prevdernierJour);
 
 //const index du premier Jour du mois (30/31)
  const premierJourIndex = date.getDay();

 //const dernier Jour du mois mais avec getDay pour retourner le numero
  const dernierJourIndex = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDay();

  //montre le dernier jour de la semaine du mois actuel
 console.log(dernierJourIndex);
;
 //ceci est pour  avoir combien de jour du prochain mois doit on afficher dans le calendrier actuel pour cela, on soustrait le dernier jour du mois a 7 moins 1 car la semaine commence a 0
  const prochainsJours = 7 - dernierJourIndex - 1;
 
//const mois
const mois = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
];

//selesctionne et ajout du mois et de la date sur (h1,p) 
document.querySelector(".date h1").innerHTML = mois[date.getMonth()];
document.querySelector(".date p").innerHTML = new Date().toDateString();  

//afficher les jours mais pour cela on creer une variable vide
let days = "";   

//compteur afin de savoir combien de jour du mois precedent doit on afficher afin datteindre la bonne jour de la semaine où débutera le mois
for (let x = premierJourIndex; x > 0; x--) {
    days += `<div class="prev-date">${prevdernierJour - x + 1}</div>`;
}

// permet de lister les jours du mois par rapport à a la const ci-dessous
for (let i = 1; i <= dernierJour; i++) {
    //condition permettant d'avoir et demarquer le jour d'aujourd'hui
    if (
      i === new Date().getDate() &&
      date.getMonth() === new Date().getMonth()
    ) {
      days += `<div class="today">${i}</div>`;
    } else {
      days += `<div>${i}</div>`;
    }
}  

//boucle qui va compter et recuperer combien de jours du procains mois doit-on afficher dans le calendrier actuel
for (let j = 1; j <= prochainsJours; j++) {
    days += `<div class="next-date">${j}</div>`;
    jourMois.innerHTML = days;
  }
};

// effectuer un eventlistner sur les fleches afin qu'une fois cliqué cela affiche le calendrier précédent ou prochain.
document.querySelector(".prev").addEventListener("click", () => {
  date.setMonth(date.getMonth() - 1);
  renderCalendar();
});

document.querySelector(".next").addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  renderCalendar();
});

// on refait appel a render
renderCalendar();