-- ============================================
-- LIMPAR TODAS AS TABELAS (DROP DATA)
-- ============================================
TRUNCATE TABLE
    tbResposta,
    tbAvaliacao,
    tbPerguntaSetor,
    tbPergunta,
    tbDispositivo,
    tbSetor
RESTART IDENTITY CASCADE;


-- ============================================
-- SETORES
-- ============================================
INSERT INTO tbSetor (setnome, setstatus) VALUES
('Atendimento', 1),
('Financeiro', 1),
('RH', 1);


-- ============================================
-- DISPOSITIVOS
-- ============================================
INSERT INTO tbDispositivo (setid, disnome, disstatus) VALUES
(1, 'Totem Entrada', 1),
(1, 'Totem Guichê 2', 1),
(2, 'Totem Financeiro', 1),
(3, 'Totem RH', 1);


-- ============================================
-- PERGUNTAS
-- (todas genéricas, serão ligadas aos setores via N:N)
-- ============================================
INSERT INTO tbPergunta (pertexto, perstatus) VALUES
('Como você avalia o atendimento recebido?', 1),
('O tempo de espera foi adequado?', 1),
('A equipe foi cordial e profissional?', 1),
('Como você avalia a clareza das informações?', 1),
('O ambiente estava limpo e organizado?', 1),
('Você recomendaria este setor para outras pessoas?', 1);


-- ============================================
-- PERGUNTA x SETOR (N:N)
-- ============================================
-- Atendimento (setor 1)
INSERT INTO tbPerguntaSetor (setid, perid, prsordem, prsstatus) VALUES
(1, 1, 1, 1),
(1, 2, 2, 1),
(1, 3, 3, 1),
(1, 6, 4, 1);

-- Financeiro (setor 2)
INSERT INTO tbPerguntaSetor (setid, perid, prsordem, prsstatus) VALUES
(2, 1, 1, 1),
(2, 4, 2, 1),
(2, 6, 3, 1);

-- RH (setor 3)
INSERT INTO tbPerguntaSetor (setid, perid, prsordem, prsstatus) VALUES
(3, 3, 1, 1),
(3, 4, 2, 1),
(3, 5, 3, 1),
(3, 6, 4, 1);


-- ============================================
-- AVALIAÇÕES (3 avaliações reais)
-- ============================================
INSERT INTO tbAvaliacao (disid, setid, avatexto, avadata) VALUES
(1, 1, 'Ótimo atendimento, muito rápido!', NOW() - INTERVAL '2 days'),
(3, 2, NULL, NOW() - INTERVAL '1 day'),
(4, 3, 'RH foi muito atencioso.', NOW());


-- ============================================
-- RESPOSTAS DAS AVALIAÇÕES
-- ============================================

-- Avaliação 1 (Atendimento / setor 1)
INSERT INTO tbResposta (avaid, perid, resvalor) VALUES
(1, 1, 9),
(1, 2, 8),
(1, 3, 10),
(1, 6, 9);

-- Avaliação 2 (Financeiro / setor 2)
INSERT INTO tbResposta (avaid, perid, resvalor) VALUES
(2, 1, 7),
(2, 4, 6),
(2, 6, 7);

-- Avaliação 3 (RH / setor 3)
INSERT INTO tbResposta (avaid, perid, resvalor) VALUES
(3, 3, 10),
(3, 4, 9),
(3, 5, 8),
(3, 6, 10);