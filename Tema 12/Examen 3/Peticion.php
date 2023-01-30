<?php
    //Como los codigos se procesan aquí los servicios de testeo como Postman darán casi siempre un codigo 200
    $url = "http://localhost//PHP/PHP/Tema%2012/Examen%203/BancoAPI.php";

    //Consulta
    if (isset($_REQUEST['consulta'])) {
        $parametros = '?dni=' . $_REQUEST['dni'];
        $data = json_decode(file_get_contents($url . $parametros));
        if ($data->codEstado==200) {
            echo "<pre>";
            print_r($data);
            echo "</pre><br>";
            echo "<h4><a href='index.php'>VOLVER</a></h4>";
        } else {
            mostrarEstado($data);
        }
    
    //Insercion
    } else if (isset($_REQUEST['insercion'])) {
        $datos = ["dni_c" =>  $_REQUEST['dni_c'], "nombre" =>  $_REQUEST['nombre'], "direccion" =>  $_REQUEST['direccion'],
        "telefono" =>  $_REQUEST['telefono'], "dni_e" =>  $_REQUEST['dni_e']];
        $data = hacerPeticion($datos, "POST", $url);
        mostrarEstado(json_decode($data));
    //Actualizacion
    } else if (isset($_REQUEST['actualizacion'])) {
        $datos = ["dni_c" =>  $_REQUEST['dni_c'], "dni_e" =>  $_REQUEST['dni_e']];
        $data = hacerPeticion($datos, "PUT", $url);
        mostrarEstado(json_decode($data));
    //Eliminacion
    } else if (isset($_REQUEST['eliminacion'])) {
        $datos = ["dni" =>  $_REQUEST['dni']];
        $data = hacerPeticion($datos, "DELETE", $url);
        mostrarEstado(json_decode($data));
    }

    //Manda la peticion de los metodos que no son GETs
    function hacerPeticion ($datos, $metodo, $url){
        $opciones = [
            "http" => [
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "method" => $metodo,
                "content" => http_build_query($datos)
            ],
        ];
        $contexto = stream_context_create($opciones);
        $data = file_get_contents($url, false, $contexto);
        return $data;
    }

    //Muestra el estado
    function mostrarEstado($resultado){
        echo "STATUS: ".$resultado->codEstado;
        echo "<br>".$resultado->mensaje;
        echo "<h4><a href='index.php'>VOLVER</a></h4>";
    }
?>