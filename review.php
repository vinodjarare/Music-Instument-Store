<?php
  include 'includes/session.php';

  $conn = $pdo->open();
  $output = array('error'=>false, 'message'=>'');

  $star = $_POST['star'];
  $uname = $_POST['name'];
  $email = $_POST['email'];
  $review = $_POST['review'];
  $uid = $_POST['id'];
  $pid = $_POST['pid'];

  try{
    $stmt = $conn->prepare("INSERT INTO reviews (pro_id, customer_id, name, email, review, rating) 
    VALUES (:pid, :id, :uname, :email, :review, :star)");
    $stmt->execute(['pid'=>$pid, 'id'=>$uid, 'uname'=>$uname, 'email'=>$email, 'review'=>$review, 'star'=>$star]);
    $output['message'] = 'Your review submitted successfully.';
  }
  catch(PDOException $e){
    $output['error'] = true;
    $output['error'] = $e->getMessage();
  }
  
  $pdo->close();
  echo json_encode($output);
?>