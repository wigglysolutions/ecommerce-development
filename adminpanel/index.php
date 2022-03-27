<?php

session_start();
if($_SESSION['admin_login']){
// ok
}else {
header('Location:login.php');
}
?>

<html>
  <head>
    <title></title>
    <meta content="">
    <style></style>
    
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  
  </head>
  <body>
  
    <div class="container">
    <div class="col-sm-3">
    <ul class="sidenav_admin">
    <li><a href='add_product.php'>Add Products</a></li>
    <li><a href="add_category.php">Add Categories</a></li>
    <li><a href="manage_products.php">Manage Products</a></li>
    <li><a href="manage_category.php">Manage Categories</a></li>
    <li><a href="logout.php">Logout</a></li>

    </ul>
    </div>
  <div class="col-sm-9">
  <h2>
  Welcome Admin,
  <?php echo ucfirst($_SESSION['admin_login']); ?>
  </h2>
  </div>
  
  
  </div>
  
  </body>
</html>
