<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Banco Examen</title>
    <link rel='stylesheet' href='css/estilo.css'>
</head>
<body>
    <h1>Formulario de peticiones Banco GargaCoin</h1>
    <h2 class="separador">_________________________________________________________________</h2>
    <h2>Mostrar clientes de un empleado</h2>
    <form action="Peticion.php" method="post">
        DNI del empleado: <input type="text" name="dni" required>
        <input type="submit" value="Realizar busqueda" name="consulta">
    </form>
    <h2>_________________________________________________________________</h2>
    <h2>Añadir un nuevo cliente</h2>
    <form action="Peticion.php" method="post">
        DNI: <input type="text" name="dni_c" required>
        Nombre: <input type="text" name="nombre" required>
        Dirección: <input type="text" name="direccion" required><br><br>
        Telefono: <input type="number" name="telefono" required>
        Gestor: <input type="text" name="dni_e" required>
        <input type="submit" value="Añadir cliente" name="insercion">
    </form>
    <h2>_________________________________________________________________</h2>
    <h2>Actualizar el gestor de un cliente</h2>
    <form action="Peticion.php" method="post">
        DNI del cliente: <input type="text" name="dni_c" required>
        DNI del nuevo gestor: <input type="text" name="dni_e" required>
        <input type="submit" value="Actualizar gestor" name="actualizacion">
    </form>
    <h2>_________________________________________________________________</h2>
    <h2><del>Eliminar</del> Despedir a un empleado</h2>
    <form action="Peticion.php" method="post">
        DNI del empleado: <input type="text" name="dni" required>
        <input type="submit" value="Eliminar empleado" name="eliminacion">
    </form>
</body>
</html>