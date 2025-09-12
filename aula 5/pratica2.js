let tabela = document.getElementById("tabela_notas");
let btnLinha = document.getElementById("btn_linha");
let btnColuna = document.getElementById("btn_coluna");

function parseNota(valor) {
    if (!valor) return NaN;
    return parseFloat(valor.replace(",", "."));
}

btnLinha.addEventListener("click", function() {
    let linhas = tabela.rows;
    let numCols = linhas[2].cells.length; // qtd de colunas de uma linha de aluno
    let soma = new Array(numCols).fill(0);
    let cont = new Array(numCols).fill(0);

    for (let i = 2; i < linhas.length; i++) {
        let cells = linhas[i].cells;
        for (let j = 1; j < cells.length; j++) {
            let nota = parseNota(cells[j].innerText);
            if (!isNaN(nota)) {
                soma[j] += nota;
                cont[j]++;
            }
        }
    }

    let novaLinha = tabela.insertRow();
    let celulaTitulo = novaLinha.insertCell();
    celulaTitulo.innerText = "MÉDIA";

    for (let j = 1; j < numCols; j++) {
        let celula = novaLinha.insertCell();
        if (cont[j] > 0) {
            celula.innerText = (soma[j] / cont[j]).toFixed(2);
        } else {
            celula.innerText = "-";
        }
    }
});

btnColuna.addEventListener("click", function() {
    let linhas = tabela.rows;

    linhas[0].insertCell().outerHTML = "<th rowspan='2'>Média</th>";

    for (let i = 2; i < linhas.length; i++) {
        let cells = linhas[i].cells;
        let soma = 0;
        let cont = 0;

        for (let j = 1; j < cells.length; j++) {
            let nota = parseNota(cells[j].innerText);
            if (!isNaN(nota)) {
                soma += nota;
                cont++;
            }
        }

        let media = cont > 0 ? (soma / cont).toFixed(2) : "-";
        let novaCelula = linhas[i].insertCell();
        novaCelula.innerText = media;
    }
});
