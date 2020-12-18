<?php
require("auth.php");

$name = $_SESSION['name'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		<title>Covid Tracing App</title>
	</head>

	<body>
		<div id="container">
			<div id="header">
				<h1 align = "left">Covid Tracing</h1>
				<h2 align = "right"> <?php echo $name; ?></h2>
			</div>   
			
			<div id="menu">
				<ul>
					<li class="menuitem"><a href="home.php">Home</a></li>
					<li class="menuitem"><a href="new_patient.php">New Patient</a></li>
					<li class="menuitem"><a href="update_patient.php">Update Patient</a></li>
					<li class="menuitem"><a href="status.php">Status</a></li>
					<li class="menuitem"><a href="search.php">Search Record</a></li>
					<li class="menuitem"><a href="logout.php">Logout</a></li>
				</ul>
			</div>

			<div id="content">
				<div id="content_top"></div>
				<div id="content_main">
					
					<?php echo "<p> <h2>Welcome $name!</h2> </p>"?>
					
					
					
				</div>
				<div id="content_bottom"></div>
			</div>
		</div>
	</body>
</html>
