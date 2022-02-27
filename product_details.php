<title>Account</title>
<?php 
  include 'includes/session.php';
  include 'includes/header.php';
?>
<style>
.img-fluid {
  height: auto;
}
.slick-slide {
  height: 540px;
}
.slick-slide img {
  height: 100%;
  object-fit: contain;
}
.product-slider .slick-dots li img {
  height: 173px;
}
.img-review {
  height: 120px;
  width: 120px;
}
.form-control {
  border-radius: 0;
}
.checked {
  color: #eabe12;
}
.unchecked {
  color: #ccc;
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<body>
<?php include 'includes/navbar.php'; ?>
<?php
  if(!isset($_GET['id'])){
    header('location: products.php');
  }
  else{
    $id = $_GET['id'];
    $conn = $pdo->open();

    // fetch product
    try{
      $stmt = $conn->prepare("SELECT * FROM product WHERE product_id=:id");
      $stmt->execute(['id'=>$id]);
      $product = $stmt->fetch();
    }
    catch(PDOException $e) {
      echo $e->getMessage();
    }
  }
?>
<!-- main wrapper -->
<div class="main-wrapper">
  <!-- breadcrumb -->
  <nav class="py-3">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="products.php">Shop</a></li>
      <li class="breadcrumb-item active" aria-current="page">Product</li>
    </ol>
  </div>
  </nav>
  <!-- /breadcrumb -->
  <!-- product-single -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <?php
          // image fetch
          $imgID = $id;
          // fetch images
          try{
            $imgStmt = $conn->prepare("SELECT * FROM images WHERE pro_id=:id LIMIT 5");
            $imgStmt->execute(['id'=>$imgID]);
            $images = $imgStmt->fetchAll(PDO::FETCH_ASSOC);
          }
          catch(PDOException $e){
            echo $e->getMessage();
          } 
        ?>
        <!-- product image slider -->
        <div class="product-slider">
          <?php foreach($images as $image): ?>
          <div data-image="admin/uploads/<?=$image['img_name']?>">
            <img class="img-fluid w-100 image-zoom" src="admin/uploads/<?=$image['img_name']?>" alt="product-img"
              data-zoom="admin/uploads/<?=$image['img_name']?>">
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <!-- produt details -->
      <div class="col-lg-6 mb-100">
        <h2><?=$product['product_name']?></h2>
        <?php if($product['stock'] > 2): ?>
        <i class="ti-check-box text-success"></i>
        <span class="text-success">Instock</span>
        <?php elseif($product['stock'] == 0): ?>
        <i class="ti-check-box text-primary"></i>
        <span class="text-primary">Out of Stock!</span>
        <?php else: ?>
        <i class="ti-check-box text-primary"></i>
        <span class="text-primary">Hurry!! Only 1 left!</span>
        <?php endif; ?>
        <!-- reviews -->
        <?php
          // get total reviews
          try{
            $totalReviews = $conn->prepare("SELECT * FROM reviews WHERE pro_id=:id");
            $totalReviews->execute(['id'=>$id]);
            $reviews = $totalReviews->fetchAll();
            $reviewCount = $conn->query("SELECT * FROM reviews WHERE pro_id=".$id."")->rowCount();
          }
          catch(PDOException $e){
            echo $e->getMessage();
          }
        ?>
        <ul class="list-inline mb-4">
          <?php
            $star5 = 0;
            $star4 = 0;
            $star3 = 0;
            $star2 = 0;
            $star1 = 0;

            foreach($reviews as $rating){
              if($rating['rating'] == 5){
                $star5++;
              }
              elseif($rating['rating'] == 4){
                $star4++;
              }
              elseif($rating['rating'] == 3){
                $star3++;
              }
              elseif($rating['rating'] == 2){
                $star2++;
              }
              elseif($rating['rating'] == 1){
                $star1++;
              }
            }

            $avgRating = 0;
            if($star5 + $star4 + $star3 + $star2 + $star1 == 0){
              $avgRating = 0;
            }
            else{
              $avgRating = (5 * $star5 + 4 * $star4 + 3 * $star3 + 2 * $star2 + 1 * $star1) / ($star5 + $star4 + $star3 + $star2 + $star1);
            }

            $avgRating = round($avgRating);
          ?>
          <?php if($avgRating > 4): ?>
          <li class="list-inline-item mx-0"><i class="fa fa-star checked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star checked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star checked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star checked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star checked"></i></li>
          <?php elseif($avgRating > 3): ?>
          <li class="list-inline-item mx-0"><i class="fa fa-star checked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star checked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star checked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star checked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star unchecked"></i></li>
          <?php elseif($avgRating > 2): ?>
          <li class="list-inline-item mx-0"><i class="fa fa-star checked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star checked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star checked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star unchecked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star unchecked"></i></li>
          <?php elseif($avgRating > 1): ?>
          <li class="list-inline-item mx-0"><i class="fa fa-star checked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star checked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star unchecked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star unchecked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star unchecked"></i></li>
          <?php elseif($avgRating == 1): ?>
          <li class="list-inline-item mx-0"><i class="fa fa-star checked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star unchecked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star unchecked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star unchecked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star unchecked"></i></li>
          <?php else: ?>
          <li class="list-inline-item mx-0"><i class="fa fa-star unchecked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star unchecked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star unchecked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star unchecked"></i></li>
          <li class="list-inline-item mx-0"><i class="fa fa-star unchecked"></i></li>
          <?php endif; ?>
          <li class="list-inline-item"><a href="#nav-review" class="text-gray ml-3 reviews">( <?php echo $reviewCount; ?> Reviews )</a></li>
        </ul>
        <h4 class="text-primary h3">&#8377;<?=number_format($product['product_price'], 2)?> 
        <?php if($product['sale_price'] > 0): ?>
        <s class="text-color ml-2">&#8377;<?=number_format($product['product_price'], 2)?></s></h4>
        <h6 class="mb-4">You save: <span class="text-primary">&#8377;<?=number_format($product['product_price'], 2)?></span></h6>
        <?php endif; ?>
        <h6 class="mb-4"><span class="text-primary"></span></h6>
        <div class="d-flex flex-column flex-sm-row justify-content-between mb-4 col-sm-4 sweetalert">
          <!-- <form action="#" method="post"> -->
          <input id="quantity" class="quantity mr-sm-2 mb-3 mb-sm-0" type="number" name="quantity" value="1">
        </div>
        <button type="submit" class="btn btn-primary mb-4 add-cart sweet-success" id="add-cart" data-id="<?=$product['product_id']?>">add to cart</button>
        <!-- </form> -->
        <?php if($product['sale_price'] > 0): ?>
        <h4 class="mb-3"><span class="text-primary">Hurry up!</span> Sale ends in</h4>
        <!-- syo-timer -->
        <div class="syotimer dark">
          <div id="sale-timer" data-year="2019" data-month="5" data-day="1" data-hour="1"></div>
        </div>
        <?php endif; ?>
        <hr>
        <div class="payment-option border border-primary mt-5 mb-4">
          <h5 class="bg-white">Guaranteed Safe Checkout</h5>
          <img class="img-fluid w-100 p-3" src="images/payment-card/all-card.png" alt="payment-card">
        </div>
        <h5 class="mb-3">4 Great Reason to Buy From Us</h5>
        <div class="row">
          <!-- service item -->
          <div class="col-lg-3 col-6 mb-4 mb-lg-0">
            <div class="d-flex">
              <i class="ti-truck icon-md mr-3"></i>
              <div class="align-items-center">
                <h6>Free Shipping</h6>
              </div>
            </div>
          </div>
          <!-- service item -->
          <div class="col-lg-3 col-6 mb-4 mb-lg-0">
            <div class="d-flex">
              <i class="ti-shield icon-md mr-3"></i>
              <div class="align-items-center">
                <h6>Secure Payment</h6>
              </div>
            </div>
          </div>
          <!-- service item -->
          <div class="col-lg-3 col-6 mb-4 mb-lg-0">
            <div class="d-flex">
              <i class="icon-md mr-3">&#8377;</i>
              <div class="align-items-center">
                <h6>Lowest Price</h6>
              </div>
            </div>
          </div>
          <!-- service item -->
          <div class="col-lg-3 col-6 mb-4 mb-lg-0">
            <div class="d-flex">
              <i class="ti-reload icon-md mr-3"></i>
              <div class="align-items-center">
                <h6>30 Days Return</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- product description -->
    <div class="row">
      <div class="col-lg-12">
        <nav class="product-info-tabs wc-tabs mt-5 mb-5">
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a href="#nav-overview" class="nav-item nav-link active" id="nav-over-tab" data-toggle="tab" role="tab" aria-controls="nav-overview" aria-selected="true">
            Overview
            </a>
            <a href="#nav-desc" class="nav-item nav-link" id="nav-desc-tab" data-toggle="tab" role="tab" aria-controls="nav-desc" aria-selected="false">
            Description
            </a>
            <a href="#nav-history" class="nav-item nav-link" id="nav-hist-tab" data-toggle="tab" role="tab" aria-controls="nav-history" aria-selected="false">
            History
            </a>
            <a href="#nav-review" class="nav-item nav-link" id="nav-rev-tab" data-toggle="tab" role="tab" aria-controls="nav-review" aria-selected="false">
            Review
            </a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade active show" id="nav-overview" role="tabpanel" aria-labelledby="nav-over-tab">
            <?php echo $product['product_overview']; ?>
          </div>
          <div class="tab-pane fade" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab">
            <?php echo $product['product_description']; ?>
				  </div>
          <div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-hist-tab">
            <?php echo  $product['product_history']; ?>
          </div>
          <div class="tab-pane" id="nav-review" role="tabpanel" aria-labelledby="nav-rev-tab">
            <div class="row">
              <div class="col-lg-7">
                <?php if($reviews): ?>
                <?php foreach($reviews as $review): ?>
                <div class="media review-block mb-4">
                  <img src="images/avator.jpg" alt="profile" class="img-review mr-4">
                  <div class="media-body">
                    <div class="product-review"></div>
                    <h4><?=$review['name']?></h4>
                    <p><?=$review['review']?></p>
                  </div>
                </div>
                <?php endforeach;?>
                <?php else: ?>
                <div class="media review-block mb-4">
                  <div class="media-body text-center">
                    <h4>No Reviews Available</h4>
                  </div>
                </div>
                <?php endif; ?>
              </div>
              <div class="col-lg-5">
                <div class="review-comment mt-5 mt-lg-0">
                  <h4 class="mb-3">Add a Review</h4>
                  <form action="#" id="reviewForm">
                    <div class="rating">
                      <input type="radio" name="rating" value="5" id="5">
                      <label for="5">☆</label>
                      <input type="radio" name="rating" value="4" id="4">
                      <label for="4">☆</label>
                      <input type="radio" name="rating" value="3" id="3">
                      <label for="3">☆</label>
                      <input type="radio" name="rating" value="2" id="2">
                      <label for="2">☆</label>
                      <input type="radio" name="rating" value="1" id="1">
                      <label for="1">☆</label>
                    </div>
                    <div class="form-group">
                      <input type="text" name="uname" id="uname" class="form-control" placeholder="Your name" required>
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" id="email" class="form-control" placeholder="Your email" required>
                    </div>
                    <div class="form-group">
                      <textarea name="comment" id="comment" class="form-control" cols="30" rows="4" placeholder="Your review" required></textarea>
                    </div>
                    <?php $uid = isset($_SESSION['user']) ? $user['customer_id'] : 0; ?>
                    <div class="form-group">
                      <input type="hidden" name="uid" id="uid" value="<?=$uid?>">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="pid" id="pid" value="<?=$_GET['id']?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-small">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </div>
</section>
<!-- /product-single -->
<?php include 'includes/footer.php'; ?>
</div>
</body>
<?php include 'includes/scripts.php'; ?>
<script>
  $(function(){
    $('#reviewForm').submit(function(e){
      e.preventDefault();
      var star = 0;
      var name = $('#uname').val();
      var email = $('#email').val();
      var review = $('#comment').val();
      var uid = $('#uid').val();
      var pid = $('#pid').val();
      if(!$("input[type='radio'][name='rating']:checked").val()){
        star = 1;
      }
      else{
        star = $("input[type='radio'][name='rating']:checked").val();
      }

      $.ajax({
        type: 'POST',
        url: 'review.php',
        data: {
          star: star,
          name: name,
          email: email,
          review: review,
          id: uid,
          pid: pid
        },
        dataType: 'json',
        success: function(response){
          if(!response.error){
            swal({
              title: "Thank You!",
              text: response.message,
              type: "success",
              closeOnConfirm: !1
            }, function(){
              window.location.reload();
            });
          }
          else{
            swal("Oops!", response.error, "error");
          }
        }
      });
    });
  });
</script>