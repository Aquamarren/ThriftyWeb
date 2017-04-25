<?php	
	$userName = $_POST['name'];
	$userID = $_POST['userID'];
	$savingsID = $_POST['SavingsID'];
	$savingsAmount = $_POST['SavingsAmount'];
	$savingsDate = $_POST['SavingsDate'];
	
 
	require_once('dbConnect.php');	
	$result = mysqli_query($con, "SELECT * FROM savings WHERE SavingsID = $savingsID AND UserID = $userID AND SavingsDate = CURDATE()");
	$numrows = mysqli_num_rows($result);
	if($numrows!=0){
		while($row=mysqli_fetch_assoc($result)){
				$sql1 = "UPDATE savings SET UserName='$userName', SavingsID='$savingsID', SavingsAmount='$savingsAmount', 
				SavingsDate='$savingsDate' WHERE SavingsID=$savingsID AND UserID = $userID";
				$result1 =mysqli_query($con, $sql1);
		}
	}
	else{
		$sql2 = "INSERT INTO savings (UserName, SavingsID, SavingsAmount, SavingsDate, UserID) 
		VALUES('$userName', '$savingsID', '$savingsAmount', '$savingsDate', '$userID')";
				$result2 =mysqli_query($con, $sql2);
	}

	
	mysqli_close($con);

?>