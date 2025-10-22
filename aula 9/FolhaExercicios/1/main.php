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
    if (isset($_GET['n1'], $_GET['n2'], $_GET['n3'])) {
        $a = $_GET['n1'];
        $b = $_GET['n2'];
        $c = $_GET['n3'];
        $total = $a + $b + $c;

        if ($a > 10) {
            $cor = 'blue';
        } elseif ($b < $c) {
            $cor = 'green';
        } elseif ($c < $a && $c < $b) {
            $cor = 'red';
        } else {
            $cor = 'black';
        }

        echo "<h3 style='color: $cor;'>$total</h3>";
    } else {
        echo "<p>um ou mais numeros não foram informados...</p>";
    }
?>

<br>

<a href="index.html">voltar</a>

</body>
</html>