<?php 
 
 
	 $username = $_POST['username'];
	 $select1 = $_POST['question1'];
	 $select2 = $_POST['question2'];
	 $select3 = $_POST['question3'];
	 $select4 = $_POST['question4'];
	 $select5 = $_POST['question5'];
	 $apprate = $_POST['apprate'];
	 $feedback = $_POST['feedback'];
	 
 
	require_once('dbConnect.php');

	$sql = "INSERT INTO feedback (username, question1, question2, question3, question4, question5, apprate, feedback) VALUES('$username','$select1', '$select2', '$select3', '$select4', '$select5', '$apprate', '$feedback')";
			
	if(mysqli_query($con,$sql))
	{
		echo 'Thank you for sending your feedback!';
	}
	else
	{
		echo 'Oppps! Please try again!';
	}
	
	mysqli_close($con);
?>