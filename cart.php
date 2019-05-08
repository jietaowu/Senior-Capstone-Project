<?php 

$conn = mysqli_connect('localhost','jwu','love.09221213','ou_ecommerce');

session_start();

$user_id = $_SESSION['user_id'];

//获得order次数

$sql = "SELECT COUNT(`order_id`) as OrderNumber FROM `order` WHERE `user_id` = '$user_id' AND `order_status` = '0'";

$query = mysqli_query($conn,$sql);

$count = mysqli_fetch_assoc($query);





?>
<!DOCTYPE html>
<html>
<head>
	<title>ETHStore</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $(".close").onclick(function(){
       $(".alert").alert('close');
    })
 
});
</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">
  	<img src="img/ou.png" width="30" height="30" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="products.php">Products</a>
     
    </div>
    <div class="navbar-nav ml-auto">
          <?php

        if(isset($_SESSION['email'])){
          echo '
          <a class="nav-item nav-link" href="account.php">Account</a><a class="nav-item nav-link" href="logout.php">Logout</a>
          <a class="nav-item nav-link" href="cart.php"><img src="img/online-store.png" width="25px" height="25px" /><span>'.$count['OrderNumber'].'</span></a>
          
          ';
        }else{
          echo '<a class="nav-item nav-link" href="login.php">Login</a>';
        }

      ?>
        </div>
</nav>

<!-- shopping cart is empty -->
<div class="container">
   
  <div class="row mt-3">

  <div class="col-md-2">
      <p style="color:#aaa">Product Name</p>
    </div>
    
    <div class="col-md-2">
        <p style="color: #aaa">Price</p>

    </div>
  
  <div class="col-md-2">
      <p style="color: #aaa">Quantity</p>
  </div>

  <div class="col-md-2">
      <p style="color: #aaa">Total</p>
  </div>

  <div class="col-md-2">
   
  </div>

  <hr style="min-width:100%; background-color:#aaa !important; height:1px;"/>
    
  
    <div class="col-md-2">  


    </div>

<?php 

      //get customer's orders

      $total = 0;

      $sql = "SELECT * FROM `order` JOIN `product` ON order.product_id = product.product_id WHERE order.user_id = '$user_id' AND `order_status` = '0'";

      $query = mysqli_query($conn,$sql);

      while($row = mysqli_fetch_assoc($query)){

          $total += $row['product_price']* $row['order_quantity'];

         
      

 ?>


  

  </div>



  <div class="row">


    <div class="col-md-2">
        <img src="image/<?php echo $row['product_image']; ?>" width="100px" height="150px" alt="">
    </div>

    <div class="col-md-2">
        <p><?php echo $row['product_name'];  ?></p>

    </div>


    <div class="col-md-2">
       <p>$<?php echo $row['product_price']; ?></p>

    </div>



    <div class="col-md-2">
       <p>Qty:<?php echo $row['order_quantity']; ?></p>
    </div>


    <div class="col-md-2">
      <p>$<?php echo $row['product_price'] * $row['order_quantity'] ; ?></p>
    </div>


    <div class="col-md-2">
       <a href="actionProducts.php?order_id=<?php echo $row['order_id']; ?>"  style="color: #fff;background-color: #c66; border-radius: 3px;display: block; width: 80px;text-align: center;">delete</a>
    </div>

<?php } ?>

    <hr style="min-width:85%; background-color:#a1a1a1 !important; height:1px;"/>




  </div>


  <div class="row">

    <div class="col-md-4">
    
    </div>

    <div class="col-md-4">
      
    </div>

    <div class="col-md-4">
      <p style="color: #aaa"><span class="mr-5">Subtotal</span><span class="ml-5">$<?php echo $total;  ?></span></p>
       <p style="color: #aaa"><span class="mr-5">Tax(6%)</span><span class="ml-5">$<?php echo sprintf('%0.2f', $total*0.06); ?></span></p>
      <p style="color: #aaa"><span class="mr-5">Free Shipping</span><span class="ml-2">$0.00</span></p>
      <p style="color: #aaa;" class="font-weight-bold"><span class="mr-3">Grand Total</span><span class="ml-5">$<?php echo sprintf('%0.2f', $total + $total * 0.06 ); ?></span></p>
      <a href="incoming_eth.php" width="700px" style="display: block;" class="btn btn-success">Checkout</a>

    </div> 

       

  </div>




  
</div>



</body>
<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4">

    <hr>
    <!-- Social buttons -->
    <ul class="list-unstyled list-inline text-center">
      <li class="list-inline-item">
        <a class="btn-floating btn-fb mx-1">
         <i class="fab fa-facebook"></i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-tw mx-1">
          <i class="fab fa-twitter"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-gplus mx-1">
          <i class="fab fa-google-plus-g"> </i>
        </a>
      </li>
    </ul>
    <!-- Social buttons -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="https://www.oakland.edu">Oakland University</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

</body>
</html>
