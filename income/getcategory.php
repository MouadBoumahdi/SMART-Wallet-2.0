<?php
    require_once "../class/database.php";
    require_once "../class/income.php";


    $db = new Database();
    $conn = $db->getConnection();


    $income = new Income($conn);


 
    $category = $income->getCategoryByType();
 

 

 
  
 
?>