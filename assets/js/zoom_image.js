// seleciona todas as imagens com a classe "gallery-items"
const images = document.querySelectorAll('.gallery-items');

// adiciona um evento de clique em cada imagem com a classe "gallery-items"
images.forEach(img => {
    img.addEventListener('click', () => {
        // verifica se a imagem clicada já tem a classe "zoomed"
        const hasZoomed = img.classList.contains('zoomed');

        // remove a classe "zoomed" de todas as imagens
        images.forEach(otherImg => {
            otherImg.classList.remove('zoomed');
        });

        // adiciona ou remove a classe "zoomed" na imagem clicada, dependendo do valor de "hasZoomed"
        img.classList.toggle('zoomed', !hasZoomed);
    });
});
