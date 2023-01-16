<?php
    require_once "../Model/Cita.php";
    require_once "../Model/Usuario.php";

    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: ../Controller/index.php");
    }

    $cita = new Cita ($_SESSION['usuario']->getId(), $_SESSION['medico']->getId(), $_SESSION['fechaMañana'], $_REQUEST['hora']);

    $cita->insert();

    header("Location: ../Controller/tablaMedicos.php");
