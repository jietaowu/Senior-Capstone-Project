 <?php

include('conn.php');

session_start();

if(!isset($_SESSION['email'])){

  header('Location: 404.php ');
  exit();

}

var_dump($_SESSION);


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Oakland University Token</title>
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
      <a class="navbar-brand" href="#">
        <img src="img/ou.png" width="30" height="30" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Products</a>
          <a class="nav-item nav-link" href="#">Brands</a>
          <a class="nav-item nav-link" href="#">Deals</a>
          
        </div>
         <div class="navbar-nav ml-auto">
        <?php

        if(isset($_SESSION['email'])){
          echo '<a class="nav-item nav-link" href="logout.php">Logout</a>';
        }else{
          echo '<a class="nav-item nav-link" href="login.php">Login</a>';
        }

        ?>
  </div>
      </div>
    </nav>

 <div class="container">

  <div class="row">
    <div class="col-12 text-center">

      <form action="confirmPhoneNumber.php" method="post">
          <p class="font-weight-bold text-center mt-3">Change my phone number</p>
          <input type="text" name="new_password" placeholder="enter your new phone number"><br/>
         <input type="submit" class="btn-primary" value="Confirm" >
     
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

  </div>
</body>