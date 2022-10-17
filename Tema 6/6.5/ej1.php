<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <h1>Introduzca su apuesta para la primitiva</h1>
    <a>Los datos no introducidos se generaran aletoriamente</a><br><br>
    <form action="ej1primitiva.php" method="post">
        <input type="number" name="n1" placeholder="Número 1" min="1" max="49">
        <input type="number" name="n2" placeholder="Número 2" min="1" max="49">
        <input type="number" name="n3" placeholder="Número 3" min="1" max="49">
        <input type="number" name="n4" placeholder="Número 4" min="1" max="49">
        <input type="number" name="n5" placeholder="Número 5" min="1" max="49">
        <input type="number" name="n6" placeholder="Número 6" min="1" max="49"><br><br>
        <input type="number" name="nS" placeholder="Número de serie" min="1" max="999">
        <input type="text" name="nombre" placeholder="Nombre combinación">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>