<?php
  include 'includes/session.php';
  $conn = $pdo->open();

  $output = array('list'=>'', 'count'=>0, 'total'=>0);

  if(isset($_SESSION['user'])){
    try{
      $stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN product ON product.product_id=cart.pro_id WHERE cart.user_id=:id");
      $stmt->execute(['id'=>$user['customer_id']]);
      foreach($stmt as $row){
        $output['count']++;
        $output['total'] = $row['qty'] * $row['product_price'];
        // $output['total'] = number_format($output['total'], 2);
        $productname = (strlen($row['product_name']) > 30) ? substr_replace($row['product_name'], '...', 27) : $row['product_name'];
        try{
          $img = $conn->prepare("SELECT * FROM images WHERE pro_id=:id LIMIT 1");
          $img->execute(['id'=>$row['product_id']]);
          $images = $img->fetch();

            $output['list'] .= "
            <li class='d-flex border-bottom cart-img'>
            <img src='admin/uploads/".$images['img_name']."' alt='product-img'>
            <div class='mx-3'>
              <h6>".$productname."</h6>
              <span>".$row['qty']."</span> x <span>&#8377;".number_format($row['product_price'], 2)."</span>
            </div>
            <a class='product-remove' data-id='".$row['product_id']."'><i class='ti-close'></i></a>
          </li>";
        }
        catch(PDOException $e){
          $output['message'] = $e->getMessage();
        }
      }
    }
    catch(PDOException $e){
      $output['message'] = $e->getMessage();
    }
  }
  else{
    if(!isset($_SESSION['cart'])){
      $_SESSION['cart'] = array();
    }

    if(empty($_SESSION['cart'])){
      $output['count'] = 0;
    }
    else{
      foreach($_SESSION['cart'] as $row){
        $output['count']++;
        $stmt = $conn->prepare("SELECT * FROM product WHERE product_id=:id");
        $stmt->execute(['id'=>$row['pro_id']]);
        $product = $stmt->fetch();
        $output['total'] += $row['qty'] * $product['product_price'];
        // $output['total'] = number_format($output['total'], 2);
        $productname = (strlen($product['product_name']) > 30) ? substr_replace($product['product_name'], '...', 27) : $product['product_name'];
        try{
          $img = $conn->prepare("SELECT * FROM images WHERE pro_id=:id LIMIT 1");
          $img->execute(['id'=>$product['product_id']]);
          $images = $img->fetch();

          $output['list'] .= "
            <li class='d-flex border-bottom cart-img'>
            <img src='admin/uploads/".$images['img_name']."' alt='product-img'>
            <div class='mx-3'>
              <h6>".$productname."</h6>
              <span>".$row['qty']."</span> x <span>&#8377;".number_format($product['product_price'], 2)."</span>
            </div>
            <a class='product-remove' data-id='".$product['product_id']."'><i class='ti-close'></i></a>
            </li>";
        }
        catch(PDOException $e){
          $output['message'] = $e->getMessage();
        }
      }
    }
  }
  $output['total'] = number_format($output['total'], 2);
  $pdo->close();
  echo json_encode($output);
?>