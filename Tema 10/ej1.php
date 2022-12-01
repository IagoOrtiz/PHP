<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        include 'ej1empleado.php';
        $emp1 = new Empleado("Sans", "1500");
        $emp2 = new Empleado("Amogus", null);
        echo $emp1;
        echo $emp2;
        echo "<br>Asignamos sueldo a Amogus<br><br>";
        $emp2->asigna("Amogus", 3200);
        echo $emp1;
        echo $emp1->pagaImpuestos()."<br>";
        echo $emp2;
        echo $emp2->pagaImpuestos()."<br>";
    ?>
</body>
</html>