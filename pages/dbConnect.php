<?php
/*define('HOST','localhost');
 define('USER','root');
 define('PASS','1234');
 define('DB','thriftyadmin');
 
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');*/
 
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "1234";
$mysql_database = "thriftyadmin";

$con = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $con) or die("Opps some thing went wrong");
 
 ?>
