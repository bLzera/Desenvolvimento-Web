<?php
function println($text){
    echo $text . '<br>';
}

require_once 'time.php';

$flamengo = new Time('flamengo', '2005');
$palmeiras = new Time('palmeiras', '2005');
$corinthians = new Time('corinthians', '2005');

$flamengo->addJogador('pedro', 'artilheiro', '03-03-2005');
$flamengo->addJogador('ricardo', 'lateral direita', '03-03-2005');
$flamengo->addJogador('paulão', 'lateral esquerda', '03-03-2005');

foreach($flamengo->getJogadores() as $jogador){
    println($jogador->getPlayerData());
}

?>