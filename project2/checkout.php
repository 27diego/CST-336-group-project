<?php
session_start();

function displayItems(){
    foreach($_SESSION['shoppingCart'] as $itemss){
        echo "<div id ='items'>";
        echo $itemss;
        echo "</div>";
        echo "<br>";
    }
   
}
if(isset($_GET['delete_shoppingcart'])){
        $_SESSION['shoppingCart'] = array();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Checkout Page </title>
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

#ygo, #pkmn {
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

.items {
    text-align: center
}
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