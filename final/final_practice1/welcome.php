<?php 
if (session_status() !== PHP_SESSION_ACTIVE) 
{
	session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <h1><?php echo $_SESSION['username']; ?> successfully logged in</h1>
    <!-- Rubric Here -->
    <div id="rubric1Div">
        <table border=1 width="400">
            <tr style="background-color:#FFFFFF">
                <th>#</th>
                <th>Task Description</th>
                <th>Points</th>
            </tr>
            <tr style="background-color:#99E999">
                <td>1</td>
                <td>There is a Login form with all appropriate HTML elements</td>
                <td width="20" align="center">5</td>
            </tr>
            <tr style="background-color:#99E999">
                <td>2</td>
                <td>When changing the username, a jQuery event is executed</td>
                <td width="20" align="center">5</td>
            </tr>
            <tr style="background-color:#99E999">
                <td>3</td>
                <td>When changing the username, an AJAX call is executed, displaying the last date/time the user logged in and the last login status (Successful, Unsuccessful)</td>
                <td align="center">15</td>
            </tr>
            <tr style="background-color:#99E999">
                <td>4</td>
                <td>When submitting the Login form, the last date/time is updated correctly </td>
                <td align="center">15</td>
            </tr>
            <tr style="background-color:#99E999">
                <td>5</td>
                <td> When submitting the Login form, the Login Status is updated accordingly, whether it was Successulf (S) or Unsuccessful (U) </td>
                <td align="center">20</td>
            </tr>
            <tr style="background-color:#99E999">
                <td>6</td>
                <td>When submitting the Login form, if the credentials are wrong, the user is taking back to the login screen. </td>
                <td align="center">5</td>
            </tr>
            <tr style="background-color:#99E999">
                <td>7</td>
                <td>When submitting the Login form, if the credentials are correct, a "username" session variable is set and it is displayed in a new page called <strong>"welcome.php"</strong> </td>
                <td align="center">10</td>
            </tr>
            <tr style="background-color:#99E999">
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