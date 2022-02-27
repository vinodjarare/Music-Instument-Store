<?php 
    include 'includes/session.php';

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];

        try{
            $stmt = $conn->prepare("UPDATE category SET category_name=:name WHERE category_id=:id");
            $stmt->execute(['name'=>$name, 'id'=>$id]);
            $_SESSION['success'] = 'Category updated successfully';
        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }

        $pdo->close();
    }
    elseif(isset($_POST['edit_sub'])){
        $id = $_POST['id'];
        $name = $_POST['name'];

        try{
            $stmt = $conn->prepare("UPDATE sub_category SET name=:name WHERE sub_id=:id");
            $stmt->execute(['name'=>$name, 'id'=>$id]);
            $_SESSION['success'] = 'Sub category updated successfully';
        }
        catch(PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }

        $pdo->close();
    }
    else{
        $_SESSION['error'] = 'Fill up edit category form first';
    }

    header('location: category.php');
?>