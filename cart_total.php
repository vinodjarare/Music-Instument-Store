<?php
	include 'includes/session.php';

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN product ON product.product_id=cart.pro_id WHERE user_id=:user_id");
		$stmt->execute(['user_id'=>$user['customer_id']]);

		$total = 0;
		foreach($stmt as $row){
			$subtotal = $row['product_price'] * $row['qty'];
			$total += $subtotal;
		}

		$pdo->close();

		echo json_encode($total);
	}
?>