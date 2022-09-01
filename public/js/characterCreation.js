// Lister les variables et les récupérer
const races = document.querySelector("#block-races");
const stat = document.querySelector("#block-stats");

const next = document.querySelector("#next") ;
const previous = document.querySelector("#previous") ;
const validate = document.querySelector("#validate") ;

const genderMale = document.querySelector("#genderMale");
const genderFemale = document.querySelector("#genderFemale");

const racesDescription = document.querySelector(".races-description");
// const statExplanations = ;

// let statList = ;
let personnagesList = document.querySelectorAll(".characterList-img");



function creationButtonDisplayer(elToDisplay, elTohide){
    if(elToDisplay.classList.contains("display-none")){
        elTohide.classList.add("display-none");
        elToDisplay.classList.remove("display-none")
    }
}


next.addEventListener("click", () => {
    creationButtonDisplayer(stat, races);
});

previous.addEventListener("click", () => {
    creationButtonDisplayer(races, stat);
});


validate.addEventListener("click", () => {
    alert("validate");
});




// Lors du choix du genre, la photo et le texte sont modifiés selon le genre selectionné

    // Styliser les icones de genre & donner un style à celui sélectionner
        // Lorsque l'on clique sur un genre non sélectionné, on transmet le style de selection à ce nouveau genre
    
    // Le code de la liste des personnages s'adapte selon le genre sélectionner ->
        // L'avatar change : H -> avatar male / F -> avatar female
    
    // Le code du nom de la race s'adapte selon le genre sélectionné
        // Male -> nom race mal / female -> nom race female



// Sur la page 1 - le choix de la classe est animé

// Sur la page 1 - le choix du genre est animé

// Ajouter le talent racial dans le template
// !!!!! et l'animer !!!!

// Ajouter un peu d'animation avec le bouton suivant et précédants (sûrement du CSS et non du JS)

// Sur la page 2 - Animé le menu des statistiques

// Détecter le clique sur "valider", mais ne rien faire pour le moment

// Verifier en continue les informations rentrer par l'utilisateur

// Stocker les informations dans un tableau