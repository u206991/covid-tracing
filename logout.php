<?php


	session_start();
	// Delete certain session
	unset($_SESSION['username']);
	session_destroy();
	header('Location: index.php');
?>














