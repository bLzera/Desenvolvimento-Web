-- Criar database (opcional)
-- CREATE DATABASE sacanagem;
-- \c sacanagem;

------------------------------------------------------------
-- TABELA: tbsetor
------------------------------------------------------------
CREATE TABLE tbsetor (
    setid SERIAL PRIMARY KEY,
    setnome VARCHAR(255) NOT NULL,
    setstatus INT NOT NULL DEFAULT 1
);

------------------------------------------------------------
-- TABELA: tbdispositivo
------------------------------------------------------------
CREATE TABLE tbdispositivo (
    disid SERIAL PRIMARY KEY,
    setid INT NOT NULL REFERENCES tbsetor(setid),
    disnome VARCHAR(255) NOT NULL,
    disstatus INT NOT NULL DEFAULT 1
);

-- Índice útil para consultas por setor
CREATE INDEX idx_dispositivo_setid ON tbdispositivo(setid);

------------------------------------------------------------
-- TABELA: tbpergunta
------------------------------------------------------------
CREATE TABLE tbpergunta (
    perid SERIAL PRIMARY KEY,
    pertexto TEXT NOT NULL,
    perstatus INT NOT NULL DEFAULT 1
);

------------------------------------------------------------
-- TABELA: tbperguntasetor (relação N:N com ordem)
------------------------------------------------------------
CREATE TABLE tbperguntasetor (
    prsid SERIAL PRIMARY KEY,
    setid INT NOT NULL REFERENCES tbsetor(setid),
    perid INT NOT NULL REFERENCES tbpergunta(perid),
    prsordem INT NOT NULL,
    prsstatus INT NOT NULL DEFAULT 1,

    -- Garantir que a mesma pergunta não seja adicionada duas vezes ao mesmo setor
    CONSTRAINT unique_setor_pergunta UNIQUE (setid, perid),

    -- Garantir que a ordem das perguntas não se repita dentro do setor
    CONSTRAINT unique_setor_ordem UNIQUE (setid, prsordem)
);

-- Índice útil para ordenação
CREATE INDEX idx_pergset_setid_ordem ON tbperguntasetor(setid, prsordem);

------------------------------------------------------------
-- TABELA: tbavaliacao
------------------------------------------------------------
CREATE TABLE tbavaliacao (
    avaid SERIAL PRIMARY KEY,
    disid INT NOT NULL REFERENCES tbdispositivo(disid),
    setid INT NOT NULL REFERENCES tbsetor(setid),
    avatexto TEXT,
    avadata TIMESTAMP NOT NULL DEFAULT NOW()
);

-- Querys por setor serão comuns
CREATE INDEX idx_avaliacao_setid ON tbavaliacao(setid);
CREATE INDEX idx_avaliacao_disid ON tbavaliacao(disid);
CREATE INDEX idx_avaliacao_data  ON tbavaliacao(avadata);

------------------------------------------------------------
-- TABELA: tbresposta
------------------------------------------------------------
CREATE TABLE tbresposta (
    resid SERIAL PRIMARY KEY,
    avaid INT NOT NULL REFERENCES tbavaliacao(avaid) ON DELETE CASCADE,
    perid INT NOT NULL REFERENCES tbpergunta(perid),
    resvalor INT NOT NULL CHECK (resvalor >= 0 AND resvalor <= 10)
);

-- Índices úteis
CREATE INDEX idx_resposta_avaid ON tbresposta(avaid);
CREATE INDEX idx_resposta_perid ON tbresposta(perid);

------------------------------------------------------------
-- OPERACIONAL: boas práticas adicionais
------------------------------------------------------------

-- Garante que uma avaliação não possa ter respostas duplicadas para a mesma pergunta
ALTER TABLE tbresposta
ADD CONSTRAINT unique_resposta_ava_per UNIQUE (avaid, perid);