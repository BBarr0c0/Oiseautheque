// Récupérer l'élément contenant le slider
const slider = document.querySelector('#birdSlider');
const slide = slider.querySelector('.slide');
const itemSliders = slide.querySelectorAll('.itemSlide');
//const totalItems = itemSliders.length;

// Variables pour le déplacement du slider
let isDown = false;
let startX;
let scrollLeft;
let startTime;
let linkClicked = false;
let originalHref;
let isAutoScrolling = true;

// Dupliquer les éléments itemSlide
slide.innerHTML += slide.innerHTML;

// Événement de clic de la souris pour commencer le déplacement
slide.addEventListener('mousedown', (e) => {
  // Exclure les clics sur les éléments .itemSlide et ses enfants
  if (e.target.closest('.itemSlide')) {
    const clickedItem = e.target.closest('.itemSlide');
    const clickedItemIndex = Array.from(itemSliders).indexOf(clickedItem);
    const currentIndex = Array.from(itemSliders).indexOf(slide.querySelector('.active'));
    const diff = clickedItemIndex - currentIndex;

    if (diff !== 0) {
      e.preventDefault(); // Annuler l'événement pour empêcher l'ouverture de la balise <a>
      slide.scrollLeft += diff * itemSliders[0].offsetWidth;
      return; // Arrêter l'exécution de la fonction
    }
  }

  isDown = true;
  startX = e.pageX - slide.offsetLeft;
  scrollLeft = slide.scrollLeft;
  startTime = Date.now(); // Enregistrer le temps au début du clic
  linkClicked = false; // Réinitialiser le statut du lien cliqué

  // Si un lien est cliqué, enregistrer son attribut href original
  if (e.target.closest('.itemSlide a')) {
    originalHref = e.target.closest('.itemSlide a').getAttribute('href');
  }
});

// Événement de relâchement du clic de la souris pour arrêter le déplacement
slide.addEventListener('mouseup', (e) => {
  isDown = false;
  const endTime = Date.now();
  const clickDuration = endTime - startTime;

  if (clickDuration > 100 && e.target.closest('.itemSlide a')) {
    e.preventDefault(); // Annuler l'événement pour empêcher l'ouverture du lien si le clic est long
    linkClicked = true; // Marquer le lien comme cliqué lors d'un clic long

    // Supprimer l'attribut href pour désactiver temporairement le lien
    e.target.closest('.itemSlide a').removeAttribute('href');
  }

  // Rétablir le lien si le clic était court et le lien n'a pas été marqué comme cliqué
  if (!linkClicked && e.target.closest('.itemSlide a')) {
    setTimeout(() => {
      e.target.closest('.itemSlide a').setAttribute('href', originalHref);
    }, 0);
  }
});

// Événement de sortie du slider avec la souris pour arrêter le déplacement
slide.addEventListener('mouseleave', () => {
  isDown = false;
});

// Événement de déplacement de la souris pour faire défiler le slider
slide.addEventListener('mousemove', (e) => {
  if (!isDown) return; // Arrêter la fonction si le clic de la souris n'est pas enfoncé

  e.preventDefault();

  const x = e.pageX - slide.offsetLeft;
  const walk = (x - startX) * 1; // Vitesse de défilement du slider
  slide.scrollLeft = scrollLeft - walk;

  // Vérifier si le slider est arrivé à la fin et ajuster le défilement
  /*
  if (slide.scrollLeft >= slide.scrollWidth - slide.offsetWidth) {
    slide.scrollLeft = 0;
  } else if (slide.scrollLeft >= slide.scrollWidth - slide.offsetWidth) {
    slide.scrollLeft -= slide.scrollWidth / 2;
  }*/


});

// Fonction pour faire défiler le slider automatiquement
function autoScroll() {
  if (isAutoScrolling) {
    slide.scrollLeft += 1;

    // Vérifier si le slider est arrivé à la fin et ajuster le défilement
    if (slide.scrollLeft >= slide.scrollWidth - slide.offsetWidth) {
      slide.scrollLeft = 0;
    }

    // Appeler la fonction à nouveau après un délai
    requestAnimationFrame(autoScroll);
  }
}

// Démarrer le défilement automatique
autoScroll();

slide.addEventListener('mousedown', () => {
  isAutoScrolling = false; // Mettre en pause l'autoScroll
});

slide.addEventListener('mouseup', () => {
  isAutoScrolling = true; // Reprendre l'autoScroll
  autoScroll();
});


/*
let slideNumber = itemSliders.length;
let slidesVisible = 5;
let slideWidth = 0;
*/

/* ===== Fonction calculer width des itemSlide =====*/
/*
function calcSizes(){
  if(slidesVisible == 5){
    
      if(slideNumber<slidesVisible && slideNumber != 3){
        slideWidth = $('.slider').width()/slideNumber;
        slideActiveWidth = 0;
        nbLiActive = 0;
        
      } else if (slideNumber == 3){
        slideWidth = $('.slider').width()*0.25;
        slideActiveWidth = $('.slider').width()*0.5;
        nbLiActive = 2;
        
      }else {
        slideWidth = $('.slider').width()*0.125;
        slideActiveWidth = $('.slider').width()*0.5;
        nbLiActive = 3;
      };
    
  }else if(slidesVisible == 3){
      if(slideNumber<slidesVisible && slideNumber != 3){
        slideWidth = $('.slider').width()/slidesNumber;
        slideActiveWidth = 0;
        nbLiActive = 0;
        
      } else {
        slideWidth = $('.slider').width()*0.25;
        slideActiveWidth = $('.slider').width()*0.5;
        nbLiActive = 2;
        
      };
  }else {
      slideWidth = $('.slider').width();
      slideActiveWidth = 0;
      nbLiActive = 0;
  };
};
*/


/* ===== fonction SLIDER infini =====*/
/*
function infiniteInner(){
  if (slideNumber>slidesVisible){
    var slidesPosition = "-" + slideWidth + "px";
    slide.css("left", slidesPosition);
  };
};  

function liInfiniteInner (){
  if (slideNumber>slidesVisible){
      $('.slide .itemSlide:last-child').prependTo('.slide');
  };
};
*/
