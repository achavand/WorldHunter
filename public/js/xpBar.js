//let xpBar = document.querySelector(".xpBar");

let progress = document.querySelector(".xpBarProgress");

// Récupèrer les datasets de progress
const current     = progress.dataset.currentxp;
const total       = progress.dataset.totalxp;

// A partir de ces dataset, créer un pourcentage
let percentage    = Toolbox.createPercentage(current, total);

// Modifier la propriété css width de progress pour lui attribuer le nouveau pourcentage
console.log(percentage);
progress.style.width = percentage + "%" ;
console.log(progress.style.width)