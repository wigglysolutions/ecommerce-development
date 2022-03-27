<?php

include "db/db.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ecommerce Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


</head>
<body>


  <nav class="navbar navbar-inverse main-nav">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand main-logo" href="#">We Shop</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Home</a></li>

          <li><a href="#">Products</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">About Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
         <div class="col-sm-9">
      <input type="search" class="form-control input-search" placeholder="Search Products" />
      </div>
      <div class="col-sm-3">
      <?php

      GLOBAL $pdo;

      $ip_address = $_SERVER['REMOTE_ADDR'];

      $select_count = $pdo->prepare("SELECT * FROM cart WHERE ip_address='$ip_address'");
      $qty_addition=0;
      $select_count->execute();
      while($row_count = $select_count->fetch()){
      $qty_addition += $row_count['qty'];
      }

      ?>


      <a href="cart.php"><button class="btn btn-primary cart_btn"><i class="fa fa-shopping-cart"></i> Cart (<?php echo $qty_addition ?>)</button></a>
      </div>


        </ul>
      </div>
    </div>
  </nav>




<!-- Slider Area-->


<div class="row slider_area">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="images/slider.jpg" alt="Chania">
        <div class="carousel-caption">
          <h3>Laptop</h3>
          <p>But Laptops Nows.</p>
        </div>
      </div>

      <div class="item">
       <img src="images/slider.jpg" alt="Chania">
        <div class="carousel-caption">
          <h3>Mobile</h3>
          <p>Buy Mobiles Now..</p>
        </div>
      </div>

      <div class="item">
        <img src="images/slider.jpg" alt="Chania">
        <div class="carousel-caption">
          <h3>Electronic</h3>
          <p>Buy Electronic Now..</p>
        </div>
      </div>



    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
