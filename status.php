<?php
	require("auth.php");
	require("dbconfig.php");

	$name = $_SESSION['name'];

	if(isset($_SESSION['msg']))
	{
		$msg = $_SESSION['msg'];
		unset($_SESSION['msg']);
		?>
		<script>
			alert("<?php echo $msg; ?>");
		</script>
		<?php
	}
	
	$query = "select * from patient_record";
		
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	
	
	if(mysqli_num_rows($result) > 0)
	{
		?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<link rel="stylesheet" type="text/css" href="style/style.css" />
				<title>Update Record | Covid Tracing App</title>
				<style>
					table tr td:empty 
					{
						width: 50px;
					}
					table tr td 
					{
						padding-top: 10px;
						padding-bottom: 10px;
					}
				</style>
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
							<form method="post" name="new_patient" action="update_record.php">
							<table border=".5">
								<tr>
									<td>URN</td>
									<td>Name</td>
									<td>DOB</td>
									<td>Gender</td>
									<td>Contact No.</td>
									<td>Quarantine Type</td>
									<td>Risk Type</td>
									<td>Status</td>
								</tr>
								<tr>
									<?php
									while ($val = mysqli_fetch_assoc($result))
									{
										$urn = $val['urn'];
										$name = $val['name'];
										$dob = $val['dob'];
										$gender = $val['gender'];
										$contact_no = $val['contact_no'];
										$quarantine = $val['quarantine_type'];
										$risk = $val['risk_type'];
										$status = $val['status'];
										echo "<td>$urn</td><td>$name</td><td>$dob</td><td>$gender</td><td>$contact_no</td><td>$quarantine</td><td>$risk</td><td>$status</td>";
									}
									?>
								</tr>
							</table>
							</form>
						</div>
						<div id="content_bottom"></div>
					</div>
				</div>
			</body>
		</html>
		<?php		
	}
	else
	{
		?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<link rel="stylesheet" type="text/css" href="style/style.css" />
				<title>Status | Covid Tracing App</title>
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
							<center>
								<h3> No Data Found </h3>
							</center>
						</div>
						<div id="content_bottom"></div>
					</div>
				</div>
			</body>
		</html>
		<?php
	}
?>
