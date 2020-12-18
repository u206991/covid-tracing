<?php 
require("dbconfig.php");
session_start();
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
	$hypertension = $_POST['hypertension'];
	$diabetes = $_POST['diabetes'];
	$hiv = $_POST['hiv'];
	$heart_disease = $_POST['heart_disease'];
	$fever = $_POST['fever'];
	$diarrhea = $_POST['diarrhea'];
	$breathing_problem = $_POST['breathing_problem'];
	$cough = $_POST['cough'];
	$quarantine = $_POST['quarantine'];
	$risk = $_POST['risk'];
	
	
	if($quarantine == 'Select' || $risk == 'Select' || ($gender != 'Male' and $gender != 'Female' and $gender != 'Other') || $hypertension == 'Select' || $diabetes == 'Select' || $hiv == 'Select' || $heart_disease == 'Select' || $fever == 'Select' || $diarrhea == 'Select' || $breathing_problem == 'Select' || $cough == 'Select')
	{
		$_SESSION['msg'] = "Please provide all inputs!!!";
		header("Location:new_patient.php");
	}
	else
	{
		
		$query = "select * from patient_record";
		$result = mysqli_query($conn, $query) or die(mysqli_error($con));
		if(mysqli_num_rows($result) == 0)
		{
			$urn = "URN1";
			echo $urn;
		}
		else
		{
			$no = mysqli_num_rows($result)+1;
			$urn = "URN".$no;
			echo $urn;
		}
		$insert_query = "insert into patient_record (urn, name, dob, gender,  contact_no, house_no, street, city, post_code, travel_history, close_contact, hypertension, diabetes, hiv, heart_disease, fever, diarrhea, breathing_problem, cough, quarantine_type, risk_type) values('$urn', '$name', '$dob', '$gender', $contact_no, '$house_no', '$street', '$city', '$post_code', '$travel_history', '$close_contact', '$hypertension', '$diabetes', '$hiv', '$heart_disease', '$fever', '$diarrhea', '$breathing_problem', '$cough', '$quarantine', '$risk')";
		$insert_result = mysqli_query($conn, $insert_query) or die(mysqli_error($conn));
		if($insert_result)
		{
			$_SESSION['msg'] = "Data inserted Successfully!!!";
			header("Location:new_patient.php");
		}
		else
		{
			$_SESSION['msg'] = "Data insertion failed!!!";
			header("Location:new_patient.php");
		}
	}
?>