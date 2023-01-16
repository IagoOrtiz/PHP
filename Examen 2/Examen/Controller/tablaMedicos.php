<?php
    require_once "../Model/Usuario.php";

    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: ../Controller/index.php");
    }

    $data['medicos'] = Usuario::getMedicos();

    include_once "../View/listadoMedicos.php";
?>