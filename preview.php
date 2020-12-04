<?php
	
	include 'includes/session.php';
	include 'includes/slugify.php';

	$output = array('error'=>false,'list'=>'');

	$sql = "SELECT * FROM clubs";
	$query = $conn->query($sql);

	while($row = $query->fetch_assoc()){
		$position = slugify($row['club_name']);
		$pos_id = $row['id'];
		if(isset($_POST[$position])){
				$candidate = $_POST[$position];
				$sql = "SELECT * FROM candidates WHERE id = '$candidate'";
				$csquery = $conn->query($sql);
				$csrow = $csquery->fetch_assoc();
				$output['list'] .= "
					<div class='row votelist'>
                      	<span class='col-sm-4'><span class='pull-right'><b>".$row['club_names']." :</b></span></span> 
                      	<span class='col-sm-8'>".$csrow['firstname']." ".$csrow['lastname']."</span>
                    </div>
				";
		}	
	}
	echo json_encode($output);
?>