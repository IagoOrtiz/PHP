<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar asignatura</title>
</head>
<body>
    <?php
        try {
            /* No hace falta la contraseña porque root no tiene */
            $conexion = new PDO("mysql:host=localhost;dbname=escuela;charset=utf8", "root");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }
    ?>
    <h2>Eliga la nueva asignatura</h2>
    <form action="ej6.php" method="post">
        <select name="clase">
            <option value="DWES">DWES</option>
            <option value="DWEC">DWEC</option>
            <option value="DIW">DIW</option>
            <option value="DAW">DAW</option>
            <option value="HLC">HLC</option>
            <option value="EIE">EIE</option>
        </select>
        <input type="hidden" name="mod">
        <input type="hidden" name="dia" value="<?=$_REQUEST['dia']?>">
        <input type="hidden" name="hora" value="<?=$_REQUEST['hora']?>">
        <input type="submit" value="Actualizar">
    </form><br>
    <form action="ej6.php" method="post">
        <input type="submit" value="Volver">
    </form>
</body>
</html>