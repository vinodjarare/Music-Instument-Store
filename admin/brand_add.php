<?php 
  include 'includes/session.php';

  if(isset($_POST['add'])) {
    $name = $_POST['name'];

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM brands WHERE brand_id=:id");
    $stmt->execute(['id'=>$id]);
    $row = $stmt->fetch();

    if ($row['numrows'] > 0) {
      $_SESSION['error'] = 'Brand Already Exists';
    }
    else {
      try {
        $stmt = $conn->prepare("INSERT INTO brands (brand_name) VALUES (:name)");
        $stmt->execute(['name'=>$name]);
        $_SESSION['success'] = 'Brand added successfully';
      }
      catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
      }
    }

    $pdo->close();
  }
  else {
    $_SESSION['error'] = 'Fill up the form first';
  }

  header('location: brands.php');
?>