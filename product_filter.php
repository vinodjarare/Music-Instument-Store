<?php
  // num of products on each page
  $numOfProducts = 9;
  $currentPage = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
  // category filter
  $where = '';
  if(isset($_GET['cat']) && is_numeric($_GET['cat'])){
    $category = (int)$_GET['cat'];
    // set filter queries
    $where = 'WHERE subcat_id = '.$category;
  }

  // brand filter
  if(isset($_GET['brand'])){
    if(!empty($_GET['brand'])){
      $brand = implode(',', $_GET['brand']);
      isset($_GET['cat']) ? $where .= " AND brand_id IN(".$brand.")" : $where .= "WHERE brand_id IN(".$brand.")";
    } 
  }

  // price filter
  if(isset($_GET['price'])){
    if(!empty($_GET['price'])){
      $price = explode(',', $_GET['price']);
      $min_price = $price[0];
      $max_price = $price[1];


      isset($_GET['cat']) || isset($_GET['brand']) ? $where .= " AND product_price BETWEEN $min_price AND $max_price" : $where .= "WHERE product_price BETWEEN $min_price AND $max_price";
    }
  }

  // main category filter
  if(isset($_GET['c'])){
    $c = $_GET['c'];
    $where = "WHERE product.category_id=".$c;
  }

  // searchbar
  if(isset($_GET['s'])){
    $key = $_GET['s'];
    $where = "WHERE product_name OR category_name OR name LIKE '%".$key."%'";
  }

  $conn = $pdo->open();

  // select products order by date added
  try{
    $stmt = $conn->prepare("SELECT * FROM product LEFT JOIN category ON product.category_id=category.category_id LEFT JOIN sub_category ON product.subcat_id=sub_category.sub_id $where ORDER BY product_id DESC LIMIT ?,?");
    // bind values
    $stmt->bindValue(1, ($currentPage - 1) * $numOfProducts, PDO::PARAM_INT);
    $stmt->bindValue(2, $numOfProducts, PDO::PARAM_INT);
    $stmt->execute();
    // fetch products from database
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // get total no of products
    $totalProducts = $conn->query("SELECT * FROM product LEFT JOIN category ON product.category_id=category.category_id LEFT JOIN sub_category ON product.subcat_id=sub_category.sub_id $where")->rowCount();
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
?>