<!DOCTYPE html>
<html>
    <head>
        <title>GoldJack</title>
        <link rel="stylesheet" href="./css/styles.css">
            <h1>Silverjack!</h1>
            <style>
                @import url("css/style.css");
            </style>
    </head>
    
    <body>
        <?php
        require('object.php');
        
        //destroy last session
        if(isset($_POST['resetGame']))
        {
            session_start();
            $_SESSION = array();
            session_destroy();
        }
        
        session_start();
        
        
        if(isset($_SESSION['obj']) && !empty($_SESSION['obj']))
        {
            //check if object exists
        }
        else
        {
            $obj = new SilverjackHandler();
            $_SESSION['obj'] = $obj;
        }
        
        if(isset($_POST['dealcard']))
        {
            $carddeal = $_SESSION['obj'];
            for($i=0;$i<24;$i++)
            {
            $carddeal->dealCard();
            }
            $_SESSION['obj'] = $carddeal;
        }
        
        
        $_SESSION['obj']->printGame();
        
        echo"<div class = 'theend'>";
        
        //check if won
        $_SESSION['obj']->checkWin();
        
        echo "<br />";
        
        
        
        if ($_SESSION['obj']->getWin() == FALSE)
        {
            echo "<form method = 'post'>
                    <input ie = 'buttonB' type='submit' value='Deal Card' name='dealcard'>
                    </form>";
            echo "<form method='post'>
                    <input id = 'buttonA' type='submit' value='Reset' name='resetGame'>
                    </form>";
        }
        else
        {
            echo "<form method='post'>
                    <input id ='buttonA' type='submit' value='Reset' name='resetGame'>
                    </form>";
        }
        echo "</div>";
        
        
        ?>
        
    </body>
    
    <footer>
        <hr>
        CST 336 Internet Programming.
        <figure>
            <img src="img/csumb_logo.jpg" alt="CSUMB" />
        </figure>
    </footer>
    
</html>