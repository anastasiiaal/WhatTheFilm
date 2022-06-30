// overlay + video trailer _________________________________________________
// the function checks if there is an overlay present on the page, if yes, make it possible to close it by clicking on a X or on the overlay
function checkOverlay () {
    if(document.getElementById('btn_close-modal') && document.getElementById('overlay')) {
        const closeTrailer = document.getElementById('btn_close-modal'),
              overlayTrailer = document.getElementById('overlay');

        closeTrailer.addEventListener('click', () => {
            overlayTrailer.classList.add('dnone');
        })
        overlayTrailer.addEventListener('click', () => {
            overlayTrailer.classList.add('dnone');
        })
    }
}   
checkOverlay();
