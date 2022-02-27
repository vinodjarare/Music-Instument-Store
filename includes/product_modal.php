<!-- Product Modal -->
<div class="modal product-modal fade in" id="quickView">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i class="ti-close"></i>
      </button>
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6 px-0">
                <div class="image"><img id="pro-img" class="img-fluid"></div>
              </div>
              <div class="col-lg-6 align-self-center p-5">
                <div class="text-center align-self-center product-short-details">
                  <h3 class="mb-lg-2 mb-2 pro-name"></h3>
                  <p class="product-price pro-price">&#8377;</p>
                  <button type="button" class="btn btn-primary btn-main w-100 mb-lg-4 mb-3 add-cart">Add to Cart</button>
                  <a class="btn btn-transparent modal-details">View Details</a>
                </div>
                <ul class="list-inline social-icon-alt">
                  <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="ti-vimeo-alt"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="ti-google"></i></a></li>
               </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(function(){
    $(document).on('click', '.proView', function(e){
      e.preventDefault();
      $('#quickView').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });
  });

  function getRow(id){
    $.ajax({
      type: 'POST',
      url: 'products_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        $('.pro-name').html(response.product_name);
        $('.pro-price').html("&#8377;"+ response.product_price);
        $('#pro-img').attr('src', 'admin/uploads/'+response.img_name);
        $('.modal-details').attr('href', 'product_details.php?id='+response.product_id);
        $('.add-cart').attr('data-id', response.product_id);
      }
    });
  }
    </script>