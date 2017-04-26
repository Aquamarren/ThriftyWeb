<?php
 	
	$userName = $_POST['name'];
	$userID = $_POST['userID'];
	$expenseID = $_POST['expenseID'];
	$categoryName = $_POST['categoryName'];
	$expenseAmount = $_POST['expenseAmount'];
	$expenseDate = $_POST['expenseDate'];
	$percentIncrease = $_POST['percentIncrease'];
	
 
	require_once('dbConnect.php');	
 	
	$result = mysqli_query($con,"SELECT *  FROM reports 
	WHERE UserID = '$userID' AND ExpenseID='$expenseID' AND ExpenseDate = CURDATE() LIMIT 1");
	$numrows = mysqli_num_rows($result);
	
	
	if($numrows < 1){
			$sql2 = "INSERT INTO reports (UserName, ExpenseID, CategoryName, ExpenseAmount,ExpenseDate,PercentIncrease, UserID) 
			VALUES('$userName', '$expenseID', '$categoryName', '$expenseAmount', '$expenseDate', '$percentIncrease', '$userID')";		
			$result2 =mysqli_query($con, $sql2);
	}
	else if($numrows > 0){
		//while($row=mysqli_fetch_assoc($result)){
			$sql1 = "UPDATE reports SET UserName='$userName', ExpenseID='$expenseID', CategoryName='$categoryName', 
			ExpenseAmount='$expenseAmount', ExpenseDate='$expenseDate', PercentIncrease='$percentIncrease' WHERE ExpenseID='$expenseID' AND UserID='$userID'";
			$result1 =mysqli_query($con, $sql1);
		//}
	}
	mysqli_close($con);
	
 
 ?>
 
 
 
