<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <h2>Introduzca el valor y tipo de moneda a convertir en el tipo contrario</h2>
    <form action="" method="post">
        <input type="number" name="valor" min="0" step="0.01">
        <select name="moneda">
            <option value="eur">€</option>
            <option value="pes">₧</option>
        </select><br><br>
        <input type="submit" value="Convertir">
    </form>
    <br>
    <?php
    if (isset($_REQUEST['valor'])) {
        $resultado = file_get_contents("http://localhost//PHP/PHP/Tema%2012/Crear/ej1/conversor.php?valor=$_REQUEST[valor]&moneda=$_REQUEST[moneda]");
        $resultado = json_decode($resultado);
        echo "Conversion: $resultado->valor$resultado->moneda";
    }
    ?>
</body>
</html>