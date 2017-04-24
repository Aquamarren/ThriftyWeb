<?php
 
	$username = $_POST['username'];
	$active = $_POST['active'];
 
	require_once('dbConnect.php');	
	$result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
	$numrows = mysqli_num_rows($result);
	if($numrows!=0){
		while($row=mysqli_fetch_assoc($result)){
				$sql1 = "UPDATE users SET active='0' WHERE username = '$username'";
				$result1 =mysqli_query($con, $sql1);
		}
	}
	
	mysqli_close($con);

?>