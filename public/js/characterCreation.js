//Block
const races = document.querySelector("#block-races");
const stat  = document.querySelector("#block-stats");

//Inputs
const raceInput   = document.querySelector("#create_character_race");
const genderInput = document.querySelector("#create_character_gender");
const nameInput   = document.querySelector("#create_character_name");
const validate    = document.querySelector("#create_character_submit");

//List
const personnagesList = document.querySelectorAll(".characterList-img");
const characterList   = document.querySelectorAll(".characterlist-border")
const genderList      = document.querySelectorAll(".gender-btn");
const charMale        = document.querySelectorAll("#charMale");
const charFemale      = document.querySelectorAll("#charFemale");
const btnNav          = document.querySelectorAll("#btn-creationCharacter-nav");
const inputStat       = document.querySelectorAll(".create-stat-input");
const currentStat     = document.querySelectorAll("#statCurrent")
const statDecrease    = document.querySelectorAll("#statDecrease");
const statIncrease    = document.querySelectorAll("#statIncrease");


// elements
const racesDescriptionTitle = document.querySelector("#races-description-title");
const racesDescriptionText  = document.querySelectorAll(".races-description-text");
let points         = document.querySelector("#points");

let canValidate = false;


personnagesList[0].classList.add("brightness");
raceInput.value =  personnagesList[0].dataset.id;
genderInput.value = genderList[0].children[0].dataset.gender;

function genderManager(characterListId){
    Toolbox.removeClassOnArray(characterList, "display-none");
    characterList[characterListId].classList.add("display-none");

    Toolbox.removeClassOnArray(charMale, "brightness");
    Toolbox.removeClassOnArray(charFemale, "brightness");
}

btnNav.forEach(btn => {
    btn.addEventListener("click", () => {
        if(btn.dataset.navtype == 'next'){
            Toolbox.switchClassBetween2Elements(races, stat, "display-none");
        } else{
            Toolbox.switchClassBetween2Elements(stat, races, "display-none");
        }
    })
})

personnagesList.forEach( personnage => {
    personnage.addEventListener("click", () => {
        Toolbox.removeClassOnArray(personnagesList, "brightness")
        personnage.classList.add("brightness");
        raceInput.value = personnage.dataset.id;

        racesDescriptionTitle.textContent = CharacterCreation.defineRaceTitle(personnagesList);
        racesDescriptionText.textContent  = CharacterCreation.defineRaceDescription(personnagesList, racesDescriptionText);
    })
})

genderList.forEach(gender => {
    gender.addEventListener("click", () => {
        let personnageId = CharacterCreation.characterId(personnagesList);
        Toolbox.removeClassOnArray(genderList, "genderSelected");
        gender.classList.add("genderSelected");
        genderInput.value = gender.children[0].dataset.gender; 

        if(gender.id == "genderMale"){
            genderManager(1);
            CharacterCreation.genderAddClassByPersonnageId(charMale, personnageId);
        } else if (gender.id == "genderFemale"){
            genderManager(0);
            CharacterCreation.genderAddClassByPersonnageId(charFemale, personnageId);
        }

        racesDescriptionTitle.textContent = CharacterCreation.defineRaceTitle(personnagesList);
    })
})

statDecrease.forEach(stat => {
    stat.addEventListener("click", () => {
        let eventAssociatedStat = stat.dataset.stat
        let currentStatValue;
        CharacterCreation.statUpdate(stat.dataset.stat, points, "decrease", currentStat);
        
        CharacterCreation.inputUpdate(currentStat, eventAssociatedStat, currentStatValue, inputStat);
    })
})

statIncrease.forEach(stat => {
    stat.addEventListener("click", () => {
        let eventAssociatedStat = stat.dataset.stat
        let currentStatValue;
        CharacterCreation.statUpdate(stat.dataset.stat, points, "increase", currentStat);

        CharacterCreation.inputUpdate(currentStat, eventAssociatedStat, currentStatValue, inputStat);        
    })
})

setInterval(() => {
    canValidate = CharacterCreation.canValidate(personnagesList, genderList, nameInput);

    if(!canValidate){
        if(!validate.classList.contains("hiddenValidate")){
            validate.classList.add("hiddenValidate");
        }
        return;
    } else {
        validate.classList.remove("hiddenValidate");
    }
}, 1000);

racesDescriptionTitle.textContent = CharacterCreation.defineRaceTitle(personnagesList);
racesDescriptionText.textContent  = CharacterCreation.defineRaceDescription(personnagesList, racesDescriptionText);
CharacterCreation.defineDefaultInputStatValue(inputStat);