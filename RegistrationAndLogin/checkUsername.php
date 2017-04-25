<?php
 
	$username = $_POST['username'];
 
	require_once('dbConnect.php');
	$sql = "SELECT * FROM users WHERE username='$username'";
		 
	$check = mysqli_fetch_array(mysqli_query($con,$sql));
		 
	if(isset($check))
	{
		echo 'success';
	}
	else
	{ 
		echo 'Username do not exist!';
	}
	
	
	mysqli_close($con);

?>