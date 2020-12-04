<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$club_name = $_POST['club_name'];

		$sql = "SELECT * FROM clubs ORDER BY priority DESC LIMIT 1";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$priority = $row['priority'] + 1;
		
		$sql = "INSERT INTO clubs (club_name, priority) VALUES ('$club_name', '$priority');";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Club added successfully';
		}
		else{
			// $_SESSION['error'] = $conn->error;
			$_SESSION['error'] = $club_name.$priority.'  Not working';
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: clubs.php');
?>