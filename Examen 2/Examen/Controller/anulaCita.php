<?php
    require_once "../Model/Cita.php";
    require_once "../Model/Usuario.php";

    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: ../Controller/index.php");
    }

    $cita = new Cita ($_SESSION['usuario']->getId(), $_SESSION['medico']->getId(), $_SESSION['fechaMañana'], 0);

    $cita->delete();

    header("Location: ../Controller/tablaMedicos.php");
?>