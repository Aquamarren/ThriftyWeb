<?php
 
	$username = $_POST['username'];
	$password = $_POST['password'];
 
	require_once('dbConnect.php');	
	$result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
	$numrows = mysqli_num_rows($result);
	if($numrows!=0){
		while($row=mysqli_fetch_assoc($result)){
				$sql1 = "UPDATE users SET password='$password' WHERE username = '$username'";
				$result1 =mysqli_query($con, $sql1);
		}
	}
	
	mysqli_close($con);

?>