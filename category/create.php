<?php
    require "../class/database.php";
    require "../class/category.php";

    if($_SERVER['REQUEST_METHOD']=="POST"){

        $name = $_POST['name'];
        $type = $_POST['type'];

        $db = new Database();
        $conn = $db->getConnection();

        $category = new Category($conn);
        $category->setName($name);
        $category->setType($type);
        if($category->create()){
             echo "<script>
            alert('category added !');
            window.location.href = '../public/category.php';
            </script>";
        }else{
            echo "<script>
            alert('category can t be repeated !');
            window.location.href = '../public/category.php';
            </script>";
        }
    }
?>