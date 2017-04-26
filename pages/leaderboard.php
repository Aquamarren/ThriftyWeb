<?php	
session_start();
if(!isset($_SESSION['login'])){
header('location:login.php');
}
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thrifty - Admin 2</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php require_once('dbconnect1.php'); ?>	
    <div id="wrapper">

        <!-- Navigation -->
               <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Thrifty Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Tables<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="table.php">Admin</a>
                                </li>
								<li>
                                    <a href="table1.php">Users</a>
                                </li>
                                <li>
                                    <a href="table2.php">Feedback</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="leaderboard.php"><i class="fa fa-trophy fa-fw"></i> Leader Board</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">LeaderBoard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b><h3>Top Shoppaholic</b></h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Rank</th>                                            
                                            <th>Name</th>
                                            <th>Expense</th>
											<th>Percentage</th>
											<th>Date</th>
                                        </tr>
                                    </thead>
									<?php 		

									
	$result = mysqli_query($con,"SELECT COUNT(DISTINCT(PercentIncrease)) AS count
	FROM REPORTS WHERE ExpenseDate = CURDATE() AND (CategoryName = 'shoes' || CategoryName = 'jewelry')");	
	$result1 = mysqli_query($con,"SELECT DISTINCT(UserID), UserName, CategoryName, ExpenseDate,
	SUM(DISTINCT(PercentIncrease)) AS Percentage, SUM(DISTINCT(ExpenseAmount)) AS AmountExpense  FROM REPORTS 
	WHERE ExpenseDate = CURDATE() AND (CategoryName = 'shoes' || CategoryName = 'jewelry') GROUP BY UserID
	ORDER BY SUM(DISTINCT(PercentIncrease)) DESC");						
	
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
			//echo "\n";	
			$rank[$i] = $rank[$i-1];
			$x=$i-1;
			//echo $x;echo " ";
			//echo $rank[$i];echo " ";
		}
		else if($current != $previous){						
			$rank[$i]= $rank[$i-1]+1;
		}	
		$previous = $current;		
		if($rank[$i] <= 10){
			$id = $row['UserID'];
			$b = $row['UserName'];
			$c = $row['CategoryName'];
			$d = $row['AmountExpense'];
			$e = $row['ExpenseDate'];
			$current = $row['Percentage'];		
			echo "<tbody><tr>";                                        
			echo "<td>".$rank[$i]."</td>";
			echo "<td>".$b."</td>";
			echo "<td>".$d."</td>";
			echo "<td>".$current."</td>";
			echo "<td>".$e."</td>";											
			echo "</tr></tbody>";
		}
		
	}		
	
		
									?>

                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				 <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b><h3>Top Glutton</b></h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Rank</th>                                            
                                            <th>Name</th>
                                            <th>Expense</th>
											<th>Percentage</th>
											<th>Date</th>
                                        </tr>
                                    </thead>
									<?php 		
									
	$result = mysqli_query($con,"SELECT COUNT(DISTINCT(PercentIncrease)) AS count
	FROM REPORTS WHERE ExpenseDate = CURDATE() AND (CategoryName = 'food' || CategoryName = 'coffee' || CategoryName = 'grocery')");	
	$result1 = mysqli_query($con,"SELECT DISTINCT(UserID), UserName, CategoryName, ExpenseDate,
	SUM(DISTINCT(PercentIncrease)) AS Percentage, SUM(DISTINCT(ExpenseAmount)) AS AmountExpense  FROM REPORTS 
	WHERE ExpenseDate = CURDATE() AND (CategoryName = 'food' || CategoryName = 'coffee' || CategoryName = 'grocery') GROUP BY UserID
	ORDER BY SUM(DISTINCT(PercentIncrease)) DESC");						
	
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
	//while($rank[$i] <= 5)		{
		if($current == $previous) {			
			echo "\n";	
			$rank[$i] = $rank[$i-1];
			$x=$i-1;
			//echo $x;echo " ";
			//echo $rank[$i];echo " ";
		}
		else if($current != $previous ){				
			$rank[$i]= $rank[$i-1]+1;
			//echo $rank[$i];echo " ";
		}	
		$previous = $current;		
		if($rank[$i] <= 10){
			$userID = $row['UserID'];
			//$id = $row['ID'];
			$b = $row['UserName'];
			$c = $row['CategoryName'];
			$d = $row['AmountExpense'];
			$e = $row['ExpenseDate'];
			$current = $row['Percentage'];		
			echo "<tbody><tr>";                                        
			echo "<td>".$rank[$i]."</td>";
			echo "<td>".$b."</td>";
			echo "<td>".$d."</td>";
			echo "<td>".$current."</td>";
			echo "<td>".$e."</td>";											
			echo "</tr></tbody>";
		}
	//}
		
	}											
									?>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b><h3>Top Cosmoholic</b></h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Rank</th>                                            
                                            <th>Name</th>
                                            <th>Expense</th>
											<th>Percentage</th>
											<th>Date</th>
                                        </tr>
                                    </thead>
									<?php 
	$result = mysqli_query($con,"SELECT COUNT(DISTINCT(PercentIncrease)) AS count FROM REPORTS WHERE ExpenseDate = CURDATE() AND CategoryName = 'makeup'");	
	$result1 = mysqli_query($con,"SELECT DISTINCT(UserID), UserName, CategoryName, ExpenseAmount, ExpenseDate, PercentIncrease
	FROM REPORTS WHERE ExpenseDate = CURDATE() AND CategoryName = 'makeup' ORDER BY PercentIncrease DESC");						
		
	$previous ='';	
	$row = mysqli_fetch_array($result);
	$numrows = mysqli_num_rows($result1);
	$a = $row['count'];
	
	$rank=array();
	$x=0;
	$rank[0]= 0;
	for($i = 1; $i <=$numrows; $i++){
		$row = mysqli_fetch_array($result1);	
		$current = $row['PercentIncrease'];
			
		if($current == $previous) {			
			//echo "\n";	
			$rank[$i] = $rank[$i-1];
			$x=$i-1;
			//echo $x;echo " ";
			//echo $rank[$i];echo " ";
		}
		else if($current != $previous){						
			$rank[$i]= $rank[$i-1]+1;
		}	
		$previous = $current;		
		if($rank[$i] <= 10){
			$id = $row['UserID'];
			$b = $row['UserName'];
			$c = $row['CategoryName'];
			$d = $row['ExpenseAmount'];
			$e = $row['ExpenseDate'];
			$current = $row['PercentIncrease'];		
			echo "<tbody><tr>";                                        
			echo "<td>".$rank[$i]."</td>";
			echo "<td>".$b."</td>";
			echo "<td>".$d."</td>";
			echo "<td>".$current."</td>";
			echo "<td>".$e."</td>";											
			echo "</tr></tbody>";
		}
	}																			
									
									?>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				 <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b><h3>Top Dora the Explorer</b></h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Rank</th>                                            
                                            <th>Name</th>
                                            <th>Expense</th>
											<th>Percentage</th>
											<th>Date</th>
                                        </tr>
                                    </thead>
									<?php 
	$result = mysqli_query($con,"SELECT COUNT(DISTINCT(PercentIncrease)) AS count
	FROM REPORTS WHERE ExpenseDate = CURDATE() AND (CategoryName = 'commute' || CategoryName = 'flight')");	
	$result1 = mysqli_query($con,"SELECT DISTINCT(UserID), UserName, CategoryName, ExpenseDate,
	SUM(DISTINCT(PercentIncrease)) AS Percentage, SUM(DISTINCT(ExpenseAmount)) AS AmountExpense  FROM REPORTS 
	WHERE ExpenseDate = CURDATE() AND (CategoryName = 'commute' || CategoryName = 'flight') GROUP BY UserID
	ORDER BY SUM(DISTINCT(PercentIncrease)) DESC");							
	
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
	//while($rank[$i] <= 5)		{
		if($current == $previous) {			
			echo "\n";	
			$rank[$i] = $rank[$i-1];
			$x=$i-1;
			//echo $x;echo " ";
			//echo $rank[$i];echo " ";
		}
		else if($current != $previous ){				
			$rank[$i]= $rank[$i-1]+1;
			//echo $rank[$i];echo " ";
		}	
		$previous = $current;		
		if($rank[$i] <= 10){
			$id = $row['UserID'];
			$b = $row['UserName'];
			$c = $row['CategoryName'];
			$d = $row['AmountExpense'];
			$e = $row['ExpenseDate'];
			$current = $row['Percentage'];		
			echo "<tbody><tr>";                                        
			echo "<td>".$rank[$i]."</td>";
			echo "<td>".$b."</td>";
			echo "<td>".$d."</td>";
			echo "<td>".$current."</td>";
			echo "<td>".$e."</td>";											
			echo "</tr></tbody>";
		}
	//}
		
	}											
									?>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
			
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
