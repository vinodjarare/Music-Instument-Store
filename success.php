<title>Account</title>
<?php 
  include 'includes/session.php';
  include 'includes/header.php';
?>
<?php 
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) { 
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 ); 
        die( header( 'location: error.php' ) );
    } 
?> 
<style>
.navigation {
  background-color: #222;
}
video{
  height: 100%;
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
            <h3 class="text-center mb-3">Thank you! You are successfully registered.</h3>
            <p class="text-color">You can check our great collection of products or edit your <span><a href="account.php" class="text-primary"> profile</a></span></p>
            <a href="products.php" class="btn btn-primary mt-3 mx-2">Go To Shopping</a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>
</div>
</body>
<?php include 'includes/scripts.php'; ?>