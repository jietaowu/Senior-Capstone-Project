<?php 

include 'conn.php';

session_start();

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

$password = test_input($password);


$sql = "SELECT * FROM `user` WHERE `email` = :email AND `password` = :password";
 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare($sql);
 
 $stmt->bindParam(':email', $email);
 $stmt->bindParam(':password', $password);
 $stmt->execute();
 $row = $stmt->fetch(PDO::FETCH_ASSOC);

 $user_id = $row['user_id'];
 
 $eth_address = $row['eth_address'];

 $rows = $stmt->rowCount();
 
if($rows > 0){

	$_SESSION['user_id'] = $user_id;

	$_SESSION['email'] = $email;

	$_SESSION['eth_address'] = $eth_address;

    header('Location: account.php');
}

 


 ?>