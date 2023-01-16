<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entradas del Blog</title>
</head>
<body>
    <header>
        <h1>Blog de copypasta</h1>
    </header>
    <main>
        <?php
        foreach($data['articulos'] as $articulo) {
        ?>
        <div>
        <h2><?=$articulo->getTitulo()?></h2>
        <p><?=$articulo->getContenido()?></p>
        <form action="borraArticulo.php" method="post">
            <?=$articulo->getFecha()?> 
            <input type="hidden" name="id" value="<?=$articulo->getId()?>">
            <input type="submit" value="Borrar">
        </form>
        </div><br>
        <?php
        }
        ?>
    <a href="../Controller/nuevoArticulo.php"><button>Publicar artículo</button></a><br>__________________________________________<br><br>
    </main>
    <footer>
        <a href="https://www.youtube.com/watch?v=klfT41uZniI">Recibe las novedades del blog aquí</a>
    </footer>
</body>
</html>