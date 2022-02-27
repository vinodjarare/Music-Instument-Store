<?php
  include 'includes/session.php';

  $conn = $pdo->open();

  $output = array('error'=>false);

  $id = $_POST['id'];
  $qty = $_POST['qty'];

  if(isset($_SESSION['user'])){
    try{
      $stmt = $conn->prepare("UPDATE cart SET qty=:qty WHERE cart_id=:id");
      $stmt->execute(['qty'=>$qty, 'id'=>$id]);
      $output['message'] = 'Updated';
    }
    catch(PDOException $e){
      $output['message'] = $e->getMessage();
    }
  }
  else{
    foreach($_SESSION['cart'] as $key => $row){
      if($row['pro_id'] == $id){
        $_SESSION['cart'][$key]['qty'] = $qty;
        $output['message'] = 'Updated';
      }
    }
  }

  $pdo->close();
  echo json_encode($output);
?>