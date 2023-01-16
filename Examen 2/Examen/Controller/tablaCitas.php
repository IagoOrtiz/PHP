<?php
    require_once "../Model/Usuario.php";
    require_once "../Model/Cita.php";

    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: ../Controller/index.php");
    }

    if (!isset($_SESSION['medico'])||$_SESSION['medico']->getId() != $_REQUEST['id']) {
        $_SESSION['medico'] = Usuario::getUsuarioById($_REQUEST['id']);
    }
    

    $data['medico'] = $_SESSION['medico']->getNombre();

    $data['fecha'] = $_SESSION['fechaMañana'];

    if (Cita::getCitaById($_SESSION['usuario']->getId(), $_SESSION['medico']->getId(), $_SESSION['fechaMañana']) != false) {
        $cita = Cita::getCitaById($_SESSION['usuario']->getId(), $_SESSION['medico']->getId(), $_SESSION['fechaMañana']);

        $data['hora'] = $cita->getHora();

        include_once "../View/citaRegistrada.php";
    } else {
        include_once "../View/listadoCitas.php";
    }
?>