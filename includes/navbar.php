<!-- preloader start -->
<div class="preloader">
    <img src="images/preloader.gif" alt="preloader">
  </div>
  <!-- preloader end -->
<!-- top header -->
<div class="top-header" id="header">
    <div class="row">
      <div class="col-lg-6 text-center text-lg-left">
        <p class="text-white mb-lg-0 mb-1">Free shipping • Free 30 days return • Express delivery</p>
      </div>
      <div class="col-lg-6 text-center text-lg-right">
        <ul class="list-inline">
          <li class="list-inline-item"><img src="images/flag.jpg" alt="flag"></li>
          <?php
            if(isset($_SESSION['user'])){
              echo '<li class="list-inline-item"><a href="account.php">My Account</a></li>
              <li class="list-inline-item"><a href="logout.php">Logout</a>
              ';
            }
            else {
              echo '<li class="list-inline-item"><a href="login.php#/register">Register</a></li>
              <li class="list-inline-item"><a href="login.php">Login</a>
              ';
            }
          ?>
        </ul>
      </div>
    </div>
</div>

<!-- /top-header -->
<header id="navbar" class="header">
  <div class="navigation">
    <div class="container">
      <!-- navigation -->
  <nav class="navbar navbar-expand-lg navbar-light w-100" id="navbar">
  <!-- <a class="navbar-brand order-2 order-lg-1" href="index.html"><img class="img-fluid" src="images/logo.png" alt="logo"></a> -->
  <div class="nav_logo">
    <a href="/" class="scroll-link">
      <div class="neon">INSTRUMENTALS</div>
      <div class="flux">Play With Passion..!</div>
    </a>
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse order-1 order-lg-2" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">home</a>
      </li>
      <li class="nav-item dropdown view">
        <a class="nav-link dropdown-toggle" href="shop.html" role="button" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          brands
        </a>
        <?php
          $conn = $pdo->open();

          try{
            $stmt = $conn->prepare("SELECT * FROM brands LIMIT 8");
            $stmt->execute();
            $brands = $stmt->fetchAll();
          }
          catch(PDOException $e){
            echo $e->getMessage();
          }
          $pdo->close();
        ?>
        <div class="dropdown-menu">
          <?php foreach($brands as $brand): ?>
          <a class="dropdown-item" href="products.php?brand[]=<?=$brand['brand_id']?>"><?=$brand['brand_name']?></a>
          <?php endforeach; ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="products.php">
          shop
        </a>
      </li>
      <li class="nav-item dropdown mega-dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu mega-menu">
          <?php
            $conn = $pdo->open();
            try{
              $stmt = $conn->prepare("SELECT * FROM category LIMIT 4");
              $stmt->execute();
              $category = $stmt->fetchAll();
            }
            catch(PDOException $e){
              echo $e->getMessage();
            }
          ?>
          <?php foreach($category as $cat): ?>
          <div class="mx-3 mega-menu-item">
            <h6><?=$cat['category_name']?></h6>
            <ul class="pl-0">
              <?php
                try{
                  $stmt2 = $conn->prepare("SELECT * FROM sub_category WHERE main_id=:id LIMIT 5");
                  $stmt2->execute(['id'=>$cat['category_id']]);
                  $subcategory = $stmt2->fetchAll();
                }
                catch(PDOException $e){
                  echo $e->getMessage();
                }
              ?>
              <?php foreach($subcategory as $subcat): ?>
              <li><a href="products.php?cat=<?=$subcat['sub_id']?>"><?=$subcat['name']?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php endforeach; ?>
          <div class="mx-3 mega-megu-image">
            <img class="img-fluid h-100" src="images/Hilary Hahn.jpeg" alt="feature-img">
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.html">Need Help?</a>
      </li>
    </ul>
  </div>
  <div class="order-3 navbar-right-elements">
    <div class="search-cart">
      <!-- search -->
      <div class="search">
        <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
        <div class="search-wrapper">
          <form action="products.php" method="GET">
            <input class="search-box" id="search" type="search" name="s" placeholder="Enter Keywords...">
            <button class="search-icon" type="submit"><i class="ti-search"></i></button>
          </form>
        </div>
      </div>
      <!-- cart -->
      <div class="cart">
        <button id="cartOpen" class="cart-btn"><i class="ti-bag"></i><span class="d-xs-none">CART</span> <b class="cart_count"></b></button>
        <div class="cart-wrapper">
          <i id="cartClose" class="ti-close cart-close"></i>
          <h4 class="mb-4">Your Cart</h4>
            <??>
            <ul class="pl-0 mb-3">
              <li>
                <div class="mb-3">
                  <span>You have <b class="cart_count"></b> item(s) in your cart!</span>
                </div>
              </li>
              <ul class="cart-menu" id="cart_menu"></ul>
            </ul>
            <div class="mb-3">
              <span>Cart Total</span>
              <span class="float-right" id="cart-total"></span>
            </div>
            <div class="text-center">
              <a href="cart.php" class="btn btn-dark btn-mobile rounded-0">view cart</a>
              <?php if(isset($_SESSION['user'])){
                echo '<a href="checkout.php" class="btn btn-dark btn-mobile rounded-0">checkout</a>';
              }
              else{
                echo '<a href="login.php" class="btn btn-dark btn-mobile rounded-0">login</a>'; 
              }
              ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- /navigation -->        
    </div>
  </div>
</header>