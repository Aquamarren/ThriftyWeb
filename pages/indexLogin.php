<?php	
	session_start();
	include 'dbConnect.php'; 
	
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$_SESSION['login'] = true;
	
	if(isset($_POST['submit'])){
		if ($email && $password)
		{
			$query = mysql_query("select * from administrator where EmailAddress = '$email' ");
			
			$numrows = mysql_num_rows($query);
			
			if($numrows!=0)
			{
				
				while ($row = mysql_fetch_assoc($query))
				{
					$dbemail = $row['EmailAddress'];
					$dbpassword = $row['Password'];
					//$date = date("Y/m/d")  ;
					//$time = date("h:i:sa");
				}
				
				if($email == $dbemail && $password == $dbpassword)
				{
					
					$select = ("update administrator SET DateLastLoggedIn = CURDATE(), TimeLastLoggedIn = CURTIME()  where EmailAddress='$email'");
					$r =mysql_query($select,$connect);
					header('location:index.php');
					
				}
				else
				{
					die ("Incorrect password!");
				}
				
			}
			else
			{
				die ("That user doesn't exist!");
			}
			
		}
	}
	else
	{
		
		die ("Please enter email and password!");
	}

	?>