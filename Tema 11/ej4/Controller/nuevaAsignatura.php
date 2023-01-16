<?php
    require_once "../Model/Asignatura.php";

    $asignatura = new Asignatura('', $_REQUEST['nombre']);

    $asignatura->insert();

    header("Location: ../Controller/verAsignaturas.php");
?>