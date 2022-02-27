<?php 
    include 'includes/session.php';
    $conn = $pdo->open();

    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['pswd'];

        try{
            $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM customer WHERE email_id = :email");
            $stmt->execute(['email'=>$email]);
            $row = $stmt->fetch();
            if($row['numrows'] > 0){
                // if($row['status']) {
                    if(password_verify($password, $row['password'])){
                        if ($row['type']) {
                            $_SESSION['admin'] = $row['customer_id'];
                            header('location: admin/home.php');
                        }
                        else {
                            $_SESSION['user'] = $row['customer_id'];
                            $_SESSION['fname'] = $row['first_name'];
                            header("location: account.php");
                        }
                    }
                    else{
                        $_SESSION['error'] = 'Incorrect password';
                        header('location: login.php');
                    }
                // }
                // else {
                //     $_SESSION['error'] = 'Account not activated.';
                //     header('location: login.php');
                // } 
            }
            else{
                $_SESSION['error'] = 'Email not found';
                header('location: login.php');
            }
        }
        catch(PDOException $e) {
            echo "There is some problem in connection: " .$e->getMessage();
        }
    }
    else {
        $_SESSION['error'] = "Enter login credentials first";
        header('location: login.php');
    }

    $pdo->close();
?>