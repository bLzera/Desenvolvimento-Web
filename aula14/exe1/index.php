<?php
function println($text){
    echo $text . '<br>';
}

require_once 'calculadora.php';
require_once 'computador.php';

$calculadora = new calculadora(10, 20);
println($calculadora->calculaAdicao());
println($calculadora->calculaSubtracao());

$computador = new computador();
println($computador->getStatus());
println($computador->desligar()->getStatus());
?>