<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<style>
    .container {
        border: 1px solid black;
        background-color: white;
        width: 500px;
        position: relative;
        left: 50%;
        margin-left: -250px;
        text-align: center;
        padding-bottom: 20px;
    }
<?php
    if (isset($_REQUEST['bg'])) {
        $bg = $_REQUEST['bg'];
        setcookie("bg", $bg, time() + 60*60*24*30);
    } else if (isset($_COOKIE['bg'])) {
        $bg = $_COOKIE['bg'];
    }

    if (isset($_REQUEST['bg']) || isset($_COOKIE['bg'])) {
        ?>
        body {
            background-color: <?=$bg?>;
        }
        <?php
    }
?>

</style>
<body>
    <div class="container">
        <h1>Introduzca color de fondo</h1>
        <form action="#" method="post">
            <input type="color" name="bg">
            <input type="submit" value="Cambiar color">
        </form>
    </div>
</body>
</html>