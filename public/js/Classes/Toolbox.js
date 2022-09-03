let Toolbox = {
    switchClassBetween2Elements:function(addClassTo, removeClassTo, cssClass){
        if(removeClassTo.classList.contains(cssClass)){
            addClassTo.classList.add(cssClass);
            removeClassTo.classList.remove(cssClass)
        }
    }
}