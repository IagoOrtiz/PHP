<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <h1>Configura tu página web</h1>
    <form action="Ej3Pagina.php" method="POST">
        <ul>
            <li>Color de fondo&nbsp;&nbsp;&nbsp;&nbsp;<input type="color" value="#ffffff" name="BG"></li><br>
            <li>Tipo de letra&nbsp;&nbsp;&nbsp;&nbsp;<select name="fuente">
                <option value="times new roman">Times New Roman</option>
                <option value="arial">Arial</option>
                <option value="verdana">Verdana</option>
                <option value="tahoma">Tahoma</option>
            </select></li><br>
            <li>Alineación de texto&nbsp;&nbsp;&nbsp;&nbsp;<select name="alineamiento">
                <option value="right">Derecha</option>
                <option value="center">Centrado</option>
                <option value="left">Izquierda</option>
            </select></li><br>
            <li>Banner&nbsp;&nbsp;&nbsp;&nbsp;<select name="banner">
                <option value="Tortuga">Tortuga</option>
                <option value="Bosque">Bosque</option>
                <option value="Engranajes">Engranajes</option>
            </select></li><br>
        </ul>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Generar">
    </form>
</body>
</html>