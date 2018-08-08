<?php 
//Start the session 
session_start(); 

//This is a simplified HTML Document 
?> 
<html> 
<head> 
<title>My Page</title> 
</head> 
<body> 
    <?php 
    //Call the functions file 
    require_once("functions.php"); 
    //Display either the user's name, or the login form 
    //This can be placed on many pages without having 
    //to re-write the form everytime, just use this function 
    loggedIn(); 
    ?> 
</body> 
</html>