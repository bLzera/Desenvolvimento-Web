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
    if (isset($_GET['n1'], $_GET['n2'])) {
        $comprimento = $_GET['n1'];
        $largura = $_GET['n2'];
        $area = $comprimento * $largura;
        if ($area > 10){
            $tag = 'h1';
        } else {
            $tag = 'h3';
        }
        echo "<$tag>A área do retângulo de lado $comprimento e $largura metros é $area metros quadrados.</$tag>";
    } else {
        echo "<p>os numeros não foram informados...</p>";
    }
?>

<br>

<a href="index.html">voltar</a>

</body>
</html>