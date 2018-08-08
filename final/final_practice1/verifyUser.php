<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (session_status() !== PHP_SESSION_ACTIVE) 
{
	session_start();
}

include 'connect.php';
$connect = getDBConnection();

//Checking credentials in database
$sql = "SELECT * FROM fp_login
        WHERE username = :username
          AND password = :password";
$stmt = $connect->prepare($sql);
$data = array(":username" => $_POST['username'], ":password" => sha1($_POST['password']));
$stmt->execute($data);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

//redirecting user to welcome page if credentials are valid
if(isset($user['username'])){
    $_SESSION['username'] = $user['username'];
    //updating last login & last login status
	$query = "UPDATE fp_login SET lastLogin = NOW(),lastLoginStatus = 'S' WHERE userId = :userId";
	$update = $connect->prepare($query);
	$update->execute(array("userId" => $user['userId']));

    header('Location: welcome.php');
    exit();
} else {
	//check username only
	// $connect = getDBConnection();
	$sql = "SELECT * FROM fp_login
        WHERE username = :username";
    $stmt = $connect->prepare($sql);
    $stmt->execute(array(":username" => $_POST['username']));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if(isset($user['username'])) {
    	//updating last login & last login status
		$query = "UPDATE fp_login SET lastLogin = NOW(),lastLoginStatus = 'U' WHERE userId = :userId";
		$update = $connect->prepare($query);
		$update->execute(array("userId" => $user['userId']));
		echo "The values you entered were incorrect. <a href='login.php' >Retry</a>";
    }
    else{
    	echo "The values you entered were incorrect. <a href='login.php' >Retry</a>";
    }
}

?>