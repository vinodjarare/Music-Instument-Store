<?php 
  include 'includes/session.php';
  include 'includes/slugify.php';

  if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $slug = slugify($name);
    $cat = $_POST['category'];
    $subcat = $_POST['sub_category'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $overview = $_POST['overview'];
    $description = $_POST['description'];
    $history = $_POST['history'];

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM product WHERE slug=:slug");
    $stmt->execute(['slug'=>$slug]);
    $row = $stmt->fetch();

    if($row['numrows'] > 0) {
      $_SESSION['error'] = 'Product already exists';
    }
    else {
      try{
        $stmt = $conn->prepare("INSERT INTO product (category_id, subcat_id, brand_id, product_name, product_overview, product_history, 
        product_description, product_price, stock, slug) VALUES (:cat, :subcat, :brand, :name, :overview, :history, :description, :price, :stock, :slug)");
        $stmt->execute(['cat'=>$cat, 'subcat'=>$subcat, 'brand'=>$brand, 'name'=>$name, 'overview'=>$overview, 'history'=>$history, 'description'=>$description, 
        'price'=>$price, 'stock'=>$stock,'slug'=>$slug]);
        $_SESSION['success'] = 'Product Added Successfully';
      }
      catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
      }
    }  
  }
  else {
    $_SESSION['error'] = 'Fill up product form first';
  }
  header('location: products.php');
?>