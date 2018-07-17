<?php

session_start();

include "dbConnection.php";
$conn =getDatabaseConnection("ottermart");

?>

<html>
    <head>
        <title> OtterMart - Admin Site </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    </head>
    <body>
        
        <h1>OtterMart - Admin Site</h1>
        
        <form method="POST" action="loginProcess.php">
            Username: <input type="text" name="username"/><br/>
            Password: <input type="password" name="password"/><br/>
            
            <input type="submit" class='btn btn-primary' name="submitForm" value="Login!"/>
            <br><br>
            
            <?php
                if($_SESSION['incorrect']){
                    echo "<p class='lead' id='error' style='color:red'>";
                    echo "<strong>Incorrect Username or Password!</strong></p>";
                }
            ?>
        </form>

    </body>
</html>