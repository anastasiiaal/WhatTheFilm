// overlay + video trailer _________________________________________________
// the function checks if there is an overlay present on the page, if yes, make it possible to close it by clicking on a X or on the overlay
function checkBtnWatch () {
    if (document.getElementById('btn-watch')) {
        const watchTrailerBtn = document.getElementById('btn-watch');

        watchTrailerBtn.addEventListener('click', () => {
            const closeTrailer = document.getElementById('btn_close-modal'),
                overlayTrailer = document.getElementById('overlay');

            overlayTrailer.classList.remove('dnone');
            closeTrailer.addEventListener('click', () => {
                overlayTrailer.classList.add('dnone');
            })
            overlayTrailer.addEventListener('click', () => {
                overlayTrailer.classList.add('dnone');
            })
        })
    }
}
checkBtnWatch();


// function checkOverlay () {
//     if(document.getElementById('btn_close-modal') && document.getElementById('overlay')) {
//         const closeTrailer = document.getElementById('btn_close-modal'),
//               overlayTrailer = document.getElementById('overlay');

//         closeTrailer.addEventListener('click', () => {
//             overlayTrailer.classList.add('dnone');
//         })
//         overlayTrailer.addEventListener('click', () => {
//             overlayTrailer.classList.add('dnone');
//         })
//     }
// }
// checkOverlay();


// sider categories ___________________________________________________
// $('.slider').slick({
//     centerMode: true,
//     centerPadding: '60px',
//     slidesToShow: 3,
//     responsive: [
//       {
//         breakpoint: 768,
//         settings: {
//           arrows: false,
//           centerMode: true,
//           centerPadding: '40px',
//           slidesToShow: 3
//         }
//       },
//       {
//         breakpoint: 480,
//         settings: {
//           arrows: false,
//           centerMode: true,
//           centerPadding: '40px',
//           slidesToShow: 1
//         }
//       }
//     ]
//   });

$('.slider').slick()