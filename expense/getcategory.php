<?php
    require_once "../class/database.php";
    require_once "../class/expense.php";


    $db = new Database();
    $conn = $db->getConnection();


    $expense = new Expense($conn);


 
    $category = $expense->getCategoryByType();
 

 

 
  
 
?>