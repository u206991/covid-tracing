<?php

session_start();
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('Location:logout.php');
    exit;
}
if (isset($_SESSION['username'])) 
{
	$username = $_SESSION['username'];
}
else
{
	header("Location: logout.php");
}

?>