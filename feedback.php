<?php 
  include 'includes/session.php';

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];
    $error = false;
    $output = '';
    $conn = $pdo->open();

    try{
      $stmt = $conn->prepare("INSERT INTO feedback (first_name, last_name, subject, message) VALUES (:fName, :lName, :subject, :msg)");
      $stmt->execute(['fName'=>$fName, 'lName'=>$lName, 'subject'=>$subject, 'msg'=>$msg]);
      $output = 'Your message has been recorded successfully';
    }
    catch(PDOException $e){
      $error = true;
      $output = $e->getMessage();
    }

    $pdo->close();
  }
  else {
    $error = true;
    $output = 'Please fill up the form first';
  }
  $pdo->close();
  echo json_encode($output);
?>