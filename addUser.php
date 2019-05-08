<?php

 error_reporting(E_ALL);
 ini_set('display_errors', 1);

include 'conn.php';

if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
	exit;
}

function test_input($data){
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

$email = $_POST['email'];
$email = test_input($email);
$password = $_POST['password'];

$sql = "SELECT email FROM `user` WHERE `email` = :email";
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare($sql);
if($stmt->execute(['email' => $email])){
	if($rows = $stmt->fetch() > 0){
		$error = "用户名已存在，请换个其他的用户名";
		exit;
	}
}





$sql = "INSERT INTO `user`(`email`, `password`) VALUES (:email,:password)";

$stmt = $conn->prepare($sql);

if($stmt->execute(
			array(
				':email'=> $email,
				':password'=> $password,
				)
		));

$insert_id = $conn->lastinsertid();

if($insert_id){

    header("Location: verifyUser.php ");

}
			
	

	
?>