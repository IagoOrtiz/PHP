<?php
    require_once "../Model/Usuario.php";

    $data['direccion'] = "../Controller/index.php";

    if (Usuario::getUsuarioByLogin($_REQUEST['nombre'], $_REQUEST['clave']) != false) {
        $usuario = Usuario::getUsuarioByLogin($_REQUEST['nombre'], $_REQUEST['clave']);
        if ($usuario->getPerfil() == 'medico') {
            $data['mensaje'] = "Lo siento es usted médico y esta web es solo para pacientes";
        } else {
            $data['mensaje'] = "Bienvenido ".$usuario->getNombre();
            $data['direccion'] = "tablaMedicos.php";

            if (isset($_SESSION['usuario'])) {
                session_destroy();
            }
            session_start();

            if (!isset($_COOKIE[$usuario->getNombre()])) {
                setcookie($usuario->getNombre(), 1, strtotime("+1 year"));
            } else {
                setcookie($usuario->getNombre(), $_COOKIE[$usuario->getNombre()]+1, strtotime("+1 year"));
            }

            $_SESSION['usuario'] = $usuario;
            $_SESSION['fechaMañana'] = date("Y-m-d",strtotime("+1 day"));
        }
    } else {
        $data['mensaje'] = "No existe ningún paciente con esas credenciales";
    }

    include_once "../View/resultadoLogin.php";
?>