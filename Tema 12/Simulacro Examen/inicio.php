<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articulos de Blog</title>
</head>

<body>
    <h1>Consultas a la API Artículos de Blog</h1>
    <h2>Artículos normales</h2>
    <form action="procesaConsulta.php" method="post">
        Titulo: <input type="text" name="titulo"> Cuantos likes: <input type="number" name="likes">
        <input type="submit" value="Consultar">
    </form>
    <h2>______________________________________________________________________________________</h2>
    <h2>Artículos premium</h2>
    <form action="procesaConsulta.php" method="post">
        Token de la cuenta premium: <input type="text" name="token"> Busca el texto: <input type="text" name="texto">
        <input type="submit" value="Consultar">
    </form>
    <h2>______________________________________________________________________________________</h2>
    <h2>Crear una cuenta premium</h2>
    <form action="procesaConsulta.php" method="post">
        Nombre: <input type="text" name="nombre">
        <input type="submit" value="Crear">
    </form>
    <h2>______________________________________________________________________________________</h2>
    <h2>Activar una cuenta bloqueada</h2>
    <form action="procesaConsulta.php" method="post">
        Token de la cuenta: <input type="text" name="token"><input type="hidden" name="activar">
        <input type="submit" value="Activar">
    </form>
    <h2>______________________________________________________________________________________</h2>
</body>

</html>