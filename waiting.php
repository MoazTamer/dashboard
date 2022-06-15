<!DOCTYPE html>
<head>
<title>Follow Orders</title>
<link rel="stylesheet" type="text/css" href="style_show.css">
</head>

<?php

    include('database.php');
    @$conn = mysqli_connect($host , $user , $pass , $db);
    @$r = mysqli_query($conn , "select * from orders WHERE statue = 'جاري التسليم' OR  statue = 'جاري' OR statue = 'تم الشحن'");
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
            $t = 1;
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
        <div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
          <label>enter id number to edit</label>
  		<input type="text" name="upid">
          <label>enter update text</label>
  		<input type="text" name="id">
  		<button type="submit" class="btn" name="update">Enter</button>
  	</div>
    
	<?php
    @$password0 =  $_POST['password'];
	if ($password0 == "update"){
        ?>
        
  	</div>
    <?php
        @$upid =  $_POST['upid'];
        @$up =  $_POST['id'];
		include('database.php');
		@$conn = mysqli_connect($host , $user , $pass , $db);
		// @$r = mysqli_query($conn , "select statue from orders WHERE id = up");
        @$update = "UPDATE orders SET statue = '$up' WHERE id = $upid;";
        // mysqli_query($conn , $update);

        if (mysqli_query($conn, $update)) {
            ?>
		
		<h1 class="div"><?php echo "updated successfully";($conn);?></h1>
		
<?php	
            
          } else {
            ?>
		
		<h1 class="div"><?php echo "Error updating : " ;?></h1>
		
<?php	
            
          }
        
		
	}
?>

        <a  href="index1.php"> Home Page </a>
    </form>
    
</body>
</html>