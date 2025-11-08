<?php

class jogador {
    public function __construct(private string $nome, private string $posicao, private string $dataNascimento){}

    public function getPlayerData(){
        return json_encode(['nome' => $this->nome, 'posicao' => $this->posicao, 'dataNascimento' => $this->dataNascimento]);
    }
}

?>