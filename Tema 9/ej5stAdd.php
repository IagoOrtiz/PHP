<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada de stock</title>
</head>
<style>
    table {
        border-collapse: collapse;
        text-align: center;
        margin: 30px auto;
    }

    table * {
        margin: 2px;
    }
</style>

<body>
    <h2>Inserte la cantidad de stock</h2>
    <form action="ej5.php" method="post">
        <input type="hidden" name="mod">
        <input type="hidden" name="+">
        <input type="hidden" name="ogcode" value="<?=$_REQUEST['code']?>">
        <input type="number" name="stock" max="32767">
        <input type="submit" value="Modificar">
    </form>
</body>

</html>