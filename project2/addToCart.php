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
    header('Location: yugioh.php')
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
<<<<<<< HEAD
=======
        <style>
            header, nav, footer {
    width: 960px;
    margin: 0px auto; 
    text-align: center; 
}

body {
    background-color: #D8D296;
    color: #7D5259;
}

a:hover { 
    background-color: yellow;
}

#ygo, #pkmn{
    display: block;
    margin-left: auto;
    margin-right: auto;
}

aside, section {
        float:left;
}
    
aside {
    text-align: left;
    padding-left: 10px;
    padding-top:  50px;
    width:200px;
    font-size: 1.3em;
}
    
table {
    margin: 0px auto;
}
        </style>
>>>>>>> 417e6af87e2a4685a149ae8891d5cb59f82e73a4
    </head>
    <body>

    </body>
</html>