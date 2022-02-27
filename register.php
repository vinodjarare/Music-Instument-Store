<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    include 'includes/session.php';

    if(isset($_POST['signup'])) {
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $ph_no = $_POST['pnum'];
        $email = $_POST['email'];
        $password = $_POST['psswd'];
        $ver_password = $_POST['ver_passwd'];

        $_SESSION['fname'] = $firstname;
        $_SESSION['lname'] = $lastname;
        $_SESSION['pnum'] = $ph_no;
        $_SESSION['email'] = $email;

        if($_POST['captcha'] != $_SESSION['captcha']) {
            $_SESSION['error'] = "Invalid Captcha";
            header('Location: /instrumentals/login.php#/register');
        }
        else {
            if($password != $ver_password) {
                $_SESSION['error'] = 'Passwords did not match';
                header('Location: /instrumentals/login.php#/register');
            }
            else {
                $conn = $pdo->open();
    
                $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM customer WHERE email_id=:email");
                $stmt->execute(['email'=>$email]);
                $row = $stmt->fetch();
    
                if($row['numrows'] > 0) {
                    $_SESSION['error']  = 'Email already taken';
                    header('Location: /instrumentals/login.php#/register');
                }
                else {
                    $now = date('Y-m-d');
                    $password = password_hash($password, PASSWORD_DEFAULT);
    
                    //generate code
                    $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $code = substr(str_shuffle($set), 0, 12);
    
                    try{
                        $stmt = $conn->prepare("INSERT INTO customer (password, first_name, last_name, email_id, mobile_no, activate_code, created_on) 
                        VALUES (:password, :firstname, :lastname, :email, :ph_no, :code, :now)");
                        $stmt->execute(['password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email, 'ph_no'=>$ph_no, 'code'=>$code, 'now'=>$now]);
    
                        unset($_SESSION['fname']);
                        unset($_SESSION['lname']);
                        unset($_SESSION['pnum']);
                        unset($_SESSION['email']);
                        unset($_SESSION['error']);

                        header('location: success.php');
                    }
                    catch (PDOException $e) {
                        $_SESSION['error'] = $e->getMessage();
                        echo $e->getMessage();
                        header('location: /instrumentals/login.php#/register');
                    }

                    $pdo->close();
                }
            }
        }
    }
    else {
        $_SESSION['error'] = 'Fill up registration form first';
        header('location: /instrumentals/login.php#/register');
    }
?>