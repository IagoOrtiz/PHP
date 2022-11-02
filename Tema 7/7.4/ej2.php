<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<style>
    .sus {
        height: 300px;
        margin-left: 50px;
    }

    h1 img{
        height: 25px;
    }
</style>
<body>
    <h1>¿Es este pequeño bastardo sospechoso?</h1>
    <img class="sus" src="../img/Naranja.png" alt="Naranja">
    <?php
        session_start();
        if (isset($_COOKIE['votes'])) {
            $_SESSION['votes']=unserialize($_COOKIE['votes']);
        } else {
            $_SESSION['votes']=array("Y" => 0, "N" => 0);
        }
        if (isset($_REQUEST['vote'])) {
            $_SESSION['votes'][$_REQUEST['vote']]++;
        }

        setcookie("votes", serialize($_SESSION['votes']), time() + 60*60*24*30*3);
        
        ?>
         <h1>SI 
        <?php
        for ($i=0; $i < $_SESSION['votes']['Y']; $i++) { 
            ?>
                <img src="../img/Verde.png" alt="S ">
            <?php
        }
        ?>
        </h1>

        <h1>NO
        <?php
        for ($i=0; $i < $_SESSION['votes']['N']; $i++) { 
            ?>
                <img src="../img/Rojo.png" alt="N ">
            <?php
        }
        ?>
        </h1>
    <table>
        <tr>
            <td>
                <form action="#" method="post">
                    <input type="hidden" name="vote" value="Y">
                    <input type="submit" value="SI">
                </form>
            </td>
            <td>
                <form action="#" method="post">
                    <input type="hidden" name="vote" value="N">
                    <input type="submit" value="NO">
                </form>
            </td>
        </tr>
    </table>

</body>

</html>