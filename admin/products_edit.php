<?php 
  include 'includes/session.php';
  include 'includes/slugify.php';

  if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $name = $_POST['edit_name'];
    $slug = slugify('edit_name');
    $cat = $_POST['edit_category'];
    $subcat = $_POST['edit_sub_category'];
    $brand = $_POST['edit_brand'];
    $price = $_POST['edit_price'];
    $stock = $_POST['edit-stock'];
    $overview = $_POST['edit_overview'];
    $description = $_POST['edit_description'];
    $history = $_POST['edit_history'];

    $conn = $pdo->open();

    try {
      $stmt = $conn->prepare("UPDATE product SET product_name=:name, category_id=:cat, subcat_id=:subcat, 
      brand_id=:brand, product_overview=:overview, product_history=:history, 
      product_description=:description, product_price=:price, stock=:stock,slug=:slug WHERE product_id=:id");
      
      $stmt->execute(['name'=>$name, 'cat'=>$cat, 'subcat'=>$subcat, 'brand'=>$brand,'overview'=>$overview, 
      'history'=>$history, 'description'=>$description, 'price'=>$price, 'stock'=>$stock,'slug'=>$slug, 'id'=>$id]);
      $_SESSION['success'] = 'Product updated successfully';
    }
    catch(PDOException $e){
      $_SESSION['error'] = $e->getMessage();
    }
  }
  else{
    $_SESSION['error'] = 'Fill up edit product form first';
  }

  header('location: products.php');
?>