<?php 

$conn = mysqli_connect('localhost','jwu','love.09221213','ou_ecommerce');


$skuid = $_GET['skuid'];

$sql = "DELETE FROM `product` WHERE `product_id` = '$skuid' ";

$query = mysqli_query($conn,$sql);

if($query){

	header('Location: viewProducts.php');


}


 ?>