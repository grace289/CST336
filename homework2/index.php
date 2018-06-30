<?php

include 'inc/functions.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Mario Line Up Match Game </title>
        <style>
            @import url("css/styles.css");
            @import url('https://fonts.googleapis.com/css?family=Wendy+One');
        </style>
    </head>
    
    
    <body>
        
        <header>
            <h1>Try your luck at Mario's Line Up Match Game</h1>
        </header>
        
        
        <div id ="main">
            <div id="win">
            <p>
            Match all three and win a prize!<br>
            </p>
            </div>
            
            <?php
                play();
            ?>
            
            <form>
                <input type="submit" value="Spin!"/>
            </form>
        </div>
        
    <footer>
        <hr>
        <figure>
            <img id="csumb" src="img/csumb.png" alt="CSUMB Logo" />
        </figure>
        CST336. 2018 &copy; Alvarez<br/>
        <strong>Disclaimer:</strong> The information in this webpage is ficticious. It is used for academic purposes only.
        
    </footer>
        
        
    </body>
</html>