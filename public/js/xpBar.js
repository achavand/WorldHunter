let progress = document.querySelector(".xpBarProgress");

const current     = progress.dataset.currentxp;
const total       = progress.dataset.totalxp;

let percentage    = Toolbox.createPercentage(current, total);

progress.style.width = percentage + "%" ;