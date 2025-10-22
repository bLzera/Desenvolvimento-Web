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
    if(isset($_GET['original'], $_GET['parcelas'], $_GET['valor_parcela'])){
        $juros = ($_GET['parcelas'] * $_GET['valor_parcela']) - $_GET['original'];
        echo "o valor total que mariazinha pagou em juros foi de R\$ $juros";
    } else {
        echo 'algum dos valores não foi informado...';
    }
?>

<br>

<a href="index.html">voltar</a>

</body>
</html>