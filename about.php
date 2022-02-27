<title>About</title>
<?php 
  include 'includes/session.php';
  include 'includes/header.php';
?>
<style>
.navigation {
  background-color: #222;
}
</style>
<body>
<?php include 'includes/navbar.php'; ?>

<!-- main wrapper -->
<div class="main-wrapper">
  <!-- breadcrumb -->
  <nav class="py-3">
  <div class="container">
    <div class="content">
      <h2>About Us</h2>
    </div>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">About</li>
    </ol>
  </div>
  </nav>
  <!-- /breadcrumb -->
  <section class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <!-- image circle background -->
        <div class="about-img-bg"></div>
        <img class="img-fluid mb-4 mb-md-0" src="images/saxophone.png" alt="product-img">
      </div>
      <div class="col-md-6">
        <h2 class="section-title">Welcome to Our World</h2>
        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
        <ul class="pl-0">
          <li class="d-flex">
            <i class="ti-check mr-3 mt-1"></i>
            <div>
              <h4>Free Gift Card</h4>
              <p>Gift cards are free. Claim them now!</p>
            </div>
          </li>
          <li class="d-flex">
            <i class="ti-check mr-3 mt-1"></i>
            <div>
              <h4>Best Delivery</h4>
              <p>Free Shipping All Over India</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  </section>
  <!-- season sale -->
  <section class="section overlay cta" data-background="images/guitar.jpg" style="background-image: url(&quot;images/guitar.jpg&quot;);">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="text-white mb-2">End of Season Sale</h1>
        <p class="text-white mb-4">Take 10% off on all guitars, saxophones and violins. Discount applied at checkout.</p>
        <a href="shop.php" class="btn btn-light">shop now</a>
      </div>
    </div>
  </div>
</section>
  <!-- /season sale -->
  <!-- team -->
  <section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <!-- team member -->
      <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 text-center team-member">
          <img class="card-img-top rounded-0 mb-1" src="images/female3.jpg" alt="team-member">
          <div class="card-body">
            <h4 class="card-title">Arshiya Khan</h4>
            <p class="card-text">Manager</p>
          </div>
          <ul class="list-inline social-icons">
            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-vimeo-alt"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- team member -->
      <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 text-center team-member">
          <img class="card-img-top rounded-0 mb-1" src="images/avator.jpg" alt="team-member">
          <div class="card-body">
            <h4 class="card-title">Abhinit Ingole</h4>
            <p class="card-text">Developer</p>
          </div>
          <ul class="list-inline social-icons">
            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-vimeo-alt"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- team member -->
      <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 text-center team-member">
          <img class="card-img-top rounded-0 mb-1" src="images/avator.jpg" alt="team-member">
          <div class="card-body">
            <h4 class="card-title">Vinod Jarare</h4>
            <p class="card-text">Developer</p>
          </div>
          <ul class="list-inline social-icons">
            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-vimeo-alt"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </section>
  <!-- /team -->
<?php include 'includes/footer.php'; ?>
</div>
</body>
<?php include 'includes/scripts.php'; ?>