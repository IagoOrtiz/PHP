<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de Articulo</title>
    <link rel='stylesheet' href='../View/css/style.css'>
</head>

<body>
    <?php
    if (isset($data['id'])) {
        echo "<h1>Modificar Articulo</h1>";
    } else {
        echo "<h1>Nuevo Articulo</h1>";
    }
    ?>
    
    <form action="<?=$data['destino']?>" method="post">

        <input type="text" name="titulo" placeholder="Titulo" <?php if(isset($data['titulo'])) { echo "value='$data[titulo]'"; }?>><br>
        <textarea name="contenido" placeholder="Inserte el contenido del artículo aquí..."><?php if(isset($data['titulo'])) { echo "$data[contenido]"; }?></textarea><br>
        <input type="hidden" name="fecha" value="<?=date("d/m/Y H:i", time())?>">
        <?php
        if (isset($data['id'])) {
            ?> <input type="hidden" name="id" value="<?=$_REQUEST['id']?>"> <?php
        }
        ?>
        <input type="submit" value="Publicar">

    </form>
</body>

</html>