<?php
    require_once "../Model/Alumno.php";
    require_once "../Model/Asignatura.php";
    require_once "../Model/AlumnoAsignatura.php";

    $data['alumno'] = Alumno::getAlumnoByMatricula($_REQUEST['matricula']);

    $data['asignaturas'] = Asignatura::getAsignaturas();

    $data['codigos'] = AlumnoAsignatura::getAsignaturasByMatricula($_REQUEST['matricula']);

    $flag = true;
    foreach ($data['codigos'] as $codigo) {
        $data['asignaturasAlumno'][] = Asignatura::getAsignaturaByCodigo($codigo->getCodigo());
        $flag = false;
    }

    if ($flag) {
        $data['asignaturasAlumno'] = array();
    }

    include_once "../View/asignaturasAlumno.php";