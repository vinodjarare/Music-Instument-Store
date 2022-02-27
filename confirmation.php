<title>Account</title>
<?php 
  include 'includes/session.php';
  include 'includes/header.php';
  include 'includes/stripe.php';
?>
<?php
  if(isset($_POST['stripeToken'])){
    \Stripe\Stripe::setVerifySslCerts(false);
    $token = $_POST['stripeToken'];
    $method = 'Payment via Card';
    $date = date('Y-m-d');

    $conn = $pdo->open();
    $fullName = $_POST['full_name'];
    $addr1 = $_POST['addr1'];
    $addr2 = $_POST['addr2'];
    $pin = $_POST['pin_code'];
    $phone = $_POST['user_number'];
    $id = $user['customer_id'];
    $total = $_POST['total'];

    $data = \Stripe\Charge::create(array(
      "amount"=> $total,
      "currency"=>"inr",
      "description"=>"Payment for Instrumentals Store",
      "source"=>$token,
    ));

    try{
      $stmt = $conn->prepare("INSERT INTO addresses (user_id, token, full_name, addr1, addr2, pin, phone_no) 
      VALUES (:user_id, :token,:fullName, :addr1, :addr2, :pin, :phone)");
      $stmt->execute(['user_id'=>$id, 'token'=>$token,'fullName'=>$fullName, 'addr1'=>$addr1, 'addr2'=>$addr2, 'pin'=> $pin, 'phone'=>$phone]);

      $stmt2 = $conn->prepare("INSERT INTO payment (user_id, pay_id, amount, payment_method, sale_date) 
      VALUES (:user_id, :pay_id, :amnt, :pay_method, :sale_date)");
      $stmt2->execute(['user_id'=>$id, 'pay_id'=>$token, 'amnt'=>$total, 'pay_method'=>$method, 'sale_date'=>$date]);
      $salesid = $conn->lastInsertId();

      try{
        $stmt3 = $conn->prepare("SELECT * FROM cart LEFT JOIN product ON product.product_id=cart.pro_id WHERE user_id=:user_id");
        $stmt3->execute(['user_id'=>$id]);

        foreach($stmt3 as $row){
          $stmt4 = $conn->prepare("INSERT INTO details (sales_id, pro_id, qty) VALUES (:sales_id, :pro_id, :qty)");
          $stmt4->execute(['sales_id'=>$salesid, 'pro_id'=>$row['pro_id'], 'qty'=>$row['qty']]);
        }

        $stmt5 = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
        $stmt5->execute(['user_id'=>$id]);
      }
      catch(PDOException $e){
        echo $e->getMessage();
      }
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
    $pdo->close();

  }
  else if(isset($_GET['cod'])){
    $conn = $pdo->open();
    $fullName = $_POST['full_name'];
    $addr1 = $_POST['addr1'];
    $addr2 = $_POST['addr2'];
    $pin = $_POST['pin_code'];
    $phone = $_POST['user_number'];
    $id = $user['customer_id'];
    $total = $_POST['total'];
    $date = date('Y-m-d');

    $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = substr(str_shuffle($set), 0, 15);
    $token = 'tok_1JC'.$code;
    $method = 'Cash On Delivery';

    try{
      $stmt = $conn->prepare("INSERT INTO addresses (user_id, token, full_name, addr1, addr2, pin, phone_no) 
      VALUES (:user_id, :token, :fullName, :addr1, :addr2, :pin, :phone)");
      $stmt->execute(['user_id'=>$id, 'token'=>$token, 'fullName'=>$fullName, 'addr1'=>$addr1, 'addr2'=>$addr2, 'pin'=> $pin, 'phone'=>$phone]);

      $stmt2 = $conn->prepare("INSERT INTO payment (user_id, pay_id, amount, payment_method, sale_date) 
      VALUES (:user_id, :pay_id, :amnt, :pay_method, :sale_date)");
      $stmt2->execute(['user_id'=>$id, 'pay_id'=>$token, 'amnt'=>$total, 'pay_method'=>$method, 'sale_date'=>$date]);
      $salesid = $conn->lastInsertId();

      try{
        $stmt3 = $conn->prepare("SELECT * FROM cart LEFT JOIN product ON product.product_id=cart.pro_id WHERE user_id=:user_id");
        $stmt3->execute(['user_id'=>$id]);

        foreach($stmt3 as $row){
          $stmt4 = $conn->prepare("INSERT INTO details (sales_id, pro_id, qty) VALUES (:sales_id, :pro_id, :qty)");
          $stmt4->execute(['sales_id'=>$salesid, 'pro_id'=>$row['pro_id'], 'qty'=>$row['qty']]);
        }

        $stmt5 = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
        $stmt5->execute(['user_id'=>$id]);
      }
      catch(PDOException $e){
        echo $e->getMessage();
      }
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
    $pdo->close();
  }
?>
<style>
.navigation {
  background-color: #222;
}
.product-info img{
  width: 150px;
  height: 100px;
}
</style>
<body>
<?php include 'includes/navbar.php'; ?>

<!-- main wrapper -->
<div class="main-wrapper">
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="block text-center">
            <h3 class="text-center mb-3">Thank you! For your payment</h3>
            <p class="text-color">Your order has been placed and will be processed as soon as possible. Make sure you make note of your order number, which is <span class="text-primary"><?=$token?></span> You will be receiving an email shortly with confirmation of your order. You can now:</p>
            <a href="shop.html" class="btn btn-primary mt-3 mx-2">Go To Shopping</a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>
</div>
</body>
<?php include 'includes/scripts.php'; ?>