<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php' ?>
<body>
    
    <?php include 'includes/navbar.php' ?>
    <main id="main">
    <section class="section bg-gray hero-area">
    <div class="container">
    <div class="hero-slider">
      
      <!-- Start first slide  -->
      <div class="slider-item">
        <div class="row">
          <div class="col-lg-6 align-self-center text-center text-md-left mb-4 mb-lg-0">
            <h3 data-duration-in=".5" data-animation-in="fadeInLeft" data-delay-in="0" data-animation-out="fadeOutLeft" data-delay-out="5" data-duration-out=".3">Drums</h3>
            <!-- Start Title -->
            <h1 data-duration-in=".5" data-animation-in="fadeInLeft" data-delay-in=".2" data-animation-out="fadeOutLeft" data-delay-out="5" data-duration-out=".3">High Quality Kits</h1> 
            <!-- end title -->
            <!-- Start Subtitle -->
            <h3 class="mb-4" data-duration-in=".5" data-animation-in="fadeInLeft" data-delay-in=".4" data-animation-out="fadeOutLeft" data-delay-out="5" data-duration-out=".3">Starting at &#8377;20,000</h3>
            <!-- end subtitle -->
            <!-- Start description -->
            <p class="mb-4" data-duration-in=".5" data-animation-in="fadeInLeft" data-delay-in=".6" data-animation-out="fadeOutLeft" data-delay-out="5" data-duration-out=".3">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <!-- end description -->
            <!-- Start button -->
            <a href="shop.html" class="btn btn-primary" data-duration-in=".5" data-animation-in="fadeInLeft" data-delay-in=".8" data-animation-out="fadeOutLeft" data-delay-out="5" data-duration-out=".3">shop now</a>
            <!-- end button -->
          </div>
          <!-- Start slide image -->
          <div class="col-lg-6 text-center text-md-left">
            <!-- background letter -->
            <div class="bg-letter">
              <span data-duration-in=".5" data-animation-in="fadeInRight" data-delay-in="1.2" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-out=".3">
                C 
              </span>
              <!-- Slide image -->
              <img class="img-fluid d-unset" src="images/drums.png" alt="drums" data-duration-in=".5" data-animation-in="fadeInRight" data-delay-in="1" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-out=".3">
            </div>
          </div>
          <!-- end slide image  -->
        </div>
      </div> <!-- end slider item -->


      <!-- Start slide  -->
      <div class="slider-item">
        <div class="row">
          <div class="col-lg-6 align-self-center text-center text-md-left mb-4 mb-lg-0">
            <h3 data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in="0" data-animation-out="fadeOutDown" data-delay-out="5.8" data-duration-out=".3">Sitar</h3>
            <h1 data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in=".2" data-animation-out="fadeOutDown" data-delay-out="5.4" data-duration-out=".3">Hand Crafted</h1>
            <h3 class="mb-4" data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in=".4" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-out=".3">Starting at &#8377;15,000</h3>
            <p class="mb-4" data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in=".6" data-animation-out="fadeOutDown" data-delay-out="4.6" data-duration-out=".3">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <a href="shop.html" class="btn btn-primary" data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in=".8" data-animation-out="fadeOutDown" data-delay-out="4.2" data-duration-out=".3">shop now</a>
          </div>
          <div class="col-lg-6 text-center">
            <div class="bg-letter">
                <!-- background letter -->
              <span data-duration-in=".5" data-animation-in="fadeInRight" data-delay-in="1.2" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-out=".3">
                B
              </span>
              <img class="img-fluid d-unset" src="images/sitar.png" alt="converse" data-duration-in=".5" data-animation-in="fadeInRight" data-delay-in="1" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-out=".3">
            </div>
          </div>
        </div>
      </div> 
      <!-- end slide  -->

    </div>
  </div>
