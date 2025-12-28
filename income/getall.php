<?php
    require_once "../class/database.php";
    require_once "../class/income.php";

    $user_id = $_SESSION['user_id'];
    
    $db = new Database();
    $conn = $db->getConnection();

    $income = new Income($conn);
    if($income->getAll($user_id)){
        $incomes = $income->getAll($user_id);
    }
?>