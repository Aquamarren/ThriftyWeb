<?php

	$response = array();
	require_once('dbConnect.php');	
	
		
	$result = mysqli_query($con,"SELECT COUNT(DISTINCT(SavingsAmount)) AS count FROM SAVINGS WHERE SavingsDate = CURDATE()");	
	$result1 = mysqli_query($con,"SELECT * FROM SAVINGS WHERE SavingsDate = CURDATE() ORDER BY SavingsAmount DESC");	
	
	$previous ='';	
	$row = mysqli_fetch_array($result);
	$numrows = mysqli_num_rows($result1);
	$a = $row['count'];
	
	$rank=array();
	$x=0;
	$rank[0]= 0;
	
	for($i = 1; $i <=$numrows; $i++){
		$row = mysqli_fetch_array($result1);
		$current = $row['SavingsAmount'];		
		if($current == $previous) {						
			$rank[$i] = $rank[$i-1];
			$x=$i-1;			
		}
		else if($current != $previous){						
			$rank[$i]= $rank[$i-1]+1;
		}	
		$previous = $current;		
		if($rank[$i] <= 10){
			$b = $row['ID'];
			$c =  $row['UserName']; 
			$d =  $row['SavingsID'];
			$e =  $row['SavingsDate'];
			
			array_push($response, array('ID' => $b,'UserName' => $c, 'SavingsID' => $d, 'SavingsDate' => $e,'Rank' => $rank[$i], 'SavingsAmount' => $current));	
		}
	}	
	
	echo json_encode($response);
	mysqli_close($con);	
	
	
	