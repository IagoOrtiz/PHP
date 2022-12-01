<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
        include 'ej2menu.php';
        $menu = new Menu();
        $menu->añadeElemento("Amogus", "https://www.innersloth.com/games/among-us/");
        $menu->añadeElemento("Sans", "https://undertale.fandom.com/es/wiki/Sans");
        $menu->añadeElemento("Google", "https://www.google.com");
        $menu->menuHorizontal();
        echo "<br>";
        $menu->menuVertical();
    ?>
</body>
</html>