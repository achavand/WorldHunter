let CharacterCreation = {
    statMinValue : 5,
    statMaxValue : 20,
    maxStatPoint : 10,
    defaultStatValue: 10,

    characterId:function(personnagesList){
        let personnageId;
        personnagesList.forEach(personnage => {
            if(personnage.classList.contains("brightness")){
                personnageId = personnage.dataset.id;
            }
        })
        return personnageId;
    },

    genderAddClassByPersonnageId:function(genderArray, personnageId){
        genderArray.forEach(gender => {
            if(gender.dataset.id == personnageId){
                gender.classList.add("brightness");
            }
        })
    },

    defineRaceTitle:function(personnagesList){
        let content;
        personnagesList.forEach(personnage => {
            if(personnage.classList.contains("brightness")){
                content = personnage.alt;
            }
        });
        return content;
    },

    defineRaceDescription:function(personnagesList, racesDescriptionText){
        let selected;

        personnagesList.forEach(personnage => {
            if(personnage.classList.contains("brightness")){
                selected = personnage.dataset.id - 1;
            }
        })

        racesDescriptionText.forEach(text => {
            if(!text.classList.contains("display-none")){
                text.classList.add("display-none");
            }

            if(text.dataset.textid == selected){
                text.classList.remove("display-none");
            }
        })

    },

    inputUpdate:function(currentStat, eventAssociatedStat, currentStatValue, inputStat){
        currentStat.forEach(current => {
            if(eventAssociatedStat == current.dataset.stat){
                currentStatValue = current.innerHTML;
            }
        })

        inputStat.forEach(istat => {
            if(eventAssociatedStat == istat.dataset.stat){
                istat.value =  currentStatValue;
            }
        })
    },

    defineDefaultInputStatValue:function(inputStat){
        inputStat.forEach(stat => {
            stat.value = this.defaultStatValue;
        })
    },

    statUpdate:function(dataStat, remainingPoints, action, currentStat){
        currentStat.forEach(element => {
            if(
                (element.innerHTML == this.statMinValue && action == "decrease")
                || (element.innerHTML == this.statMaxValue && action == "increase")
                ){
                return;
            }
            if (remainingPoints.innerHTML < 0 || remainingPoints.innerHTML >= this.maxStatPoint) {
                // Faut modifier le fonctionnement de ce bloc, pour que le message soit traduit (ça ne sera sûrement plus du JS)
                // Définir le traitement souhaité ici
                alert("Une erreur est survenue");
                return;
            }

            if(action == "increase" && remainingPoints.innerHTML !=0){
                if(element.dataset.stat === dataStat){
                    element.innerHTML++;
                    remainingPoints.innerHTML--;
                }
            } else if(action == "decrease"){
                if(element.dataset.stat === dataStat){
                    element.innerHTML--;
                    remainingPoints.innerHTML++;
                }
            }
        });
    },

    isCharacterSelected:function(){
        let selected = false;
        personnagesList.forEach(personnage => {
            if(personnage.classList.contains("brightness")){
                selected = true;
            }
        })
        return selected;
    },

    isGenderSelected:function(genderList){
        let selected = false;
        genderList.forEach(element => {
            if(element.classList.contains("genderSelected")){
                selected = true;
            }
        });
        return selected;
    },

    isCurrentStatValid:function(){
        let statsValid = true;
        let checkSum = 0;
        document.querySelectorAll("#statCurrent").forEach(stat => {
            if(stat.innerHTML < this.statMinValue || stat.innerHTML > this.statMaxValue || isNaN(stat.innerHTML)){
                statsValid = false;
            }
            checkSum += Number(stat.innerHTML)
        });

        if(!checkSum == this.getMaxStatPointPossible()){
            statsValid = false;
        }
        return statsValid;
    },

    getMaxStatPointPossible:function(){
        let sum = 0;
        document.querySelectorAll("#statCurrent").forEach(stat => {
            sum += Number(stat.innerHTML)
        });
        // Voir pour variabiliser le 10
        sum += 10
        return sum;
    },

    remainsPoints:function(){
        let allPointsAreUsed = false;
        if(document.querySelector("#points").innerHTML == 0){
            allPointsAreUsed = true;
        }
        return allPointsAreUsed;
    },

    isNameValid:function(nameInput){
        let isValid = false;
        if(nameInput.value.match("^([0-9a-zA-Z_]){6,20}$")) {
            isValid = true;
        }
        return isValid;
    },

    canValidate:function(personnagesList, genderList, nameInput){
        let brightness      = this.isCharacterSelected(personnagesList);
        let gender          = this.isGenderSelected(genderList);
        let remainsPoints   = this.remainsPoints();
        let currentStats    = this.isCurrentStatValid();
        let name            = this.isNameValid(nameInput);

        return brightness && gender && remainsPoints && currentStats && name ? true : false;
    },
}