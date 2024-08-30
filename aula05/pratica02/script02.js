// funcoes primarias
function mediaNotas() {
    let tabela = document.getElementById('boletim')
    let medias = []

    for (let c = 1; c < tabela.rows[2].cells.length; c++) {
        let soma = 0
        let contagem = 0
        for (let l = 2; l < tabela.rows.length; l++) {
            let celula = tabela.rows[l].cells[c]

            soma += parseFloat(celula.textContent)
            contagem++
        }

        medias.push((soma / contagem).toFixed(2))
    }

    return medias
}

// funcoes chamadas no onlick
function geraLinhaMedias() {
    const mediastotal = mediaNotas()

    let tabela = document.getElementById('boletim')
    let linha = document.createElement('tr')
    //cria primeira celula
    let primeiraCelula = document.createElement('td')
        primeiraCelula.textContent = 'Médias Notas'
        linha.appendChild(primeiraCelula)

    // cria cada celula e atribui a média da coluna
    mediastotal.forEach(function(media) {
        let celula = document.createElement('td')
        celula.className = 'media-nota'
        celula.textContent = media
        linha.appendChild(celula)
    });

    //associa toda a linha a tabela
    tabela.appendChild(linha)
}