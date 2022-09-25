<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 Página</title>
</head>
<style type="text/css">
    body {
        background-color: <?php echo $_REQUEST['BG']?>;
        font-family: <?php echo $_REQUEST['fuente']?>;
        text-align: <?php echo $_REQUEST['alineamiento']?>;
    }
    img {
        display: block;
        margin: auto;
    }
</style>
<body>
    <img src=<?php echo "../Images/".$_REQUEST['banner'].".jpg"?> height="300px"><br>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ea delectus iste nulla dignissimos autem quibusdam
    recusandae doloribus, temporibus illo voluptas! Officiis est provident exercitationem corporis veniam placeat deserunt, 
    molestiae laudantium? Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo nobis, beatae, perferendis amet 
    possimus sunt quas doloremque quo, eum fugiat aliquam! A recusandae provident accusantium magnam totam earum nesciunt modi?</p>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ea delectus iste nulla dignissimos autem quibusdam
    recusandae doloribus, temporibus illo voluptas! Officiis est provident exercitationem corporis veniam placeat deserunt, 
    molestiae laudantium? Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo nobis, beatae, perferendis amet 
    possimus sunt quas doloremque quo, eum fugiat aliquam! A recusandae provident accusantium magnam totam earum nesciunt modi?
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam cum ipsum repellendus! Sint, dolorum! Laborum quia aspernatur pariatur 
    exercitationem, commodi, porro maiores similique nihil esse eligendi consequuntur voluptas officia fuga.</p>
</body>
</html>