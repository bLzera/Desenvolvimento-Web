<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>atividade 10</title>
</head>
<body class="container">
<h3>arvore recursiva</h3>
<?php

    $pastas = [
        'bsn' => [
            '3a Fase' => [
                'desenvWeb',
                'bancoDados',
                'engSoft 1',
            ],
            '4a Fase' => [
                'Intro Web',
                'bancoDados 2',
                'engSoft 2'
            ]
        ]
    ];

    function escreveArvore($dados, $nivel = 1){
        foreach($dados as $chave => $valor){
            $pre = str_repeat('-', $nivel);
            if(is_array($valor)){
                echo $pre . $chave . '<br>';
                escreveArvore($valor, $nivel + 1);
            } else {
                echo $pre . $valor . '<br>';
            }
        }
    };

    escreveArvore($pastas);
?>

<br>

</body>
</html>