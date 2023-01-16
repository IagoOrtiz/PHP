<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado login</title>
    <link rel='stylesheet' href='../View/css/style.css'>
</head>
<body>
    <div class="container">
        <h2><?=$data['mensaje']?></h2>
        <form action="<?=$data['direccion']?>">
            <input type="submit" value="ACEPTAR">
        </form>
    </div>
</body>
</html>