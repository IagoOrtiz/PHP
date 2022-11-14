<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        session_start();
        if (!isset($_SESSION['categoria'])) {
            $_SESSION['categoria'] = $_REQUEST['categoria'];
        }
    ?>
    <title>Noticias de <?=$_SESSION['categoria']?></title>
</head>
<style>
    div {
        border: 1px solid black;
    }

    .articulos {
        float: left;
        width: 850px;
    }

    .menu *, .articulo {
        margin: 5px;
    }

    .menu {
        float: right;
        width: 600px;
        display: inline;
    }

    textarea {
        width: 550px;
        height: 520px;
        resize: none;
    }
</style>
<body>
    <?php
        if (isset($_REQUEST['delCat'])) {
            $_SESSION['categorias'][$_SESSION['categoria']]=array();
        }
        if (isset($_REQUEST['titulo'])) {
            $_SESSION['categorias'][$_SESSION['categoria']][] = array(
                'titulo' => ucfirst(strtolower($_REQUEST['titulo'])), 
                'noticia' => $_REQUEST['noticia'],
                'fecha' => date("d/m/Y - h:i a")
            );
        }
    ?>
    <div class="articulos">
        <?php
            foreach ($_SESSION['categorias'][$_SESSION['categoria']] as $i => $datos) {
                ?>
                <div class="articulo">
                    <h2><?=$datos['titulo']?></h2>
                    <p><?=$datos['noticia']?></p><br>
                    <?=$datos['fecha']?>
                </div>
                <?php
            }
            /* date("d/m/Y - h:i a") */
        ?>
    </div>
    <div class="menu">
        <h2>Introducir noticia</h2>
            <form action="" method="post">
                <input type="text" name="titulo" placeholder="Titulo" required><br>
                <textarea name="noticia" width="450px" placeholder="Escriba su noticia aquí" required></textarea>
                <input type="submit" value="Añadir">
            </form>
            <form action="" method="post">
                <input type="hidden" name="delCat">
                <input type="submit" value="Eliminar noticias">
            </form>
            <form action="index.php" method="post">
                <input type="hidden" name="resetCat">
                <input type="submit" value="Volver">
            </form>
    </div>
</body>
</html>