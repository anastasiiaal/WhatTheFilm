//  _________ API connection  _________ 
const API_KEY = '***';
const BASE_URL = 'https://api.themoviedb.org/3';
const API_URL = BASE_URL + '/discover/movie?sort_by=popularity.desc&' + API_KEY;
const IMG_URL = 'https://image.tmdb.org/t/p/w500';

// _________ list of all genres _________
const genres = [
    {
    "id": 28,
    "name": "Action"
    },
    {
    "id": 12,
    "name": "Adventure"
    },
    {
    "id": 16,
    "name": "Animation"
    },
    {
    "id": 35,
    "name": "Comedy"
    },
    {
    "id": 80,
    "name": "Crime"
    },
    {
    "id": 99,
    "name": "Documentary"
    },
    {
    "id": 18,
    "name": "Drama"
    },
    {
    "id": 10751,
    "name": "Family"
    },
    {
    "id": 14,
    "name": "Fantasy"
    },
    {
    "id": 36,
    "name": "History"
    },
    {
    "id": 27,
    "name": "Horror"
    },
    {
    "id": 10402,
    "name": "Music"
    },
    {
    "id": 9648,
    "name": "Mystery"
    },
    {
    "id": 10749,
    "name": "Romance"
    },
    {
    "id": 878,
    "name": "Science Fiction"
    },
    {
    "id": 10770,
    "name": "TV Movie"
    },
    {
    "id": 53,
    "name": "Thriller"
    },
    {
    "id": 10752,
    "name": "War"
    },
    {
    "id": 37,
    "name": "Western"
    }
];

// _________ variables from document _________
const categoriesList = document.querySelector('#categories-list > div.container.dflex'); // container that will contain all categories
const moviesContainer = document.querySelector('section.films.dflex > div.container.dflex'); // container that will contain all genereated movies
const btnWrapper = document.querySelector('.btn-wrapper');
const prev = document.getElementById('prev');
const next = document.getElementById('next');
const currentPageSpan = document.querySelector("#current-page > span:first-child");
const totalPagesSpan = document.querySelector("#current-page > span:last-child");

//  _________ variables to use in functions  _________ 
let currentPage = 1;
let nextPage = 2;
let prevPage = 3;
let lastUrl = "";
let totalPages = 100;

let selectedGenre = [];



// CODE TO GET THE ISSET GET
// const windowLocation = window.location.href;
// const lastSegment = parseInt(windowLocation.split("=").pop());
// console.log(lastSegment);
// if(lastSegment != NaN) {
//     selectedGenre.push(parseInt(lastSegment));
//     highlightSelection();
// } else {
//     selectedGenre = [];
// }
setGenre();
//  _________ function that generates categories over the film cards and makes sure their ids are taken once category is clicked _________ 
function setGenre () {
    categoriesList.innerHTML = '';

    genres.forEach(genre => {
        const p = document.createElement('p');
        p.classList.add('menu');
        p.id = genre.id;
        p.innerText = genre.name;
        p.addEventListener('click', () => {
            if(selectedGenre.length == 0) {
                // p.classList.add('selected');
                selectedGenre.push(genre.id);
            } else {
                if(selectedGenre.includes(genre.id)) {
                    selectedGenre.forEach((id, idx) => {  // id = element, idx = position of the element
                        if (id == genre.id) {
                            selectedGenre.splice(idx, 1); // delete one element from the arry, startting from the position of the element that we want to delete
                        }
                    })
                } else {
                    selectedGenre.push(genre.id);
                }
            }
            console.log(selectedGenre);
            getMovies(API_URL + '&with_genres=' + selectedGenre.join(','));   // take all the elements in the array and joins them together separated by a comma (as demanded in the api docs)
            highlightSelection();
        })
        categoriesList.append(p);
    })
}

