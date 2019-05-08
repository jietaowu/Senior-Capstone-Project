<?php 


$conn = mysqli_connect('localhost','jwu','love.09221213','ou_ecommerce');

session_start();

$user_id = $_SESSION['user_id'];

$sql = "SELECT COUNT(`order_id`) as OrderNumber FROM `order` WHERE `user_id` = '$user_id'";

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
  </head>
 
  <script type="text/javascript">
  </script>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
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

    <div class="container">
      <div class="row justify-content-md-center text-center m-4">
        
        <form action="addItems.php" method="post" enctype="multipart/form-data">
            <div class="row mb-2">
                Select image to upload:
            </div>
        <div class="row mb-2 item">
          <input type="file" name="image" id="fileToUpload" >
        </div>
            <div class="row mb-2 item" id="content">
                Please enter the details of the goods：
            </div>
        <div class="row mb-2 item">
            <span class="goodslaber">Product Name:</span>
            <input type="text" name="product_name" placeholder="product name" id="goodname">
        </div>
        <div class="row mb-2 item">
            <span class="goodslaber">Product Brand:</span>
            <input type="text" name="product_brand" placeholder="product brand" id="goodbrand">
        </div>
        <div class="row mb-2 item">
            <span class="goodslaber">Product Price:</span>
            <input type="text" name="product_price" placeholder="$" id="goodprice">
        </div>
        <div class="row mb-2 item">
            <span class="goodslaber">Product Quantity:</span>
            <input type="number" name="product_quantity" id="goodquantity">
        </div>
        <div class="row mb-2">
            <button type="submit" class="btn btn-success btn-block">ADD</button>
        </div>
        </form>
       
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

  <script type="text/javascript">
      $(document).ready(function () {

      });
  </script>

</body>
</html>