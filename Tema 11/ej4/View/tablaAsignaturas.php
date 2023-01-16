<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignaturas Disponibles</title>
    <link rel='stylesheet' href='../View/css/styles.css'>
</head>
<body>
    <table>
        <tr>
            <th class="titulo" colspan="3">ASIGNATURAS</th>
        </tr>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
        </tr>
        <?php
        $i = 1;
        foreach ($data['asignaturas'] as $asignatura) { 
            if ($i != $asignatura->getCodigo()) {
                $i++;
            }
            $i++;
        ?>
        <tr>
            <td><?=$asignatura->getCodigo()?></td>
            <td><?=$asignatura->getNombre()?></td>
            <form action="../Controller/borraAsignatura.php" method="post">
                <input type="hidden" name="codigo" value="<?=$asignatura->getCodigo()?>">
                <td><input type="submit" value="Borrar"></td>
            </form>
        </tr>
        <?php
        }
        ?>
        <form action="nuevaAsignatura.php" method="post">
        <tr>
            <td><?=$i?></td>
            <td><input type="text" name="nombre"></td>
            <td colspan="3"><input type="submit" value="Añadir"></td>
        </tr>
        </form>
        <tr>
            <td colspan="3"><form action="index.php"><input type="submit" value="Volver"></form></td>
        </tr>
        
    </table>
</body>
</html>