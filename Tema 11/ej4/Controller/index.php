<?php
    require_once "../Model/Alumno.php";

    $data['alumnos'] = Alumno::getAlumnos();

    include_once "../View/tablaAlumnos.php";
?>