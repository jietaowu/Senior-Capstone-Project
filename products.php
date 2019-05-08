<?php

include('database_connection.php');

session_start();

$user_id = $_SESSION['user_id'];

$sql = "SELECT COUNT(`order_id`) as OrderNumber FROM `order` WHERE `user_id` = :user_id AND `order_status` = '0'";

$statement = $connect->prepare($sql);
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
    <link href="css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script>
    $(document).ready(function(){
    filter_data();
    function filter_data()
    {
    $('.filter_data').html('<div id="loading" style="" ></div>');
    var action = 'fetch_data';
    var minimum_price = $('#hidden_minimum_price').val();
    var maximum_price = $('#hidden_maximum_price').val();
    var brand = get_filter('brand');
    var ram = get_filter('ram');
    var storage = get_filter('storage');
    $.ajax({
    url:"fetch_data.php",
    method:"POST",
    data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage},
    success:function(data){
    $('.filter_data').html(data);
    }
    });
    }
    function get_filter(class_name)
    {
    var filter = [];
    $('.'+class_name+':checked').each(function(){
    filter.push($(this).val());
    });
    return filter;
    }
    $('.common_selector').click(function(){
    filter_data();
    });
    $('#price_range').slider({
    range:true,
    min:1000,
    max:65000,
    values:[1000, 65000],
    step:500,
    stop:function(event, ui)
    {
    $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
    $('#hidden_minimum_price').val(ui.values[0]);
    $('#hidden_maximum_price').val(ui.values[1]);
    filter_data();
    }
    });
    });
    </script>
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
      <!-- Page Content -->
      <div class="container">
        <div class="row">
          
          
          <div class="col-md-3">
            <div class="list-group">
              <h3>Price</h3>
              <input type="hidden" id="hidden_minimum_price" value="0" />
              <input type="hidden" id="hidden_maximum_price" value="65000" />
              <p id="price_show">1000 - 65000</p>
              <div id="price_range"></div>
            </div>
            
            <div class="list-group">
              <h3>Brand</h3>
              <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                <?php
                $query = "SELECT DISTINCT(product_brand) FROM product WHERE product_status = '1'";
                $statement = $connect->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                foreach($result as $row)
                {
                ?>
                <div class="list-group-item checkbox">
                  <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['product_brand']; ?>"  > <?php echo $row['product_brand']; ?></label>
                </div>
                <?php
                }
                ?>
              </div>
            </div>

            <div class="list-group">
              <h3>RAM</h3>
              <?php
              $query = "
              SELECT DISTINCT(product_ram) FROM product WHERE product_status = '1' ORDER BY product_ram DESC
              ";
              $statement = $connect->prepare($query);
              $statement->execute();
              $result = $statement->fetchAll();
              foreach($result as $row)
              {
              ?>
              <div class="list-group-item checkbox">
                <label><input type="checkbox" class="common_selector ram" value="<?php echo $row['product_ram']; ?>" > <?php echo $row['product_ram']; ?> GB</label>
              </div>
              <?php
              }
              ?>
            </div>
            
            <div class="list-group">
              <h3>Internal Storage</h3>
              <?php
              $query = "
              SELECT DISTINCT(product_storage) FROM product WHERE product_status = '1' ORDER BY product_storage DESC
              ";
              $statement = $connect->prepare($query);
              $statement->execute();
              $result = $statement->fetchAll();
              foreach($result as $row)
              {
              ?>
              <div class="list-group-item checkbox">
                <label><input type="checkbox" class="common_selector storage" value="<?php echo $row['product_storage']; ?>"  > <?php echo $row['product_storage']; ?> GB</label>
              </div>
              <?php
              }
              ?>
            </div>


          </div>
          <div class="col-md-9">
            <br />
            <div class="row filter_data">
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