<?php

$username=$_POST["username"];
$password=$_POST["password"];

//connected to the localhost with user root
$l=mysql_connect("localhost","root");

//connected to the database final_exam
mysql_select_db("data_base");

//fetch all the records for the username and password
$res=mysql_query("select * from fp_login where username='$username' and password='$passwords'");

//fetch the number of rows
$nr=mysql_num_rows($res);

//create the recordset
$ar=mysql_fetch_row($res);

//checks if $nr==1 means username and password is correct
if($nr==1)

{

//checks the status ,if S displays successsfull else unseccessfull
if($ar[3]=="S")
$f="successful";

else
$f="unsuccessful";

//display the message
print("Your last login was at $ar[2] and status is $f");

//updates with the current timestamp
$q="update fp_login set last_login=now(),status='S' where username='$username' and password='$password'";

mysql_query($q,$l);
}
else {
$q="update fp_login set last_login=now(),status='U' where username='$username'";

mysql_query($q,$l);

}

?>



<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
          <title>Practice - Program 1</title>
          
    </head>
    <body>
        
        
        
    <form method=post action=program1.php>

    Username: <input type=text name=username> <br />
    Password: <input type=password name=password>
    <input type=submit value=login>
    </form>    
    
    <br />
    <br />

        <!-- Rubric Here -->

                      <div id="rubric1Div">  
    <table border=1 width="400">
    <tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#FFC0C0">
      <td>1</td>
      <td>There is a Login form with all appropriate HTML elements</td>
      <td width="20" align="center">5</td>
    </tr>
    <tr style="background-color:#FFC0C0">
      <td>2</td>
      <td>When changing the username, a jQuery event is executed</td>
      <td width="20" align="center">5</td>
    </tr> 
    <tr style="background-color:#FFC0C0">
      <td>3</td>
      <td>When changing the username, an AJAX call is executed, displaying the last date/time the user logged in and the last login status (Successful, Unsuccessful)</td>
      <td align="center">15</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>4</td>
      <td>When submitting the Login form, the last date/time is updated correctly </td>
      <td align="center">15</td>
    </tr>  
     <tr style="background-color:#FFC0C0">
       <td>5</td>
       <td> When submitting the Login form, the Login Status is updated accordingly, whether it was Successulf (S) or Unsuccessful (U) </td>
       <td align="center">20</td>
     </tr> 
 <tr style="background-color:#FFC0C0">
       <td>6</td>
       <td>When submitting the Login form, if the credentials are wrong, the user is taking back to the login screen. </td>
       <td align="center">5</td>
     </tr> 
      <tr style="background-color:#FFC0C0">
       <td>7</td>
       <td>When submitting the Login form, if the credentials are correct, a "username" session variable is set and it is displayed in a new page called <strong>"welcome.php"</strong> </td>
       <td align="center">10</td>
     </tr> 
      <tr style="background-color:#FFC0C0">
       <td>8</td>
       <td>At least five CSS rules are included</td>
       <td align="center">5</td>
     </tr>           
     <tr style="background-color:#99E999">
      <td>9</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </table>
</div>

        
        
        
    
    </body>
</html>