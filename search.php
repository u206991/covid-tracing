<?php
	require("auth.php");
	require("dbconfig.php");

	$username = $_SESSION['name'];

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
	
	if(isset($_POST['urn']))
	{
		$urn = $_POST['urn'];
		
		$query = "select * from patient_record where urn = '$urn'";
		
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		
		if(mysqli_num_rows($result) > 0)
		{
			$val = mysqli_fetch_assoc($result);
			$urn = $val['urn'];
			$name = $val['name'];
			$dob = $val['dob'];
			$gender = $val['gender'];
			$contact_no = $val['contact_no'];
			$house_no = $val['house_no'];
			$street = $val['street'];
			$city = $val['city'];
			$post_code = $val['post_code'];
			$travel_history = $val['travel_history'];
			$close_contact = $val['close_contact'];
			$hypertension = $val['hypertension'];
			$diabetes = $val['diabetes'];
			$hiv = $val['hiv'];
			$heart_disease = $val['heart_disease'];
			$fever = $val['fever'];
			$diarrhea = $val['diarrhea'];
			$breathing_problem = $val['breathing_problem'];
			$cough = $val['cough'];
			$quarantine = $val['quarantine_type'];
			$risk = $val['risk_type'];
			$status = $val['status'];
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
							<h2 align = "right"> <?php echo $username; ?></h2>
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
								<table >
									<tr>
										<td>URN</td>
										<td>
											<?php echo $urn;?>
										</td>
									</tr>
									<tr>
										<td>Name</td>
										<td>
											<?php echo $name;?>
										</td>
									</tr>
									<tr>
										<td> Date of Birth</td>
										<td>
											<?php echo $dob;?>
										</td>
									</tr>
									<tr>
										<td>Gender</td>
										<td>
											<?php echo $gender;?>
										</td>
									</tr>
									<tr>
										<td>Contact No.</td>
										<td>
											<?php echo $contact_no;?>
										</td>
									</tr>
									<tr>
										<td>House No.</td>
										<td>
											<?php echo $house_no;?>
										</td>
									</tr>
									<tr>
										<td>Street</td>
										<td>
											<?php echo $street;?>
										</td>
									</tr>
									<tr>
										<td>City</td>
										<td>
											<?php echo $city;?>
										</td>
									</tr>
									<tr>
										<td>Post Code</td>
										<td>
											<?php echo $post_code;?>
										</td>
									</tr>
									<tr>
										<td>Places visited in<br>the last twenty days</td>
										<td>
											<?php echo $travel_history;?>
										</td>
									</tr>
									<tr>
										<td>Close Contact Person List</td>
										<td>
											<?php echo $close_contact;?>
										</td>
									</tr>
									<tr>
										<td>Hypertension</td>
										<td>
											<?php echo $hypertension;?>
										</td>
									</tr>
									<tr>
										<td>Diabetes</td>
										<td>
											<?php echo $diabetes;?>
										</td>
									</tr>
									<tr>
										<td>HIV</td>
										<td>
											<?php echo $hiv;?>
										</td>
									</tr>
									<tr>
										<td>Heart Disease</td>
										<td>
											<?php echo $heart_disease;?>
										</td>
									</tr>
									<tr>
										<td>Fever</td>
										<td>
											<?php echo $fever;?>
										</td>
									</tr>
									<tr>
										<td>Diarrhea</td>
										<td>
											<?php echo $diarrhea;?>
										</td>
									</tr>
									<tr>
										<td>Breathing Problem</td>
										<td>
											<?php echo $breathing_problem;?>
										</td>
									</tr>
									<tr>
										<td>Cough</td>
										<td>
											<?php echo $cough;?>
										</td>
									</tr>
									<tr>
										<td>Quarantine Type</td>
										<td>
											<?php echo $quarantine;?>
										</td>
									</tr>
									<tr>
										<td>Risk Type</td>
										<td>
											<?php echo $risk;?>
										</td>
									</tr>
									<tr>
										<td>Status</td>
										<td>
											<?php echo $status;?>
										</td>
									</tr>
									
								</table>
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
			$_SESSION['msg'] = "URN not found!!!";
			header("Location:search.php");
		}
	}
	else
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
						<h2 align = "right"> <?php echo $username; ?></h2>
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
							<form method="post" name="new_patient" action="">
							<table >
								<tr>
									<td>URN</td>
									<td>
										<input type="Text" name="urn" placeholder="URN">
									</td>
								</tr>
								
								<tr>
									<td>
										<p></p>
									</td>
									<td align="right">
										<input type="submit" name="submit" placeholder="Submit">
									</td>
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
?>
