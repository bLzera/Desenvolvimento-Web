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
    if (isset($_GET['n1'])) {
        $lado = $_GET['n1'];
        $area = pow($lado, 2);
        echo "<h3'>A área do quadrado de lado $lado metros é $area metros quadrados</h3>";
    } else {
        echo "<p>o numero não foi informado...</p>";
    }
?>

<br>

<a href="index.html">voltar</a>

</body>
</html>