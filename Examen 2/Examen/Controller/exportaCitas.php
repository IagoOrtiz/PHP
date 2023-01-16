<?php
    require_once "../Model/Cita.php";
    require_once "../Model/Usuario.php";

    session_start();

    $archivo = fopen("../Files/citas.txt", "w");
    fwrite($archivo, "Paciente: ".$_SESSION['usuario']->getNombre()." - Fecha:".$_SESSION['fechaMañana'].PHP_EOL);
    $citas = Cita::getCitasByPaciente($_SESSION['usuario']->getId(), $_SESSION['fechaMañana']);
    foreach ($citas as $cita) {
        fwrite($archivo, "Hora: ".$cita->getHora().":00h, Medico: ".Usuario::getUsuarioById($cita->getMedico())->getNombre().PHP_EOL);
    }

    header("Location: ../Controller/tablaMedicos.php");
?>