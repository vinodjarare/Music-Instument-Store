<!-- footer -->
<footer class="footer">
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 mb-5 mb-md-0 text-center text-sm-left">
          <h4 class="mb-4">Contact</h4>
          <p>413001 Random Road, Warehouse, Aurangabad</p>
          <p>+91 1122334455</p>
          <p>info@instrumentals.com</p>
          <ul class="list-inline social-icons">
            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-vimeo-alt"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-google"></i></a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6 mb-5 mb-md-0 text-center text-sm-left">
          <h4 class="mb-4">Category</h4>
          <ul class="pl-0 list-unstyled">
            <?php
              $conn = $pdo->open();
              try{
                $stmt = $conn->prepare("SELECT * FROM category ORDER BY RAND() LIMIT 4");
                $stmt->execute();
                $category = $stmt->fetchAll();
              }
              catch(PDOException $e){
                echo $e->getMessage();
              }
            ?>
            <?php foreach($category as $cat): ?>
            <li class="mb-2"><a class="" href="../products.php?c=<?=$cat['category_id']?>"><?=$cat['category_name']?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6 mb-5 mb-md-0 text-center text-sm-left">
          <h4 class="mb-4">Useful Link</h4>
          <ul class="pl-0 list-unstyled">
            <li class="mb-2"><a class="" href="about.html">News & Tips</a></li>
            <li class="mb-2"><a class="" href="about.php">About Us</a></li>
            <li class="mb-2"><a class="" href="address.html">Support</a></li>
            <li class="mb-2"><a class="" href="shop.php">Our Shop</a></li>
            <li class="mb-2"><a class="" href="contact.php">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6 text-center text-sm-left">
          <h4 class="mb-4">Our Policies</h4>
          <ul class="pl-0 list-unstyled">
            <li class="mb-2"><a class="" href="404.html">Privacy Policy</a></li>
            <li class="mb-2"><a class="" href="404.html">Terms & Conditions</a></li>
            <li class="mb-2"><a class="" href="404.html">Cookie Policy</a></li>
            <li class="mb-2"><a class="" href="404.html">Terms of Sale</a></li>
            <li class="mb-2"><a class="" href="dashboard.html">Free Shipping & Returns</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- /footer -->