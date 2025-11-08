<?php

class calculadora {
    public function __construct(public int $num1, public int $num2){
    }

    public function calculaSubtracao(){
        return $this->num1 - $this->num2;
    }

    public function calculaAdicao(){
        return $this->num1 + $this->num2;
    }

    public function calculaDivisao(){
        return $this->num1 / $this->num2;
    }

    public function calculaMultiplicacao(){
        return $this->num1 * $this->num2;
    }
}

?>