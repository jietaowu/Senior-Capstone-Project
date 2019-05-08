<?php

$conn = mysqli_connect('localhost','jwu','love.09221213','ou_ecommerce');

session_start();

$user_id = $_SESSION['user_id'];

$sql = "SELECT COUNT(`order_id`) as OrderNumber FROM `order` WHERE `user_id` = '$user_id' AND `order_status` = '0'";

$query = mysqli_query($conn,$sql);

$count = mysqli_fetch_assoc($query);


$sql = "SELECT * FROM `user` WHERE `user_id` =  '$user_id'";

$query = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($query);

$eth_address = $row['eth_address'];





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
      <div class="row justify-content-md-center text-center m-4">
        <div class="col-md-12">

        <h5 class="text-left">OUTGOING TRANSACTION</h5>
        <div class="table-responsive">
          <table class="table table-hover table-light">
            <thead>
              <tr>
               <th scope="col">LAST UPDATE</th>
               <th scope="col">CURRENCY</th>
               <th scope="col">AMOUNT</th>      
                <th scope="col">FROM</th>
                 <th scope="col">TRANSACTION HASH</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                
                <?php 




$wei = 1000000000000000000;


$url = 'http://api.etherscan.io/api?module=account&action=txlist&address='.$eth_address.'&startblock=0&endblock=99999999&sort=desc&apikey=6UV5APN91CNKVMECNJ7EGWMUD4H7AVRBJ5';
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $json =json_decode($response_json, true);


  foreach ($json as $row) {


       foreach ($row as $value) {
      // $hash = $value['hash'];
      // $from = $value['from'];
      // $to = $value['to'];
        // var_dump($value['hash']);
      // var_dump($value['hash']);

         
        $account = (string)$value['from'];

        

        if( $account == $eth_address){


            

        


  		 if($value['value']/$wei > 0 ){
      


        

        
       

 ?>

                 <td><?php echo date('m/d/Y H:i:s', $value['timeStamp']); ?></td>
                <td><img src="img/eth.png" width="32px" height="32px" alt=""></td>
                <td class="text-danger">-<?php echo $value['value']/$wei; ?> ETH</td>
                <td><?php echo $value['from']; ?></td>
                <td><a target="_blank" href="https://etherscan.io/tx/<?php echo $value['hash']; ?>"><?php echo $value['hash']; ?></a></td>
               


              </tr> 
              <?php 

              
               }


              	 }

            }
    
     }

 



 ?>
             
              
              
            </tbody>
          </table>
        </div>

             <!--  <h5 class="text-center">ETH Balance</h5>
              <h5 class="text-center"><?php echo $balance;  ?></h5> -->

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