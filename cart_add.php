<?php
  include 'includes/session.php';

  $conn = $pdo->open();

  $output = array('error'=>false);
    $id = $_POST['id'];
    $qty = $_POST['qty'];

    if(isset($_SESSION['user'])){
      if(isset($_SESSION['cart']) && count($_SESSION['cart']) != 0){
        foreach($_SESSION['cart'] as $row){
          $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user_id AND pro_id=:pro_id");
          $stmt->execute(['user_id'=>$user['customer_id'], 'pro_id'=>$row['pro_id']]);
          $row = $stmt->fetch();
          if($row['numrows'] < 1){
            try{
              $stmt = $conn->prepare("INSERT INTO cart (user_id, pro_id, qty) VALUES (:user_id, :pro_id, :qty)");
              $stmt->execute(['user_id'=>$user['customer_id'], 'pro_id'=>$row['pro_id'], 'qty'=>$row['qty']]);
            }
            catch(PDOException $e){
              $output['message'] = $e->getMessage();
            }
          }
          else{
            $output['message'] = 'Products are waiting on your cart';
          }
        }
        unset($_SESSION['cart']);
      }
      $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user_id AND pro_id=:pro_id");
      $stmt->execute(['user_id'=>$user['customer_id'], 'pro_id'=>$id]);
      $row = $stmt->fetch();
      if($row['numrows'] < 1){
        try{
          $stmt = $conn->prepare("INSERT INTO cart (user_id, pro_id, qty) VALUES (:user_id, :pro_id, :qty)");
          $stmt->execute(['user_id'=>$user['customer_id'], 'pro_id'=>$id, 'qty'=>$qty]);
          $output['msg'] = 'Item Added to Cart';
        }
        catch(PDOException $e){
          $output['error'] = true;
          $output['msg'] = $e->getMessage();
        }
      }
      else{
        $output['error'] = true;
        $output['msg'] = 'Product Already in Cart';
      }
    }
    else{
      if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
      }

      $exist = array();
      foreach($_SESSION['cart'] as $row){
        array_push($exist, $row['pro_id']);
      }

      if(in_array($id, $exist)){
        $output['error'] = true;
        $output['msg'] = 'Product Already in Cart';
      }
      else{
        $data['pro_id'] = $id;
        $data['qty'] = $qty;

        if(array_push($_SESSION['cart'], $data)){
          $output['msg'] = 'Item Added to Cart';
        }
        else{
          $output['error'] = true;
          $output['msg'] = 'Cannot Add Item to Cart';
        }
      }
    }

    $pdo->close();
    echo json_encode($output);
  
?>