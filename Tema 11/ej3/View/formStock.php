<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reponer Stock</title>
    <link rel='stylesheet' href='../View/css/styles.css'>
</head>
<body>
    <div class="stock">
        <h1>Inserte la cantidad a reponer</h1>
        <form action="reponeStock.php" method="post">
            <input type="hidden" name="id" value="<?=$_REQUEST['id']?>">
            <input type="number" name="stock" min="0">
            <input type="submit" value="Poner a la venta">
        </form>
    </div>
</body>
</html>