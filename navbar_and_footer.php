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
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Products</a>
      <a class="nav-item nav-link" href="#">Brands</a>
      <a class="nav-item nav-link" href="#">Deals</a>
      <a class="nav-item nav-link" href="#">Marketplace</a>  
      <a class="nav-item nav-link" href="#">
      	<i class="fa fa-user-circle-o fa-lg" aria-hidden="true" ></i>
      </a>  
    </div>
  </div>
</nav>

<div class="container">
<div class="row justify-content-md-center">
    
 <form action="conn.php" method="post">
     
            <header>
                <h3>Add a New Address</h3>
            </header>
            <br>
            <fieldset>
                <br>
                <legend> Please fill out the form </legend>
                <table summary="Information">
                    <tr>
                        <td>Country/Region</td>
                        <td><select title="title name">
                            <option disabled selected value>US</option> 
                            <option>Canada</option>
                            <option>Mexico</option>
                            <option>Other</option>
                            </select></td>
                        <tr>
                           
                        </tr>
                        <td><label for="PickDate">Enter today's date</label></td>
                        <td><input type="date" name="PickDate" size="20" id="date"></td>
                    <tr>
                            <td> Email Address</td>
                            <td><input type="email" name="userEmail" size="20"></td>
                        </tr>
                    
                        <tr>
                            <td>full Name</td>
                            <td><input type="text" name="firstName" size="20">
                            </td>
                            </tr>
                        
                        <tr>
                            <td>Enter your Address</td>
                            <td><input type="text" name="height" size="20"></td>
                        </tr>
                        <tr>
                            <tr>
                            <td>City</td>
                            <td><input type="text" name="height" size="20"></td>
                        </tr>
                        <tr>
                            <tr>
                            <td>State</td>
                            <td><input type="text" name="height" size="20"></td>
                        </tr>
                        <tr>
                            <tr>
                            <td>Zip Code</td>
                            <td><input type="text" name="height" size="20"></td>
                        </tr>
                    <tr>
                            <td>Phone Number</td>
                            <td><input type="text" name="height" size="20"></td>
                        </tr>
                        <tr>
                        
                        </tr>
                        
                            <tr>
                                <td>
                                    <input type="submit" name="Submit">
                                </td>
                                <td align="right">
                                    <input type="reset" name="Reset">
                                </td>
                            </tr>
                </table>
            </fieldset>
        </form>    
    
    
</div>    
    
    
</div>
    
    


<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-4 mx-auto">

          <!-- Content -->
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Footer Content</h5>
          <p>Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet, consectetur
            adipisicing elit.</p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-2 mx-auto">

          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Link 1</a>
            </li>
            <li>
              <a href="#!">Link 2</a>
            </li>
            <li>
              <a href="#!">Link 3</a>
            </li>
            <li>
              <a href="#!">Link 4</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-2 mx-auto">

          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Link 1</a>
            </li>
            <li>
              <a href="#!">Link 2</a>
            </li>
            <li>
              <a href="#!">Link 3</a>
            </li>
            <li>
              <a href="#!">Link 4</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-2 mx-auto">

          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Link 1</a>
            </li>
            <li>
              <a href="#!">Link 2</a>
            </li>
            <li>
              <a href="#!">Link 3</a>
            </li>
            <li>
              <a href="#!">Link 4</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

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