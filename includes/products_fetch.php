<?php 
  include 'session.php';

  $conn = $pdo->open();

  $stmt = $conn->prepare("SELECT product.product_id, product.product_name, product.product_price, product.product_photo, brands.brand_id, 
  brands.brand_name, category.category_id, category.category_name, sub_category.sub_id, sub_category.name FROM product INNER JOIN brands 
  ON product.brand_id = brands.brand_id INNER JOIN category ON product.category_id = category.category_id INNER JOIN sub_category ON 
  product.subcat_id = sub_category.sub_id WHERE 1");
  $stmt->execute();
  $row = $stmt->fetch();

  $pdo->close();

  echo json_encode($row);
?>