<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add New Order</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Add Order</h2>
  </div>
	 
  <form method="post" action="add.php">

  <div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>


      <div class="input-group">
  		<button type="submit" class="btn" name="addOrder">Enter</button>
  	</div>
  </form>
  <?php

@$password0 =  $_POST['password'];
if ($password0 == "admin000000"){
    header('location: add123456addddd.php');
    ?>
    
<?php
}
else{
    ?>
    <div class="headra">
		<h2 class="header">Sorry Password is wrong</h2>
		</div>
    <?php
}
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