// _________ function that adds class "selected" to a clicked category  _________ 
function highlightSelection () {
    const genresP = document.querySelectorAll('p.menu');
    genresP.forEach(tag => {
        tag.classList.remove('selected');
    })
    // console.log(genresP);
    if(selectedGenre.length != 0) {
        selectedGenre.forEach(id => {
            genresP.forEach(tag => {
                if(tag.id == id) {
                    tag.classList.add('selected');
                }
            })
        })
    }
}

// _________ main function __ calls an API to generate cards of movies  _________ 
function getMovies (url) {
    lastUrl = url;
    fetch(url)
    .then(res=> res.json())
    .then(data => {
        // console.log(data);
        if(data.results.length !== 0) {
            // console.log(data.results);
            showMovies(data.results);
            currentPage = data.page;  // parameter we get from console > network > fetch > headers > preview
            nextPage = currentPage + 1;
            prevPage = currentPage - 1;
            totalPages = data.total_pages;
            if(totalPages > 500) {
                totalPagesSpan.innerHTML = 500;
            } else {
                totalPagesSpan.innerHTML = totalPages;
            }

            currentPageSpan.innerHTML = currentPage;

            if (totalPages <= 1) {
                btnWrapper.style.display = "none";
            } else {
                btnWrapper.style.display = "flex";
                if(currentPage <= 1) {
                    prev.classList.add('deactivated');
                    next.classList.remove('deactivated');
                } else if (currentPage >= totalPages) {
                    prev.classList.remove('deactivated');
                    next.classList.add('deactivated');
                } else {
                    prev.classList.remove('deactivated');
                    next.classList.remove('deactivated');
                }
            }

            categoriesList.scrollIntoView({behavior : 'smooth'});
        } else {
            main.innerHTML = `<h1 class="no-results">Sorry, no results found</h1>`;
        }
    })
    .catch(err => {
        console.log(err);
    })
}
// calling previous function with general API link by default (no genres selected)
getMovies(API_URL);

// _________ function that generates movie cards with img, title, year, note  _________ 
function showMovies (data) {
    moviesContainer.innerHTML = "";

    data.forEach(movie => {
        // console.log(movie);
        const {title, poster_path, vote_average, release_date, id} = movie; // == "object destructuring"
        const movieEl = document.createElement('a');
        movieEl.classList.add('card-movie__link');
        movieEl.setAttribute("href", "./film.php?id=" + id);
        movieEl.innerHTML = `
            <div class="card-movie">
                    <img src="${poster_path? IMG_URL+poster_path: "./img/poster.png" }" alt="${title}">
                    <div class="card-info">
                        <h4>${title}</h4>
                        <p class="txt-sm">${cutDate(release_date)}</p>
                        <h4 class="${getColor(vote_average)}">${vote_average}</h4>
                    </div>
                </div>
        `;

        moviesContainer.appendChild(movieEl);
    })
}

//  _________ function giving color to the note on cards according to the rating _________ 
function getColor (vote) {
    if(vote >= 8) {
        return 'green';
    } else if (vote >= 5) {
        return 'orange';
    } else {
        return 'red';
    }
}

// _________ function "cutting" date to get only year  _________ 
function cutDate (date) {
    let year = new Date(date).getFullYear();
    return year;
}

// event listeners for buttons PREV and NEXT
prev.addEventListener('click', () => {
    if (prevPage > 0) {
        pageCall(prevPage);
    }
})
next.addEventListener('click', () => {
    if (nextPage <= totalPages) {
        pageCall(nextPage);
    }
})

//  _________ function to change the page in api call  _________ 
function pageCall (page) {
    let urlSplit = lastUrl.split('?');
    let queryParams = urlSplit[1].split('&');
    let key = queryParams[queryParams.length - 1].split('=');    // to get the last element in the array
    if(key[0] != "page") {
        let url = lastUrl + "&page=" + page;
        getMovies(url);
    } else {
        key[1] = page.toString();
        let a = key.join('=');
        queryParams[queryParams.length - 1] = a;
        let b = queryParams.join('&');
        let url = urlSplit[0] + '?' + b;
        getMovies(url);
    }
}