</section>

    <!-- Popular Brands -->
    
    <section id="brands">
        <div class="heading">
            <h1>Popular Brands</h1>
        </div>
        <div class="popular_brands" data-aos="fade-up" data-aos-duration="1200">
        
            <div class="brand-card">
                <div class="card_image">
                    <img src="./images/brand logos/Gibson_logo.svg" alt="gibson">
                </div>
                <div class="card_details">
                    <div class="card_center">
                        <a href="products.php?brand[]=10">SHOP NOW</a>
                    </div>
                </div>
            </div>
            <div class="brand-card">
                <div class="card_image">
                    <img src="./images/brand logos/Yamaha-guitars-logo.jpg" alt="yamaha">
                </div>
                <div class="card_details">
                    <div class="card_center">
                        <a href="products.php?brand[]=12">SHOP NOW</a>
                    </div>
                </div>
            </div>
            <div class="brand-card">
                <div class="card_image">
                    <img src="./images/brand logos/fender.svg" alt="fender">
                </div>
                <div class="card_details">
                    <div class="card_center">
                        <a href="products.php?brand[]=15">SHOP NOW</a>
                    </div>
                </div>
            </div>
            <div class="brand-card">
                <div class="card_image">
                    <img src="./images/brand logos/epiphone.svg" alt="epiphone">
                </div>
                <div class="card_details">
                    <div class="card_center">
                        <a href="#">SHOP NOW</a>
                    </div>
                </div>
            </div>
            <div class="brand-card">
                <div class="card_image">
                    <img src="./images/brand logos/esp1.svg" alt="esp">
                </div>
                <div class="card_details">
                    <div class="card_center">
                        <a href="#">SHOP NOW</a>
                    </div>
                </div>
            </div>
            <div class="brand-card">
                <div class="card_image">
                    <img src="./images/brand logos/ibanez1.svg" alt="ibanez">
                </div>
                <div class="card_details">
                    <div class="card_center">
                        <a href="#">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- categories -->
