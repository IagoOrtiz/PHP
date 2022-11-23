<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmacion</title>
</head>
<style>
* {
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    text-align: center;
}

h1 {
    margin-top: 50px;
}
div {
    width: 100%;
}

div * {
    display: inline;
    margin: 10vh 30px;
    font-size: 5em;
    width: 40%;
}

input[value="SI"] {
    background-color: lime;
}

input[value="NO"] {
    background-color: red;
}
</style>
<body>
    <h1>¿ESTÁ SEGURO DE QUE LO QUE ESTÁ APUNTO DE HACER EN ESTE MISMO INSTANTE?</h1>
    <div>
    <form action="ej2.php" method="post">
        <input type="hidden" name="del">
        <input type="hidden" name="DNI" value="<?=$_REQUEST["DNI"]?>">
        <input type="submit" value="SI">
    </form>
    <form action="ej2.php" method="post">
        <input type="submit" value="NO">
    </form>
    </div>
</body>

</html>