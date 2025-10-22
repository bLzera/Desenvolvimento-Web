<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>resultado</title>
</head>
<body class="container">

<?php
    $precos = [
        'maca' => 5.00,
        'melancia' => 3.50,
        'laranja' => 4.00,
        'repolho' => 2.80,
        'cenoura' => 3.20,
        'batatinha' => 4.50
    ];

    $dinheiro = 50.00;

    if (isset($_GET['maca'], $_GET['melancia'], $_GET['laranja'], $_GET['repolho'], $_GET['cenoura'], $_GET['batatinha'])){
        $valor = 0;
        foreach($precos as $produto => $preco){
            $valor += $_GET[$produto] * $preco;
        }

        if ($dinheiro < $valor){
            $sobra = $valor - $dinheiro;
            echo "<h3 style='color: red'>faltaram R\$ $sobra para completar a compra.</h3>";
        } elseif ($dinheiro > $valor){
            $sobra = $dinheiro - $valor;
            echo "<h3 style='color: blue'>sobraram R\$ $sobra para completar a compra.</h3>";            
        } else {
            echo "<h3 style='color: green'>o saldo de joaozinho foi esgotado.</h3>";
        }

    } else {
        echo 'o valor de algum dos itens não foi informado...';
    }
?>

<br>

<a href="index.html">voltar</a>

</body>
</html>