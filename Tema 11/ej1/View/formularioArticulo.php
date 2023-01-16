<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Articulo</title>
</head>

<body>
    <h1>Nuevo Articulo</h1>
    <form action="../Controller/insertaArticulo.php" method="post">

        <input type="text" name="titulo" placeholder="Titulo"><br>
        <textarea name="contenido" placeholder="Inserte el contenido del artículo aquí..."></textarea><br>
        <input type="hidden" name="fecha" value="<?=date("d/m/Y H:i", time())?>">
        <input type="submit" value="Publicar">

    </form>
</body>

</html>