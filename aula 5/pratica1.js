let resultado = document.getElementById("resultado");
let resultadoOperacao = document.getElementById("resultado_operacao");
let resultadoAnterior = document.getElementById("resultado_anterior");
let resultadoAnteriorOperacao = document.getElementById("resultado_anterior_operacao");

let valorAtual = "";
let valorAnterior = "";
let operacao = null;

let res = 0;

function atualizarDisplay() {
    resultado.innerText = valorAtual || "0";
    resultadoOperacao.innerText = operacao || "";
    resultadoAnterior.innerText = valorAnterior || "";
    resultadoAnteriorOperacao.innerText = operacao ? "" : "";
}

// números
let botoesNumeros = document.getElementsByClassName("botao_numero");
for (let i = 0; i < botoesNumeros.length; i++) {
    botoesNumeros[i].addEventListener("click", function() {
        let valor = botoesNumeros[i].innerText;
        if(res = 0){
            valorAtual += valor;
        }
        atualizarDisplay();
    });
}

// operações
let botoesOperacao = document.getElementsByClassName("botao_operacao");
for (let i = 0; i < botoesOperacao.length; i++) {
    botoesOperacao[i].addEventListener("click", function() {
        if (valorAtual === "") return;
        if (valorAnterior !== "") {
            calcular();
        }
        operacao = botoesOperacao[i].innerText;
        valorAnterior = valorAtual;
        valorAtual = "";
        atualizarDisplay();
    });
}

// igual
document.getElementById("execute").addEventListener("click", function() {
    if (valorAtual === "" || valorAnterior === "" || !operacao) return;
    calcular();
    atualizarDisplay();
});

// limpar
document.getElementById("clear").addEventListener("click", function() {
    valorAtual = "";
    valorAnterior = "";
    operacao = null;
    atualizarDisplay();
});

// apagar último dígito
document.getElementById("delete").addEventListener("click", function() {
    valorAtual = valorAtual.slice(0, -1);
    atualizarDisplay();
});

function calcular() {
    let numAnterior = parseFloat(valorAnterior);
    let numAtual = parseFloat(valorAtual);
    let resultadoTemp;

    if (isNaN(numAnterior) || isNaN(numAtual)) return;

    if (operacao === "+") {
        resultadoTemp = numAnterior + numAtual;
    } else if (operacao === "-") {
        resultadoTemp = numAnterior - numAtual;
    } else if (operacao === "x") {
        resultadoTemp = numAnterior * numAtual;
    } else if (operacao === "%") {
        resultadoTemp = numAnterior / numAtual;
    }

    valorAtual = resultadoTemp.toString();
    valorAnterior = "";
    operacao = null;
}
