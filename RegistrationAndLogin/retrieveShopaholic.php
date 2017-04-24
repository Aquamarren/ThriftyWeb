<?php

	$response = array();
	require_once('dbConnect.php');
	
	$result = mysqli_query($con,"SELECT COUNT(DISTINCT(PercentIncrease)) AS count FROM REPORTS 
				WHERE ExpenseDate = CURDATE() AND (CategoryName = 'shoes' || CategoryName = 'jewelry')");	
	$result1 = mysqli_query($con,"SELECT *, SUM(PercentIncrease) AS Percentage, SUM(ExpenseAmount) AS AmountExpense 
	FROM REPORTS WHERE ExpenseDate = CURDATE() AND (CategoryName = 'shoes' || CategoryName = 'jewelry') ORDER BY PercentIncrease DESC");						
	
	$previous ='';	
	$row = mysqli_fetch_array($result);
	$numrows = mysqli_num_rows($result1);
	$a = $row['count'];
	
	$rank=array();
	$x=0;
	$rank[0]= 0;
	for($i = 1; $i <=$numrows; $i++){
		$row = mysqli_fetch_array($result1);	
		$current = $row['Percentage'];
			
		if($current == $previous) {						
			$rank[$i] = $rank[$i-1];
			$x=$i-1;			
		}
		else if($current != $previous){						
			$rank[$i]= $rank[$i-1]+1;
		}	
		$previous = $current;		
		if($rank[$i] <= 10){
			$id = $row['ID'];
			$b = $row['UserName'];
			$c = $row['CategoryName'];
			$d = $row['ExpenseAmount'];
			$e = $row['ExpenseDate'];
			$current = $row['Percentage'];				
			
			array_push($response, array('ID' => $id, 'UserName' => $b, 'CategoryName' => $c, 'ExpenseAmount' => $d, 'ExpenseDate' => $e,'Rank' => $rank[$i], 'PercentIncrease' => $current));
		}
	}		
	echo json_encode($response);
	mysqli_close($con);
