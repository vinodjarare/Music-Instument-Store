let overview;
let description;
let history;
ClassicEditor
  .create( document.querySelector( '#overview-editor' ) )
  .catch( error => {
  console.error( error );
});
ClassicEditor
  .create( document.querySelector( '#description-editor' ) )
  .catch( error => {
  console.error( error );
});
ClassicEditor
  .create( document.querySelector( '#history-editor' ) )
  .catch( error => {
  console.error( error );
});
ClassicEditor
  .create( document.querySelector( '#overview-editor1' ) )
  .then( newEditor => {
    overview = newEditor;
  } )
  .catch( error => {
  console.error( error );
});
ClassicEditor
  .create( document.querySelector( '#description-editor1' ) )
  .then( newEditor => {
    description = newEditor;
  } )
  .catch( error => {
  console.error( error );
});
ClassicEditor
  .create( document.querySelector( '#history-editor1' ) )
  .then( newEditor => {
    history = newEditor;
  } )
  .catch( error => {
  console.error( error );
});
$(function(){
    $('#select_category').change(function(){
        var val = $(this).val();
        if(val == 0) {
            window.location = 'products.php';
        }
        else {
            window.location = 'products.php?category='+val;
        }
    });
});

$('#addproduct').click(function (e){
    e.preventDefault();
    getCategory();
    getBrands();
});

$('#addnew').on("hidden.bs.modal", function() {
    $('.append_items').remove();
});
$('#product_edit').on("hidden.bs.modal", function() {
  $('.append_items').remove();
});


$('#category').change(function() {
  const val = $(this).val();
  $.ajax({
    type: 'POST',
    url: 'subcategory_fetch.php',
    data: 'id='+val,
    cache: false,
    dataType: 'json',
    success: function(response) {
      $('#sub_category').html(response);
    }
  });
});

$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#product_edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  $(document).on('click', '.desc', function(e){
    e.preventDefault();
    $('#description').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });
  $(document).on('click', '.view-photo', function(e){
    e.preventDefault();
    $('#view_photo').modal('show');
    var id = $(this).data('id');
    getRow(id);
    getPhoto(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'products_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#desc').html(response.product_overview);
      $('.name').html(response.product_name);
      $('.proid').val(response.product_id);
      $('#edit_name').val(response.product_name);
      $('#catselected').val(response.category_id).html(response.category_name);
      $('#sub_catselected').val(response.sub_id).html(response.name);
      $('#brandselected').val(response.brand_id).html(response.brand_name);
      $('#edit_price').val(response.product_price);
      $('#edit-stock').val(response.stock);
      
      overview.setData(response.product_overview);
      description.setData(response.product_description);
      history.setData(response.product_history);
      
      getCategory();
    }
  });
}

function getPhoto(id){
  $.ajax({
    type: 'POST',
    url: 'image_fetch.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#img').append(response);
    }
  })
}

function getCategory() {
  $.ajax({
    type: 'POST',
    url: 'category_fetch.php',
    cache: false,
    dataType: 'json',
    success: function(response) {
      $('#category').append(response);
      $('#edit_category').append(response);
    }
  });
}

$('#edit_category').change(function() {
  const val = $(this).val();
  $.ajax({
    type: 'POST',
    url: 'subcategory_fetch.php',
    data: 'id='+val,
    cache: false,
    dataType: 'json',
    success: function(response) {
      $('#edit_sub_category').html(response);
    }
  });
});

function getBrands(){
  $.ajax({
    type: 'POST',
    url: 'brand_fetch.php',
    cache: false,
    dataType: 'json',
    success: function(response) {
      $('#brand').append(response);
    }
  })
}