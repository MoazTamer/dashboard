<!DOCTYPE html>
<head>
<title>المرتجعات</title>
<link rel="stylesheet" type="text/css" href="style_show.css">
</head>

<?php

    include('database.php');
    @$conn = mysqli_connect($host , $user , $pass , $db);
    @$r = mysqli_query($conn , "select * from orders WHERE statue = 'مرتجع' OR statue = 'no'");
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
        <a  href="index1.php"> Home Page </a>
    </form>
    
</body>
</html>