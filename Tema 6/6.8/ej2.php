<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<style>
    fieldset {
        border: none;
    }
</style>
<body>
    <h1>Elija vocal para reemplazar el resto</h1>
    <?php
        if (isset($_REQUEST['string'])) {
            $string = str_replace("a", $_REQUEST['vocal'], $_REQUEST['string']);
            $string = str_replace("e", $_REQUEST['vocal'], $string);
            $string = str_replace("i", $_REQUEST['vocal'], $string);
            $string = str_replace("o", $_REQUEST['vocal'], $string);
            $string = str_replace("u", $_REQUEST['vocal'], $string);
        } else {
            $string = "Tengo una hormiguita en la patita, que me esta haciendo cosquillitas y no me puedo aguantar";
        }
        echo $string."<br>";
    ?>
    <form action="ej2.php" method="post">
        <fieldset>
            <input type="radio" name="vocal" value="a"><label>A</label>
            <input type="radio" name="vocal" value="e"><label>E</label>
            <input type="radio" name="vocal" value="i"><label>I</label>
            <input type="radio" name="vocal" value="o"><label>O</label>
            <input type="radio" name="vocal" value="u"><label>U</label>
            <input type="hidden" name="string" value="<?php echo $string?>">
        </fieldset>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>