<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 text-center">
        <h2 class="section-title">Top Categories</h2>
      </div>
      <!-- categories item -->
      <div class="col-lg-4 col-md-6 mb-50">
        <div class="card p-0">
          <div class="border-bottom text-center hover-zoom-img cat-image">
            <a href="product_details.php?id=7"><img src="images/fender-acoustic-sm.png" class="rounded-top img-fluid w-100" alt="product-img"></a>
          </div>
          <ul class="d-flex list-unstyled pl-0 categories-list">
            <li class="m-0 hover-zoom-img">
              <a href="shop.html"><img src="images/dAddario-string.webp" class="img-fluid w-100" alt="product-img"></a>
            </li>
            <li class="m-0 hover-zoom-img">
              <a href="shop.html"><img src="images/guitar-pick.webp" class="img-fluid w-100" alt="product-img"></a>
            </li>
            <li class="m-0 hover-zoom-img">
              <a href="shop.html"><img src="images/guitar-case.webp" class="img-fluid w-100" alt="product-img"></a>
            </li>
          </ul>
          <div class="px-4 py-3 border-top">
            <h4 class="d-inline-block mb-0 mt-1">Guitars</h4>
            <a href="products.php?c=1" class="btn btn-sm btn-outline-primary float-right">view more</a>
          </div>
        </div>
      </div>
      <!-- categories item -->
      <div class="col-lg-4 col-md-6 mb-50">
        <div class="card p-0">
          <div class="border-bottom text-center hover-zoom-img cat-image">
            <a href="shop.html"><img src="images/recording-mixer.jpg" class="rounded-top img-fluid w-100" alt="product-img"></a>
          </div>
          <ul class="d-flex list-unstyled pl-0 categories-list">
            <li class="m-0 hover-zoom-img">
              <a href="shop.html"><img src="images/recording-mic.jpg" class="img-fluid w-100" alt="product-img"></a>
            </li>
            <li class="m-0 hover-zoom-img">
              <a href="shop.html"><img src="images/recording-di-box.jpg" class="img-fluid w-100" alt="product-img"></a>
            </li>
            <li class="m-0 hover-zoom-img">
              <a href="shop.html"><img src="images/recording-monitor.jpg" class="img-fluid w-100" alt="product-img"></a>
            </li>
          </ul>
          <div class="px-4 py-3 border-top">
            <h4 class="d-inline-block mb-0 mt-1">Recording</h4>
            <a href="shop.html" class="btn btn-sm btn-outline-primary float-right">view more</a>
          </div>
        </div>
      </div>
      <!-- categories item -->
      <div class="col-lg-4 col-md-6 mb-50">
        <div class="card p-0">
          <div class="border-bottom text-center hover-zoom-img cat-image">
            <a href="shop.html"><img src="images/amps-marshall.webp" class="rounded-top img-fluid w-100" alt="product-img"></a>
          </div>
          <ul class="d-flex list-unstyled pl-0 categories-list">
            <li class="m-0 hover-zoom-img">
              <a href="shop.html"><img src="images/fx-pedal-bossme80.jpg" class="img-fluid w-100" alt="product-img"></a>
            </li>
            <li class="m-0 hover-zoom-img">
              <a href="shop.html"><img src="images/fx-pedal-crybaby.jpg" class="img-fluid w-100" alt="product-img"></a>
            </li>
            <li class="m-0 hover-zoom-img">
              <a href="shop.html"><img src="images/fx-pedal-metalzone.webp" class="img-fluid w-100" alt="product-img"></a>
            </li>
          </ul>
          <div class="px-4 py-3 border-top">
            <h4 class="d-inline-block mb-0 mt-1">Amps & Effects</h4>
            <a href="shop.html" class="btn btn-sm btn-outline-primary float-right">view more</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /categories -->

    <!-- Facility Section -->
    <section class="facility_section section" id="facility">
        <div class="container">
            <div class="facility_container" data-aos="fade-up" data-aos-duration="1200">
                <div class="facility_box">
                    <div class="facility_img_container">
                        <svg>
                            <use xlink:href="./images/sprite.svg#icon-airplane"></use>
                        </svg>
                    </div>
                    <p>FREE SHIPPING IN INDIA</p>
                </div>

                <div class="facility_box">
                    <div class="facility_img_container">
                        <svg>
                            <use xlink:href="./images/sprite.svg#icon-credit-card-alt"></use>
                        </svg>
                    </div>
                    <p>100% MONEY BACK GUARANTEE</p>
                </div>

                <div class="facility_box">
                    <div class="facility_img_container">
                        <svg>
                            <use xlink:href="./images/sprite.svg#icon-credit-card"></use>
                        </svg>
                    </div>
                    <p>MANY PAYMENT GATEWAYS</p>
                </div>

                <div class="facility_box">
                    <div class="facility_img_container">
                        <svg>
                            <use xlink:href="./images/sprite.svg#icon-headphones"></use>
                        </svg>
                    </div>
                    <p>24/7 ONLINE SUPPORT</p>
                </div>
            </div>
        </div>
    </section>

    <!-- collection -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-title">Top Collections</h2>
      </div>
      <div class="col-12">
        <div class="collection-slider">
            <!-- product -->
            <?php
              $conn = $pdo->open();
              try{
                $stmt = $conn->prepare("SELECT * FROM product ORDER BY RAND() LIMIT 6");
                $stmt->execute();
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
              }
              catch(PDOException $e){
                echo $e->getMessage();
              }
            ?>
            <?php foreach($products as $product): ?>
            <?php
              $imgID = $product['product_id'];

              try{
                $imgStmt = $conn->prepare("SELECT * FROM images WHERE pro_id=:id LIMIT 1");
                $imgStmt->execute(['id'=>$imgID]);
                $images = $imgStmt->fetch(PDO::FETCH_ASSOC);
              }
              catch(PDOException $e){
                echo $e->getMessage();
              }
            ?>
            <div class="col-lg-4 col-sm-6">
              <div class="product text-center">
                <div class="product-thumb">
                  <div class="overflow-hidden position-relative">
                    <a href="product_details.php?id=<?=$product['product_id']?>">
                      <img class="img-fluid w-100 mb-3" src="admin/uploads/<?=$images['img_name']?>" alt="product-img">
                    </a>
                    <div class="btn-cart">
                        <a href="#" class="btn btn-primary btn-sm add-cart" data-id="<?=$product['product_id']?>">Add To Cart</a>
                    </div>
                  </div>
                  <div class="product-hover-overlay">
                    <a data-vbtype="inline" href="#quickView" class="product-icon view proView" data-toggle="tooltip"
                      data-placement="left" title="Quick View" data-id="<?=$product['product_id']?>"><i class="ti-search"></i></a>
                  </div>
                </div>
                <div class="product-info">
                  <h3 class="h5"><a class="text-color" href="product_details.php?id=<?=$product['product_id']?>"><?=$product['product_name']?></a></h3>
                  <span class="h5">&#8377;<?=number_format($product['product_price'], 2)?></span>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            <!-- //end of product -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /collection -->

    <!-- News Section -->
    <section class="section news" id="news">
        <div class="container">
            <div class="title_container">
                <div class="section_titles">
                    <div class="section_title active">
                        <h1 class="primary_title">Product News</h1>
                    </div>
                </div>
            </div>
            <div class="news_container">
                <div class="glide" id="glide_3">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            <li class="glide__slide">
                                <div class="new_card">
                                    <div class="card_header">
                                        <img src="./images/news01.jpg" alt="">
                                    </div>
                                    <div class="card_footer">
                                        <h3>Lorem ipsum dolor</h3>
                                        <span>By Admin</span>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam repellendus accusamus, deserunt quasi quo necessitatibus recusandae! Eos modi possimus fugiat illo laborum neque totam dicta, excepturi error doloribus vel earum?</p>
                                        <a href="#"><button>Read More</button></a>
                                    </div>
                                </div>
                            </li>
                            <li class="glide__slide">
                                <div class="new_card">
                                    <div class="card_header">
                                        <img src="./images/news02.jpg" alt="">
                                    </div>
                                    <div class="card_footer">
                                        <h3>Lorem ipsum dolor</h3>
                                        <span>By Admin</span>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam repellendus accusamus, deserunt quasi quo necessitatibus recusandae! Eos modi possimus fugiat illo laborum neque totam dicta, excepturi error doloribus vel earum?</p>
                                        <a href="#"><button>Read More</button></a>
                                    </div>
                                </div>
                            </li>
                            <li class="glide__slide">
                                <div class="new_card">
                                    <div class="card_header">
                                        <img src="./images/news03.jpg" alt="">
                                    </div>
                                    <div class="card_footer">
                                        <h3>Lorem ipsum dolor</h3>
                                        <span>By Admin</span>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam repellendus accusamus, deserunt quasi quo necessitatibus recusandae! Eos modi possimus fugiat illo laborum neque totam dicta, excepturi error doloribus vel earum?</p>
                                        <a href="#"><button>Read More</button></a>
                                    </div>
                                </div>
                            </li>
                            <li class="glide__slide">
                                <div class="new_card">
                                    <div class="card_header">
                                        <img src="./images/news04.jpg" alt="">
                                    </div>
                                    <div class="card_footer">
                                        <h3>Lorem ipsum dolor</h3>
                                        <span>By Admin</span>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam repellendus accusamus, deserunt quasi quo necessitatibus recusandae! Eos modi possimus fugiat illo laborum neque totam dicta, excepturi error doloribus vel earum?</p>
                                        <a href="#"><button>Read More</button></a>
                                    </div>
                                </div>
                            </li>
                            <li class="glide__slide">
                                <div class="new_card">
                                    <div class="card_header">
                                        <img src="./images/news05.jpg" alt="">
                                    </div>
                                    <div class="card_footer">
                                        <h3>Lorem ipsum dolor</h3>
                                        <span>By Admin</span>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam repellendus accusamus, deserunt quasi quo necessitatibus recusandae! Eos modi possimus fugiat illo laborum neque totam dicta, excepturi error doloribus vel earum?</p>
                                        <a href="#"><button>Read More</button></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <?php include 'includes/newsletter.php'; ?>


    </main>
    <?php include 'includes/footer.php' ?>
    <!-- Product Modal -->

    <!-- Go To -->

  <a href="#header" class="goto_top scroll_link">
    <svg>
      <use xlink:href="./images/sprite.svg#icon-arrow-up"></use>
    </svg>
  </a>
  <?php include 'includes/scripts.php'; ?>
  <script src="libraries/js/index.js"></script>
  <script src="libraries/js/slider.js"></script>
  <?php include 'includes/product_modal.php'; ?>
</body>
</html>