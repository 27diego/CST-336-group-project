<?php
    session_start();
    include 'dbConnection.php'; //include '../dbConnection.php';
    $conn = getDatabaseConnection();
    
    function getAllTypes(){
        global $conn;
        $sql = "SELECT typeName
                FROM pokemon";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $classes = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($classes as $cl){
            echo "<option value='" . $cl['typeName'] . "'>" . $cl['typeName'] . "</option>";
        }
    }
    
    function getRarity(){
        global $conn;
        $sql = "SELECT rarity
                FROM types";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $classes = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($classes as $cl){
            echo "<option value='" . $cl['rarity'] . "'>" . $cl['rarity'] . "</option>";
        }
    }
    
    function getItems() {
    global $conn;
    $namedParameters = array();
    
    
    $sql = "SELECT * 
            FROM pokemon 
            WHERE 1"; 
    
    // if($_GET['typeName']=="" || $_GET['storeSearch']=="")
    // {
    //     echo "Please fill in fields!";
    //     return;
    // }
    
    if(isset($_GET['submit'])) {
        if (isset($_GET['storeSearch'])) {
            $sql .= " AND itemName LIKE :itemName";
            $namedParameters[':itemName'] = "%" . $_GET['storeSearch'] . "%";
        }
        if (isset($_GET['typeType'])) {
            $sql .= " AND typeName = :typeName ";
            $namedParameters[':typeName'] = $_GET['typeType'];
        }
         if (isset($_GET['raritycard'])) {
            $sql .= " AND cardRarity = :rarity ";
            $namedParameters[':rarity'] = $_GET['raritycard'];
        }

        if ($_GET['sort'] == 'desc') {
            $sql .= " ORDER BY itemName desc";
        }
        if ($_GET['sort'] == 'asc') {
            $sql .= " ORDER BY itemName asc";
        }
    }
            
    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $r) {
        echo "<div class='pokemon'>";
        echo    "<details>";
        echo        "<summary>" . $r['itemName'] . "</summary>";
        echo        "<p> Category: " . $r['typeName'] . "</p>";
        echo        "<p> Description: ". $r['description']."</p>"; 
        echo        "<td><img src='" . $r['cardImage'] . "'></td>";
        echo        "<form action='addToCart2.php' method='GET'>";
        echo            "<input type='hidden' name='val' value='".$r['itemName']."'>";
        echo            "<input type='submit' value='Add to cart' style='position:relative; top:-10px'>";
        echo        "</form>";
        echo    "</details>";
        echo "</div>";
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Yugioh Card Search</title>
        <!--<p>insert description</p>-->
        
        <style>
            /*styling goes here*/
        </style>
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="styles.css" rel="stylesheet" type="text/css" />
        
     </head>
    <body>
        <h1>Items List</h1>
        <a href="checkout.php">Shopping Cart</a>
        <form>
            <fieldset style='border-radius:35px;
                             width:300px;
                             margin: 0 auto;'>
            <input type="text" name="storeSearch" placeholder="Search Product">
            <select name="typeType">
                <option disabled selected value value>Choose a type</option>
                <?=getAllTypes()?>
            </select></br>
            
            <select name="raritycard">
                <option disabled selected value value>Choose a rarity</option>
                <?=getRarity()?>
            </select></br>
            

            Sort Products By:</br>
            <select name="sort">
                <option value="desc">Descending</option>
                <option value="asc" selected>Ascending</option>
            </select>
            <input type="submit" name="submit" value="Search!">
            </fieldset>        
        </form>
        <?=getItems()?>
    </body>
</html>