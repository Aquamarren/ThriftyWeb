<?php
 define('HOST','localhost');
 define('USER','root');
 define('PASS','');
 define('DB','thriftyadmin');
 
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
 
 
/*$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "thriftyadmin";

$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysqli_select_db($mysql_database, $con) or die("Opps some thing went wrong");*/
 
 ?>