<?php
    function imprimeTarjeta() {
        echo "<fieldset><table border='solid'><tbody>";
        echo "<tr><td></td><td>A</td><td>B</td><td>C</td><td>D</td><td>E</td></tr>";
        for ($i=1; $i <= 5; $i++) { 
            echo "<tr><td>".$i."</td>";
            for ($j=0; $j < 5; $j++) { 
                switch ($j) {
                    case 0:
                        echo "<td><input type='radio' name='valor' value='".$i."A'></td>";
                        break;
                    case 1:
                        echo "<td><input type='radio' name='valor' value='".$i."B'></td>";
                        break;
                    case 2:
                        echo "<td><input type='radio' name='valor' value='".$i."C'></td>";
                        break;
                    case 3:
                        echo "<td><input type='radio' name='valor' value='".$i."D'></td>";
                        break;
                    case 4:
                        echo "<td><input type='radio' name='valor' value='".$i."E'></td>";
                        break;
                    default:
                        echo "<td><input type='radio' name='valor' value='".$i."O'></td>";
                        break;                
                }
            }
            echo "</tr>";
        }
        echo "</tbody></table></fieldset>";
    }

    function compruebaClave($valEnv, $valGen) {
        if ($valEnv == $valGen) {
            return true;
        } else {
            return false;
        }
    };
?>