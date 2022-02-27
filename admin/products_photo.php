<?php 
  include 'includes/session.php';

  if(isset($_POST['addPhoto'])){
    $id = $_POST['id'];
    $targetDir = "uploads/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'webp');
    $filename = $_FILES['photo']['name'];

    $conn = $pdo->open();

    if(!empty($filename)){
      foreach($_FILES['photo']['name'] as $key=>$val){
        // File upload path
        $filename = basename($_FILES['photo']['name'][$key]);
        $targetFilePath = $targetDir . $filename;

        // check file type
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if(in_array($fileType, $allowTypes)){
          // upload files
          if(move_uploaded_file($_FILES['photo']['tmp_name'][$key], $targetFilePath)){
            // image db insert sql
            $imgData = $filename;

            if(!empty($imgData)){
              $values = trim($key, ',');

              try{
                $stmt = $conn->prepare("INSERT INTO images (pro_id, img_name) VALUES (:id, :filename)");
                $stmt->execute(['id'=>$id, 'filename'=>$imgData]);
                $_SESSION['success'] = 'Images added successfully';
              }
              catch(PDOException $e){
                $_SESSION['error'] = $e->getMessage();
              }
            }
            else{
              $_SESSION['error'] = 'Upload Failed';
            }
          }
          else{
            $_SESSION['error'] = $_FILES['photo']['name'][$key].' | ';
          }
        }
        else{
          $_SESSION['error'] = $_FILES['photo']['name'][$key].' | ';
        }
      }
    }
    else{
      $_SESSION['error'] = 'Please select atleast one image to upload';
    }
    
  }
  else{
    $_SESSION['error'] = 'Fill up product form first';
  }
  header('location: products.php');
?>