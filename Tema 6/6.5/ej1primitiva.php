<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primitiva</title>
</head>
<style>
    * {
        text-align: center;
        font-size: 1.5rem;
    }
    table {
        border-width: 2px;
        width: 500px;
    }
</style>
<body>
    <?php
    function combinacion($arr){
        $n = "";
        $prim = array();
        for ($i = 1; $i <= 6; $i++) {
            $n = "n".$i;
            if ($arr[$n] != "") {
                $prim[] = $arr[$n];
            } else {
                $prim[] = rand(1, 49);
            }
        }
        if ($arr["nS"] != "") {
            $prim[] = $arr["nS"];
        } else {
            $prim[] = rand(1, 999);
        }
        if ($arr["nombre"] != "") {
            $prim[] = $arr["nombre"];
        } else {
            $prim[] = "Combinación generada para la Primitiva";
        }
        return $prim;
    };

    function imprimeApuesta($arr) {
        echo "<table border='solid'><tr><td colspan='6'>".$arr[7]."</td></tr><tr>";
        for ($i=0; $i < 6; $i++) { 
            echo "<td>".$arr[$i]."</td>";
        }
        echo "</tr><tr><td colspan='3'>Serie:</td><td colspan='3'>".$arr[6]."</td></tr></table>";
    };

    $arr = combinacion($_REQUEST);
    imprimeApuesta($arr);

    ?>

</body>
</html>