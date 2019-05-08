<?php 

$conn = mysqli_connect('localhost','jwu','love.09221213','ou_ecommerce');

session_start();

$product_id = $_GET['pid'];

$user_id = $_SESSION['user_id'];

$product_name = $_POST['product_name'];

$product_price = $_POST['product_price'];

$product_brand = $_POST['product_brand'];

$product_quantity = $_POST['product_quantity'];



 $sql = "UPDATE `product` SET `product_name`= '$product_name',`product_brand`= '$product_brand',`product_price` = '$product_price',`product_quantity` = '$product_quantity' WHERE `product_id` = '$product_id' ";


 $query = mysqli_query($conn,$sql);

if($query){
	

	header('Location: viewProducts.php  ');
}







 ?>