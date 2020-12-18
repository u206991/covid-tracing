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
	
	if(isset($_POST['urn']))
	{
		$urn = $_POST['urn'];
		
		$query = "select * from patient_record where urn = '$urn'";
		
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		
		if(mysqli_num_rows($result) > 0)
		{
			$_SESSION['urn'] = $urn;
			$val = mysqli_fetch_assoc($result);
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
			$quarantine = $val['quarantine_type'];
			$risk = $val['risk_type'];
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
								<table >
									<tr>
										<td>Name</td>
										<td>
											<input type="Text" name="name" placeholder="Patient Name" value="<?php echo $name; ?>" readonly required>
										</td>
									</tr>
									<tr>
										<td> Date of Birth</td>
										<td>
											<input type="date" name="dob" value="<?php echo $dob; ?>" required>
										</td>
									</tr>
									<tr>
										<td>Gender</td>
										<?php
										if($gender=="Male")
										{
											?>
											<td>
												&nbsp;&nbsp;<input type="radio" name="gender" value="Male" checked> Male&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Female"> Female&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Other"> Other
											</td>
											<?php
										}
										else if($gender == "Female")
										{
											?>
											<td>
												&nbsp;&nbsp;<input type="radio" name="gender" value="Male"> Male&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Female" Checked> Female&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Other"> Other
											</td>
											<?php
										}
										else
										{
											?>
											<td>
												&nbsp;&nbsp;<input type="radio" name="gender" value="Male"> Male&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Female"> Female&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Other" checked> Other
											</td>
											<?php
										}
										?>											
									</tr>
									<tr>
										<td>Contact No.</td>
										<td>
											<input type="number" name="contact_no" placeholder="Contact No." value="<?php echo $contact_no; ?>" required>
										</td>
									</tr>
									<tr>
										<td>House No.</td>
										<td>
											<input type="Text" name="house_no" placeholder="House No." value="<?php echo $house_no; ?>" required>
										</td>
									</tr>
									<tr>
										<td>Street</td>
										<td>
											<input type="Text" name="street" placeholder="Street Name" value="<?php echo $street; ?>" required>
										</td>
									</tr>
									<tr>
										<td>City</td>
										<td>
											<input type="Text" name="city" placeholder="City" value="<?php echo $city; ?>" required>
										</td>
									</tr>
									<tr>
										<td>Post Code</td>
										<td>
											<input type="Text" name="post_code" placeholder="Post Code" value="<?php echo $post_code; ?>" required>
										</td>
									</tr>
									<tr>
										<td>Places visited in<br>the last twenty days</td>
										<td>
											<input type="Text" name="places_visited" placeholder="Places Visited" value="<?php echo $travel_history; ?>" required>
										</td>
									</tr>
									<tr>
										<td>Close Contact Person List</td>
										<td>
											<textarea name="close_contact" placeholder="Close contact list" rows="4" cols="22"><?php echo $close_contact; ?></textarea>
										</td>
									</tr>
									
									<tr>
										<td>Quarantine Type</td>
										<?php
										if($quarantine == "Home")
										{
											?>
											<td>&nbsp;&nbsp;&nbsp;
												<select name="quarantine" required>  
													<option value="Home">Home</option> 
													<option value="Hospital">Hospital</option>
												</select>
											</td>
											<?php
										}
										else if($quarantine == "Hospital")
										{
											?>
											<td>&nbsp;&nbsp;&nbsp;
												<select name="quarantine" required>  
													<option value="Hospital">Hospital</option>
													<option value="Home">Home</option>
												</select>
											</td>
											<?php
										}
										?>
									</tr>
									<tr>
										<td>Risk Type</td>
										<?php
										if($risk == "Low")
										{
											?>
											<td>&nbsp;&nbsp;&nbsp;
												<select name="risk" required> 
													<option value="Low">Low</option>  
													<option value="Moderate">Moderate</option> 
													<option value="High">High</option>
												</select>
											</td>
											<?php
										}
										else if($risk =="Moderate")
										{
											?>
											<td>&nbsp;&nbsp;&nbsp;
												<select name="risk">
													<option value="Moderate">Moderate</option> 
													<option value="Low">Low</option>   
													<option value="High">High</option>
												</select>
											</td>
											<?php
										}
										else if($risk =="High")
										{
											?>
											<td>&nbsp;&nbsp;&nbsp;
												<select name="risk">
													<option value="High">High</option>
													<option value="Moderate">Moderate</option> 
													<option value="Low">Low</option> 
												</select>
											</td>
											<?php
										}
										?>
									</tr>
									<tr>
										<td>Status</td>
										<td>&nbsp;&nbsp;&nbsp;
											<select name="status" required>
												<option value="Not cured">Not cured</option> 
												<option value="Cured">Cured</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>
											<p></p>
										</td>
										<td align="right">
											<input type="submit" name="submit" value="Update">
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
		else
		{
			$_SESSION['msg'] = "URN not found!!!";
			header("Location:update_patient.php");
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
