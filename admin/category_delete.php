<?php 
    include 'includes/session.php';

    if(isset($_POST['delete'])){
        $id = $_POST['id'];

        $conn = $pdo->open();

        try {
            $stmt = $conn->prepare("DELETE FROM category WHERE category_id=:id");
            $stmt2 = $conn->prepare("DELETE FROM brands WHERE brand_category=:id");
            $stmt3 = $conn->prepare("DELETE FROM sub_category WHERE main_id=:id");
            $stmt->execute(['id'=>$id]);
            $stmt2->execute(['id'=>$id]);
            $stmt3->execute(['id'=>$id]);

            $_SESSION['success'] = 'Category deleted successfully';
        }
        catch(PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }

        $pdo->close();
    }
    elseif(isset($_POST['delete_sub'])) {
        $id = $_POST['id'];
        $conn = $pdo->open();

        try {
            $stmt = $conn->prepare("DELETE FROM sub_category WHERE sub_id=:id");
            $stmt2 = $conn->prepare("DELETE FROM brands WHERE brand_subcat=:id");
            $stmt->execute(['id'=>$id]);
            $stmt2->execute(['id'=>$id]);

            $_SESSION['success'] = 'Sub category deleted successfully';
        }
        catch(PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }

        $pdo->close();
    }
    else {
        $_SESSION['error'] = 'Select category to delete first';
    }

    header('location: category.php');
?>