<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas disponibles</title>
    <link rel='stylesheet' href='../View/css/style.css'>
</head>
<body>
<div class="container">
        <h1>USUARIO: <?= $_SESSION['usuario']->getNombre() ?> - Visitas: <?= $_COOKIE[$_SESSION['usuario']->getNombre()] ?></h1>
        <h3>Medico: <?=$data['medico']?> - Fecha: <?=$data['fecha']?></h3>
        <table>
            <tr>
                <th>hora</th>
                <th>Reservar</th>
            </tr>
            <?php
            for ($i=8; $i <= 15 ; $i++) {
            ?>
                <tr>
                    <td><?=$i?>:00</td>
                    <td>
                    <?php
                        if (Cita::getCitaOcupada($_SESSION['medico']->getId(), $_SESSION['fechaMañana'], $i)) {
                        ?>
                        OCUPADA
                        <?php
                        } else {
                        ?>
                        <form action="reservaCita.php" method="post">
                            <input type="hidden" name="hora" value="<?=$i?>">
                            <input type="submit" value="RESERVAR CITA">
                        </form>
                        <?php
                        }
                    ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br>
        <form action="../Controller/tablaMedicos.php">
            <input type="submit" value="VOLVER AL LISTADO DE MÉDICOS">
        </form>
    </div>
</body>
</html>