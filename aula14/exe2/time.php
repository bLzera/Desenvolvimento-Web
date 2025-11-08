<?php
require_once 'jogador.php';

class time {
    private $jogadores;

    public function __construct(private string $nome, private int $anoFundacao){
        $this->jogadores = [];
    }

    public function getJogadores(){
        return $this->jogadores;
    }

    public function addJogador($nome, $posicao, $dataNascimento){
        $this->jogadores[] = new jogador($nome, $posicao, $dataNascimento);
    }
}

?>