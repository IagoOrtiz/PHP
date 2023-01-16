<?php
    require_once "../Model/AlumnoAsignatura.php";

    $matriculadas = AlumnoAsignatura::getAsignaturasByMatricula($_REQUEST['matricula']);

    $flag = true;
    foreach ($matriculadas as $matricula) {
        if ($matricula->getCodigo() == $_REQUEST['asignatura']) {
            $flag = false;
        }
    }

    if ($flag) {
        $asignatura = new AlumnoAsignatura($_REQUEST['matricula'], $_REQUEST['asignatura']);

        $asignatura->insert();
    }

    header("Location: ../Controller/verDetalles.php?matricula=$_REQUEST[matricula]");
?>