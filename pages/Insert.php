<?php

//$connect = mysql_connect("localhost", "root", "") or die ("Could not connect!");
//mysql_select_db("thriftyadmin") or die ("Could not find database!");

include 'dbConnect.php'; 

$query="INSERT INTO administrator (Username, FirstName, LastName, EmailAddress, Password, Active, DateLastLoggedIn, TimeLastLoggedIn)
		VALUES('$_POST[Username]','$_POST[FirstName]','$_POST[LastName]', '$_POST[EmailAddress]','$_POST[Password]', '1', CURDATE(), CURTIME())";
				
		$is_query_successful=mysql_query($query);
		if($is_query_successful)
		{
			header("Location:table.php");
		}
		else
		{
			echo "Unsuccessful. Try Again.<br/>";
		}
?>