<?php
session_start();
include('includes/config.php');
require('includes/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lalo's Place</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  		<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
		<script type="text/javascript">
			$('#ca-container').contentcarousel();
		</script>
		
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
 <div class="container"> 
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
<div class="a">
		<div class="row">
			<div class="col-md-6"> Follow Us <a href="#" class="soc1"><em class="fa fa-facebook-square fa-lg fa-fw" style="padding:0px 10px;"></em></a> <a href="#" class="soc1"><em class="fa fa-twitter fa-lg fa-fw" style="padding:0px 10px;"></em></a> <a href="#" class="soc1"><em class="fa fa-instagram fa-lg fa-fw" style="padding:0px 10px;"></em></a></div>
			<div class="col-md-4"></div>
			
			<div class="col-md-2" style="text-align:right;">
            <?php
			include('includes/config.php');
			?>
			</div>
		</div>
	</div>	
    </div>
    <!-- Brand and toggle get grouped for better mobile display -->
    <!-- Collect the nav links, forms, and other content for toggling -->
   <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
    </div>
    <div>
    <div class="navbar-header">		  
		      <div class="navbar-brand navbar-brand-centered">
			  <img src="logo.png" width="195px" height="200px"></div>
		    </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
       	<li><a href="adminhome.php"><img class="icon"src="cupcake.png" width="30px" height="40px"> Home <span class="sr-only">(current)</span></a> </li>
	    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img class="icon"src="rollingpin.png" width="40px" height="40px">Inventory</span> <span class="caret"></span></a>
		<ul class="dropdown-menu">
          <li><a href="inventory.php">View Inventory</a></li>
          <li><a href="addpro.php">Add Product</a></li>
        </ul>
		</li>
		<li> <a href="Shop.php"><img class="icon"src="c1.png" width="40px" height="42px"> Shop</a></li> 
		</ul>		
        <ul class="nav navbar-nav navbar-right hidden-sm">
        <li class="active"><a href="vieworders.php"><img class="icon"src="c4.png" width="40px" height="42px">Orders</a> </li>
        <li><a href="viewsales.php"><img class="icon"src="c3.png" width="40px" height="42px">Sales</a> </li>
		<li><a href="viewusers.php"><img class="icon"src="c5.png" width="40px" height="42px">Manage Users</a></li>
      </ul>
      </div>
    </div>    
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>