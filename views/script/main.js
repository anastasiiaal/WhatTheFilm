// overlay + video trailer _________________________________________________
// the function checks if there is an overlay present on the page, if yes, make it possible to close it by clicking on a X or on the overlay
// const body = document.querySelector('body');
function checkBtnWatch () {
    if (document.getElementById('btn-watch')) {
        const watchTrailerBtn = document.getElementById('btn-watch');

        const trailer = document.getElementById('ytvideo')
        const trailerSrc = trailer.src;

        watchTrailerBtn.addEventListener('click', () => {
            const closeTrailer = document.getElementById('btn_close-modal'),
                overlayTrailer = document.getElementById('overlay');
                trailer.src = trailerSrc;

            overlayTrailer.classList.remove('dnone');
            body.style.overflow = 'hidden';

            closeTrailer.addEventListener('click', () => {
                overlayTrailer.classList.add('dnone');
                body.style.overflow = 'auto';
                trailer.src = "";
            })
            overlayTrailer.addEventListener('click', () => {
                overlayTrailer.classList.add('dnone');
                body.style.overflow = 'auto';
                trailer.src = "";
            })
        })
    }
}
checkBtnWatch();


// burger on mobile version _______________________________________
const burger = document.getElementById("burger");
const ulNav = document.getElementById("ul-nav");
const closeBurger = document.getElementById('close-burger');
burger.addEventListener('click', () => {
    ulNav.style.display = "flex";
    closeBurger.style.display = "flex";
})

closeBurger.addEventListener('click', () => {
    ulNav.style.display = "none";
    closeBurger.style.display = "none";
})

if (window.matchMedia("(max-width: 600px)").matches) {
    ulNav.addEventListener('click', () => {
        ulNav.style.display = "none";
        closeBurger.style.display = "none";
    })
}