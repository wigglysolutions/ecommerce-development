<?php 
session_start();
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

<center><h3>Admin Login</h3></center>

<center><img src='../images/administrator.png' width="150px;" /></center>


<form class="form-group admin_login" method="POST" action="#">
<input type="text" name="user_name" class="form-control" placeholder="User Name" />
<input type="text" name="user_password" class="form-control" placeholder="User Password" />
<input type="submit" name="submit" class="btn btn-primary"  value="Login" />

</form>



</div>

<?php  
include "../db/db.php";
GLOBAL $pdo;
if(isset($_POST['submit'])){

// getting fields

$username = $_POST['user_name'];
$password = $_POST['user_password'];


$query = $pdo->prepare("SELECT COUNT(*) FROM admin WHERE user_name='$username' AND user_password='$password'");

$query->execute();

$count = $query->fetchColumn();

if($count>=1){
// Login Success
echo "<script>
window.open('index.php','_self')
</script>";


$_SESSION['admin_login'] = $username;


}
else {
echo "<script>alert('Login Failed');</script>";
}



}



?>

  
  
  
  </body>
  
  
  
  
  
</html>
