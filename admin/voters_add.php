<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$mail = $_POST['mail'];
		$password = $_POST['password'];
		$sem = $_POST['sem'];
		$roll = $_POST['roll'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		// $password=password_hash($password, PASSWORD_DEFAULT);
		

		$sql = "INSERT INTO voters (fname,lname,mail,password,semester,rollno,photo) VALUES ('$firstname', '$lastname', '$mail', '$password', '$sem', '$roll','$filename')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
		}
		else{
			// echo "hi";
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: voters.php');
?>