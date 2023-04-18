
function openModal(classe = null) {
  if (classe) {
    let modal = document.querySelector(classe);
    modal.classList.add('active')
  }

};

function closeModal(classe = null) {
  if (classe) {
    let modal = document.querySelector(classe);
    modal.classList.remove('active');
  }
};