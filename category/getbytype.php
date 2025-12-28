<?php
    require "../class/database.php";
    require "../class/category.php";

    $db = new Database();
    $conn = $db->getConnection();

    $category = new Category($conn);
 
 

        $type = $_GET['type'];
    
        
        if($type == "income" || $type=="expense"){
            $categories = $category->getByType($type);
        }else{
            $categories = $category->getAll();
        }

    

    

  
?>