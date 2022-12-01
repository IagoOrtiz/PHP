<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<style>
    table, table *{
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }
</style>
<body>
    <?php
        include 'ej4factura.php';
        $fact = new Factura(date("d/m/Y", time()));
        $fact -> añadeProducto("Viga de hierro", 30, 2);
        $fact -> añadeProducto("Viga de hierro sound effect", 5, 20);
        $fact -> añadeProducto("Mogus", 6, 9);
        $fact -> imprimeFactura();
    ?>
</body>
</html>