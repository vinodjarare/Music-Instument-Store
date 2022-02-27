<?php
  include 'includes/session.php';
  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM `product` INNER JOIN images ON images.pro_id=product.product_id WHERE product.product_id=:id LIMIT 1");
    $stmt->execute(['id'=>$id]);
    $row = $stmt->fetch();

    $pdo->close();
    echo json_encode($row);
  }
?>