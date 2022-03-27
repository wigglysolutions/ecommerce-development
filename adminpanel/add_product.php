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
    <h2>Welcome Admin, <?php echo ucfirst($_SESSION['admin_login']) ?></h3>
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
   Add Product
  </h2>
  
  <form method="POST" action="#" enctype="multipart/form-data">
  <div class="form-group">
  <input class="form-control" name="product_name" type="text" placeholder="Product Name" />
  </div>
  
  
  <div class="form-group">
  <input class="form-control" name="product_regular_price" type="text" placeholder="Product Regular Price" />
  </div>
  
  
  <div class="form-group">
  <input class="form-control" name="product_sale_price" type="text" placeholder="Product Sale Price" />
  </div>
  
  
  <div class="form-group">
  <textarea class="form-control" name="product_desc" type="text" placeholder="Product Description"></textarea>
  </div>
  
  
  <div class="form-group">
  <input type="file" class="form-control" name="product_image" />
  </div>
  
  
  <div class="form-group">
  <input type="submit" class="btn btn-info" name="submit" value="Add Product"/>
  </div>
  </form>
  
  
  
  </div>
  
  
  </div>
  
  
<?php 
  
include "../db/db.php";
GLOBAL $pdo;

if(isset($_POST['submit'])){

$product_name = $_POST['product_name'];
$product_regular_price = $_POST['product_regular_price'];
$product_sale_price = $_POST['product_sale_price'];
$product_desc = $_POST['product_desc'];
$product_image = $_FILES['product_image']['name'];

move_uploaded_file($_FILES['product_image']['tmp_name'],'../products_images/'.$product_image);

$query = $pdo->prepare("INSERT INTO products(product_name,product_regular_price,product_sale_price,product_desc,product_image) VALUES('$product_name','$product_regular_price','$product_sale_price','$product_desc','$product_image')");

$query->execute();

echo "<script>alert('Successfully Added');</script>";



}
  ?>
  
  
  </body>
</html>
