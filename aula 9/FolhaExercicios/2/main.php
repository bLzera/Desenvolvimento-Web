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
        if($_GET['n1'] % 2 == 0){
            $text = 'Valor divisível por 2';
        } else {
            $text = 'O valor não é divisível por 2';
        }
        echo "<h3'>$text</h3>";
    } else {
        echo "<p>o numero não foi informado...</p>";
    }
?>

<br>

<a href="index.html">voltar</a>

</body>
</html>