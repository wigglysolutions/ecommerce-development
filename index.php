<?php include "header.php" ?>

<!-- Products Area with categories -->
<div class="container">
<h3><center><u>Products</u></center></h3>
<ul class="nav nav-pills nav-stacked col-sm-2 col-md-2">

    <?php
    GLOBAL $pdo;
    $select = $pdo->query("SELECT * FROM categories");
    while($row=$select->fetch()){
    $cat_name = $row['cat_name'];

    ?>
  <li class=""><a href="#tab_a" data-toggle="pill"><?php echo $cat_name ?></a></li>
  <?php } ?>
</ul>
<div class="tab-content col-sm-10 col-md-10">



<?php
GLOBAL $pdo;
$select = $pdo->query("SELECT * FROM products");
while($row=$select->fetch()){
$product_id = $row['id'];
$product_name = $row['product_name'];
$product_desc = $row['product_desc'];
$product_sale_price = $row['product_sale_price'];
$product_regular_price = $row['product_regular_price'];
$product_image = $row['product_image'];


?>




   	<div class="product-card col-sm-4">
		<div class="badge">New</div>
		<div class="product-tumb">
			<img src="products_images/<?php echo $product_image ?>" alt="">
		</div>
		<div class="product-details">
			<span class="product-catagory"><?php echo $product_name ?></span>
			<h4><a href="single-product.php?id=<?php echo $product_id ?>"><?php echo $product_name ?></a></h4>

			<div class="product-bottom-details">
				<div class="product-price"><small>RS <?php echo $product_regular_price ?></small>RS <?php echo $product_sale_price ?></div>
				<div class="product-links">
					<a href=""><i class="fa fa-heart"></i></a>
					<a href="?add_to_cart=<?php echo $product_id ?>"><i class="fa fa-shopping-cart"></i></a>
				</div>
			</div>
		</div>
	</div>


	<?php } ?>








	</div><!-- tab content -->
</div>


<!-- Footer -->


  <!-- Site footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
              <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
              <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
              <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
              <li><a href="http://scanfcode.com/category/android/">Android</a></li>
              <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/about/">About Us</a></li>
              <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
              <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
              <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
              <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by
         <a href="#">Wiggly Solutions</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
</footer>



<?php

GLOBAL $pdo;

if(isset($_GET['add_to_cart'])){

$cart_id = $_GET['add_to_cart'];

$ip_address = $_SERVER['REMOTE_ADDR'];


$count = $pdo->prepare("SELECT COUNT(*) FROM cart WHERE product_id='$cart_id' AND ip_address='$ip_address'");
$count->execute();
$count_row = $count->fetchColumn();

if($count_row<1){


$query = $pdo->prepare("INSERT INTO cart(product_id,ip_address,qty) VALUES('$cart_id','$ip_address','1')");
$query->execute();

echo "<script>window.open('cart.php','_self');</script>";

}

else {

$select = $pdo->prepare("SELECT * FROM cart WHERE product_id='$cart_id' AND ip_address='$ip_address'");
$select->execute();
$qty_count = 0;
while($row=$select->fetch()){
$qty_count += $row['qty'];
}
$qty = $qty_count+1;


$query = $pdo->prepare("UPDATE `cart` SET qty='$qty' WHERE product_id='$cart_id' AND ip_address='$ip_address'");

$query->execute();

echo "<script>window.open('cart.php','_self');</script>";
}




}


?>


</html>
