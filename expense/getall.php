<?php
    require_once "../class/database.php";
    require_once "../class/expense.php";

    $user_id = $_SESSION['user_id'];
    
    $db = new Database();
    $conn = $db->getConnection();

    $expense = new Expense($conn);
    if($expense->getAll($user_id)){
        $expenses = $expense->getAll($user_id);
    }
?>