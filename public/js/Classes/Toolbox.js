let Toolbox = {
    /**
     * @param {Element} addClassTo
     * @param {Element} removeClassTo
     * @param {string} cssClass
     */
    switchClassBetween2Elements:function(addClassTo, removeClassTo, cssClass){
        if(removeClassTo.classList.contains(cssClass)){
            addClassTo.classList.add(cssClass);
            removeClassTo.classList.remove(cssClass)
        }
    },

    /**
     * Remove a class on every element is an array
     * @date 2022-10-27
     * @param {Array} arrayToCheck
     * @param {string} classToRemove
     */
    removeClassOnArray:function(arrayToCheck, classToRemove){
        arrayToCheck.forEach(item => {
            if(item.classList.contains(classToRemove)){
                item.classList.remove(classToRemove);
            }
        })
    },

    /**
     * Create a percentage
     * @param {Number} current
     * @param {Number} total
     * @returns {string}
     */
    createPercentage:function(current, total){
        return ((current / total) *100).toString();
    }
}