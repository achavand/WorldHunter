let CharacterCreation = {

    currentCharacterSelected:function(operation){
        let idBrightness;
        personnagesList.forEach((personnage, index) => {
            if(personnage.classList.contains("brightness")){
                idBrightness = index;
                personnage.classList.remove("brightness");
            }
        })
        if(operation == "+"){
            personnagesList.forEach((personnage, index) => {
                if(index == idBrightness + 4){
                    personnage.classList.add("brightness");
                }
            })
        } else if(operation == "-") {
            personnagesList.forEach((personnage, index) => {
                if(index == idBrightness - 4){
                    personnage.classList.add("brightness");
                }
            })
        }
    }
}