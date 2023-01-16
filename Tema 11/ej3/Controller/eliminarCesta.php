<?php
    session_start();
        
    $_SESSION['cesta'][$_REQUEST['id']]['num']--;

    header("Location: ../Controller/index.php");
?>