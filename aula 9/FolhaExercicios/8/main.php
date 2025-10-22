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
    $parcelas = [
        '0' => 24,
        '1' => 36,
        '2' => 48,
        '3' => 60
    ];

    $inc = 0.5;
    $base = 1.5;

    if(isset($_GET['original'], $_GET['parcelas'])){
        $original = $_GET['original'];
        $key = $_GET['parcelas'];
        $quant = $parcelas[$key];
        $juro = (($base + ($inc * intval($key))) / 100) * $original;
        $total = $juro + $original;
        $parcela = round($total / $quant, 2);
        echo "o valor das parcelas ficou R\$ $parcela";
    } else {
        echo 'algum dos valores não foi informado...';
    }
?>

<br>

<a href="index.html">voltar</a>

</body>
</html>