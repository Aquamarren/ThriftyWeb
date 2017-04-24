<?php
 
 if($_SERVER['REQUEST_METHOD']=='POST')
 {
	
	$expenseID = $_POST['expenseID'];
	$categoryName = $_POST['categoryName'];
	$expenseAmount = $_POST['expenseAmount'];
	$expenseDate = $_POST['expenseDate'];
	
 
	require_once('dbConnect.php');
	$sql = "SELECT * FROM EXPENSE WHERE ID = " + $id;
	WHILE($row = MYSQL_FETCH_ARRAY($sql))
    {
		$id = $row['ExpenseID'];
		
		if($id == $expenseID ){
			$sql = "UPDATE EXPENSE SET CategoryName = '"+ $categoryName +"', ExpenseAmount = "+ $expenseAmount +", ExpenseDate = '"+ $expenseDate+"' WHERE ExpenseID = " + $expenseID;
			
		}else{
			$sql = "INSERT INTO EXPENSE (ExpenseID, CategoryName,ExpenseAmount,ExpenseDate) VALUES('$expenseID', '$categoryName', '$expenseAmount', '$expenseDate')";
		}
	}
 
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