<title>Products</title>
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
<?php include 'product_filter.php'; ?>
  <div class="main-wrapper">
    <!-- Breadcrumb -->
    <nav class="bg-gray py-3">
      <div class="container">
        <div class="content">
          <h2>Products</h2>
        </div>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Shop</li>
        </ol>
      </div>
    </nav>
    <!-- /Breadcrumb -->
    <!-- Shop -->
    <section class="section">
      <div class="container">
        <div class="row">
          <!-- top bar -->
          <div class="col-lg-12 mb-50">
            <div class="d-flex border">
              <div class="flex-basis-15 p-2 p-sm-4 border-right text-center">
                <a href="products.php" class="text-color d-inline-block px-1">
                  <i class="ti-layout-grid3-alt"></i>
                </a>
                <a href="products-list.php" class="text-gray d-inline-block px-1">
                  <i class="ti-view-list-alt"></i>
                </a>
              </div>
              <div class="flex-basis-55 p-2 p-sm-4 align-self-sm-center">
                <p class="text-gray mb-0">Showing <span class="text-color"><?=($numOfProducts * $currentPage) - $numOfProducts + 1?>-<?=($numOfProducts * $currentPage) -$numOfProducts + count($products)?> of <?=$totalProducts?></span></p>
              </div>
              <div class="flex-basis-15 p-2 p-sm-4 border-right border-left text-center">
                <select name="filter" id="filter" class="select" style="display: none;">
                  <option value="1">Filter</option>
                  <option value="2">Popular</option>
                  <option value="3">Top Product</option>
                </select>
              </div>
              <div class="flex-basis-15 p-2 p-sm-4 text-center">
                <select class="select" name="sort" id="sort" style="display: none;">
                  <option value="1">Sort</option>
                  <option value="2">A-Z</option>
                  <option value="3">Z-A</option>
                </select>
              </div>
            </div>
          </div>
          <!-- sidebar -->
          <div class="col-lg-3">
            <!-- search product -->
            <div class="position-relative mb-5">
              <form action="products.php">
                <input type="search" name="s" class="form-control rounded-0" id="search-product" placeholder="Search...">
                <button type="submit" class="search-icon pr-3 r-0"><i class="ti-search text-color"></i></button>
              </form>
            </div>
            <!-- categories -->
            <div class="widget widget-categories mb-5">
              <h4 class="mb-4 widget-title h4">Shop by Categories</h4>
              <ul class="">
                <?php 
                  $conn = $pdo->open();

                  try{
                    $stmt = $conn->prepare("SELECT * FROM category");
                    $stmt->execute();

                    foreach($stmt as $row){
                      echo "<li class='has-children'>
                      <a href='#' class='d-flex py-2 text-gray justify-content-between'>
                        <a>".$row['category_name']."
                        <ul>";

                        $stmt = $conn->prepare("SELECT * FROM sub_category");
                        $stmt->execute();
                        foreach($stmt as $row2) {
                          if($row2['main_id'] == $row['category_id']) {
                            echo "
                              <li><a href='products.php?cat=".$row2['sub_id']."' class='subcat'>".$row2['name']."</a></li>
                            ";
                          }
                        }
                      echo "</ul>
                        </a>
                      </li>";  
                    }
                  }
                  catch(PDOException $e){
                    echo $e->getMessage();
                  }

                  $pdo->close();
                ?>
              </ul>
            </div>
            <form action="products.php" method="get">
              <div class="widget widget-sizes mb-5 brand-scroll" id="checkbox-container">
                <h3 class="widget-title h4 mb-4">Filter by Brands</h3>
                <?php 
                  $conn = $pdo->open();

                  try{
                    $stmt = $conn->prepare("SELECT * FROM brands");
                    $stmt->execute();

                    foreach($stmt as $row){
                      echo '<div class="d-flex justify-content-between custom-checkbox">
                      <label class="label">'.$row['brand_name'].'
                      <input type="checkbox" value='.$row['brand_id'].' name="brand[]" class="brand-filter">
                      <span class="box"></span>
                      </label>
                    </div>';
                    }
                  }
                  catch(PDOException $e){
                    echo $e->getMessage();
                  }

                  $pdo->close();
                ?>
              </div>
              <div class="widget widget_price_filter mb-5" id="#">
                <h3 class="widget-title h4 mb-4">Filter by Price</h3>
                <input name="price" type="text" class="range-track" data-slider-min="0" data-slider-max="100000" data-slider-value="[0,100000]">
                <div class="price_label mb-3">
                  Price: 
                  <span class="value">₹0 - ₹10000</span>
                </div>
              </div>
              <button type="submit" class="btn btn-black btn-sm">Filter</button>
            </form>
          </div>
          <!-- product list -->
          <div class="col-lg-9">
            <div class="row" id="product-row">
              <!-- product -->
              <?php foreach ($products as $product): ?>
              <a href="products.php?page=product&id=<?=$product['product_id']?>"></a>
              <?php
                // get product ID
                $imgID = $product['product_id'];
                // fetch images
                try{
                  $imgStmt = $conn->prepare("SELECT * FROM images WHERE pro_id=:id LIMIT 1");
                  $imgStmt->execute(['id'=>$imgID]);
                  $images = $imgStmt->fetch(PDO::FETCH_ASSOC);
                }
                catch(PDOException $e){
                  echo $e->getMessage();
                }  
              ?>
              <div class="col-lg-4 col-sm-6 mb-4">
                <div class="product text-center">
                  <div class="product-thumb">
                    <div class="overflow-hidden position-relative">
                      
                      <a href="product_details.php?id=<?=$product['product_id']?>">
                        <?php
                          if($images){
                            echo "<img src='admin/uploads/".$images['img_name']."' alt='".$product['product_name']."' class='img-fluid w-100 mb-3'>";
                          }
                          else{
                            echo "<img src='admin/uploads/' alt='".$product['product_name']."' class='img-fluid w-100 mb-3'>";
                          }
                        ?>
                        
                      </a>
                      <div class="btn-cart">
                        <a href="#" class="btn btn-primary btn-sm add-cart" data-id="<?=$product['product_id']?>">Add to Cart</a>
                      </div>
                    </div>
                    <div class="product-hover-overlay">
                      <a href="#" class="product-icon favorite" data-toggle="tooltip" data-placement="left" title data-original-title="Wishlist">
                        <i class="ti-heart"></i>
                      </a>
                      <a href="#quickView" class="product-icon view proView" data-toggle="tooltip" data-id="<?=$product['product_id']?>" data-placement="left" title data-original-title="Quick View">
                        <i class="ti-search"></i>
                      </a>
                    </div>
                  </div>
                  <div class="product-info">
                    <h3 class="h5">
                      <a href="#" class="text-color"><?=$product['product_name']?></a>
                    </h3>
                    <span class="h5">&#8377;<?=number_format($product['product_price'], 2)?></span>
                  </div>
                </div>
              </div>
              <?php
                endforeach;
                $pdo->close();
              ?>
              <!-- Pgination -->
              <div class="col-12 mt-5 bootstrap-pagination">
                <nav>
                  <ul class="pagination justify-content-center">
                    <?php if($currentPage > 1): ?>
                    <li class="page-item">
                      <a href="products.php?page=products&p=<?=$currentPage-1?>" class="page-link">Prev</a>
                    </li>
                    <?php endif; ?>
                    <li class="page-item active">
                      <a href="#" class="page-link">1</a>
                    </li>
                    <?php if($totalProducts > ($currentPage * $numOfProducts) - $numOfProducts + count($products)): ?>
                    <li class="page-item">
                      <a href="products.php?page=products&p=<?=$currentPage+1?>" class="page-link">Next</a>
                    </li>
                    <?php endif; ?>
                  </ul>
                </nav>
              </div>
              <!-- /Paagination -->
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <?php include 'includes/scripts.php'; ?>
    <!-- Product Modal -->
    <?php include 'includes/product_modal.php'; ?>
  </div>
  <a href="#header" class="goto_top scroll_link">
    <svg>
      <use xlink:href="./images/sprite.svg#icon-arrow-up"></use>
    </svg>
    </a>
    <script src="libraries/js/index.js"></script>
  <?php include 'includes/footer.php'; ?>
</body>

<script>
  $('.widget-categories .has-children').on('click', function () {
    $('.widget-categories .has-children').removeClass('expanded');
    $(this).addClass('expanded');
  });
</script>