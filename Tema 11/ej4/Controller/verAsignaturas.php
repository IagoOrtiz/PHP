<?php
    require_once "../Model/Asignatura.php";

    $data['asignaturas'] = Asignatura::getAsignaturas();

    include_once "../View/tablaAsignaturas.php";
?>