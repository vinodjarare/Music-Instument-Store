<?php 
    include 'includes/conn.php';
    session_start();

    if(isset($_SESSION['admin'])) {
        header('location: admin/home.php');
    }

    if(!isset($_COOKIE['uid'])){
        $cookieName = 'uid';
        $cookieValue = 'TMP'.random_int(10000, 99999);
        $expire = time() + 60*60*24*3;

        setcookie($cookieName, $cookieValue, $expire);
        $_SESSION['cookie'] =  $cookieValue;

        $conn = $pdo->open();

        try{
            $stmt = $conn->prepare("INSERT INTO visitor (user_id) VALUES (:id) ON DUPLICATE KEY UPDATE count=count+1");
            $stmt->execute(['id'=>$_SESSION['cookie']]);

            $cart = $conn->prepare("INSERT INTO cart (user_id) VALUES (:id)");
            $cart->execute(['id'=>$_SESSION['cookie']]);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        $pdo->close();
    }
    else{
        $_SESSION['cookie'] =  $_COOKIE['uid'];
    }

    if(isset($_SESSION['user'])) {
        $conn = $pdo->open();
     
        try {
            $stmt = $conn->prepare("SELECT * FROM customer WHERE customer_id=:customer_id");
            $stmt->execute(['customer_id'=>$_SESSION['user']]);
            $user = $stmt->fetch();
        }
        catch (PDOException) {
            echo "There is some problem in connection: " . $e->getMessage();
        }

        $pdo->close();
    }
?>