<title>Account</title>
<?php 
  include 'includes/session.php';
  include 'includes/header.php';
?>
<?php
  if(!isset($_SESSION['user'])){
    header('location: login.php');
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
.align-middle img {
  width: 150px;
  height: 100px;
}
.checkout-form > .nav > .nav-item > a {
  color: #000;
}

.form-field input:focus {
  outline: none;
}

.form-field.error input {
  border-color: #dc3545;
}

.form-field.success input {
  border-color: #28a747;
}
.form-field small {
  color: #dc3545;
}
</style>
<body>
<?php include 'includes/navbar.php'; ?>

<!-- main wrapper -->
<div class="main-wrapper">
  <!-- breadcrumb -->
  <nav class="bg-gray py-3">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">My Accounts</li>
    </ol>
  </div>
  </nav>
  <!-- /breadcrumb -->
  <!-- billing -->
  <div class="section">
  <div class="checkout shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
        <form class="checkout-form" id="checkout-form" method="POST">
          <div class="block billing-details">
            <h4 class="widget-title">Shipping Details</h4>
            
              <div class="form-group form-field">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="" required>
                <small></small>
              </div>
              <div class="form-group form-field">
                <label for="user_addr1">Address Line 1</label>
                <input type="text" class="form-control" id="user_addr1" name="addr1" placeholder="" required>
                <small></small>
              </div>
              <div class="form-group form-field">
                <label for="user_addr2">Address Line 2</label>
                <input type="text" class="form-control" id="user_addr2" name="addr2" placeholder="">
              </div>
              <div class="checkout-country-code clearfix">
                <div class="form-group form-field">
                  <label for="pin_code">PIN Code</label>
                  <input type="text" class="form-control" id="pin_code" name="pin_code" value="" required>
                  <small></small>
                </div>
                <div class="form-group form-field">
                  <label for="user_number">Phone Number</label>
                  <input type="text" class="form-control" id="user_number" name="user_number" value="" required>
                  <small></small>
                </div>
              </div>
          </div>
          <div class="block">
            <h4 class="widget-title">Payment Method</h4>
            <div class="mb-4">
                <input id="checkbox1" type="radio" name="payCheckbox" value="1" required>
                <label for="checkbox1" class="h4">UPI Payment</label>
            </div>
            <div class="mb-4">
                <input id="checkbox2" type="radio" name="payCheckbox" value="2" required>
                <label for="checkbox2" class="h4">Pay with Card</label>
                <small class="mb-2 d-block ml-3">We accept following cards</small>
                <div class="form-group ml-3 row">
                    <div class="col-12">
                        <ul class="list-inline mb-3">
                            <li class="list-inline-item"><img src="images/payment-card/card-1.jpg" alt="card"></li>
                            <li class="list-inline-item"><img src="images/payment-card/card-2.jpg" alt="card"></li>
                            <li class="list-inline-item"><img src="images/payment-card/card-3.jpg" alt="card"></li>
                            <li class="list-inline-item"><img src="images/payment-card/card-4.jpg" alt="card"></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <input id="checkbox3" type="radio" name="payCheckbox" value="3" required>
                <label for="checkbox3" class="h4">Cash On Delivery</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3 checkout-btn" id="checkout-btn">Place Order</button>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="product-checkout-details">
            <div class="block">
              <h4 class="widget-title">Order Summary</h4>
              <?php
                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN product ON product.product_id=cart.pro_id WHERE user_id=:user");
                  $stmt->execute(['user'=>$user['customer_id']]);
                }
                catch(PDOException $e){
                  echo $e->getMessage();
                }
              ?>
              <?php foreach($stmt as $row): ?>
              <?php 
                $img = $conn->prepare("SELECT * FROM images WHERE pro_id=:id LIMIT 1");
                $img->execute(['id'=>$row['product_id']]);
                $image = $img->fetch();
              ?>
              <div class="media product-card">
                <a class="pull-left" href="product_details.php?id=<?=$row['product_id']?>">
                  <img class="media-object" src="admin/uploads/<?=$image['img_name']?>" alt="Image">
                </a>
                <div class="media-body">
                  <h4 class="media-heading"><a class="text-color" href="product_details.php?id=<?=$row['product_id']?>"><?=$row['product_name']?></a></h4>
                  <p class="price"><?=$row['qty']?> x &#8377;<?=number_format($row['product_price'], 2)?></p>
                </div>
              </div>
              <?php endforeach; ?>
              <ul class="summary-prices">
                <li>
                  <span>Subtotal:</span>
                  <span class="price" id="sub-total"></span>
                </li>
                <li>
                  <span>Shipping:</span>
                  <span>Free</span>
                </li>
              </ul>
              <div class="summary-total">
                <span>Total</span>
                <span id="grand-total"></span>
              </div>
              <div class="verified-icon">
                <img src="images/verified.png">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- /billing -->
  
<?php include 'includes/footer.php'; ?>
</div>
</body>
<?php include 'includes/scripts.php'; ?>
<script src="js/checkout.js"></script>