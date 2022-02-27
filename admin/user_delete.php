<?php
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();
    $output = '';

		try{
			$stmt = $conn->prepare("DELETE FROM customer WHERE customer_id=:id");
			$stmt->execute(['id'=>$id]);

			$output = 'User deleted successfully';
		}
		catch(PDOException $e){
			$output = $e->getMessage();
		}

		$pdo->close();
    echo json_encode($output);
	}
	else{
		$output = 'Select user to delete first';
	}
?>