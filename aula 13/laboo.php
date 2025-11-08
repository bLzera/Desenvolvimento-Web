<?php

    class Pessoa {
        private $nome;
        private $sobreNome;
        private $cpf;

        public function __construct($nome, $sobreNome, $cpf){
            $this->nome = $nome;
            $this->sobreNome = $sobreNome;
            $this->cpf = $cpf;
        }

        public function getNomeCompleto(){
            return $this->getNome() . ' ' . $this->getSobreNome();
        }

        public function getNome(){
            return $this->nome;
        }

        public function getSobreNome(){
            return $this->sobreNome;
        }

        public function getCpf(){
            return $this->cpf;
        }
    }

$teste = new Pessoa('gabriel', 'tadeu', '11182767958');

echo $teste->getNomeCompleto() . '<br>';
echo $teste->getCpf();
?>