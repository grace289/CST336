<?php 
function loggedIn(){ 
    //Session logged is set if the user is logged in 
    //set it on 1 if the user has successfully logged in 
    //if it wasn't set create a login form 
    if(!$_SESSION['loggd']){ 
        echo'<form action="checkLogin.php" method="post"> 
        <p> 
            Username:<br> 
            <input type="text" name="username"> 
        </p> 
        <p> 
            Password:<br> 
            <input type="password" name="username"> 
        </p> 
        <p> 
            <input type="submit" name="submit" value="Log In"> 
        </p> 
        </form>'; 
        //if session is equal to 1, display  
        //Welcome, and whaterver their user name is 
    }else{ 
        echo 'Welcome, '.$_SESSION['username']; 
    } 
} 
?> 