<?php 

$conn = mysqli_connect('localhost','jwu','love.09221213','ou_ecommerce');

session_start();

if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
	exit;
}


$user_id = $_SESSION['user_id'];


$eth_address = $_POST['eth_address'];


$sql = "UPDATE `user` SET `eth_address`= '$eth_address' WHERE `user_id` = '$user_id'";

$query = mysqli_query($conn,$sql);



// $sql = "INSERT INTO `user`(`eth_address`) VALUES ('$eth_address') WHERE `user_id` = '$user_id' ";

// $query = mysqli_query($conn,$sql);

if($query){
	header('Location:  account.php');
}

// if($query){
// 	header('Location: account.php ');
// }







 ?>