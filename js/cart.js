$(function(){

  getCart();
  getDetails();
  getTotal();

  $(document).on('click', '.add-cart', function(){
    var product = $(this).data('id');
    var qty = 1;
    if($('#quantity').length){
      var qty = document.querySelector('#quantity').value;
      if(qty == 0){
        qty = 1;
      }
    }
    else{
      qty = 1;
    }

    $.ajax({
      type: 'POST',
      url: 'cart_add.php',
      data: {id:product, qty:qty},
      dataType: 'json',
      success: function(response){
        if(response.error){
          swal("Oops!", response.msg,"error");  
        }
        else{
          swal({
            title: "YEY!",
            text: "Item Added to Cart",
            type: "success",
            closeOnConfirm: !1
          }, getCart());
        }
      }
    });
  });

  $(document).on('click', '.product-remove', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'cart_delete.php',
      data: {id:id},
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

function getCart(){
  $.ajax({
    type: 'POST',
    url: 'cart_fetch.php',
    dataType: 'json',
    success: function(response){
      $('#cart_menu').html(response.list);
      $('.cart_count').html(response.count);
      // $('#cart-total').html("&#8377;"+response.total);
    }
  });
}

function getDetails(){
  $.ajax({
    type: 'POST',
    url: 'cart_details.php',
    dataType: 'json',
    success: function(response){
      $('#tbody').html(response.list);
      $('#grand-total').html("&#8377;"+response.total);
      $('#cart-total').html("&#8377;"+response.total);
      $('#sub-total').html('&#8377;'+response.total);
      getCart();
    }
  });
}

function getTotal() {
  $.ajax({
    type: 'POST',
    url: 'cart_total.php',
    dataType: 'json',
    success: function(response){
      total = response;
    }
  });
}