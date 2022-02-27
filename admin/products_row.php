<?php 
  include './includes/session.php';

  if(isset($_POST['id'])){
    $id = $_POST['id'];

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT product.product_id, product.product_name, product.product_price, product.stock,product.product_overview, product.product_description, 
    product.product_history, category.category_id, category.category_name, sub_category.sub_id, brands.brand_id, sub_category.name, 
    brands.brand_name FROM product INNER JOIN category ON product.category_id=category.category_id INNER JOIN sub_category 
    ON product.subcat_id=sub_category.sub_id INNER JOIN brands ON product.brand_id=brands.brand_id WHERE product.product_id=:id");
    $stmt->execute(['id'=>$id]);
    $row = $stmt->fetch();

    $pdo->close();

    echo json_encode($row);
  }
?>