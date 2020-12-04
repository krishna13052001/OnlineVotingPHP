<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$club_name = $_POST['description'];

		$sql = "UPDATE clubs SET club_name = '$club_name' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Club updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Atleast one change should be there';
	}

	header('location: clubs.php');

?>