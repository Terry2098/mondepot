// Code JavaScript ici (par exemple, pour changer l'image principale dans la page de produit)
const mainImage = document.querySelector('.main-image img');
const smallImages = document.querySelectorAll('.small-images img');

smallImages.forEach(image => {
    image.addEventListener('click', () => {
        mainImage.src = image.src;
    });
});
