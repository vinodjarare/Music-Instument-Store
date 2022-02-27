<?php 
  include 'includes/session.php';

  $output = '';
  $conn = $pdo->open();
  $stmt = $conn->prepare("SELECT * FROM brands");
  $stmt->execute();

  foreach($stmt as $row) {
    $output .= "
    <option value='".$row['brand_id']."' class='append_items'>".$row['brand_name']."</option>
    ";
  }

  $pdo->close();
  echo json_encode($output);
  
?>