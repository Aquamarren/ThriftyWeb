<?php
 
 
	 $firstname = $_POST['firstname'];
	 $lastname = $_POST['lastname'];
	 $question = $_POST['question'];
	 $answer = $_POST['answer'];
	 $username = $_POST['username'];
	 $password = $_POST['password'];
	 $password1 = $_POST['password1'];
	 $picture = $_POST['picture'];
 
	if($firstname == '' )
	{
		//echo 'Please fill all values!';
	}
	else if($lastname == '' )
	{
		//echo 'Please fill all values!';
	}
	else if($username == '' )
	{
		//echo 'Please fill all values!';
	}
	else if($question == '' )
	{
		//echo 'Please fill all values!';
	}
	else if($answer == '' )
	{
		//echo 'Please fill all values!';
	}
	else if($password == '' )
	{
		//echo 'Please fill all values!';
	}
	else if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) 
	{
		//echo 'Firstname must only contain letters!';
	}
	else if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) 
	{
		//echo 'Lastname must only contain letters!';
	}
	else if(strlen($username) <= 5)
	{
         //echo 'Passwords do not match!';
    }
	else if($password != $password1)
	{
         //echo 'Passwords do not match!';
    }
	
	else if(strlen($password) <= 5)
	{
         //echo 'Passwords do not match!';
    }
	
	else
	{
		 require_once('dbConnect.php');
		 $sql = "SELECT * FROM users WHERE username='$username'";
		 
		 $check = mysqli_fetch_array(mysqli_query($con,$sql));
		 
		 if(isset($check))
		 {
			echo 'Username already exist!';
		 }
		 else
		 { 
			$sql = "INSERT INTO users (firstname, lastname, question, answer, username,password,dp, dateSignedUp, timeSignedUp) 
			VALUES('$firstname','$lastname', '$question', '$answer', '$username', '$password','$picture', CURDATE(), CURTIME())";
			
			if(mysqli_query($con,$sql))
			{
				echo 'Successfully Registered!';
			}
			else
			{
				echo 'Oppps! Please try again!';
			}
		}
		mysqli_close($con);
	}
