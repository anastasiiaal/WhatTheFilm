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
// let getIds = document.getElementById('getId');
// let idsArr = [];
// let originalLink = document.URL;
// let res = "success";
// if (document.getElementById('categories-list')) {
//     let categories = document.querySelectorAll('.menu');
//     categories.forEach(category => {
//         category.addEventListener('click', () => {
//             if(!category.classList.contains('selected')) {
//                 category.classList.add('selected');
//                 idsArr.push(category.dataset.id);
//             } else {
//                 category.classList.remove('selected');
//                 let index = idsArr.indexOf(category.dataset.id);
//                 idsArr.splice(index, 1);
//             }
//             // getIds.innerHTML = idsArr.join(',');

//             // __________ ANA - TEST FOR FETCH ____________________________
//             let idsArrString = idsArr.join(',');
            
           
//             const genresStr = {
//                 genres: idsArrString
//             };
//             fetch('./request.php', {
//                 method: 'post',
//                 body: JSON.stringify(genresStr),
//                 headers: {
//                     'Content-Type': 'application/json'
//                 }
//             }).then(function(response) {
//                 return response.text();
//             }).then(function(text) {
//                 console.log(text);
//             }).catch(function (error) {
//                 console.error(error);
//             })

            
            
//             // fetch(`https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=f85a64b77f4c446aae94f46335f1fe8e&with_genres=${idsArrString}&page`, {
//             //     method: 'get',
//             //     headers: {
//             //         'Content-Type': 'application/json'
//             //     }
//             // }).then(function(response) {
//             //     return response.json();
//             // }).then(function(text) {
//             //     console.log(text);
//             // }).catch(function (error) {
//             //     console.error(error);
//             // })



//             // const data = {
//             //     genres: idsArrString,
//             // }
//             // fetch("./categories.php", {
//             //     method: 'POST',
//             //     headers: {
//             //         "Content-Type": "application/json; charset=UTF-8"
//             //     },
//             //     body: JSON.stringify(data)
//             // })
//             // .then((response) => {
//             //     console.log(response);
//             //     return JSON.stringify(response);
//             // })
//             // .then((data) => {
//             //     console.log("Success:", data);
//             // })
//             // .catch((error) => {
//             //     console.error('Error:', error);
//             // });
//             // __________ end of fetch test ____________________________
//         })
        
//     });
// }

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