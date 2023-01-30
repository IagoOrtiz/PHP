<?php
    $url = "http://localhost//PHP/PHP/Tema%2012/Simulacro%20Examen/Controller/consulta.php?";
    foreach ($_REQUEST as $key => $value) {
        if ($value != '') {
            $url .= "$key=$value&";
        }  
    }
    $res = file_get_contents($url);
    print_r(json_decode($res));
?>