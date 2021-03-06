<?php


$conn = mysqli_connect('localhost','jwu','love.09221213','ou_ecommerce');

session_start();

$user_id = $_SESSION['user_id'];


$sql = "SELECT COUNT(`order_id`) as OrderNumber FROM `order` WHERE `user_id` = '$user_id'";

$query = mysqli_query($conn,$sql);

$count = mysqli_fetch_assoc($query);


$sql = "SELECT * FROM `shopping_address` WHERE `user_id` = '$user_id'";

$query = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($query);


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
    <style type="text/css">
    
    input[type=text] {
    width: 350px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
    input[type=submit]{
    width: 350px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
    </style>
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
      <div class="row justify-content-md-center text-center mt-2">
        
       
          <form action="addAddress.php" method="post">
            
            <input type="text" class="form-control-lg mb-2" name="firstname" placeholder="first name" size="20" value="<?php echo $row['firstName']; ?>"><br>
            <input type="text" class="form-control-lg mb-2"   name="lastname" placeholder="last name" size="20" value="<?php echo $row['lastName']; ?>"><br>
            
            <input type="text" class="form-control-lg mb-2" name="street" placeholder="street" size="20" value="<?php echo $row['street']; ?>"><br>
            
            <input type="text" class="form-control-lg mb-2" name="city" placeholder="city" size="20"
            value="<?php echo $row['city']; ?>" 
            ><br>
            
            <input type="text" class="form-control-lg mb-2" name="state" size="20" placeholder="state" value="<?php echo $row['state']; ?>"><br>
            
            <input type="text" class="form-control-lg mb-2" name="zipcode" placeholder="zip code" size="20" value="<?php echo $row['zipcode']; ?>"><br>
            <input type="text" class="form-control-lg mb-2" name="phone" placeholder="phone number" type="phone"  size="20" value="<?php echo $row['phoneNumber']; ?>"><br>
            
            <input class="btn btn-primary" type="submit" value="Save the Addresss">
            
          </form>
          
          
        
      </div>
      
    </div>
    
    
    <!-- Footer -->
    <footer class="page-footer font-small stylish-color-dark pt-4" >
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
            <i class="fab fa-twitter"></i>
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