<?php
session_start();

function displayItems(){
    foreach($_SESSION['shoppingCart'] as $itemss){
        echo "<div>";
        echo $itemss;
        echo "</div>";
        echo "<br>";
    }
   
}
if(isset($_GET['delete_shoppingcart'])){
        $_SESSION['shoppingCart'] = array();
       // header("Location: main.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Checkout Page </title>
        <style>
            /*style*/
        </style>
    </head>
    <body>
            <a href = "main.php">BACK</a>
            <h1>Checkout Items</h1>
            <?=displayItems()?>
        <form method='GET'>
            <input type="submit" name = "delete_shoppingcart" value ="Empty Shopping Cart" >
        </form>
    </body>
</html>