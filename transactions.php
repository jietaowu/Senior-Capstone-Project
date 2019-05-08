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
          <div class="table-responsive">
            <table class="table table-hover table-light">
              <thead>
                <tr>
                  <th scope="col">Order Number</th>
                  <th scope="col"></th>
                  <th scope="col"></i></th>
                  <th scope="col">CURRENCY</th>
                  <th scope="col">AMOUNT</th>
                  <th scope="col">Payment Status</th>
                  <th scope="col">Order Status</th>
                  <th scope="col">Open Issue</th>
                  <th scope="col"><i class="fas fa-cog"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php
                // $sql = "SELECT * FROM `order` JOIN `product` ON `order`.`product_id` = `product`.`product_id` WHERE `product`.`seller_id` = '$user_id' AND `order_status` = '1' ";


                $sql = "SELECT * FROM `order` JOIN `transactions` ON `transactions`.`order_id` = `order`.`order_id` JOIN `product` ON `order`.product_id = `product`.product_id WHERE `transactions` .`seller_id` = '$user_id' AND `order` .`order_status` = '1'";
                $query = mysqli_query($conn,$sql);
               

                while( $row = mysqli_fetch_assoc($query)){

                    if($row['buyerRefund'] == "1"){
                      $openIssue = "1";
                    }else{
                      $openIssue = "0";
                    }

                    if($row['buyerPaid'] == "1"){
                      $paidStatus = "Yes";
                    }else{
                      $paidStatus = "No";
                    }
                
                
                ?>
                <tr>
                  
                  <td><a href="incomingTransactions.php<?php  ?>"># <?php echo $row['order_id']; ?></a></td>
                  
                  <td>
                    <img src="image/image-1.jpeg" alt="" width="95px" height="95px">
                    
                  </td>
                  <td>
                    <p>Philips Norelco OneBlade Face + Body hybrid electric trimmer and shaver, QP2630/70</p>
                  </td>
                  <td>
                    <img src="img/eth.png" width="35px" height="35px" alt="">
                  </td>
                  <td>
                    <p><?php echo $row['eth_total']; ?> ETH</p>
                  </td>
                  <td>
                    <p class="text-success">Fully Processed</p>
                    <p></p>
                  </td>
                  <td>
                    
                    <p class="text-success">Shipped</p>
                    <!-- <p><button class="btn btn-primary mb-2">Confirm Shipment</button></p> -->
                    
                    
                  </td>
                  <td>
                    <p><a href="openIssue.php?oid=<?php echo $row['order_id']; ?>"><?php echo $openIssue; ?></a></p>
                  </td>
                  <td>
                    <a target="_blank" href="https://etherscan.io/tx/<?php echo $row['tx_hash']; ?>"><i class="fas fa-eye"></i></a>
                  </td>
                </tr>

              <?php } ?>
                <!-- <tr>
                  <td><a href="">#1</a></td>
                  <td><a target="_blank" href="https://etherscan.io/tx/0x9ebd0eeb9cab736073fa9b4613ca059430af93ee87d1e261495aaa6735515323">0x9ebd0eeb9cab736073fa9b4613ca059430af93ee87d1e261495aaa6735515323</a></td>
                  <td>
                    <form action="" method="post">
                      <div class="input-group mb-3">
                        <select class="custom-select">
                          <option selected>Payment Status</option>
                          <option value="1">Paid</option>
                          <option value="2">Pending</option>
                        </select>
                        <button type="submit" class="btn btn-primary btn-sm ml-2">Confirm</button>
                      </form>
                    </div>
                  </td>
                </tr> -->
                
                
              </tbody>
            </table>
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