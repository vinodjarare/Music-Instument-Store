<?php 
	include './includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM category WHERE category_id =:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
	elseif (isset($_POST['sid'])) {
		# code...
		$sid = $_POST['sid'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM sub_category WHERE sub_id =:sid");
		$stmt->execute(['sid'=>$sid]);
		$row = $stmt->fetch();

		$pdo->close();

		echo json_encode($row);
	}
?>