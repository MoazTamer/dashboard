<?php
// if (!isset($_SESSION['password'])) {
// 	header('location: login.php');
// }
?>
<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Order</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Add Order</h2>
  </div>
	 
  <form method="post" action="add123456addddd.php">

  	<!-- <div class="input-group">
  		<label>id</label>
  		<input type="text" name="id" >
  	</div> -->
  	<div class="input-group">
  		<label>name</label>
  		<input type="text" name="name">
  	</div>
      <div class="input-group">
  		<label>phone</label>
  		<input type="text" name="phone">
  	</div>
    <div class="input-group">
  		<label>address</label>
  		<input type="text" name="address">
  	</div>
      <div class="input-group">
  		<label>order</label>
  		<input type="text" name="order">
  	</div>
      <div class="input-group">
  		<label>price</label>
  		<input type="text" name="price">
  	</div>
      <div class="input-group">
  		<label>fact Price</label>
  		<input type="text" name="per">
  	</div>
	  <div class="input-group">
  		<label>your Price</label>
  		<input type="text" name="perto">
  	</div>
	  <div class="input-group">
  		<label>تبع مين</label>
  		<input type="text" name="getit">
  	</div>
    <div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>

  	<div class="input-group">
  		<button type="submit" class="btn" name="addOrder">Add</button>
  	</div>
    
  	<!-- <p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p> -->
  </form>
  <?php

@$password0 =  $_POST['password'];
// @$id = $_POST['id'];
@$name = $_POST['name'];
@$phone = $_POST['phone'];
@$address = $_POST['address'];
@$order = $_POST['order'];
@$price = $_POST['price'];
@$price_perto = $_POST['perto'];
@$factPrice = $_POST['per'];
@$getit = $_POST['getit'];



include('database.php');

@$conn = mysqli_connect($host , $user , $pass , $db);
@$r = mysqli_query($conn , "select *from orders ORDER BY id DESC LIMIT 1");

while($row = mysqli_fetch_array($r)){
     $id = $row['id'] +1;
}


// if ($password0 == 000000){
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  
  
  $sql = "INSERT INTO orders VALUES ($id,'$name', '$phone','$address','$order',$price,$factPrice,$price_perto,'$getit','تم الشحن')";
  // use exec() because no results are returned
  $conn->exec($sql);?>
  <h2 class="header"><?php echo "Add successfully\nتم الاضافة بنجاح"; ?></h2>
  <?php
} catch(PDOException $e) {
    ?>
    
    <h2 class="header"><?php echo ("Error\nحدث خطأ");?></h2>
    <?php
  
}
$conn = null;
// }
// else{
    ?>
	<?php
	if ($password0 == "admin"){

		include('database.php');
		@$conn = mysqli_connect($host , $user , $pass , $db);
		@$r = mysqli_query($conn , "select * from orders WHERE statue = 'done' OR statue = 'تم الاستلام'");
		$price_total = 0;
		$myTotal = 0;
		$yourTotal = 0;
		while($row = mysqli_fetch_array($r)){
			$price_total += $row['price'];
            $myTotal += $row['factPrice'];
            $yourTotal += $row['yourPrice'];
		}
		?>
		<div class="headra">
		<h2 class="header"><?php echo("Total : " . $price_total);?></h2>
		<h2 class="header"><?php echo("My Total : " . $myTotal);?></h2>
		<h2 class="header"><?php echo("Your Total : " . $yourTotal);?></h2>
		</div>
<?php	
	}
?>
<?php
// }
?>
<div class="headera">
    <a href="index1.php"> Home Page </a>
	<h2><?php ?></h2>
    <h1>
        <br>
    </h1>
</div>
	
</body>
</html>