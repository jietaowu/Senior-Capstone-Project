<?php 


$conn = mysqli_connect('localhost','jwu','love.09221213','ou_ecommerce');

session_start();

$user_id = $_SESSION['user_id'];

var_dump($user_id);

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];
$phone = $_POST['phone'];




 $sql = "INSERT INTO `shopping_address`(`user_id`,  `firstName`, `lastName`, `street`, `city`, `state`, `zipcode`, `phoneNumber`) VALUES ('$user_id','$firstname','$lastname','$street','$city','$state','$zipcode','$phone')";

$result = mysqli_query($conn,$sql);

 if($result){

 	header('Location:account.php ');

 }


 ?>

