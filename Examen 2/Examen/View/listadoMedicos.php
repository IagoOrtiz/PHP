<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de medicos</title>
    <link rel='stylesheet' href='../View/css/style.css'>
</head>

<body>
    <div class="container">
        <h1>USUARIO: <?= $_SESSION['usuario']->getNombre() ?> - Visitas: <?= $_COOKIE[$_SESSION['usuario']->getNombre()] ?></h1>
        <table>
            <tr>
                <th>Médico</th>
                <th>Citas</th>
            </tr>
            <?php
            foreach ($data['medicos'] as $medico) {
            ?>
                <tr>
                    <td><?= $medico->getNombre() ?></td>
                    <td>
                        <form action="tablaCitas.php" method="post">
                            <input type="hidden" name="id" value="<?= $medico->getId() ?>">
                            <input type="submit" value="RESERVAR CITA">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br>
        <form action="../Controller/index.php">
            <input type="submit" value="CERRAR SESIÓN DE USUARIO">
        </form>
        <br>
        <form action="exportaCitas.php">
            <input type="submit" value="EXPORTAR CITAS">
        </form>
    </div>
</body>

</html>