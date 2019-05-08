<?php 

$conn = mysqli_connect('localhost','jwu','love.09221213','ou_ecommerce');

$order_id = $_GET['order_id'];

$sql = "DELETE FROM `order` WHERE `order_id` = '$order_id'";

$query = mysqli_query($conn,$sql);

if($query){

	header('Location: cart.php');
}else{
	header('Location: 404.php');
	exit();
}





 ?>