<?php
require_once "Model/Articulos.php";
require_once "Model/Cuentas.php";
   
//Premium
if (isset($_REQUEST['token']) && !isset($_REQUEST['activar'])) {

    if (Cuentas::getCuentaByToken($_REQUEST['token']) && (Cuentas::getCuentaByToken($_REQUEST['token'])->getEstado() != "bloqueada")) {
        
        $usuario = Cuentas::getCuentaByToken($_REQUEST['token']);
        $usuario->setConsultas($usuario->getConsultas()-1);

        if ($usuario->getConsultas()<=0) {
            $usuario->setEstado("bloqueada");
        }

        $usuario->update();

        if (isset($_REQUEST['texto'])) {
            $articulos = Articulos::getArticulos();
    
            $resultados = [];
    
            foreach ($articulos as $articulo) {
                if (str_contains($articulo->getContenido(), $_REQUEST['texto']) && $articulo->getCategoria() == "premium") {
                    $resultados[] = var_dump($articulo);
                }
            }
    
            $resultados = json_encode($resultados);
            echo $resultados;
        } else {
            $articulos = Articulos::getArticulos();
    
            $resultados = [];
    
            foreach ($articulos as $articulo) {
                if ($articulo->getCategoria() == "premium") {
                    $resultados[] = var_dump($articulo);
                }
            }
    
            $resultados = json_encode($resultados);
            echo $resultados;
        } 
    } else {
        echo "[mensaje] => TOKEN INCORRECTO O NO PREMIUM";
        echo "[codEstado] => 401";
    } 

//Crear
} else if (isset($_REQUEST['nombre'])) {
    $letras = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    $cuenta = new Cuentas($_REQUEST['nombre'], "activa", random_int(1000000000, 9999999999).$letras[random_int(0,26)], 5);
    $cuenta->insert();
//Activar
} else if (isset($_REQUEST['activar']) && Cuentas::getCuentaByToken($_REQUEST['token'])) {
    if (Cuentas::getCuentaByToken($_REQUEST['token'])->getEstado() == "bloqueada") {
        $usuario = Cuentas::getCuentaByToken($_REQUEST['token']);
        $usuario->setConsultas(5);
        $usuario->setEstado("activa");
        $usuario->update();
    }
    
//Normal
} else {
    if (isset($_REQUEST['titulo']) && isset($_REQUEST['likes'])) {
        $articulos = Articulos::getArticulos();

        $resultados = [];

        foreach ($articulos as $articulo) {
            if (str_contains($articulo->getTitulo(), $_REQUEST['titulo']) && $articulo->getLikes() >= $_REQUEST['likes'] && $articulo->getCategoria() == "normal") {
                $resultados[] = var_dump($articulo);
            }
        }

        $resultados = json_encode($resultados);
        echo $resultados;
    } else if (isset($_REQUEST['titulo'])) {
        $articulos = Articulos::getArticulos();

        $resultados = [];

        foreach ($articulos as $articulo) {
            if (str_contains($articulo->getTitulo(), $_REQUEST['titulo']) && $articulo->getCategoria() == "normal") {
                $resultados[] = var_dump($articulo);
            }
        }

        $resultados = json_encode($resultados);
        echo $resultados;
    } else if (isset($_REQUEST['likes'])) {
        $articulos = Articulos::getArticulos();

        $resultados = [];

        foreach ($articulos as $articulo) {
            if ($articulo->getLikes() >= $_REQUEST['likes'] && $articulo->getCategoria() == "normal") {
                $resultados[] = var_dump($articulo);
            }
        }

        $resultados = json_encode($resultados);
        echo $resultados;
    } else {
        $articulos = Articulos::getArticulos();

        $resultados = [];

        foreach ($articulos as $articulo) {
            if ($articulo->getCategoria() == "normal") {
                $resultados[] = var_dump($articulo);
            }
        }

        $resultados = json_encode($resultados);
        echo $resultados;
    }
}
