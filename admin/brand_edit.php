<?php 
    include 'includes/session.php';

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];

        try{
            $stmt = $conn->prepare("UPDATE brands SET brand_name=:name WHERE brand_id=:id");
            $stmt->execute(['name'=>$name, 'id'=>$id]);
            $_SESSION['success'] = 'Brand name updated successfully';
        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }

        $pdo->close();
    }
    else{
        $_SESSION['error'] = 'Fill up edit brand form first';
    }

    header('location: brands.php');
?>