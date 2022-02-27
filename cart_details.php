<?php
  include 'includes/session.php';
  $conn = $pdo->open();

  $output = array('list'=>'', 'total'=>0, 'error'=>'');

  if(isset($_SESSION['user'])){
    if(isset($_SESSION['cart'])){
      foreach($_SESSION['cart'] as $row){
        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user_id AND pro_id=:pro_id");
        $stmt->execute(['user_id'=>$user['customer_id'], 'pro_id'=>$row['pro_id']]);
        $crow = $stmt->fetch();
        if($crow['numrows'] < 1){
          $stmt = $conn->prepare("INSERT INTO cart (user_id, pro_id, qty) VALUES (:user_id, :pro_id, :qty)");
          $stmt->execute(['user_id'=>$user['customer_id'], 'pro_id'=>$row['pro_id'], 'qty'=>$row['qty']]);
        }
        else{
          $stmt = $conn->prepare("UPDATE cart SET qty=:qty WHERE user_id=:user_id AND pro_id=:pro_id");
          $stmt->execute(['qty'=>$row['qty'], 'user_id'=>$user['customer_id'], 'pro_id'=>$row['pro_id']]);
        }
      }
      unset($_SESSION['cart']);
    }

    try{
      $total = 0;
      $stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN product ON product.product_id=cart.pro_id WHERE user_id=:user");
      $stmt->execute(['user'=>$user['customer_id']]);
      foreach($stmt as $row){
        $subtotal = $row['product_price'] * $row['qty'];
        $total += $subtotal;

        $img = $conn->prepare("SELECT * FROM images WHERE pro_id=:id LIMIT 1");
        $img->execute(['id'=>$row['product_id']]);
        $image = $img->fetch();
        
        $output['list'] .= "<tr>
          <td>
            <a class='product-remove'  data-id='".$row['cart_id']."'>×</a>
          </td>
          <td>
            <div class='product-info'>
              <img class='img-fluid' src='admin/uploads/".$image['img_name']."' alt='product-img'>
              <a href='product_details.php?id=".$row['product_id']."'>".$row['product_name']."</a>
            </div>
          </td>
          <td>&#8377;".number_format($row['product_price'], 2)."</td>
          <td>
            <div class='input-group bootstrap-touchspin bootstrap-touchspin-injected'>
              <span class='input-group-btn input-group-prepend'>
                <button class='btn btn-primary bootstrap-touchspin-down minus' type='button' data-id='".$row['cart_id']."'>-</button>
              </span>
                <input type='text' value='".$row['qty']."' id='qty_".$row['cart_id']."' name='cart-quantity' class='form-control' disabled>
                <input type='hidden' name='pro_id' value='".$row['product_id']."'>
              <span class='input-group-btn input-group-append'>
                <button class='btn btn-primary bootstrap-touchspin-up add' type='button' data-id='".$row['cart_id']."'>+</button>
              </span>
            </div>
          </td>
          <td>&#8377;".number_format($subtotal, 2)."</td>
        </tr>
        ";
        
      }
      $output['total'] = number_format($total, 2);
    }
    catch(PDOException $e){
      $output['error'] = $e->getMessage();
      echo $output['error'];
    }
  }
  else{
    if(count($_SESSION['cart']) != 0){
      $total =  0;
      foreach($_SESSION['cart'] as $row){
        $stmt = $conn->prepare("SELECT * FROM product WHERE product_id=:pro_id");
        $stmt->execute(['pro_id'=>$row['pro_id']]);
        $product = $stmt->fetch();
        $subtotal = $product['product_price'] * $row['qty'];
        $total += $subtotal;

        $img = $conn->prepare("SELECT * FROM images WHERE pro_id=:id LIMIT 1");
        $img->execute(['id'=>$product['product_id']]);
        $image = $img->fetch();
        
        $output['list'] .= "<tr>
          <td>
            <a class='product-remove btn btn-danger' data-id='".$row['pro_id']."'>×</a>
          </td>
          <td>
            <div class='product-info'>
              <img class='img-fluid' src='admin/uploads/".$image['img_name']."' alt='product-img'>
              <a href='product_details.php?id='".$product['product_id'].">".$product['product_name']."</a>
            </div>
          </td>
          <td>&#8377;".number_format($product['product_price'], 2)."</td>
          <td>
            <div class='input-group bootstrap-touchspin bootstrap-touchspin-injected'>
              <span class='input-group-btn input-group-prepend'>
                <button class='btn btn-primary bootstrap-touchspin-down minus' type='button' data-id='".$row['pro_id']."'>-</button>
              </span>
                <input type='text' value='".$row['qty']."' id='qty_".$row['pro_id']."' name='cart-quantity' class='form-control' disabled>
                <input type='hidden' name='pro_id' value='".$product['product_id']."'>
              <span class='input-group-btn input-group-append'>
                <button class='btn btn-primary bootstrap-touchspin-up add' type='button' data-id='".$row['pro_id']."'>+</button>
              </span>
            </div>
          </td>
          <td>&#8377;".number_format($subtotal, 2)."</td>
        </tr>
        ";
      }
      $output['total'] = number_format($total, 2);
    }
    else{
      $output['list'] = "
      <tr>
        <td colspan='6' align='center'>Shopping Cart Empty</td>
      </tr>
      ";
    }
  }

  $pdo->close();
  echo json_encode($output);
?>