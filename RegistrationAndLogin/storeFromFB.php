<?php
 
 
	$id = $_POST['id'];
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$picture = $_POST['picture'];	
	
	require_once('dbConnect.php');
	$query = mysqli_query($con,"SELECT * FROM users WHERE id = '$id'");
	$numrows = mysqli_num_rows($query);
	if($numrows!=0){
		while($row=mysqli_fetch_assoc($query)){
			if($picture == 'female'){
				$dp = 1;
				$sql1 = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', dp = '$dp' WHERE id = $id";
				$result =mysqli_query($con, $sql1);
			}else  if($picture == 'male'){
				$dp = 2;
				$sql1 = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', dp = '$dp' WHERE id = $id";
				$result =mysqli_query($con, $sql1);
			}else{
				$dp = 2;
				$sql1 = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', dp = '$dp' WHERE id = $id";
				$result =mysqli_query($con, $sql1);
			}
		}
	}else{
		if($picture == 'female'){
				$dp = 1;
				$sql = "INSERT INTO users (id, firstname, lastname,dp) VALUES('$id', '$firstname', '$lastname', '$dp')"; 
				$result = mysqli_query($con,$sql);
			}else  if($picture == 'male'){
				$dp = 2;
				$sql = "INSERT INTO users (id, firstname, lastname,dp) VALUES('$id', '$firstname', '$lastname', '$dp')"; 
				$result = mysqli_query($con,$sql);
			}else{
				$dp = 2;
				$sql = "INSERT INTO users (id, firstname, lastname,dp) VALUES('$id', '$firstname', '$lastname', '$dp')"; 
		$result = mysqli_query($con,$sql);
			}		
	}
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
	