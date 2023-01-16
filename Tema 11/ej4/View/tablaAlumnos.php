<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Alumnos</title>
    <link rel='stylesheet' href='../View/css/styles.css'>
</head>
<body>
    <table>
        <tr>
            <td class="asignaturas" colspan="5"><a href="../Controller/verAsignaturas.php"><div>Ver asignaturas</div></a></td>
        </tr>
        <tr>
            <th>Matrícula</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Curso</th>
            <th></th>
        </tr>
        <?php
        foreach ($data['alumnos'] as $alumno) {
        ?>
        <tr>
            <td><?=$alumno->getMatricula()?></td>
            <td><?=$alumno->getNombre()?></td>
            <td><?=$alumno->getApellidos()?></td>
            <td><?=$alumno->getCurso()?></td>
            <td><form action="../Controller/verDetalles.php" method="get">
                <input type="hidden" name="matricula" value="<?=$alumno->getMatricula()?>">
                <input type="submit" value="Detalles">
            </form></td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <form action="../Controller/nuevoAlumno.php" method="post">
                <td><input type="text" name="matricula" minlength="6" maxlength="6"></td>
                <td><input type="text" name="nombre"></td>
                <td><input type="text" name="apellidos"></td>
                <td><input type="text" name="curso"></td>
                <td><input type="submit" value="Añadir"></td>
            </form>
        </tr>
    </table>
</body>
</html>