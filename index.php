<?php

$conn = mysqli_connect('localhost','jwu','love.09221213','ou_ecommerce');

session_start();

$user_id = $_SESSION['user_id'];

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
  </head>
  <style>
  
    .carousel{
      margin: 0 auto;
    }

  </style>
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
   
   <div class="container mb-5">
     <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide text-center" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
                 
              <img class="d-block w-100" src="image/apple-MainBrand-iPadProAvail.jpg" width="960px" height="360px" alt="First slide">
             <div class="carousel-caption d-none d-md-block">
             <h5>The tech you want</h5>
              <p>Get the deal now</p>
            </div>
          </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="image/hp-laptops.jpg" width="720px"  height="360px" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="image/samsung-galaxy-10.jpg" width="720px"  height="360px" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
  </div>  


  <div class="container mb-5">
    <h5 class="font-weight-bold">Our featured offers</h5>
    <div class="row">
      
      <div class="col-md-4">
        <img class="img-responsive" src="https://pisces.bbystatic.com/image2/BestBuy_US/Gallery/ghp-030318-promo-audiofest_DER-66356.jpg;maxHeight=300;maxWidth=300" alt="Sound bar, speaker, subwoofer">
        <h6 class="text-danger font-weight-bold m-3 small">Audiofest</h6>
        <h5 class="font-weight-bold">Ulimate sound and savings.</h5>
        <h6 class="font-weight-normal">Great deals on speakers, sound bears and more, now through April 6.</h6>
        <a href="#">Shop Audiofest <i class="fas fa-angle-right"></i></a>

      </div>
      <div class="col-md-4">
        <img class="img-responsive" src="https://pisces.bbystatic.com/image2/BestBuy_US/Gallery/ghp-030318-promo-tvs_DER-66358.jpg;maxHeight=309;maxWidth=300" alt="TV">
         <h6 class="text-danger font-weight-bold m-3 small">TV deals</h6>
        <h5 class="font-weight-bold">4K TVs starting at $229.99.</h5>
        <a href="#">Shop these 4K TVs <i class="fas fa-angle-right"></i></a>
      </div>
      <div class="col-md-4">
        <img class="img-responsive" src="https://pisces.bbystatic.com/image2/BestBuy_US/Gallery/ghp-030318-promo-smartwatch_DER-66363.jpg;maxHeight=309;maxWidth=300" alt="Watch">
        <h6 class="text-primary font-weight-bold m-3 small">Samsung Smartwatch Pre-Order</h6>
        <h5 class="font-weight-bold">Free charging pad with Samsung Galaxy Watch Active.</h5>
        <a href="#">Pre-order Galaxy Watch Active <i class="fas fa-angle-right"></i></a>
      </div>

    </div>

  </div> 


<div class="container">
    <h5 class="font-weight-bold">You might also like </h5>
    <div class="row">
      
      <div class="col-md-2">
        <img src="https://pisces.bbystatic.com/image2/BestBuy_US/images/products/5723/5723319_sa.jpg;maxHeight=150;maxWidth=150" class="img-responsive center-block b-lazy b-error b-loaded" alt="Super Smash Bros. Ultimate - Nintendo Switch - Larger Front">
        <h6 class="text-primary font-weight-bold small mt-3">Super Smash Bros. Ultimate - Nintendo Switch</h6>
        <h5 class="font-weight-bold text-left small">$59.99</h5>
      </div>

      <div class="col-md-2">
       <img src="https://pisces.bbystatic.com/image2/BestBuy_US/images/products/5723/5723304_sa.jpg;maxHeight=150;maxWidth=150" class="img-responsive center-block b-lazy b-error b-loaded" alt="Mario Kart 8 Deluxe - Nintendo Switch - Larger Front">
        <h6 class="text-primary font-weight-bold small mt-3">Mario Kart 8 Deluxe - Nintendo Switch</h6>
        <h5 class="font-weight-bold text-left small">$59.99</h5>
      </div>

     <div class="col-md-2">
        <img src="https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6255/6255373_sa.jpg;maxHeight=150;maxWidth=150" class="img-responsive center-block b-lazy b-error b-loaded" alt="Super Mario Party - Nintendo Switch - Larger Front">
        <h6 class="text-primary font-weight-bold small mt-3">Super Mario Party - Nintendo Switch</h6>
        <h5 class="font-weight-bold text-left small">$59.99</h5>
      </div>

      <div class="col-md-2">
       <img src="https://pisces.bbystatic.com/image2/BestBuy_US/images/products/5748/5748618_sa.jpg;maxHeight=150;maxWidth=150" class="img-responsive center-block b-lazy b-error b-loaded" alt="Nintendo - Pro Wireless Controller for Nintendo Switch - Larger Front">
        <h6 class="text-primary font-weight-bold small mt-3">Nintendo - Pro Wireless Controller for Nintendo Switch</h6>
        <h5 class="font-weight-bold text-left small">$56.99</h5>
      </div>

      <div class="col-md-2">
        <img src="https://pisces.bbystatic.com/image2/BestBuy_US/images/products/5670/5670100_sa.jpg;maxHeight=150;maxWidth=150" class="img-responsive center-block b-lazy b-error b-loaded" alt="Nintendo - Switch 32GB Console - Neon Red/Neon Blue Joy-Con - Larger Front">
        <h6 class="text-primary font-weight-bold small mt-3">Nintendo - Switch 32GB Console - Neon Red/Neon Blue Joy-Con</h6>
        <h5 class="font-weight-bold text-left small ">$299.99</h5>
      </div>

      <div class="col-md-2">
        <img src="https://pisces.bbystatic.com/image2/BestBuy_US/images/products/5721/5721722_sa.jpg;maxHeight=150;maxWidth=150" class="img-responsive center-block b-lazy b-loaded" alt="Super Mario Odyssey - Nintendo Switch - Larger Front">
        <h6 class="text-primary font-weight-bold small mt-3">Super Mario Odyssey - Nintendo Switch</h6>
        <h5 class="font-weight-bold text-left small ">$59.99</h5>
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