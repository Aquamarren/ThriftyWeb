<?php
 
 if($_SERVER['REQUEST_METHOD']=='POST')
 {
	$expense = $_POST['expense'];
 
	require_once('dbConnect.php');
	$sql = "INSERT INTO expense (expense) VALUES('$expense')";
 
 
	$result = mysqli_query($con,$sql);
	 

	 $success = mysqli_query($result);
	
	 

	if($success)
	{
		echo "success";
	}
	else
	{
		echo "failure";
 }
	
	mysqli_close($con);
	}
else
{
	echo 'error';
}