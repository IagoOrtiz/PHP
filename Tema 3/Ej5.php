<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    <h1>Calculadora Tiempo de llenado</h1>
    <p>Introduzca los siguientes datos para calcular el tiempo que tardará en llenarse el bidón:</p>
    <form action="Ej5Tiempo.php" method="POST">
        <input type="number" name="D" min="0" placeholder="Diametro" required><br><br>
        <input type="number" name="A" min="0" placeholder="Altura" required><br><br>
        <input type="number" name="L" min="0" placeholder="Litros/Segundo" required><br><br>
        <input type="submit" value="Comenzar">
    </form>
</body>
</html>