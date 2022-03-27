<?php include "header.php" ?>

<!-- Products Area with categories -->
<div class="container">
<h3><center><u>Checkout</u></center></h3>

<form method="POST" action="checkout.php">

<div class="row">
<div class="form-group col-sm-6">
<input class="form-control" placeholder="First Name" name='fname' />
</div>

<div class="form-group col-sm-6">
<input class="form-control" placeholder="Last Name" name='lname' />
</div>
</div>


<div class="row">
<div class="form-group col-sm-6">
<input class="form-control" placeholder="Email Address" name='email' />
</div>

<div class="form-group col-sm-6">
<input class="form-control" placeholder="Phone Number" name='phone' />
</div>

<div class="form-group col-sm-6">
<input class="form-control" placeholder="Address" name='address' />
</div>
<div class="form-group col-sm-6">
<input class="form-control" placeholder="Postal Code" name='postal_code' />
</div>
<div class="form-group col-sm-6">
<select class="form-control" name='Country'>
<option>Pakistan</option>
<option>Bangladesh</option>
<option>USA</option>
<option>UK</option>
</select>
</div>


<div class="form-group col-sm-6">
<input class="form-control" placeholder="City" name='City' />
</div>


</div>




<?php
    GLOBAL $pdo;
    $select = $pdo->query("SELECT * FROM categories");
    while($row=$select->fetch()){
    $cat_name = $row['cat_name'];

    ?>

  <?php } ?>
</ul>
<div class="row table_checkout col-sm-6">
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
 <td width="400px">$<?php echo $product_price ?></td>
	</tr>

	<?php } } ?>
	 </table>
</div>

<hr>

<div class="form-group col-sm-12">
  <br/><br/>
<label>Payment Method </label>
<br/><br/>
<label>Cash on Delivery</label>
<input type="radio" name="paymentMethod" value="Cash on Delivery" />
<br/><br/>
<label>Pay Via PayPal</label>
<input type="radio" name="paymentMethod" value="PayPal" />

</div>




<br/>
<div class="actions pull-right">
<div class="total">

    <h3>Cart Total: $<?php echo $total ?></h3>

  <button id="submit_form" type="submit" name="submit" class='btn btn-primary'>Submit to Payment</button><br/>



  </form>



  <form id="PayPalSubmit" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" class='hide'>

  <input type="hidden" name="business" value="sb-v2jz310892697@business.example.com">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="item_name" value="Order My Shop">
  <input type="hidden" name="amount" value="<?php echo $total ?>">
  <input type="hidden" name="currency_code" value="USD">
  <input type="hidden" name="return" value="http://localhost:8080/shop/thankyou.php">

  <input type="submit" class="btn btn-default" value="Proceed Via PayPal" name="submit" border="0" >
<img alt="" border="0" width="250px" height="90px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPR4KtyGNUrzCGu5Jz_RFdmW9BT7fJC9GwS8VAD5zfbmJ9NAIv02hio-B-rZW5wCU57w&amp;usqp=CAU"></form><br/>


</div>

</div>


<div>




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




<script>

$(document).on("change","input[type='radio']",function(){

// checking input radio value


var paymentMethod = $("input[name='paymentMethod']:checked").val();

if(paymentMethod=="PayPal"){
// show paypal button
  $("#submit_form").hide();
  $("#PayPalSubmit").show();
  $("#PayPalSubmit").removeClass("hide");
}
else {
// show normal button
$("#submit_form").show();
$("#PayPalSubmit").hide();
$("#PayPalSubmit").addClass("hide");


}



});

</script>
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




// submit form

if(isset($_POST['submit'])){

GLOBAL $pdo;


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$Country = $_POST['Country'];
$City = $_POST['City'];
$address = $_POST['address'];
$postal_code = $_POST['postal_code'];
$type = $_POST['paymentMethod'];

$query = $pdo->prepare("INSERT INTO orders(f_name,l_name,email_address,phone,address,postal_code,Country,City,type) VALUES('$fname','$lname','$email','$phone','$address','$postal_code','$Country','$City','$type')");
$query->execute();
echo "<script>
alert('Order has been generated');
</script>";




}


?>


</html>
