<title>Cart</title>
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
</style>
<body>
<?php include 'includes/navbar.php'; ?>

<!-- main wrapper -->
<div class="main-wrapper">
  <!-- breadcrumb -->
  <nav class="py-3">
  <div class="container">
    <div class="content">
      <h2>Cart</h2>
    </div>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Cart</li>
    </ol>
  </div>
  </nav>
  <!-- /breadcrumb -->
  <div class="section">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-10 mx-auto">
          <div class="block">
            <div class="product-list">
              <form method="#">
                <div class="table-responsive">
                  <table class="table cart-table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                  </table>
                </div>
                <hr>
                <div class="row">
                  <div class="col-12">
                    <ul class="list-unstyled text-right">
                      <li>Grand Total <span class="d-inline-block w-100px" id="grand-total"></span></li>
                    </ul>
                  </div>
                </div>
                <hr>
                <?php
                  if(isset($_SESSION['user'])){
                    echo '<a href="address.php" type="submit" class="btn btn-primary float-right">Checkout</a>';
                  }
                  else{
                    echo '<p style="font-size: 18px;">Please <a style="color: #ff4135;" href="login.php">login</a> to checkout.</p>';
                  }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
<?php include 'includes/footer.php'; ?>
</div>
</body>
<?php include 'includes/scripts.php'; ?>
<script>
  $(function(){
    $(document).on('click', '.minus', function(e){
      e.preventDefault();
      var id = $(this).data('id');
      var qty = $('#qty_'+id).val();
      if(qty > 1){
        qty--;
      }
      $('#qty_'+id).val(qty);

      $.ajax({
        type: 'POST',
        url: 'cart_update.php',
        data: {id:id, qty:qty},
        dataType: 'json',
        success: function(response){
          if(!response.error){
            getDetails();
            getCart();
            getTotal();
          }
        }
      });
    });

    $(document).on('click', '.add', function(e){
      e.preventDefault();
      var id = $(this).data('id');
      var qty = $('#qty_'+id).val();
      qty++;
      $('#qty_'+id).val(qty);

      $.ajax({
        type: 'POST',
        url: 'cart_update.php',
        data: {id:id, qty:qty},
        dataType: 'json',
        success: function(response){
          if(!response.error){
            getDetails();
            getCart();
            getTotal();
          }
        }
      });
    });
  });
</script>