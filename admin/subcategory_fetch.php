<?php 
  include 'includes/session.php';

  if(isset($_POST['id'])) {
    $output = '';
    $id = $_POST['id'];
    $conn = $pdo->open();
    $stmt = $conn->prepare("SELECT * FROM sub_category WHERE main_id=:id");
    $stmt->execute(['id'=>$id]);

    foreach($stmt as $row) {
      $output .= "
      <option value='".$row['sub_id']."' class='append_items'>".$row['name']."</option>
      ";
    }

    $pdo->close();
    echo json_encode($output);
  }
  else{
    $output = '';
    $conn = $pdo->open();
    $stmt = $conn->prepare("SELECT * FROM sub_category");
    $stmt->execute();

    foreach($stmt as $row) {
      $output .= "
      <option value='".$row['sub_id']."' class='append_items'>".$row['name']."</option>
      ";
    }

    $pdo->close();
    echo json_encode($output);
  }
?>