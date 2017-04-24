<?php
 //if($_SERVER['REQUEST_METHOD']=='POST'){	
	$username = $_POST['username'];
 
	require_once('dbConnect.php');	
	$response = array();
	$result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
	$numrows = mysqli_num_rows($result);
	if($numrows!=0){
		for($i = 1; $i <=$numrows; $i++){
		$row = mysqli_fetch_array($result);			
		//while($row=mysqli_fetch_assoc($result)){
				//$sql1 = "UPDATE users SET active='1' WHERE username = '$username'";			
				//$result1 =mysqli_query($con, $sql1);
				 $a = $row['id'];
				 $b = $row['firstname'];
				 $c = $row['lastname'];
				 $d = $row['username'];
				 $e = $row['dp'];				
				 array_push($response, array('Id' => $a, 'firstname' => $b, 'Lastname' => $c, 'userName' => $d, 'Picture' => $e));	
		}
	}	
	
	echo json_encode($response);
	mysqli_close($con);
 //}
?>
