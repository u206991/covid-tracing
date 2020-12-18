<?php
require("auth.php");

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
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		<title>New Patient | Covid Tracing App</title>
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
					<form method="post" name="new_patient" action="new_patient_insert.php">
					<table >
						<tr>
							<td>Name</td>
							<td>
								<input type="Text" name="name" placeholder="Patient Name" required>
							</td>
						</tr>
						<tr>
							<td> Date of Birth</td>
							<td>
								<input type="date" name="dob" required>
							</td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>
								&nbsp;&nbsp;<input type="radio" name="gender" value="Male"> Male&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Female"> Female&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Other"> Other
							</td>
						</tr>
						<tr>
							<td>Contact No.</td>
							<td>
								<input type="number" name="contact_no" placeholder="Contact No." required>
							</td>
						</tr>
						<tr>
							<td>House No.</td>
							<td>
								<input type="Text" name="house_no" placeholder="House No." required>
							</td>
						</tr>
						<tr>
							<td>Street</td>
							<td>
								<input type="Text" name="street" placeholder="Street Name" required>
							</td>
						</tr>
						<tr>
							<td>City</td>
							<td>
								<input type="Text" name="city" placeholder="City" required>
							</td>
						</tr>
						<tr>
							<td>Post Code</td>
							<td>
								<input type="Text" name="post_code" placeholder="Post Code" required>
							</td>
						</tr>
						<tr>
							<td>Places visited in<br>the last twenty days</td>
							<td>
								<input type="Text" name="places_visited" placeholder="Places Visited" required>
							</td>
						</tr>
						<tr>
							<td>Close Contact Person List</td>
							<td>
								<textarea name="close_contact" placeholder="Close contact list" rows="4" cols="22"></textarea>
							</td>
						</tr>
						<tr>
							<td>Hypertension</td>
							<td>&nbsp;&nbsp;&nbsp;
								<select name="hypertension">
									<option value="Select">Select</option> 
									<option value="Yes">Yes</option>  
									<option value="No">No</option> 
								</select>
							</td>
						</tr>
						<tr>
							<td>Diabetes</td>
							<td>&nbsp;&nbsp;&nbsp;
								<select name="diabetes">
									<option value="Select">Select</option> 
									<option value="Yes">Yes</option>  
									<option value="No">No</option> 
								</select>
							</td>
						</tr>
						<tr>
							<td>HIV</td>
							<td>&nbsp;&nbsp;&nbsp;
								<select name="hiv">
									<option value="Select">Select</option> 
									<option value="Yes">Yes</option>  
									<option value="No">No</option> 
								</select>
							</td>
						</tr>
						<tr>
							<td>Heart Disease</td>
							<td>&nbsp;&nbsp;&nbsp;
								<select name="heart_disease">
									<option value="Select">Select</option> 
									<option value="Yes">Yes</option>  
									<option value="No">No</option> 
								</select>
							</td>
						</tr>
						<tr>
							<td>Fever</td>
							<td>&nbsp;&nbsp;&nbsp;
								<select name="fever">
									<option value="Select">Select</option> 
									<option value="Yes">Yes</option>  
									<option value="No">No</option> 
								</select>
							</td>
						</tr>
						<tr>
							<td>Diarrhea</td>
							<td>&nbsp;&nbsp;&nbsp;
								<select name="diarrhea">
									<option value="Select">Select</option> 
									<option value="Yes">Yes</option>  
									<option value="No">No</option> 
								</select>
							</td>
						</tr>
						<tr>
							<td>Breathing Problem</td>
							<td>&nbsp;&nbsp;&nbsp;
								<select name="breathing_problem">
									<option value="Select">Select</option> 
									<option value="Yes">Yes</option>  
									<option value="No">No</option> 
								</select>
							</td>
						</tr>
						<tr>
							<td>Cough</td>
							<td>&nbsp;&nbsp;&nbsp;
								<select name="cough">
									<option value="Select">Select</option> 
									<option value="Yes">Yes</option>  
									<option value="No">No</option> 
								</select>
							</td>
						</tr>
						<tr>
							<td>Quarantine Type</td>
							<td>&nbsp;&nbsp;&nbsp;
								<select name="quarantine" required>
									<option value="Select">Select</option>  
									<option value="Home">Home</option> 
									<option value="Hospital">Hospital</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Risk Type</td>
							<td>&nbsp;&nbsp;&nbsp;
								<select name="risk" required>
									<option value="Select">Select</option> 
									<option value="Low">Low</option>  
									<option value="Moderate">Moderate</option> 
									<option value="High">High</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<input type="reset" name="reset" placeholder="Reset">
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
