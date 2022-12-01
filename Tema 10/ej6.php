<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php
        include_once "ej6coche.php";
        include_once "ej6bicicleta.php";

        echo "Creamos una bicicleta y un coche.<br><br>";
        $bici1 = new Bicicleta();
        $coche1 = new Coche();

        echo "Vehiculos actuales: ".Vehiculo::getVehiculosCreados()."<br><br>";
        echo "Quemamos rueda con el coche y luego conducimos 5 km<br><br>";
        echo $coche1->quemarueda()."<br><br>";
        $coche1->conducir(5);

        echo "Conducimos 2 km con la bicicleta y luego hacemos un caballito<br><br>";
        $bici1->conducir(2);
        echo $bici1->caballito()."<br><br>";

        echo "Añadimos una nueva bici y comprobamos las variables.<br><br>";
        $bici2 = new Bicicleta();
        echo "Kilometraje Bici 1: ".$bici1->getKilometraje()." km<br>";
        echo "Kilometraje Bici 2: ".$bici2->getKilometraje()." km<br>";
        echo "Kilometraje Coche 1: ".$coche1->getKilometraje()." km<br><br>";
        echo "Kilometraje total: ".Vehiculo::getKmTotales()." km<br>";
        echo "Vehiculos totales: ".Vehiculo::getVehiculosCreados();
    ?>
</body>
</html>