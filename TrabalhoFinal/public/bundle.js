import { setDisId } from './js/testSetup.js';
import { requester } from './js/requester.js';

const req = new requester();
const main = document.querySelector('body');

function setupBody(body) {
    body.style.backgroundColor = 'black';
    body.style.display = 'flex';
    body.style.flexDirection = 'column';
    body.style.justifyContent = 'center';
    body.style.alignItems = 'center';
    body.style.color = 'white';
    body.style.fontFamily = 'Arial';
    body.style.position = 'relative';
}

setupBody(main);
setDisId('1', '1');

// -----------------------------------------
// VARIÁVEIS GERAIS
// -----------------------------------------
const perguntas = await req.getPerguntas();
let indexAtual = 0;
let respostas = [];
let valorSelecionado = null; // <<< variável temporária

// -----------------------------------------
function limparTela() {
    main.innerHTML = '';
}

function criarTitulo(txt) {
    const h1 = document.createElement('h1');
    h1.innerText = txt;
    h1.style.textAlign = 'center';
    return h1;
}

// -----------------------------------------
//  🔵 Criar blocos de radio mais bonitos
// -----------------------------------------

function criarRadio(pergunta) {
    valorSelecionado = respostas[indexAtual]?.valor ?? null;

    const container = document.createElement('div');
    container.style.display = 'flex';
    container.style.gap = '20px';
    container.style.marginTop = '40px';

    for (let i = 0; i <= 10; i++) {
        const div = document.createElement('div');
        div.style.display = 'flex';
        div.style.flexDirection = 'column';
        div.style.alignItems = 'center';
        div.style.cursor = 'pointer';

        const inp = document.createElement('input');
        inp.type = 'radio';
        inp.name = 'resposta';
        inp.value = i;
        inp.style.transform = "scale(2.0)";
        inp.style.marginBottom = '10px';

        // marca o valor salvo caso o usuário volte
        if (valorSelecionado === i) {
            inp.checked = true;
        }

        inp.addEventListener('change', () => {
            valorSelecionado = i;
        });

        const label = document.createElement('span');
        label.innerText = i;

        div.appendChild(inp);
        div.appendChild(label);
        container.appendChild(div);
    }

    return container;
}

// -----------------------------------------
//  ▶️ Botão de avançar
// -----------------------------------------

function criarBotaoAvancar(pergunta) {
    const btn = document.createElement('button');
    btn.innerText = 'Próxima →';

    btn.style.position = 'absolute';
    btn.style.bottom = '40px';
    btn.style.right = '40px';
    btn.style.padding = '12px 22px';
    btn.style.background = '#3b82f6';
    btn.style.borderRadius = '6px';
    btn.style.border = 'none';
    btn.style.cursor = 'pointer';
    btn.style.fontSize = '18px';

    btn.addEventListener('click', () => {
        if (valorSelecionado === null) {
            alert("Selecione uma opção antes de continuar.");
            return;
        }

        respostas[indexAtual] = {
            perid: pergunta.perid,
            valor: valorSelecionado
        };

        indexAtual++;
        carregarPergunta();
    });

    return btn;
}

// -----------------------------------------
//  ⬅️ Botão de voltar
// -----------------------------------------

function criarBotaoVoltar() {
    if (indexAtual === 0) return null;

    const btn = document.createElement('button');
    btn.innerText = '← Voltar';

    btn.style.position = 'absolute';
    btn.style.bottom = '40px';
    btn.style.left = '40px';
    btn.style.padding = '12px 22px';
    btn.style.background = '#555';
    btn.style.borderRadius = '6px';
    btn.style.border = 'none';
    btn.style.cursor = 'pointer';
    btn.style.fontSize = '18px';

    btn.addEventListener('click', () => {
        indexAtual--;
        carregarPergunta();
    });

    return btn;
}

// -----------------------------------------
//  🔄 Carregar perguntas
// -----------------------------------------

function carregarPergunta() {
    limparTela();

    if (indexAtual >= perguntas.length) {
        return carregarTextoFinal();
    }

    const pergunta = perguntas[indexAtual];

    const titulo = criarTitulo(pergunta.pertexto);
    const radios = criarRadio(pergunta);
    const botaoAvancar = criarBotaoAvancar(pergunta);
    const botaoVoltar = criarBotaoVoltar();

    main.appendChild(titulo);
    main.appendChild(radios);
    if (botaoVoltar) main.appendChild(botaoVoltar);
    main.appendChild(botaoAvancar);
}

// -----------------------------------------
//  📝 Tela de texto final
// -----------------------------------------

function carregarTextoFinal() {
    limparTela();

    const titulo = criarTitulo("Deseja adicionar um comentário?");
    const textarea = document.createElement('textarea');
    textarea.style.width = '300px';
    textarea.style.height = '150px';
    textarea.style.marginTop = '20px';

    const btnVoltar = criarBotaoVoltar();

    const btnEnviar = document.createElement('button');
    btnEnviar.innerText = "Enviar Avaliação";
    btnEnviar.style.marginTop = '30px';
    btnEnviar.style.padding = '12px 22px';
    btnEnviar.style.cursor = 'pointer';
    btnEnviar.style.fontSize = '18px';

    btnEnviar.addEventListener('click', async () => {
        const texto = textarea.value;

        const resp = await req.addAvaliacao(texto, respostas);

        console.log("Resultado API:", resp);

        carregarTelaFinal();
    });

    main.appendChild(titulo);
    main.appendChild(textarea);
    if (btnVoltar) main.appendChild(btnVoltar);
    main.appendChild(btnEnviar);
}

// -----------------------------------------
//  ✔ Tela final com RECOMEÇAR
// -----------------------------------------

function carregarTelaFinal() {
    limparTela();

    const msg = criarTitulo("Avaliação enviada com sucesso!");
    const btn = document.createElement('button');
    btn.innerText = "Voltar ao Início";

    btn.style.marginTop = '40px';
    btn.style.padding = '10px 20px';
    btn.style.cursor = 'pointer';
    btn.style.fontSize = '18px';

    btn.addEventListener('click', () => {
        indexAtual = 0;
        respostas = [];
        valorSelecionado = null;
        carregarPergunta();
    });

    main.appendChild(msg);
    main.appendChild(btn);
}

// inicia tudo
carregarPergunta();