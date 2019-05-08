<?php 


$conn = mysqli_connect('localhost','jwu','love.09221213','ou_ecommerce');
session_start();
$user_id = $_SESSION['user_id'];

$eth_address = $_POST['transaction_hash'];

var_dump($eth_address);

$sql = "UPDATE `transactions` SET `seller_tx`= '$eth_address', `SellerRefund` = '1' WHERE `seller_id` = '$user_id'";

$query = mysqli_query($conn,$sql);

 if($query){
 	header('Location: confirmRefund.php ');
 }


 ?>