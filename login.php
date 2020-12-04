<?php
	session_start();
	include 'includes/connection.php';

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM voters WHERE mail = '$email'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find voter with the college email Id';
		}
		else{
			$row = $query->fetch_assoc();
			// if(password_verify($password, $row['password'])){
			if($password===$row['password']){
				$_SESSION['voter'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input Login credentials first';
	}

	header('location: index.php');

?>