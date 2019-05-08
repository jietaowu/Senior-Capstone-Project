<?php

include 'conn.php';

session_start();

$user_id = $_SESSION['user_id'];

$sql = "SELECT COUNT(`order_id`) as OrderNumber FROM `order` WHERE `user_id` = :user_id AND `order_status` = '0'";

 $statement = $conn->prepare($sql);
 $statement->bindParam(':user_id',$user_id);
 $statement->execute();
 $result = $statement->fetch(PDO::FETCH_ASSOC);
 $count = $result['OrderNumber'];

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
      <div class="row">
        <div class="col-md-8 mt-4">
          <?php


          $skuid = $_GET['skuid'];
          
          
          $sql = "SELECT * FROM `product` WHERE `product_id` = :skuid";
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare($sql);
          $result = $stmt->execute(array(":skuid"=> $skuid));
          $row = $stmt->fetch(PDO::FETCH_ASSOC);

         
          
          
          ?>
          <h5 class="font-weight-normal"><?php echo $row['product_name']; ?></h5>
          <img src="image/<?php echo $row['product_image'];   ?>" alt="">
          
        </div>
        <div class="col-md-4 mt-5">
          <form action="addCart.php?skuid=<?php echo $skuid; ?>" method="post">
          <h5 class="font-weight-bold">$<?php echo $row['product_price']; ?></h5>
          <p class="text-success">FREE Shipping: Get it by Mon, Mar 4</p>
          <button class="btn border-dark mb-1" style="border:2px solid black"  ><?php echo $row['product_storage']; ?>GB</button><br/>
          <p class="text-success">In Stock</p>
         <div class="form-group">
          <select class="form-control w-25" name="product_quantity">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <input type="submit" class="btn mt-2" style="background-color: #ffe000" value="Add to Package">
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
      <div class="footer-copyright text-center py-3">© 2019 Copyright:
        <a href="https://www.oakland.edu">Oakland University</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </body>
</html>