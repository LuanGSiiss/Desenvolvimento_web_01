// funcoes primarias
function getvalor1() {
    return parseFloat(document.getElementById('valor01').value)
}

function getvalor2() {
    return parseFloat(document.getElementById('valor02').value)
}

function escreveResultado(resultado) {
    let elemento = document.getElementById('resultado')
    switch (true) {
        case resultado > 0:
            elemento.innerHTML = `<p class="positivo"> ${resultado}</p>`
            break
        case resultado < 0:
            elemento.innerHTML = `<p class="negativo"> ${resultado}</p>`
            break
        case resultado == 0:
            elemento.innerHTML = `<p class="zero"> ${resultado}</p>`
            break
    }
    
}

// funcoes chamadas no onclick

function soma() {
    let result = getvalor1() + getvalor2()
    escreveResultado(result)
}
function subtracao() {
    let result = getvalor1() - getvalor2()
    escreveResultado(result)
}
function multiplicacao() {
    let result = getvalor1() * getvalor2()
    escreveResultado(result)
}
function divisao() {
    let result = getvalor1() / getvalor2()
    escreveResultado(result)
}