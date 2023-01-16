<?php
    require_once "../Model/Alumno.php";

    $alumno = new Alumno($_REQUEST['matricula'], $_REQUEST['nombre'], $_REQUEST['apellidos'], $_REQUEST['curso']);

    $alumno->insert();

    header("Location: ../Controller/index.php");
?>