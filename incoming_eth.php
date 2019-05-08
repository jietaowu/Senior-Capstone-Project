<?php

//get eth price
$url = 'https://api.coinmarketcap.com/v1/ticker/ethereum/?convert=USD';
$data = file_get_contents($url);
$priceInfo = json_decode($data);
$ethusd = $priceInfo[0]->price_usd;

$conn = mysqli_connect('localhost','jwu','love.09221213','ou_ecommerce');

session_start();

$user_id = $_SESSION['user_id'];


//join user's orders
$sql = "SELECT * FROM `order` JOIN `user` ON `order`.`user_id` = `user`.`user_id` WHERE `order`.`order_status` = '0'";

$query = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($query);

$product_id = $row['product_id'];




 $sql = "SELECT * FROM `user` join `product` ON `user`.`user_id` = `product`.`seller_id` WHERE `product`.`product_id` = '$product_id' ";

 $query = mysqli_query($conn,$sql);

 $row = mysqli_fetch_assoc($query);
 $seller_id = $row['seller_id'];
 $eth_address = $row['eth_address'];

 //get order count
 $sql = "SELECT COUNT(`order_id`) as OrderNumber FROM `order` WHERE `user_id` = '$user_id' AND `order_status` = '0'";
 $query = mysqli_query($conn,$sql);
 $count = mysqli_fetch_assoc($query);

 $order_number = $count['OrderNumber']; //order id



$sql = "SELECT * FROM `order` JOIN `user` ON `order`.`user_id` = `user`.`user_id` JOIN `product` ON `product`.`product_id` = `order`.`product_id` WHERE `user`.`user_id` =  '$user_id'";

$total = 0;

$query = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($query)) {
    
      $total += $row['product_price']* $row['order_quantity']; //total price

 }
  
$total_order = round($total * 1.06,2);



$eth = round($total_order/$ethusd,5); //eth total


$sql = "UPDATE `order` SET `order_total`= '$total_order',`eth_total`= '$eth' WHERE `user_id` = '$user_id'";

 $query = mysqli_query($conn,$sql);



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
        
      </div>
    </nav>
    <div class="container">
      <div class="card mt-3" >
        <div class="row m-4">
          
          
          <div class="col mt-2">
            <form action="confirmation.php" method="post">
              <p>Scan QR code or copy/paste payment address into wallet.</p>
              <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?php echo $eth_address; ?>" width="200px" height="200px">
              <p class="font-weight-bold ">ETH Deposit Address</p>
              <p class="col-xl-6 font-weight-bold text-center"  style="border: 1px solid #e6e6e6"><?php echo $eth_address; ?></p>
              <p class="font-weight-normal">Order Total: $ <?php echo round($total_order,2);  ?></p>
              <p class="text-success"><?php echo $eth; ?> ETH</p>
              <p class="font-weight-bold">Transaction Hash</p>
              <input type="text" class="col-xl-6  form-control mb-2" name="transaction_hash" placeholder="enter your transaction hash">
              <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">I've paid</label>
              </div>
              <button class="btn btn-primary">Complete</button>
            </form>
          </div>
          
        </div>
      </div>
    </div>
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