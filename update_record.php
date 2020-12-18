<?php 
require("dbconfig.php");
session_start();
	$urn = $_SESSION['urn'];
	unset($_SESSION['urn']);
	$name = $_POST['name'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$contact_no = $_POST['contact_no'];
	$house_no = $_POST['house_no'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$post_code = $_POST['post_code'];
	$travel_history = $_POST['places_visited'];
	$close_contact = $_POST['close_contact'];
	$quarantine = $_POST['quarantine'];
	$risk = $_POST['risk'];
	$status = $_POST['status'];
	
	
	if($quarantine == 'Select' || $risk == 'Select' || ($gender != 'Male' and $gender != 'Female' and $gender != 'Other'))
	{
		$_SESSION['msg'] = "Please provide all inputs!!!";
		header("Location:update_patient.php");
	}
	else
	{
		$update_query = "UPDATE patient_record SET dob='$dob', gender='$gender', contact_no=$contact_no, house_no='$house_no', street='$street', city='$city', post_code = '$post_code', travel_history = '$travel_history', close_contact='$close_contact', quarantine_type='$quarantine', risk_type='$risk', status = '$status' where urn='$urn'";
		$update_result = mysqli_query($conn, $update_query) or die(mysqli_error($conn));
		if($update_result)
		{
			$_SESSION['msg'] = "Data updated Successfully!!!";
			header("Location:update_patient.php");
		}
		else
		{
			$_SESSION['msg'] = "Data updation failed!!!";
			header("Location:update_patient.php");
		}
	}
?>