// overlay poster zoom in
const poster = document.getElementById('poster-img');
const posterOverlay = document.getElementById('img-overlay');
const posterXL = document.getElementById('poster-xl');

poster.addEventListener('click', () => {
    posterOverlay.classList.remove('dnone');    
})

posterOverlay.addEventListener('click', () => {
    posterOverlay.classList.add('dnone');
})