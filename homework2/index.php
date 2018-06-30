<?php

include 'inc/functions.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Magic 8 Ball </title>
        <style>
            @import url("css/styles.css");
            @import url('https://fonts.googleapis.com/css?family=Wendy+One');
        </style>

    </head>
    <body>
        <div id ="main">
        <header>
            <h1>Magic 8 Ball</h1>
        </header>
            <?php
                play();
            ?>
            
            <form>
                <input type="submit" value="Click for New Image!"/>
            </form>
        </div>
    </body>
</html>