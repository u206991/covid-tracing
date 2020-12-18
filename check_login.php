<?php
require("dbconfig.php");
session_start();
    
    if (isset($_POST['username']))
	{
		
		$username = $_REQUEST['username']; 
		$password = $_REQUEST['password'];
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
		$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
		$rows = mysqli_num_rows($result);
        if($rows==1)
		{
			$val = mysqli_fetch_assoc($result);
			$_SESSION['name'] = $val['name'];
			$_SESSION['username'] = $username;
			header("Location: home.php"); // Redirect user to home.php
        }
		else
		{
			$_SESSION['msg'] = "Invalid username or Password";
			header("Location: index.php"); // Redirect user to home.php
		}
	}

?>