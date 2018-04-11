<?php
    session_start();
    if(!isset($_SESSION['shoppingCart']))
    {
        $arr = array();
        array_push($arr, $_GET['val']);
        $_SESSION['shoppingCart'] = $arr;
    }
    else {
        $arr = array();
        $arr = $_SESSION['shoppingCart'];
        array_push($arr, $_GET['val']);
        $_SESSION['shoppingCart'] = $arr;
    }
    header('Location: pokemon.php')
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>