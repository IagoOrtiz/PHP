<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>
    <?php
    include_once "ej7dado.php";
        $dados = array();
        for ($i=0; $i < 5; $i++) { 
            $dados[] = new DadoPoker();
        }

        echo "Tiramos los dados y vemos los resultados<br>";
        for ($i=0; $i < 5; $i++) { 
            $dados[$i]->tira();
        }
        for ($i=0; $i < 5; $i++) { 
            echo $dados[$i]->nombreFigura()." - ";
        }

        echo "<br>Dados tirados: ".DadoPoker::getTiradasTotales();
    ?>
</body>
</html>