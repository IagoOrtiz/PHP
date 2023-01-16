<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cita ya registrada</title>
    <link rel='stylesheet' href='../View/css/style.css'>
</head>
<body>
    <div class="container">
        <h2>Tiene una cita reservada para mañana</h2>
        <table>
            <tr>
                <th>Doctor</th>
                <td><?=$data['medico']?></td>
            </tr>
            <tr>
                <th>Hora</th>
                <td><?=$data['hora']?></td>
            </tr>
        </table>
        <h2>¿Desea anular la cita?</h2>
        <form action="anulaCita.php">
            <input type="submit" value="ANULAR CITA">
        </form>
        <form action="tablaMedicos.php">
            <input type="submit" value="VOLVER">
        </form>
    </div>
</body>
</html>