<?php	
session_start();
if(!isset($_SESSION['login'])){
header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once('dbConnect.php'); ?>	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thrifty - Admin</title>
	

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

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
                <a class="navbar-brand" href="index.php">Thrifty Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="panel panel-info">
							<div class="panel-heading"><center>
								<h4>Top Shoppaholic</h4></center>
							</div>
							<div class="panel-body">
							<!--<h4>Mars</h4><hr><br>
							<h4>Andy</h4><hr><br>
							<h4>Nea</h4><hr><br>-->
							<?php 	
require_once('dbConnect1.php');							
	$result = mysqli_query($con,"SELECT COUNT(DISTINCT(PercentIncrease)) AS count FROM REPORTS 
				WHERE ExpenseDate = CURDATE() AND (CategoryName = 'shoes' || CategoryName = 'jewelry')");	
	$result1 = mysqli_query($con,"SELECT *, SUM(PercentIncrease) AS Percentage, SUM(ExpenseAmount) AS AmountExpense 
	FROM REPORTS WHERE ExpenseDate = CURDATE() AND (CategoryName = 'shoes' || CategoryName = 'jewelry')  GROUP BY UserID
	ORDER BY PercentIncrease DESC");						
	
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
			$b = $row['UserName'];			
			$c = $row['AmountExpense'];
			echo "<h4>".$b." - ‎₱".$c."</h4><hr><br>";
		}
		
	}				
									?>
							</div>
							 <a href="leaderboard.php">
							<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
				</div>
			</div>
            <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
									//$connect = mysql_connect("localhost", "root", "") or die ("Could not connect!");
									//mysql_select_db("thriftyadmin") or die ("Could not find database!");
									
									$result = mysql_query("SELECT * FROM feedback");
									$rows = mysql_num_rows($result);
									?>

                                    <div class="huge"><?php echo $rows;?></div>
                                    <div>New Feedbacks!</div>
                                </div>
                            </div>
                        </div>
                        <a href="table2.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
								
								<?php
								//$connect = mysql_connect("localhost", "root", "") or die ("Could not connect!");
								//mysql_select_db("thriftyadmin") or die ("Could not find database!");
								$result = mysql_query("SELECT * FROM users");
								$rows = mysql_num_rows($result);
								?>

                                    <div class="huge"><?php echo $rows;?></div>
                                    <div>Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="table1.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
			
			<div class="row">
			<div class="col-lg-6 col-md-6">
			<div class="panel panel-info">
                        <div class="panel-heading"><center>
                            <h4>Top Glutton</h4></center>
                        </div>
                        <div class="panel-body">
						<?php 
	$result = mysqli_query($con,"SELECT COUNT(DISTINCT(PercentIncrease)) AS count FROM REPORTS WHERE ExpenseDate = CURDATE() AND CategoryName = 'food'");	
	$result1 = mysqli_query($con,"SELECT DISTINCT(UserID), ID, UserName, CategoryName, ExpenseAmount, ExpenseDate, PercentIncrease 
	FROM REPORTS WHERE ExpenseDate = CURDATE() AND CategoryName = 'food' ORDER BY PercentIncrease DESC");						
	
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
			$b = $row['UserName'];
			$d = $row['ExpenseAmount'];	
			echo "<tbody><tr>";            
			echo "<h4>".$b." - ‎₱".$d."</h4><hr><br>";	
		}
	//}
		
	}											
									?>
						</div>
						 <a href="leaderboard.php">
                        <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
						</a>
                    </div>
					</div>
					
				<div class="col-lg-6 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading"><center>
                            <h4>Top Cosmoholic</h4></center>
                        </div>
                        <div class="panel-body">
							<?php
	$result = mysqli_query($con,"SELECT COUNT(DISTINCT(PercentIncrease)) AS count FROM REPORTS WHERE ExpenseDate = CURDATE() AND CategoryName = 'makeup'");	
	$result1 = mysqli_query($con,"SELECT * FROM REPORTS WHERE ExpenseDate = CURDATE() AND CategoryName = 'makeup' ORDER BY PercentIncrease DESC");						
	
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
			$b = $row['UserName'];
			$d = $row['ExpenseAmount'];	
			echo "<tbody><tr>";            
			echo "<h4>".$b." - ‎₱".$d."</h4><hr><br>";	
		}
	}																			
									
									?>
						</div>
						 <a href="leaderboard.php">
                        <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
						</a>
                    </div>
				</div>
				
				
		<div class="col-lg-6 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading"><center>
                            <h4>Top Dora the Explorer</h4></center>
                        </div>
                        <div class="panel-body">
							<?php
	$result = mysqli_query($con,"SELECT COUNT(DISTINCT(PercentIncrease)) AS count FROM REPORTS WHERE ExpenseDate = CURDATE() AND CategoryName = 'commute'");	
	$result1 = mysqli_query($con,"SELECT * FROM REPORTS WHERE ExpenseDate = CURDATE() AND CategoryName = 'commute' ORDER BY PercentIncrease DESC");						
	
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
			$b = $row['UserName'];
			$d = $row['ExpenseAmount'];	
			echo "<tbody><tr>";            
			echo "<h4>".$b." - ‎₱".$d."</h4><hr><br>";	
		}
	}																			
									
									?>
						</div>
						 <a href="leaderboard.php">
                        <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
						</a>
                    </div>
				</div>
			</div>
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

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
