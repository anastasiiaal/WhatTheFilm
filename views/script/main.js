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


// categories selection ______________________________________________
// on click add styles
if (document.getElementById('categories-list')) {
    let categories = document.querySelectorAll('.menu');
    categories.forEach(category => {
        category.addEventListener('click', () => {
            if(!category.classList.contains('selected')) {
                category.classList.add('selected');
            } else {
                category.classList.remove('selected');
            }
        })
    });
}

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

// sider categories ___________________________________________________
$('.slider').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
            slidesToShow: 4,
            slidesToScroll: 1
        }
      },
      {
        breakpoint: 992,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
      }
    ]
  });