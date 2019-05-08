<?php 

session_start();

$user_id = $_SESSION['user_id'];

$conn = mysqli_connect('localhost','jwu','love.09221213','ou_ecommerce');

if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"image/".$file_name);
        
      }else{
         print_r($errors);
      }
   }

$product_name = $_POST['product_name'];

$product_brand = $_POST['product_brand'];

$product_price = $_POST['product_price'];

$product_quantity = $_POST['product_quantity'];

$product_image = $file_name;




 $sql = "INSERT INTO `product`(`seller_id`, `product_name`, `product_brand`, `product_price`,`product_image`, `product_quantity`,`product_status`) VALUES ('$user_id','$product_name','$product_brand','$product_price','$product_image','$product_quantity','1')";

 $query = mysqli_query($conn,$sql);

if($query){
  header('Location: viewProducts.php');
}





 ?>