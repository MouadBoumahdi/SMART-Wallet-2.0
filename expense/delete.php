<?php
    require "../class/database.php";
    require "../class/expense.php";

    $id = $_GET['id'];
    $db = new Database();
    $conn = $db->getConnection();


    $expense = new Expense($conn);


    if($expense->delete($id)){
         echo "<script>
            alert('Expense deleted !');
            window.location.href = '../public/expense.php';
            </script>";
    }else{
         echo "<script>
            alert('Try again !');
            </script>";
    }
?>