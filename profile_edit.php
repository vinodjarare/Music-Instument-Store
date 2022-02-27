<?php
  include 'includes/session.php';

  $conn = $pdo->open();

  if(isset($_POST['edit'])){
    $c_passwd = $_POST['c_passwd'];
    $email = $_POST['email'];
    $paswd = $_POST['passwd'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $pnum = $_POST['pnum'];
    $photo = $_FILES['photo']['name'];

    if(password_verify($c_passwd, $user['password'])){
      if(!empty($photo)){
        move_uploaded_file($_FILES['photo']['tmp_name'], 'images/profile/'.$photo);
        $filename = $photo;
      }
      else{
        $filename = $user['image'];
      }

      if($paswd == $user['password']){
        $paswd = $user['password'];
      }
      else{
        $paswd = password_hash($paswd, PASSWORD_DEFAULT);
      }

      try{
        $stmt = $conn->prepare("UPDATE customer SET password=:passwd, first_name=:fname, last_name=:lname, email_id=:email, mobile_no=:pnum, image=:img WHERE customer_id=:id");
        $stmt->execute(['passwd'=>$paswd, 'fname'=>$firstname, 'lname'=>$lastname, 'email'=>$email, 'pnum'=>$pnum, 'img'=>$filename, 'id'=>$user['customer_id']]);

        $_SESSION['success'] = 'Account updated successfully';
      }
      catch(PDOException $e){
        $_SESSION['error'] =  $e->getMessage();
      }
    }

  }
  else{
    $_SESSION['error'] = 'Fill up edit form first';
    header('location: account.php');
  }
  $pdo->close();
  header('location: account.php');
?>