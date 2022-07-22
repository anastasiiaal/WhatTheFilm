// overlay poster zoom in
const poster = document.getElementById('poster-img');
const posterOverlay = document.getElementById('img-overlay');
const posterXL = document.getElementById('poster-xl');
const body = document.querySelector('body');

poster.addEventListener('click', () => {
    posterOverlay.classList.remove('dnone');   
    body.style.overflow = 'hidden';
})

posterOverlay.addEventListener('click', () => {
    posterOverlay.classList.add('dnone');
    body.style.overflow = 'auto';
})