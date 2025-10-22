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
        $base = $_GET['n1'];
        $altura = $_GET['n2'];
        $area = ($base * $altura) / 2;
        echo "<h3>A área do triângulo retângulo de base $base e altura $altura metros é de $area metros quadrados.</h3>";
    } else {
        echo "<p>os tamanhos não foram informados...</p>";
    }
?>

<br>

<a href="index.html">voltar</a>

</body>
</html>