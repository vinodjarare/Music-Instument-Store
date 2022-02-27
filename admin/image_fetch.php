<?php
  include 'includes/session.php';

  if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $output = '';

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM images WHERE pro_id=:id");
    $stmt->execute(['id'=>$id]);

    foreach($stmt as $row){
      $output .= "
      <div class='img-box' id='img_".$row['id']."'>
        <img src='uploads/".$row['img_name']."'>
      </div>
      ";
    }

    $pdo->close();
    echo json_encode($output);
  }
?>