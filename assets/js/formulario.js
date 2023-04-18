const cpf1 = document.querySelector('#cpf1')

cpf1.addEventListener('keypress', () => {
  let inputlength = cpf1.value.length

  if (inputlength === 3 || inputlength === 7) {
    cpf1.value += '.'
  }

  else if (inputlength === 11) {
    cpf1.value += '-'
  }
})

const cpf2 = document.querySelector('#cpf2')

cpf2.addEventListener('keypress', () => {
  let inputlength = cpf2.value.length

  if (inputlength === 3 || inputlength === 7) {
    cpf2.value += '.'
  }

  else if (inputlength === 11) {
    cpf2.value += '-'
  }
})

const rg1 = document.querySelector('#rg1')

rg1.addEventListener('keypress', () => {
  let inputlength = rg1.value.length

  if (inputlength === 2 || inputlength === 6) {
    rg1.value += '.'
  }

  else if (inputlength === 10) {
    rg1.value += '-'
  }
})

const rg2 = document.querySelector('#rg2')

rg2.addEventListener('keypress', () => {
  let inputlength = rg2.value.length

  if (inputlength === 2 || inputlength === 6) {
    rg2.value += '.'
  }

  else if (inputlength === 10) {
    rg2.value += '-'
  }
})

const telefone = document.querySelector('#telefone')

telefone.addEventListener('keypress', () => {
  let inputlength = telefone.value.length

  if (inputlength === 0) {
    telefone.value += '('
  }
  else if (inputlength === 3) {
    telefone.value += ') '
  }
  else if (inputlength === 10) {
    telefone.value += '-'
  }
})

const celular1 = document.querySelector('#celular1')

celular1.addEventListener('keypress', () => {
  let inputlength = celular1.value.length

  if (inputlength === 0) {
    celular1.value += '('
  }
  else if (inputlength === 3) {
    celular1.value += ') '
  }
  else if (inputlength === 10) {
    celular1.value += '-'
  }
})

const celular2 = document.querySelector('#celular2')

celular2.addEventListener('keypress', () => {
  let inputlength = celular2.value.length

  if (inputlength === 0) {
    celular2.value += '('
  }
  else if (inputlength === 3) {
    celular2.value += ') '
  }
  else if (inputlength === 10) {
    celular2.value += '-'
  }
})

const telefone1 = document.querySelector('#telefone1')

telefone1.addEventListener('keypress', () => {
  let inputlength = telefone1.value.length

  if (inputlength === 0) {
    telefone1.value += '('
  }
  else if (inputlength === 3) {
    telefone1.value += ') '
  }
  else if (inputlength === 9) {
    telefone1.value += '-'
  }
})

const telefone2 = document.querySelector('#telefone2')

telefone2.addEventListener('keypress', () => {
  let inputlength = telefone2.value.length

  if (inputlength === 0) {
    telefone2.value += '('
  }
  else if (inputlength === 3) {
    telefone2.value += ') '
  }
  else if (inputlength === 9) {
    telefone2.value += '-'
  }
})

const celular3 = document.querySelector('#celular3')

celular3.addEventListener('keypress', () => {
  let inputlength = celular3.value.length

  if (inputlength === 0) {
    celular3.value += '('
  }
  else if (inputlength === 3) {
    celular3.value += ') '
  }
  else if (inputlength === 10) {
    celular3.value += '-'
  }
})

const celular4 = document.querySelector('#celular4')

celular4.addEventListener('keypress', () => {
  let inputlength = celular4.value.length

  if (inputlength === 0) {
    celular4.value += '('
  }
  else if (inputlength === 3) {
    celular4.value += ') '
  }
  else if (inputlength === 10) {
    celular4.value += '-'
  }
})


var formMatr = document.getElementById('formMatr');

function sucess(e) {
  e.preventDefault();
  let modalSucess = document.querySelector('.containerSucess');
  modalSucess.style.display = 'flex';
  document.querySelector('#submit').disabled = true;
}

formMatr.addEventListener('submit', sucess);