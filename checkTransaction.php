 <!DOCTYPE html>
<html>
  <head>
    <title>Oakland University Token</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <img src="img/ou.png" width="30" height="30" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Products</a>
          <a class="nav-item nav-link" href="#">Brands</a>
          <a class="nav-item nav-link" href="#">Deals</a>
        </div>
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
        <div class="col-md-12">

        <h5 class="text-left">INCOMING TRANSACTION</h5>
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

// $url = 'https://api.etherscan.io/api?module=account&action=balance&address=0xddbd2b932c763ba5b1b7ae3b362eac3e8d40121a&tag=latest&apikey=YourApiKeyToken';
//   $ch = curl_init($url);
//   curl_setopt($ch, CURLOPT_HTTPGET, true);
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//   $response_json = curl_exec($ch);
//   curl_close($ch);
//   $wei =json_decode($response_json, true);

//   $balance = $wei['result']/$wei_eth



$url = 'http://api.etherscan.io/api?module=account&action=txlist&address=0xde0b295669a9fd93d5f28d9ec85e40f4cb697bae&startblock=0&endblock=99999999&sort=desc&apikey=YourApiKeyToken';
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $json =json_decode($response_json, true);


  // var_dump($json);
  foreach ($json as $row) {


       foreach ($row as $value) {
      // $hash = $value['hash'];
      // $from = $value['from'];
      // $to = $value['to'];
        // var_dump($value['hash']);
      // var_dump($value['hash']);

  		if($value['value']/$wei > 0 ){
      // var_dump($row);
      
      // echo $hash."\n";
      // echo $from."\n";
      // echo $to."\n";
 ?>

                <td><?php echo date('m/d/Y H:i:s', $value['timeStamp']); ?></td>
                <td><img src="img/eth.png" width="32px" height="32px" alt=""></td>
                <td class="text-success">+<?php echo $value['value']/$wei; ?> ETH</td>
                <td><?php echo $value['from']; ?></td>
                <td><a target="_blank" href="https://etherscan.io/tx/<?php echo $value['hash']; ?>"><?php echo $value['hash']; ?></a></td>
               


              </tr>
              <?php  

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