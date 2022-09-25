<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <h1>Comparador de precios</h1>
    <p>Introduzca el precio del mismo producto en 3 tiendas distintas</p>
    <form action="Ej4Tiendas.php" method="POST">
        <input type="number" name="T1" min="0" placeholder="Tienda 1" required><br><br>
        <input type="number" name="T2" min="0" placeholder="Tienda 2" required><br><br>
        <input type="number" name="T3" min="0" placeholder="Tienda 3" required><br><br>
        <input type="submit" value="Comenzar">
    </form>
</body>
</html>