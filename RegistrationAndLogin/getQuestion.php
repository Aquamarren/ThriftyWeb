<?php

	$response = array();
	$username = $_POST['username'];
	
	require_once('dbConnect.php');
	
	$result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
	
	WHILE($row = mysqli_fetch_array($result))
    {
		$question = $row['question']; 
		array_push($response, array('question' => $question));
	}
	echo json_encode($response);
	mysqli_close($con);
?>
	