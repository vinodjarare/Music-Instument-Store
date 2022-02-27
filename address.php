<title>Checkout</title>
<?php 
  include 'includes/session.php';
  include 'includes/header.php';
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
</style>
<body>
<?php include 'includes/navbar.php'; ?>

<!-- main wrapper -->
<div class="main-wrapper">
  <!-- breadcrumb -->
  <nav class="bg-gray py-3">
  <div class="container">
    <div class="content">
      <h2>Checkout</h2>
    </div>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Cart</li>
    </ol>
  </div>
  </nav>
  <!-- /breadcrumb -->
  <section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
              <div class="inner-wrapper border-box">
                <!-- navbar -->
                
                <div class="justify-content-between nav mb-5">
                  <li class="text-center d-inline-block active nav-item" id="shipping-nav">
                    <i class="ti-truck d-block mb-2"></i>
                    <span class="d-block h4">Shipping Method</span>
                  </li>
                  <li class="text-center d-inline-block nav-item" id="info-nav">
                    <i class="ti-wallet d-block mb-2"></i>
                     <span class="d-block h4">Payment Method</span>
                  </li>
                  <li class="text-center d-inline-block nav-item" id="order-nav">
                    <i class="ti-eye d-block mb-2"></i>
                    <span class="d-block h4">Review</span>
                  </li>
                </div>
                
                <!-- /navbar -->

                <!-- shipping-address -->
                <div id="shipping-addr">
                <h3 class="mb-5 border-bottom pb-2">Select Shipping Address</h3>
                <form action="#" class="row">
                  <?php
                    $conn = $pdo->open();
                    try{
                      $stmt = $conn->prepare("SELECT * FROM addresses WHERE user_id=:id");
                      $stmt->execute(['id'=>$user['customer_id']]);
                      $addr = $stmt->fetchAll();
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }
                    $pdo->close();
                  ?>
                  <?php if(count($addr) > 0): ?>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Select</th>
                          <th>Name</th>
                          <th>Address</th>
                          <th>PIN Code</th>
                          <th>Phone Number</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($addr as $row): ?>
                        <tr>
                          <td>
                            <label for="addrSelect"></label>
                            <input type="radio" name="addrSelect" id="addr" value="<?=$row['id']?>">
                          </td>
                          <td><?=$row['full_name']?></td>
                          <td><?=$row['addr1'] ?> <?=$row['addr2']?></td>
                          <td><?=$row['pin']?></td>
                          <td><?=$row['phone_no']?></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div> 
                  <?php else: ?>
                  <div class="col-md-6 text-center">
                    <h4 class="mb-3">You have no saved addresses.</h4>
                  </div>
                  <?php endif; ?>
                  <!-- /shipping-address -->
                </form>
                <hr>
                <h3 class="mb-5 border-bottom pb-2">Or Add New One</h3>
                <form class="checkout-form">
                  <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" id="full_name" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="user_addr1">Address Line 1</label>
                    <input type="text" class="form-control" id="user_addr1" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="user_addr2">Address Line 2</label>
                    <input type="text" class="form-control" id="user_addr2" placeholder="">
                  </div>
                  <div class="checkout-country-code clearfix">
                    <div class="form-group">
                      <label for="pin_code">PIN Code</label>
                      <input type="text" class="form-control" id="pin_code" name="pin_code" value="">
                    </div>
                    <div class="form-group">
                      <label for="user_number">Phone Number</label>
                      <input type="text" class="form-control" id="user_number" name="user_number" value="">
                    </div>
                  </div>
                </form>
                  <div class="p-4 bg-gray text-right">
                    <a href="checkout.php" class="btn btn-primary shipping-ctn">Continue</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="border-box p-4">
                <h4>Order Summery</h4>
                <p>Excepteur sint occaecat cupidat non proi dent sunt.officia.</p>
                <ul class="list-unstyled">
                  <li class="d-flex justify-content-between">
                    <span>Subtotal</span>
                    <span id="sub-total"></span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <span>Estimated Tax</span>
                    <span>&#8377;0.00</span>
                  </li>
                </ul>
                <hr>
                <div class="d-flex justify-content-between">
                  <span>Grand Total</span>
                  <strong>&#8377;1,80,000.00</strong>
                </div>
              </div>
              <hr>
              <div class="verified-icon">
                <img src="images/verified.png">
              </div>
            </div>
        </div>
    </div>
  </section>
  
<?php include 'includes/footer.php'; ?>
</div>
</body>
<?php include 'includes/scripts.php'; ?>
<script>
  // $(function(){
    
  // });
</script>