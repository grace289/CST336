<?php
include 'connect.php';
$connect = getDBConnection();

//Checking username in database
$sql = "SELECT * FROM fp_login
        WHERE username = :username";
$stmt = $connect->prepare($sql);
$data = array(":username" => $_POST['username']);
$stmt->execute($data);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
//var_dump($user);
// yes user exists
if(isset($user['username'])){
	// get the last login date/time and return
	echo $user['lastLogin']."#".$user['lastLoginStatus'];
}
else
{
	echo "false";
}
?>