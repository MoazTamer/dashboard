<!DOCTYPE html>
<head>
<title>الاوردرات المستلمة</title>
<link rel="stylesheet" type="text/css" href="style_show.css">
</head>
<?php
    
    include('database.php');
    @$conn = mysqli_connect($host , $user , $pass , $db);
    @$r = mysqli_query($conn , "select * from orders WHERE statue = 'done' OR statue = 'تم الاستلام'");
     // $insert = "insert into orders values(2 , 'moaz' ,'014411','egypt')";
    // mysqli_query($conn , $insert);
    
?>
<body>
    <form action="" method="post">
        <h1>
        <table>
            <tr>
                <th> Id </th>
                <th> الاسم </th>
                <th> الرقم </th>
                <th> العنوان </th>
                <th> الاوردر </th>
                <th>السعر </th>
                <th> الحالة </th>
                <th> العدد </th>
            </tr>
        
            <?php 
            $t =1;
                while($row = mysqli_fetch_array($r)){
                echo("<tr>");
                echo("<td>" . $row['id'] ."</td>");
                echo("<td>" . $row['name'] ."</td>");
                echo("<td>" . $row['number'] ."</td>");
                echo("<td>" . $row['address'] ."</td>");
                echo("<td>" . $row['order'] ."</td>");
                echo("<td>" . $row['price'] ."</td>");
                echo("<td>" . $row['statue'] ."</td>");
                echo("<td>" . $t ."</td>");
                echo("</tr>");
                $t++;
            }
             ?>
             
        </table>
        </h1>
        <div class="topnav">
        <label>Password</label>
        <input type="password" name="password">
        </div>
  	<div class="topnav">
  		<!-- <button type="submit" class="btn" name="login_user">Login</button> -->
  	
        
	<?php
    @$password0 =  $_POST['password'];
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
    elseif($password0 == "حسابي"){
        include('database.php');
		@$conn = mysqli_connect($host , $user , $pass , $db);
		@$r = mysqli_query($conn , "select * from orders WHERE statue = 'done' OR statue = 'تم الاستلام'");
		$yourTotal = 0;
		while($row = mysqli_fetch_array($r)){
            $yourTotal += $row['yourPrice'];
		}
		?>
		<div class="headra">
		<h2 class="header"><?php echo("Total : " . $yourTotal);?></h2>
		</div>
<?php	
    }
?>
        <a  href="index1.php"> Home Page </a>
    </form>
    
</body>
</html>