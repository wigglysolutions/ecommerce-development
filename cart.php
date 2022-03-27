<?php include "header.php" ?>

<!-- Products Area with categories -->
<div class="container">
<h3><center><u>Cart</u></center></h3>
<div>

    <?php
    GLOBAL $pdo;
    $select = $pdo->query("SELECT * FROM categories");
    while($row=$select->fetch()){
    $cat_name = $row['cat_name'];

    ?>

  <?php } ?>
</ul>
<table class="table-bordered cart_table">

      <thead>
      <tr>
      <th>Image</th>
      <th>Product</th>
      <th>Qty</th>
      <th>Price</th>
      <tr/>
      </thead>

<?php
GLOBAL $pdo;
$total=0;
$ip_address = $_SERVER['REMOTE_ADDR'];

$select = $pdo->query("SELECT * FROM cart WHERE ip_address='$ip_address'");
while($row=$select->fetch()){
$product_id = $row['product_id'];
$qty = $row['qty'];


$select_product = $pdo->query("SELECT * FROM products WHERE id='$product_id'");
while($row_product=$select_product->fetch()){
$product_image = $row_product['product_image'];
$product_price = $row_product['product_sale_price'];
$product_name = $row_product['product_name'];
$total+= $product_price;


?>

	<tr>
	<td width="400px"><br/><img width="60px" src='products_images/<?php echo $product_image ?>'/><br/><br/></td>
	<td width="400px"><?php echo $product_name ?></td>
	<td width="400px"><?php echo $qty ?></td>
 <td width="400px">Rs <?php echo $product_price ?></td>
	</tr>

	<?php } } ?>
	 </table>

<br/>
<div class="actions">
<div class="total">
    <h3 class="pull-right">Total: <?php echo $total ?></h3>
</div>

<div class="total">
<a href="checkout.php"><button class="btn btn-primary pull-left">Go to Checkout</button></a>
</div>

</div>



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
