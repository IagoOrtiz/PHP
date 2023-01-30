<?php
    if ($_REQUEST['moneda'] == "eur") {
        $conversion = [
            "valor" => $_REQUEST['valor']*166.386,
            "moneda" => "₧"
        ];
    } else {
        $conversion = [
            "valor" => $_REQUEST['valor']*0.006,
            "moneda" => "€"
        ];
    }
    echo json_encode($conversion);
?>