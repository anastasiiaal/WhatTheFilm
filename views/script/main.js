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
let getIds = document.getElementById('getId');
let idsArr = [];
let originalLink = document.URL;
let res = "success";
if (document.getElementById('categories-list')) {
    let categories = document.querySelectorAll('.menu');
    categories.forEach(category => {
        category.addEventListener('click', () => {
            if(!category.classList.contains('selected')) {
                category.classList.add('selected');
                idsArr.push(category.dataset.id);
            } else {
                category.classList.remove('selected');
                let index = idsArr.indexOf(category.dataset.id);
                idsArr.splice(index, 1);
            }
            getIds.innerHTML = idsArr.join(',');

            // __________ ANA - TEST FOR FETCH ____________________________
            // const idsArrString = idsArr.join(',');
            // const genres = {
            //     genres: idsArrString,
            // }
            // fetch("./categories.php", {
            //     method: 'POST',
            //     body: JSON.stringify(genres),
            //     headers: {
            //         "Content-Type": "application/json; charset=UTF-8"
            //     }
            // })
            // .then((response) => {
            //     console.log(response);
            //     return response.json();
            // })
            // .then((data) => console.log(data))
            // __________ end of fetch test ____________________________
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