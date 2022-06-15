<?php 
  session_start(); 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

  	<?php  if (isset($_SESSION['username'])) : ?>

<p class="error success">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>

<?php endif ?>
    <?php
	 include('database.php');
	 @$conn = mysqli_connect($host , $user , $pass , $db);
	 $num = "SELECT COUNT(*) FROM orders";
	 $r = mysqli_query($conn,"select count(1) FROM orders");

	 while($row = mysqli_fetch_array($r)){
		$num1 = $row[0];
   }
	?>

<div class="headera">
	<a href="allOrders.php"> اجمالي الأوردرات </a>
	<h2><?php echo($num1);?></h2>
</div>

<?php 
$r = mysqli_query($conn,"select count(1) FROM orders WHERE statue = 'done'");

	 while($row = mysqli_fetch_array($r)){
		$num1 = $row[0];
	 }?>

<div class="headera">
	<a href="orderDone.php"> الأوردرات المستلمة </a>
	<h2><?php echo($num1);?></h2>
</div>

<?php 
$r = mysqli_query($conn,"select count(1) FROM orders WHERE statue = 'مرتجع'OR statue = 'no'");

	while($row = mysqli_fetch_array($r)){
		$num1 = $row[0];
	 }?>

<div class="headera">
	<a href="mortaga.php"> المرتجعات </a>
	<h2><?php echo($num1);?></h2>
</div>

<?php 
$r = mysqli_query($conn,"select count(1) FROM orders WHERE statue = 'جاري' OR statue = 'تم الشحن'");

	 while($row = mysqli_fetch_array($r)){
		$num1 = $row[0];
	 }?>

<div class="headera">
	<a href="waiting.php"> جاري التسليم </a>
	<h2><?php echo($num1);?></h2>
</div>

<div class="headera">
	<a href="add.php"> اضافة اوردر </a>
	
</div>

<div class="headera">
 <a href="index.php?logout='1'" style="color: red;">logout</a> 
</div>
	</body>
</html>