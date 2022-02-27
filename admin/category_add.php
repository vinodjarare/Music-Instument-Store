<?php 
    include 'includes/session.php';

    if(isset($_POST['add'])){
        $name = $_POST['name'];

        $conn = $pdo->open();

        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM category WHERE category_name=:name");
        $stmt->execute(['name'=>$name]);
        $row = $stmt->fetch();

        if($row['numrows'] > 0) {
            $_SESSION['error'] = 'Category already exists.';
        }
        else {
            try {
                $stmt = $conn->prepare("INSERT INTO category (category_name) VALUES (:name)");
                $stmt->execute(['name'=>$name]);
                $_SESSION['success'] = 'Category added successfully';
            }
            catch(PDOException $e) {
                $_SESSION['error'] = $e->getMessage();
            }
        }

        $pdo->close();
    }
    else if(isset($_POST['addsub'])){
        $name = $_POST['name'];
        $mainid = $_POST['id'];


        $conn = $pdo->open();

        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM sub_category WHERE name=:name");
        $stmt->execute(['name'=>$name]);
        $row = $stmt->fetch();

        if($row['numrows'] > 0) {
            $_SESSION['error'] = 'Sub Category already exists.';
        }
        else {
            try {
                $stmt = $conn->prepare("INSERT INTO sub_category (main_id, name) VALUES (:mainid, :name)");
                $stmt->execute(['mainid'=>$mainid, 'name'=>$name]);
                $_SESSION['success'] = 'Sub Category added successfully';
            }
            catch(PDOException $e) {
                $_SESSION['error'] = $e->getMessage();
            }
        }
    }
    else {
        $_SESSION['error'] = 'Fill up category form first';
    }

    header('location: category.php');
?>