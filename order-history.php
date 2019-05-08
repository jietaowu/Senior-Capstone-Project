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


    <style type="text/css">
        p{
            margin: 0;
        }
        .content-top{
            border: 1px solid #CFCFCF;
            border-radius: 10px 10px 0 0;
            background-color: #f6f6f6;
            margin-top: 10px;
            padding: 10px;
        }
        .content-bottom{
            border: 1px solid #CFCFCF;
            border-radius: 0 0 10px 10px;
            padding: 10px;
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
</nav>

 <?php 



   $sql = "SELECT * FROM `order` JOIN `transactions` ON `transactions`.`order_id` = `order`.`order_id` JOIN `product` ON `order`.product_id = `product`.product_id WHERE `order` .`user_id` = '$user_id' AND `order` .`order_status` = '1'";
    $query = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($query)){
    
         $orderStatus ='';
        if($row['buyerRefund'] == "1"){
            $orderStatus = "The return has started";
        }else{
            $orderStatus = "Order Received";
        }

        if($row['sellerRefund'] == "1"){
            $orderStatus = "The refund has issued";
        }

     ?>
<!--content-->
<div class="container">

   

    <!--content-top-->
    <div class="row content-top">
        <div class="col-sm-6 col-md-6 col-lg-8 ">
            <p><?php echo $orderStatus; ?></p>
            <p>January 14, 2019</p>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
            <p>ORDER # <?php echo $row['order_id'];  ?></p>
            <p>Order Details<span style="margin: 0 10px">|</span><a href="">Invoice</a></p>
        </div>
    </div>
    <!--content-bottom-->
    <div class="row content-bottom">
        <div class="row">
            <div class="col-12">
                <p>Delivered Jan 15, 2019</p>
                <p>Your package was delivered. It was handed directly to a resident.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-lg-2 col-xl-2"><img src="image/<?php echo $row['product_image']; ?>" style="width:100px"></div>
            <div class="col-md-7 col-lg-7 col-lg-7 mt-5">
                <p><a href="product.php?skuid=<?php echo $row['product_id'];  ?>"><?php echo $row['product_name']; ?></a></p>
                <p>Sold by: Amazon.com Services, Inc</p>
                <p>Return window closed on Feb 14, 2019</p>
                <button class="btn btn-warning col-md-3 mt-3"><a href="product.php?skuid=<?php echo $row['product_id'];  ?>">Buy it again</a></button>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3" style="margin-top: 10px">
                <button class="btn btn-warning btn-block">
                    Get product support
                </button>
                <button class="btn btn-info btn-block">
                    <a href="return.php?oid=<?php echo $row['order_id'];  ?>&&pid=<?php echo $row['product_id']; ?>">Return or replace items</a>
                    
                </button>
                <button class="btn btn-info btn-block">
                    Share gift receipt
                </button>
                <button class="btn btn-info btn-block">
                    Write a product review
                </button>
                <button class="btn btn-info btn-block">
                    Archive order
                </button>
            </div>
        </div>
    </div>
</div>

<?php 

  // }

 } ?>



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