<?php 

include 'conn.php';

session_start();

$user_id = $_SESSION['user_id'];

$sql = "SELECT COUNT(`order_id`) as OrderNumber FROM `order` WHERE `user_id` = :user_id AND `order_status` = '0'";

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare($sql);

$stmt->bindParam(':user_id',$user_id);

$stmt->execute();

$count = $stmt->fetch(PDO::FETCH_ASSOC);




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

<div class="container mt-5">

	<div class="row text-center" >
		
		<div class="col-sm-4 mb-3">
		<a href="order-history.php" style="text-decoration: none;">
		    
			<div class="border pt-2" style="border: 1 px solid #aaa">	
				<img src="img/Box.png" width="88px" height="66px" alt="">
			
				<h5 style="color: #111;font-size: 17px">Your Orders</h5>
				<h6 style="color: #555;font-size: 13px;">Track, return, or buy things again</h6>
			</div>
	   	</a>
		</div>

		<div class="col-sm-4 mb-3">
			
			<a href="security.php" style="text-decoration: none;">

			<div class="border pt-2" style="border: 1px solid #aaa">
				<img src="img/sign-in-lock.png" width="88px" height="66px" alt="">
			
				<h5 style="color: #111;font-size: 17px">Login & security</h5>
				<h6 style="color: #555;font-size: 13px;">Edit login, name, and mobile number</h6>
			</div>
			</a>
		
		</div>

		<!-- <div class="col-sm-4 mb-3">
			
			<a href="balances.php" style="text-decoration: none;" >
			<div class="border pt-2" style="border: 1 px solid #aaa">
				<img src="img/wallet.png" width="88px" height="66px" alt="">	
				<h5 style="color: #111;font-size: 17px">Balance</h5>
				<h6 style="color: #555;font-size: 13px;">View Balance</h6>
			</div>
			</a>
		
	</div>


 -->

 <div class="col-sm-4 mb-3">
        <a href="address.php" style="text-decoration: none;">
            
            <div class="border pt-2" style="border: 1 px solid #aaa">   
                <img src="img/address-map.png" width="88px" height="66px" alt="">
            
                <h5 style="color: #111;font-size: 17px">Your Address</h5>
                <h6 style="color: #555;font-size: 13px;">Edit addresses for orders and gifts</h6>
            </div>
        </a>
        </div>

	</div>


	<div class="row text-center">

		

		<div class="col-sm-4 mb-3">
			
			<a href="addEthAddress.php" style="text-decoration: none;">

			<div class="border pt-2" style="border: 1 px solid #aaa">
				<img src="img/transactions.png" width="88px" height="66px" alt="">
			
				<h5 style="color: #111;font-size: 17px">ETH Address</h5>
				<h6 style="color: #555;font-size: 13px;">Deposit and Withdrawl</h6>
			</div>
			</a>
		
		</div>

		<div class="col-sm-4 mb-3">
			
			<a href="sellersManagement.php" style="text-decoration: none;">
			<div class="border pt-2" style="border: 1 px solid #aaa">
				<img src="img/seller.jpg" width="88px" height="66px" alt="">	
				<h5 style="color: #111;font-size: 17px">Sellers</h5>
				<h6 style="color: #555;font-size: 13px;">Seller Management</h6>
			</div>
			</a>

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




