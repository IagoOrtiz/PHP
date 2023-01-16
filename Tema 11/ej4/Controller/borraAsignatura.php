<?php
    require_once "../Model/Asignatura.php";

    $asignatura = Asignatura::getAsignaturaByCodigo($_REQUEST['codigo']);

    $asignatura->delete();

    header("Location: ../Controller/verAsignaturas.php");
?>