// funcoes primarias
function mediaNotascoluna() {
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

function mediaNotaslinha() {
    let tabela = document.getElementById('boletim')
    let medias = []

    for (let l = 2; l < tabela.rows.length; l++) {
        let soma = 0
        let contagem = 0
        for (let c = 1; c < tabela.rows[l].cells.length; c++) {
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
    const mediastotal = mediaNotascoluna()

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

function geraColunaMedias() {
    const mediastotal = mediaNotaslinha()

    let tabela = document.getElementById('boletim')
    
    // adicioando uma nova celuna no cabeçalho para a coluna extra
    let heatColuna = document.createElement('th')
        heatColuna.textContent = 'Média Final'
        tabela.rows[0].appendChild(heatColuna)
    
    
    for (let l = 2; l < tabela.rows.length; l++) {
        let celula = document.createElement('td')
        celula.className = 'media-final'
        celula.textContent = mediastotal[l - 2]
        tabela.rows[l].appendChild(celula)
    }
}