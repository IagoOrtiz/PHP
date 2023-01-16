<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel='stylesheet' href='../View/css/style.css'>
</head>
<body>
    <div class="container">
        <h1>RESERVA DE CITAS MEDICAS KINDRED</h1>
        <form action="../Controller/identificaLogin.php" method="post">
            USUARIO: <input type="text" name="nombre"><br>
            CONTRASEÑA: <input type="password" name="clave"><br>
            <input type="submit" value="ACEPTAR">
        </form>
    </div>
</body>
</html>