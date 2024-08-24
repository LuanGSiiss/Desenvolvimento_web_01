function getvalor1() {
    return parseFloat(document.getElementById('valor01').value)
}

function getvalor2() {
    return parseFloat(document.getElementById('valor02').value)
}


function soma() {
    let result = getvalor1() + getvalor2()
    document.getElementById('resultado').innerHTML = `<p> ${result}</p>`
}
function subtracao() {
    let result = getvalor1() - getvalor2()
    document.getElementById('resultado').innerHTML = `<p> ${result}</p>`
}
function multiplicacao() {
    let result = getvalor1() * getvalor2()
    document.getElementById('resultado').innerHTML = `<p> ${result}</p>`
}
function divisao() {
    let result = getvalor1() / getvalor2()
    document.getElementById('resultado').innerHTML = `<p> ${result}</p>`
}
    


80.000
6.666

4.500
2166







