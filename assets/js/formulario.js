const cpf1 = document.querySelector('#cpf1')
cpf1.addEventListener('keypress', () => {
  let inputLength = cpf1.value.length
  if (inputLength === 3 || inputLength === 7) {
    cpf1.value += '.'
  } else if (inputLength === 11) {
    cpf1.value += '-'
  }
})

const cpf2 = document.querySelector('#cpf2')
cpf2.addEventListener('keypress', () => {
  let inputLength = cpf2.value.length
  if (inputLength === 3 || inputLength === 7) {
    cpf2.value += '.'
  } else if (inputLength === 11) {
    cpf2.value += '-'
  }
})

const rg1 = document.querySelector('#rg1')
rg1.addEventListener('keypress', () => {
  let inputLength = rg1.value.length
  if (inputLength === 2 || inputLength === 6) {
    rg1.value += '.'
  } else if (inputLength === 10) {
    rg1.value += '-'
  }
})

const rg2 = document.querySelector('#rg2')
rg2.addEventListener('keypress', () => {
  let inputLength = rg2.value.length
  if (inputLength === 2 || inputLength === 6) {
    rg2.value += '.'
  } else if (inputLength === 10) {
    rg2.value += '-'
  }
})

const telefone = document.querySelector('#telefone')
telefone.addEventListener('keypress', () => {
  let inputLength = telefone.value.length
  if (inputLength === 0) {
    telefone.value += '('
  } else if (inputLength === 3) {
    telefone.value += ') '
  } else if (inputLength === 10) {
    telefone.value += '-'
  }
})

const celular1 = document.querySelector('#celular1')
celular1.addEventListener('keypress', () => {
  let inputLength = celular1.value.length
  if (inputLength === 0) {
    celular1.value += '('
  } else if (inputLength === 3) {
    celular1.value += ') '
  } else if (inputLength === 10) {
    celular1.value += '-'
  }
})

const celular2 = document.querySelector('#celular2')
celular2.addEventListener('keypress', () => {
  let inputLength = celular2.value.length
  if (inputLength === 0) {
    celular2.value += '('
  } else if (inputLength === 3) {
    celular2.value += ') '
  } else if (inputLength === 10) {
    celular2.value += '-'
  }
})

const telefone1 = document.querySelector('#telefone1')
telefone1.addEventListener('keypress', () => {
  let inputLength = telefone1.value.length
  if (inputLength === 0) {
    telefone1.value += '('
  } else if (inputLength === 3) {
    telefone1.value += ') '
  } else if (inputLength === 9) {
    telefone1.value += '-'
  }
})

const telefone2 = document.querySelector('#telefone2')
telefone2.addEventListener('keypress', () => {
  let inputLength = telefone2.value.length
  if (inputLength === 0) {
    telefone2.value += '('
  } else if (inputLength === 3) {
    telefone2.value += ') '
  } else if (inputLength === 9) {
    telefone2.value += '-'
  }
})

const celular3 = document.querySelector('#celular3')

celular3.addEventListener('keypress', () => {
  let inputLength = celular3.value.length

  if (inputLength === 0) {
    celular3.value += '('
  } else if (inputLength === 3) {
    celular3.value += ') '
  } else if (inputLength === 10) {
    celular3.value += '-'
  }
})

const celular4 = document.querySelector('#celular4')

celular4.addEventListener('keypress', () => {
  let inputLength = celular4.value.length

  if (inputLength === 0) {
    celular4.value += '('
  } else if (inputLength === 3) {
    celular4.value += ') '
  } else if (inputLength === 10) {
    celular4.value += '-'
  }
})
