// Lister les variables et les récupérer
const races = document.querySelector("#block-races");
const stat  = document.querySelector("#block-stats");

const next     = document.querySelector("#next") ;
const previous = document.querySelector("#previous") ;
const validate = document.querySelector("#validate") ;

const characterMale   = document.querySelector("#characterMale");
const characterFemale = document.querySelector("#characterFemale");
const genderMale      = document.querySelector("#genderMale");
const genderFemale    = document.querySelector("#genderFemale");

const racesDescription = document.querySelector(".races-description");
// const statExplanations = ;

// let statList = ;
let personnagesList = document.querySelectorAll(".characterList-img");


// Actions for the navigations button
next.addEventListener("click", () => {
    Toolbox.switchClassBetween2Elements(races,stat, "display-none");
});

previous.addEventListener("click", () => {
    Toolbox.switchClassBetween2Elements(stat, races, "display-none");
});


validate.addEventListener("click", () => {
    alert("validate");
});


// Actions pour the switch between genders
genderMale.addEventListener("click", () => {
    Toolbox.switchClassBetween2Elements(genderMale, genderFemale, "genderSelected");
    CharacterCreation.currentCharacterSelected("-");
    Toolbox.switchClassBetween2Elements(characterFemale, characterMale, "display-none");
})

genderFemale.addEventListener("click", () => {
    Toolbox.switchClassBetween2Elements(genderFemale, genderMale, "genderSelected");
    CharacterCreation.currentCharacterSelected("+");
    Toolbox.switchClassBetween2Elements(characterMale, characterFemale, "display-none");
})

personnagesList[0].classList.add("brightness");
personnagesList.forEach( personnage => {
    personnage.addEventListener("click", () => {
        personnagesList.forEach(item => {
            if(item.classList.contains("brightness")){
                item.classList.remove("brightness");
            }
        })
        personnage.classList.add("brightness");
    })
})


// Lors du choix du genre, la photo et le texte sont modifiés selon le genre selectionné    
    // Le code du nom de la race s'adapte selon le genre sélectionné 
        // Au passage, ajouter un visuel sur la race sélectionner
        // Male -> nom race male / female -> nom race female



// Sur la page 1 - le choix de la classe est animé

// Sur la page 1 - le choix du genre est animé

// Ajouter le talent racial dans le template
// !!!!! et l'animer !!!!

// Ajouter un peu d'animation avec le bouton suivant et précédants (sûrement du CSS et non du JS)

// Sur la page 2 - Animé le menu des statistiques

// Détecter le clique sur "valider", mais ne rien faire pour le moment

// Verifier en continue les informations rentrer par l'utilisateur

// Stocker les informations dans un tableau