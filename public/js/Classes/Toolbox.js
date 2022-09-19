let Toolbox = {
    switchClassBetween2Elements:function(addClassTo, removeClassTo, cssClass){
        if(removeClassTo.classList.contains(cssClass)){
            addClassTo.classList.add(cssClass);
            removeClassTo.classList.remove(cssClass)
        }
    },

    removeClassOnArray:function(arrayToCheck, classToRemove){
        arrayToCheck.forEach(item => {
            if(item.classList.contains(classToRemove)){
                item.classList.remove(classToRemove);
            }
        })
    }
}