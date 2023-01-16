<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignaturas de <?=$data['alumno']->getNombre()?></title>
    <link rel='stylesheet' href='../View/css/styles.css'>
</head>
<body>
    <div class="alumno">
    <h2><?=$data['alumno']->getNombre()?></h2>
    <form action="../Controller/matricularAsignatura.php" method="post">
        <input type="hidden" name="matricula" value="<?=$data['alumno']->getMatricula()?>">
        <select name="asignatura">
        <?php
            foreach ($data['asignaturas'] as $asignatura) {
            ?>
            <option value="<?=$asignatura->getCodigo()?>"><?=$asignatura->getNombre()?></option>
            <?php
            }
        ?>
        </select>
        <input type="submit" value="Matricular en la asignatura">
    </form>
    
    <ul>
        <?php
        foreach ($data['asignaturasAlumno'] as $asignatura) {
        ?>
            <li><?=$asignatura->getNombre()?></li>
        <?php
        }
        ?>
    </ul>

    <form action="index.php"><input type="submit" value="Volver"></form>

    </div>
</body>
</html>